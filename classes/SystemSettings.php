<?php namespace Devnull\Robots\Classes;
use phpDocumentor\Reflection\Types\Self_;

/**                _                             _
__ _  ___ _ __ ___| | ___ __   ___ _ __ __ _ ___(_) __ _
/ _` |/ _ \ '__/ _ \ |/ / '_ \ / _ \ '__/ _` / __| |/ _` |
| (_| |  __/ | |  __/   <| |_) |  __/ | | (_| \__ \ | (_| |
\__, |\___|_|  \___|_|\_\ .__/ \___|_|(_)__,_|___/_|\__,_|
|___/                   |_|

 * This is a gerekper.main[main] for OctoberCMS
 *
 * @category   Gerekper+ Addons | Toolbox Plugin File
 * @package    Devnull.classes.components | Octobercms
 * @author     devnull <www.gerekper.asia>
 * @copyright  2012-2019 Gerekper Inc
 * @license    http://www.gerekper.asia/license/modules.txt
 * @version    1.0.0
 * @link       http://www.gerekper.asia/package/toolbox
 * @see        http://www.github.com/gerekper/toolbox
 * @since      File available since Release 1.0.0
 * @deprecated -
 */

class SystemSettings
{
    //----------------------------------------------------------------------//
    //	Constant Functions - Start
    //----------------------------------------------------------------------//

    //----------------------------------------------------------------------//
    //	Constant Functions - End
    //----------------------------------------------------------------------//

    //----------------------------------------------------------------------//
    //	Construct Functions - Start
    //----------------------------------------------------------------------//

    function __construct(){}

    //----------------------------------------------------------------------//
    //	Construct Functions - End
    //----------------------------------------------------------------------//

    //----------------------------------------------------------------------//
    //	Main Functions - Start
    //----------------------------------------------------------------------//

    public static function get_config_robot()
    {
        $_get_config_robot = "{\"use_plugin_robot\":\"1\",\"redirectpage\":\"404\",\"use_robots\":\"1\",\"use_robottrap\":\"1\",\"use_forward_robot\":\"1\",\"use_invert_on_buttons\":\"1\"}";
        return array(['item' => self::get_robot_code(), 'value' => $_get_config_robot]);
    }

    public static function get_config_robot_log()
    {
        $_get_config_robot_log = "{\"use_plugin_robot_log\":\"1\",\"use_plugin_human_log\":\"1\"}";
        return array(['item' => SystemSettings::get_robot_log_code(), 'value' => $_get_config_robot_log]);

    }

    public static function get_config_human()
    {
        $_get_config_human = "{\"use_plugin_human\":\"1\",\"redirectpage\":\"404\"}";
        return array(['item' => SystemSettings::get_human_code(), 'value' => $_get_config_human]);
    }

    public static function get_robot_code(){ return 'devnull_robots_robot';}
    public static function get_robot_log_code(){ return 'devnull_robots_log';}

    //----------------------------------------------------------------------//
    //	Main Functions - End
    //----------------------------------------------------------------------//
}
