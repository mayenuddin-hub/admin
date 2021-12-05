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
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Config;
use Modules\Language\Models\Language;

class RedirectForMultiLanguage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param  string|null $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {

        if(strpos($request->path(),'install') === false  && file_exists(storage_path().'/installed') && strtolower($request->method()) === 'get'){

            $locale = $request->segment(1);
            if(in_array($locale,['admin','_debugbar'])){
                return $next($request);
            }

            // Check if the first segment matches a language code
            if(setting_item('site_enable_multi_lang') && setting_item('site_locale')){
                $lang = Language::findByLocale($locale);

                if (empty($lang)) {

                    // Store segments in array
                    $segments = $request->segments();

                    // Set the default language code as the first segment
                    $segments = Arr::prepend($segments, setting_item('site_locale',config('app.fallback_locale')));

                    $url = implode('/', $segments);
                    if(!empty($request->query())){
                        $url.='?'.http_build_query($request->query());
                    }

                    // Redirect to the correct url
                    return redirect()->to( $url );
                }
            }
        }
        return $next($request);
    }
}