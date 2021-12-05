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
class MapEngine
{
    public static function scripts()
    {
        $html = '';
        switch (setting_item('map_provider')) {
            case "gmap":
                $html .= sprintf("<script src='https://maps.googleapis.com/maps/api/js?key=%s&libraries=places'></script>", setting_item('map_gmap_key'));
                $html .= sprintf("<script src='%s'></script>", url('libs/infobox.js'));
                break;
            case "osm":
                $html .= sprintf("<script src='%s'></script>", url('libs/leaflet1.4.0/leaflet.js'));
                $html .= sprintf("<link rel='stylesheet' href='%s'>", url('libs/leaflet1.4.0/leaflet.css'));
                break;
        }
        $html .= sprintf("<script src='%s'></script>", url('module/core/js/map-engine.js?_ver='.config('app.version')));
        return $html;
    }
}