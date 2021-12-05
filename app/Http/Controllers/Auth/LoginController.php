<?php
/**
 * Short description for file
 *
 * Long description for file (if any)...
 *
 * PHP version 7
 *
 * LICENSE: This source file is subject to version 3.01 of the PHP license
 * that is available through the world-wide-web at the following URI:
 * http://www.php.net/license/3_01.txt.  If you did not receive a copy of
 * the PHP License and are unable to obtain it through the web, please
 * send a note to license@php.net so we can mail you a copy immediately.
 *
 * @category   Substantial
 * @package    Auth
 * @author     Original Author adam@ggtasker.co.uk
 * @copyright  2018-2019 Booki
 * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version    SVN: 1.0
 * @link       http://pear.php.net/package/Auth
 */
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Socialite;
use App\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/user/profile';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectTo()
    {
        if(Auth::user()->hasPermissionTo('dashboard_access')){
            return '/admin';
        }else{
            return $this->redirectTo;
        }
    }

    public function showLoginForm()
    {
        return view('auth.login',['page_title'=> __("Login")]);
    }

    public function socialLogin($provider)
    {
        $this->initConfigs($provider);
        return Socialite::driver($provider)->redirect();
    }

    protected function initConfigs($provider)
    {
        switch($provider){
            case "facebook":
            case "google":
            case "twitter":
                config()->set([
                    'services.'.$provider.'.client_id'=>setting_item($provider.'_client_id'),
                    'services.'.$provider.'.client_secret'=>setting_item($provider.'_client_secret'),
                    'services.'.$provider.'.redirect'=>'/social-callback/'.$provider,
                ]);
            break;
        }
    }

    public function socialCallBack($provider)
    {
        $this->initConfigs($provider);

        $user = Socialite::driver($provider)->user();

        if(empty($user)){
            return redirect()->route('/login')->with('error',__('Can not authorize'));
        }

        $existUser = User::getUserBySocialId($provider,$user->getId());

        if(empty($existUser)){
            //Try login with social email
            $email = $user->getId().'@'.$provider.'.com';

            $userByEmail = User::where(['email'=>$email])->first();
            if(!empty($userByEmail)){
                if(in_array($userByEmail->status,['blocked'])){
                    return redirect()->route('/login')->with('error',__('Your account has been blocked'));
                }
                Auth::login($userByEmail);
                return redirect('/');
            }
            

            // Create New User
            $realUser = new User();
            $realUser->email = $user->getId().'@'.$provider.'.com';
            $realUser->password = Hash::make(uniqid().time());
            $realUser->name = $user->getName();
            $realUser->first_name = $user->getName();
            $realUser->status = 'publish';

            $realUser->save();

            $realUser->addMeta('social_'.$provider.'_id',$user->getId());
            $realUser->addMeta('social_'.$provider.'_email',$user->getEmail());
            $realUser->addMeta('social_'.$provider.'_name',$user->getName());
            $realUser->addMeta('social_'.$provider.'_avatar',$user->getAvatar());

            $realUser->assignRole('customer');

            // Login with user
            Auth::login($realUser);

            return redirect('/');

        }else{

            if($existUser->deleted == 1){
                return redirect()->route('/login')->with('error',__('User blocked'));
            }
            
            Auth::login($existUser);

            return redirect('/');
        }
    }


}
