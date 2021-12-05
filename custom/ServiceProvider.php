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
 * @package    Routes
 * @author     Original Author adam@ggtasker.co.uk
 * @copyright  2018-2019 Booki
 * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version    SVN: 1.0
 * @link       http://pear.php.net/package/Routes
 */


namespace Custom;

use File;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function boot()
    {
        $listModule = array_map('basename', File::directories(__DIR__));
        foreach ($listModule as $module) {
            if(file_exists(__DIR__. '/' . $module . '/Config/config.php')){
                $this->publishes([
                    __DIR__. '/' . $module . '/Config/config.php' => config_path(strtolower($module).'.php'),
                ]);
            }
        }
    }

    public function register()
    {
        $listModule = array_map('basename', File::directories(__DIR__));
        foreach ($listModule as $module) {
            if(file_exists(__DIR__. '/' . $module . '/Config/config.php')){
                $this->mergeConfigFrom(
                    __DIR__. '/' . $module . '/Config/config.php', strtolower($module)
                );
            }

            if (is_dir(__DIR__ . '/' . $module . '/Views')) {
                $this->loadViewsFrom(__DIR__ . '/' . $module . '/Views', $module);
            }

            $class = "\Custom\\".ucfirst($module)."\\ModuleProvider";
            if(class_exists($class)) {
                $this->app->register($class);
            }

        }

        if (is_dir(__DIR__ . '/Layout')) {
            $this->loadViewsFrom(__DIR__ . '/Layout', 'Layout');
        }
    }

    public static function getModules(){
        return array_map('basename', File::directories(__DIR__));
    }
}