<?php namespace Devnull\Robots;

use App, Backend;
use Illuminate\Foundation\AliasLoader;
use System\Classes\PluginBase;
use Illuminate\Contracts\Http\Kernel;

/**                _                             _
__ _  ___ _ __ ___| | ___ __   ___ _ __ __ _ ___(_) __ _
/ _` |/ _ \ '__/ _ \ |/ / '_ \ / _ \ '__/ _` / __| |/ _` |
| (_| |  __/ | |  __/   <| |_) |  __/ | | (_| \__ \ | (_| |
\__, |\___|_|  \___|_|\_\ .__/ \___|_|(_)__,_|___/_|\__,_|
|___/                   |_|

 * This is a gerekper.main[main] for OctoberCMS
 *
 * @category   Gerekper+ Addons | Main Plugin File
 * @package    Gerekper.Robots | Octobercms
 * @author     devnull <www.gerekper.asia>
 * @copyright  2012-2016 Gerekper Inc
 * @license    http://www.gerekper.asia/license/modules.txt
 * @version    1.0.0
 * @link       http://www.gerekper.asia/package/helpers
 * @see        http://www.github.com/gerekper
 * @since      File available since Release 1.0.0
 * @deprecated -
 */

class Plugin Extends PluginBase
{
	//----------------------------------------------------------------------//
	//	Construct Functions - Start
	//----------------------------------------------------------------------//

	function __construct()
	{
		$this->code         = 'devnull.robots';
	}

	//----------------------------------------------------------------------//
	//	Main Functions - Start
	//----------------------------------------------------------------------//

	public function pluginDetails()
	{
		return [
			'name'          =>  'devnull.robots::lang.plugin.name',
			'description'   =>  'devnull.robots::lang.plugin.description',
			'author'        =>  'devnull.robots::lang.plugin.author',
			'icon'          =>  'icon-bomb',
			'homepage'      =>  'devnull.robots::lang.plugin.homepage'
		];
	}

	public function register()
	{
		$alias = AliasLoader::getInstance();
		$alias->alias('Seeding', 'Devnull\Robots\Facades\Seeding');
		$alias->alias('InstallMain', 'Devnull\Main\Facades\InstallMain');
		$alias->alias('Robots', 'Devnull\Robots\Facades\Robots');
		$alias->alias('Humans', 'Devnull\Robots\Facades\Humans');
		$alias->alias('SystemSettings', 'Devnull\Robots\Facades\SystemSettings');

		App::singleton('robots.seeding', function() { return \Devnull\Robots\Classes\Seeding::instance();});
		App::singleton('robots.robots', function () {return \Devnull\Robots\Classes\Robots::instance();});
		App::singleton('robots.humans', function () {return \Devnull\Robots\Classes\Humans::instance();});
		App::singelton('robots.systemsettings', function () {return \Devnull\Robots\Classes\SystemSettings::instance();});
        App::singleton('main.installmain', function() {return \Devnull\Main\Classes\InstallMain::instance();});
	}

	public function registerNavigation(){}
	public function registerSettings(){}
    public function registerComponents(){}

	public function registerPermissions()
	{
		return [
			'devnull.robots.access_plugin'              =>  ['label' => 'devnull.robots::lang.permissions.access_plugin'],
            'devnull.robots.access_configurations'      =>  ['label' => 'devnull.robots::lang.permissions.access_configrations'],
            'devnull.robots.access_logs'                =>  ['label' => 'devnull.robots::lang.permissions.access_logs'],
            'devnull.robots.access_menu'                =>  ['label' => 'devnull.robots::lang.permissions.access_menu']
			];
	}

	public function registerSchedule($schedule)
	{
		$schedule->command('cache:clear')->everyFiveMinutes();
	}

	public function registerFormWidgets()
	{
		return [
			'Owl\FormWidgets\HasMany\Widget' => [
				'label' =>  'HasMany',
				'code'  =>  'owl-hasmany',
			]
		];
	}

	public function registerMarkupTags(){}
	public function boot(){}
	public function registerListColumnTypes(){}
	public function registerMailTemplates(){}
    public function registerReportWidgets(){}

	//----------------------------------------------------------------------//
	//	Plugin Functions - end
	//----------------------------------------------------------------------//
}