<?php namespace Devnull\Robots\Updates;

use DB;
use Devnull\Main\Classes\InstallMain;
use Devnull\Robots\Classes\Seeding;
use Devnull\Robots\Models\Robot;
use Devnull\Robots\Models\RobotDirective;
use Devnull\Robots\Models\RobotAgent;
use Devnull\Robots\Models\RobotLog;
use Devnull\Robots\Models\Human;
use Devnull\Robots\Models\HumanConfig;
use Devnull\Robots\Models\HumanInfo;
use Devnull\Robots\Models\HumanLog;
use Illuminate\Database\Seeder;

/**                _                             _
__ _  ___ _ __ ___| | ___ __   ___ _ __ __ _ ___(_) __ _
/ _` |/ _ \ '__/ _ \ |/ / '_ \ / _ \ '__/ _` / __| |/ _` |
| (_| |  __/ | |  __/   <| |_) |  __/ | | (_| \__ \ | (_| |
\__, |\___|_|  \___|_|\_\ .__/ \___|_|(_)__,_|___/_|\__,_|
|___/                   |_|

 * This is a gerekper.main[robots] for OctoberCMS
 *
 * @category   Gerekper+ Addons | Toolbox Plugin File
 * @package    Devnull.robots.updates.seedalltable | Octobercms
 * @author     devnull <www.gerekper.asia>
 * @copyright  2012-2019 Gerekper Inc
 * @license    http://www.gerekper.asia/license/modules.txt
 * @version    1.0.0
 * @link       http://www.gerekper.asia/package/toolbox
 * @see        http://www.github.com/gerekper/toolbox
 * @since      File available since Release 1.0.0
 * @deprecated -
 */

class SeedAllTable extends Seeder
{
    //----------------------------------------------------------------------//
    //	Constant Functions - Start
    //----------------------------------------------------------------------//

    function __construct()
    {
        $this->_schema              =   [];
        $this->installations        =   new InstallMain();
        $this->seeding              =   new Seeding();
        $this->_main_code           =   'devnull_robot_settings';

        $this->_robots_robot        =   Robot::$_table;
        $this->_robots_directive    =   RobotDirective::$_table;
        $this->_robots_agent        =   RobotAgent::$_table;
        $this->_robots_log          =   RobotLog::$_table;

        $this->_robot_human         =   Human::$_table;
        $this->_robot_human_config  =   HumanConfig::$_table;
        $this->_robot_human_info    =   HumanInfo::$_table;
        $this->_robot_human_log     =   HumanLog::$_table;

        $this->_db_variables        =   SystemSettings::get_config_default();

    }

    //----------------------------------------------------------------------//
    //	Constant Functions - End
    //----------------------------------------------------------------------//

    //----------------------------------------------------------------------//
    //	Construct Functions - Start
    //----------------------------------------------------------------------//

    //----------------------------------------------------------------------//
    //	Construct Functions - End
    //----------------------------------------------------------------------//

    //----------------------------------------------------------------------//
    //	Main Functions - Start
    //----------------------------------------------------------------------//

    //----------------------------------------------------------------------//
    //	Main Functions - End
    //----------------------------------------------------------------------//
}