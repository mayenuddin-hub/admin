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
    use Illuminate\Support\Facades\Config;

    class InitConfigsFromDatabase
    {
        /**
         * Handle an incoming request.
         *
         * @param \Illuminate\Http\Request $request
         * @param \Closure $next
         * @param string|null $guard
         * @return mixed
         */
        public function handle($request, Closure $next, $guard = null)
        {
            if (strpos($request->path(), 'install') === false && file_exists(storage_path() . '/installed')) {

                // Load Config from Database
                if (!empty(setting_item('email_from_address'))) {
                    Config::set('mail.from.address', setting_item("email_from_address"));
                }
                if (!empty(setting_item('email_from_name'))) {
                    Config::set('mail.from.name', setting_item("email_from_name"));
                }
                if (!empty(setting_item('site_timezone'))) {
                    Config::set('app.timezone', setting_item("site_timezone"));
                    date_default_timezone_set(config('app.timezone'));
                }

                // Load Email Config from Database
                if(!empty(setting_item('email_driver'))){
                    Config::set('mail.driver',setting_item("email_driver"));
                    switch (setting_item("email_driver")){
                        case 'mailgun':
                            if(!empty(setting_item('email_mailgun_domain'))){
                                Config::set('services.mailgun.domain',setting_item("email_mailgun_domain"));
                            }
                            if(!empty(setting_item('email_mailgun_secret'))){
                                Config::set('services.mailgun.secret',setting_item("email_mailgun_secret"));
                            }
                            if(!empty(setting_item('email_mailgun_endpoint'))){
                                Config::set('services.mailgun.endpoint',setting_item("email_mailgun_endpoint"));
                            }
                            break;
                        case 'postmark':
                            if(!empty(setting_item('email_postmark_token'))){
                                Config::set('services.postmark.token',setting_item("email_postmark_token"));
                            }
                            break;
                        case 'ses':
                            if(!empty(setting_item('email_ses_key'))){
                                Config::set('services.ses.domain',setting_item("email_ses_key"));
                            }
                            if(!empty(setting_item('email_ses_secret'))){
                                Config::set('services.ses.secret',setting_item("email_ses_secret"));
                            }
                            if(!empty(setting_item('email_ses_region'))){
                                Config::set('services.ses.endpoint',setting_item("email_ses_region"));
                            }
                            break;
                        case 'sparkpost':
                            if(!empty(setting_item('email_sparkpost_secret'))){
                                Config::set('services.sparkpost.secret',setting_item("email_sparkpost_secret"));
                            }
                            break;
                    }
                }
                if(!empty(setting_item('email_host'))){
                    Config::set('mail.host',setting_item("email_host"));
                }
                if(!empty(setting_item('email_port'))){
                    Config::set('mail.port',setting_item("email_port"));
                }
                if(!empty(setting_item('email_encryption'))){
                    Config::set('mail.encryption',setting_item("email_encryption"));
                }
                if(!empty(setting_item('email_username'))){
                    Config::set('mail.username',setting_item("email_username"));
                }
                if(!empty(setting_item('email_password'))){
                    Config::set('mail.password',setting_item("email_password"));
                }
            }

			return $next($request);
        }
    }
