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
 * @package    Providers
 * @author     Original Author adam@ggtasker.co.uk
 * @copyright  2018-2019 Booki
 * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version    SVN: 1.0
 * @link       http://pear.php.net/package/Providers
 */
namespace App\Providers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider; 

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Request $request)
    {

        if(env('APP_HTTPS')) {
            \URL::forceScheme('https');
        }

        Schema::defaultStringLength(191);

        if(strpos($request->path(),'install') === false  && file_exists(storage_path().'/installed')){

            $locale = $request->segment(1);
            if(in_array($locale,['admin','_debugbar'])){
                if(setting_item('site_locale')){
                    app()->setLocale(setting_item('site_locale'));
                }
                return;
            }

            // Check if the first segment matches a language code
            if(setting_item('site_enable_multi_lang')){
                app()->setLocale($request->segment(1));
            }else{
                app()->setLocale(setting_item('site_locale'));
            }
        }
    }
}
