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
 * @package    Controllers
 * @author     Original Author adam@ggtasker.co.uk
 * @copyright  2018-2019 Booki
 * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version    SVN: 1.0
 * @link       http://pear.php.net/package/Controllers
 */
namespace App\Http\Controllers;

use App\Helpers\Assets;
use function Clue\StreamFilter\fun;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Modules\Page\Models\Page;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function sendError($message,$data = []){

        $data['status'] = 0;

        $this->sendSuccess($data,$message);

    }

    public function sendSuccess($data = [],$message = '')
    {
        if(is_string($data))
        {
            response()->json([
                'message'=>$data,
                'status'=>true
            ])->send();
            die;
        }

        if(!isset($data['status'])) $data['status'] = 1;

        if($message)
        $data['message'] = $message;

        response()->json($data)->send();
        die;
    }


    public function setActiveMenu($item)
    {
        set_active_menu($item);
    }

    public function currentUser()
    {
        return Auth::user();
    }

    protected function filterLang(&$query){

        if(!setting_item('site_enable_multi_lang') or !setting_item('site_locale')) return false;

        if($lang = request()->route('locale'))
        {
            if($lang != setting_item('site_locale'))
                $query->where('lang',$lang);
            else{
                $query->where(function ($query){
                    $query->whereRAW("IFNULL(lang,'') = '' ")->orWhere('lang','=',setting_item('site_locale'));
                });
            }
        }else{
            $query->where(function ($query){
                $query->whereRAW("IFNULL(lang,'') = '' ")->orWhere('lang','=',setting_item('site_locale'));
            });
        }
    }

    protected function registerJs($file,$inFooter = true, $pos = 10,$version = false){
        Assets::registerJs($file,$inFooter,$pos,$version);
    }
    protected function registerCss($file,$inFooter = false, $pos = 10,$version = false){
        Assets::registerCss($file,$inFooter,$pos,$version);
    }

}
