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
 * @package    Middleware
 * @author     Original Author adam@ggtasker.co.uk
 * @copyright  2018-2019 Booki
 * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version    SVN: 1.0
 * @link       http://pear.php.net/package/Middleware
 */

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

class ChangeLocaleFromSettings
{

    /**
     * This function checks if language to set is an allowed lang of config.
     *
     * @param string $locale
     **/
    private function setLocale($locale)
    {


    }
    public function setDefaultLocale()
    {
        if(strpos(request()->path(),'install') === false){
            $locale = setting_item('site_locale');

            if ($locale) {
                $this->setLocale($locale);
            }
        }

    }
    public function setUserLocale()
    {
        $user = auth()->user();
        if ($user->locale) {
            $this->setLocale($user->locale);
        } else {
            $this->setDefaultLocale();
        }
    }
    public function setSystemLocale($request)
    {
        if ($request->session()->has('locale')) {
            $this->setLocale(session('locale'));
        } else {
            $this->setDefaultLocale();
        }
    }
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

    }
}
