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
use Devnull\Robots\Classes\SystemSettings;
use Devnull\Robots\Models\Settings;
use October\Rain\Database\Updates\Seeder;

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

class SeedAllTables extends Seeder
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

    function __construct()
    {
        $this->_schema                  =   [];
        $this->installations            =   new InstallMain();
        $this->seeding                  =   new Seeding();
        $this->_main_code               =   'devnull_robot_settings';

        $this->_robots_robot            =   Robot::$_table;
        $this->_robots_directive        =   RobotDirective::$_table;
        $this->_robots_agent            =   RobotAgent::$_table;
        $this->_robots_log              =   RobotLog::$_table;

        $this->_robots_human             =   Human::$_table;
        $this->_robots_human_config      =   HumanConfig::$_table;
        $this->_robots_human_info        =   HumanInfo::$_table;
        $this->_robots_human_log         =   HumanLog::$_table;

        $this->_db_var_robots           =   SystemSettings::get_config_robot();
        $this->_db_var_robots_log       =   SystemSettings::get_config_robot_log();

        $this->_db_var_humans           =   SystemSettings::get_config_human();

        //TODO variables human_logs     =   SystemSettings::get_config_human_log();

        $this->_all_tables              =   [$this->_robots_robot, $this->_robots_directive, $this->_robots_agent,
                                            $this->_robots_log, $this->_robots_human, $this->_robots_human_config,
                                            $this->_robots_human_info, $this->_robots_human_log];

        $this->_all_config              =   [$this->_db_var_robots, $this->_db_var_humans];

        $this->_all_codes               =   [SystemSettings::get_robot_code()       =>  $this->_db_var_robots,
                                            SystemSettings::get_robot_log_code()    =>  $this->_db_var_robots_log,
                                            SystemSettings::get_robot_human_code()  =>  $this->_db_var_humans,
            ];
    }

    //----------------------------------------------------------------------//
    //	Construct Functions - End
    //----------------------------------------------------------------------//

    //----------------------------------------------------------------------//
    //	Main Functions - Start
    //----------------------------------------------------------------------//

    public function run() { $this->run_all_seed();}

    //----------------------------------------------------------------------//
    //	Main Functions - End
    //----------------------------------------------------------------------//

    //----------------------------------------------------------------------//
    //	Seed Functions - Start
    //----------------------------------------------------------------------//

    private function run_all_seed()
    {
        foreach($this->_all_tables as $_all_tables)
        {
            $this->installations->check_existing($_all_tables);
            switch($_all_tables)
            {
                case $this->_robots_robot:
                    SeedAllTables::init_schema_robot();
                    break;
                default:
                    break;
            }
            $this->installations->optimize_settings();
        }
        SeedAllTables::setSettings($this->_all_codes);
    }

    //----------------------------------------------------------------------//
    //	Seed Functions - Start
    //----------------------------------------------------------------------//

    //----------------------------------------------------------------------//
    //	Init Seed Functions - Start
    //----------------------------------------------------------------------//

    private function init_schema_robot()
    {
        foreach ($this->seeding->get_schema_robot() as $_schema)
        {
            Robot::updateOrcreate([
                'agent'     =>  $_schema['agent'],
                'status'    =>  $_schema['status'],
            ]);
        }
        SeedAllTables::init_reset_optimize(Robot::$_table);
    }

    private function init_reset_optimize($_value)
    {
        $this->installations->schema_default();
        $this->installations->optimize_table($_value);
    }

    //----------------------------------------------------------------------//
    //	Init Seed Functions - End
    //----------------------------------------------------------------------//

    //----------------------------------------------------------------------//
    //	Shared Functions - Start
    //----------------------------------------------------------------------//

    public function setSettings($_value)
    {
        foreach ($_value as $_key => $_code)
        {
            switch (SeedAllTables::checkSettings($_key))
            {
                case TRUE:
                    SeedAllTables::del_db_variables($_key);
                    SeedAllTables::init_db_variables($_code);
                    break;
                case FALSE:
                    SeedAllTables::init_db_variables($_code);
                    break;
                default:
                    break;
            }
        }
        return TRUE;
    }

    private function checkSettings($_value)
    {
        $_checkSettings = DB::table(Settings::$_table)->where('item', '=', $_value)->pluck('item');
        return ($_checkSettings)? TRUE : FALSE;
    }

    private function init_db_variables($_value)
    {
        foreach ($_value as $_per_value)
        {
            DB::table(Settings::$_table)->insert($_per_value);
        }
        //$this->installations->optimize_table(Settings::$_table);
        return TRUE;
    }

    private function del_db_variables($_value)
    {
        DB::table(Settings::$_table)->where('item', '=', $_value)->delete();
    }

    //----------------------------------------------------------------------//
    //	Shared Functions - Start
    //----------------------------------------------------------------------//
}