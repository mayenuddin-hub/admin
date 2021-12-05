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
 * @package    Helpers
 * @author     Original Author adam@ggtasker.co.uk
 * @copyright  2018-2019 Booki
 * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version    SVN: 1.0
 * @link       http://pear.php.net/package/Helpers
 */
namespace App\Helpers;

class Assets
{
    static protected $jsFiles = [];
    static protected $cssFiles = [];

    static function registerJs($file,$inFooter = true, $pos = 10,$version = false,$in_line = false){
        if(empty($file)) return;
        static::$jsFiles[md5($file)] = [
            'file'=>$file,
            'posision'=>$pos,
            'in_footer'=>$inFooter,
            'version'=>$version,
            'in_line'=>$in_line,
        ];
    }
    static function registerCss($file,$inFooter = false, $pos = 10,$version = false){
        if(empty($file)) return;

        static::$cssFiles[md5($file)] = [
            'file'=>$file,
            'posision'=>$pos,
            'in_footer'=>$inFooter,
            'version'=>$version
        ];
    }

    static function js($inFooter = false)
    {
        $res = [];
        $html = '';
        foreach (static::$jsFiles as $file)
        {
            if($file['in_footer'] == $inFooter){
                $res[] = $file;
            }
        }

        $res = array_values(\Illuminate\Support\Arr::sort($res, function ($value) {
            return $value['position'] ?? 10;
        }));

        if(!empty($res))
        {
            foreach ($res as $item) {
                if($item['in_line']){
                    $html.=sprintf('<script type="text/javascript">%s</script>'.PHP_EOL,$item['file']);
                }else {
                    $html .= sprintf('<script type="text/javascript" src="%s"></script>' . PHP_EOL, static::__handleUrl($item));
                }
            }
        }
        return $html;
    }

    static function css($inFooter = false)
    {
        $res = [];
        $html = '';

        foreach (static::$cssFiles as $file)
        {
            if($file['in_footer'] == $inFooter){
                $res[] = $file;
            }
        }

        $res = array_values(\Illuminate\Support\Arr::sort($res, function ($value) {
            return $value['position'] ?? 10;
        }));
        if(!empty($res))
        {
            foreach ($res as $item) {

                $html.= sprintf('<link rel="stylesheet" href="%s">'.PHP_EOL,static::__handleUrl($item));
            }
        }
        return $html;
    }

    static function __handleUrl($item){

        $url = $item['file'];

        if(substr($url,0,4) != 'http' and  substr($url,0,2) !='//'){
            $url = asset($url);

            $v = !empty($item['version']) ? $item['version'] : config('app.version');
            if(strpos($url,'?') !== false){
                $url.='&_v='.$v;
            }else{
                $url.='?_v='.$v;
            }
        }

        return $url;
    }
}