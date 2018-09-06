<?php namespace Devnull\Robots\Updates;

use DB;
use Illuminate\Support\Facades\Schema;
use October\Rain\Database\Updates\Migration;
use Devnull\Main\Classes\InstallMain;
use Devnull\Robots\Models\Robot;
use Devnull\Robots\Models\RobotDirective;
use Devnull\Robots\Models\RobotAgent;
use Devnull\Robots\Models\RobotLog;
use Devnull\Robots\Models\Human;
use Devnull\Robots\Models\HumanInfo;
use Devnull\Robots\Models\HumanConfig;
use Devnull\Robots\Models\HumanLog;

/**                _                             _
__ _  ___ _ __ ___| | ___ __   ___ _ __ __ _ ___(_) __ _
/ _` |/ _ \ '__/ _ \ |/ / '_ \ / _ \ '__/ _` / __| |/ _` |
| (_| |  __/ | |  __/   <| |_) |  __/ | | (_| \__ \ | (_| |
\__, |\___|_|  \___|_|\_\ .__/ \___|_|(_)__,_|___/_|\__,_|
|___/                   |_|

 * This is a gerekper.robots[createalltable] for OctoberCMS
 *
 * @category   Gerekper+ Addons | Toolbox Plugin File
 * @package    Devnull.robots.updates | Octobercms
 * @author     devnull <www.gerekper.asia>
 * @copyright  2012-2019 Gerekper Inc
 * @license    http://www.gerekper.asia/license/modules.txt
 * @version    1.0.0
 * @link       http://www.gerekper.asia/package/toolbox
 * @see        http://www.github.com/gerekper/toolbox
 * @since      File available since Release 1.0.0
 * @deprecated -
 */

class CreateAllTable extends Migration
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
        $this->_table_engine            =   'InnoDB';
        $this->_robot_robot             =   Robot::$_table;
        $this->_robot_directive         =   RobotDirective::$_table;
        $this->_robot_agent             =   RobotAgent::$_table;
        $this->_robot_log               =   RobotLog::$_table;
        $this->_robot_human             =   Human::$_table;
        $this->_robot_human_info        =   HumanInfo::$_table;
        $this->_robot_human_config      =   HumanConfig::$_table;
        $this->_robot_human_log         =   HumanLog::$_table;

        $this->_database                =   [$this->_robot_robot, $this->_robot_directive, $this->_robot_agent,
                                            $this->_robot_log, $this->_robot_human, $this->_robot_human_info,
                                            $this->_robot_human_config, $this->_robot_human_log
                                            ];

        $this->installations            =   new InstallMain();
    }

    //----------------------------------------------------------------------//
    //	Construct Functions - End
    //----------------------------------------------------------------------//

    //----------------------------------------------------------------------//
    //	Main Functions - Start
    //----------------------------------------------------------------------//

    public function up()
    {
        $this->down($this->_database);
        $this->install_robot_robot();
        $this->install_robot_directive();
        $this->install_robot_agent();
        $this->install_robot_log();
        $this->install_robot_human();
        $this->install_robot_human_info();
        $this->install_robot_human_config();
        $this->install_robot_human_log();
    }

    public function down() { foreach($this->_database as $_downing) {$this->installations->remove_table($_downing);}}


    //----------------------------------------------------------------------//
    //	Main Functions - End
    //----------------------------------------------------------------------//

    //----------------------------------------------------------------------//
    //	Schema Functions - Start
    //----------------------------------------------------------------------//

    private function install_robot_robot()
    {
        $this->installations->remove_table($this->_robot_robot);
        Schema::create($this->_robot_robot, function ($table)
        {
            $table->engine = $this->_table_engine;
            $table->increments('id')->index();
            $table->string('agent');
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    private function install_robot_directive()
    {
        $this->installations->remove_table($this->_robot_directive);
        Schema::create($this->_robot_directive, function ($table)
        {
            $table->engine = $this->_table_engine;
            $table->increments('id')->index();
            $table->integer('robot_id')->default(0);
            $table->integer('position')->default(0);
            $table->enum('type', array('Disallow', 'Allow'));
            $table->string('data', 250);
            $table->timestamps();
        });
        $this->install_robot_directive_set();
    }

    private function install_robot_directive_set()
    {
        DB::Statement("ALTER TABLE `". $this->_robot_directive . "` CHANGE `type` `type` SET('Disallow','Allow') CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT 'Disallow';");
    }

    private function install_robot_agent()
    {
        $this->installations->remove_table($this->_robot_agent);
        Schema::create($this->_robot_agent, function ($table)
        {
            $table->engine  =   $this->_table_engine;
            $table->increments('id')->index();
            $table->string('name', 200);
            $table->string('desc', 255);
            $table->string('nameId', 200);
            $table->string('details_url', 250)->nullable();
            $table->string('cover_url', 250)->nullable();
            $table->string('owner_name', 100)->nullable();
            $table->string('owner_url', 250)->nullable();
            $table->string('owner_email', 100)->nullable();
            $table->string('ostatus', 100)->nullable();
            $table->string('purpose', 100)->nullable();
            $table->string('type', 100)->nullable();
            $table->string('platform', 100)->nullable();
            $table->string('avail', 100)->nullable();
            $table->string('excl', 100)->nullable();
            $table->string('excl_agent', 250)->nullable();
            $table->string('noindex', 100)->nullable();
            $table->string('nofollow', 100)->nullable();
            $table->string('host', 100)->nullable();
            $table->string('from', 100)->nullable();
            $table->string('user_agent', 250)->nullable();
            $table->string('lang', 100)->nullable();
            $table->string('history', 250)->nullable();
            $table->string('env', 100)->nullable();
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    private function install_robot_log()
    {
        $this->installations->remove_table($this->_robot_log);
        Schema::create($this->_robot_log, function ($table)
        {
            $table->engine = $this->_table_engine;
            $table->increments('id')->index();
            $table->string('useragent', 255);
            $table->biginteger('addr')->nullable();
            $table->string('remote_host', 255)->nullable();
            $table->string('remote_port', 100)->nullable();
            $table->string('request_method', 255)->nullable();
            $table->biginteger('request_time')->nullable();
            $table->bigInteger('request_time_float')->nullable();
            $table->string('query_string', 255)->nullable();
            $table->string('http_host', 200)->nullable();
            $table->string('http_referrer', 200)->nullable();
            $table->tinyInteger('is_robot')->nullable()->default(0);
            $table->tinyInteger('is_human')->nullable()->default(0);
            $table->timestamps();
        });
    }

    private function install_robot_human()
    {
        $this->installations->remove_table($this->_robot_human);
        Schema::create($this->_robot_human, function($table)
        {
            $table->engine  =   $this->_table_engine;
            $table->increments('id')->index();
            $table->string('attribution');
            $table->string('others', 200)->nullable()->default(NuLL);
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    private function install_robot_human_info()
    {
        $this->installations->remove_table($this->_robot_human_info);
        Schema::create($this->_robot_human_info, function($table)
        {
            $table->engine  = $this->_table_engine;
            $table->increments('id')->index();
            $table->integer('human_id')->default(0);
            $table->integer('position')->default(0);
            $table->string('field', 255);
            $table->string('value', 255);
            $table->string('others', 255)->nullable();
            $table->timestamps();
        });
    }

    private function install_robot_human_config()
    {
        $this->installations->remove_table($this->_robot_human_config);
        Schema::create($this->_robot_human_config, function($table)
        {
            $table->engine = $this->_table_engine;
            $table->increments('id')->index();
            $table->string('title', 100);
            $table->string('desc', 255);
            $table->text('value', 255);
            $table->string('url', 255)->nullable();
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    private function install_robot_human_log()
    {
        $this->installations->remove_table($this->_robot_human_log);
        Schema::create($this->_robot_human_log, function ($table)
        {
            $table->engine = $this->_table_engine;
            $table->increments('id')->index();
            $table->string('useragent', 255);
            $table->biginteger('addr')->nullable();
            $table->string('remote_host', 255)->nullable();
            $table->string('remote_port', 100)->nullable();
            $table->string('request_method', 255)->nullable();
            $table->biginteger('request_time')->nullable();
            $table->bigInteger('request_time_float')->nullable();
            $table->string('query_string', 255)->nullable();
            $table->string('http_host', 200)->nullable();
            $table->string('http_referrer', 200)->nullable();
            $table->tinyInteger('is_robot')->nullable()->default(0);
            $table->tinyInteger('is_human')->nullable()->default(0);
            $table->timestamps();
        });
    }

    //----------------------------------------------------------------------//
    //	Schema Functions - Start
    //----------------------------------------------------------------------//

}