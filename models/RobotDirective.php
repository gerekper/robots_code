<?php namespace Devnull\Robots\Models;

use Illuminate\Database\Eloquent\Model;
use Devnull\Main\Classes\InstallMain;
use Devnull\Robots\Classes\Seeding;

/**                _                             _
__ _  ___ _ __ ___| | ___ __   ___ _ __ __ _ ___(_) __ _
/ _` |/ _ \ '__/ _ \ |/ / '_ \ / _ \ '__/ _` / __| |/ _` |
| (_| |  __/ | |  __/   <| |_) |  __/ | | (_| \__ \ | (_| |
\__, |\___|_|  \___|_|\_\ .__/ \___|_|(_)__,_|___/_|\__,_|
|___/                   |_|

 * This is a gerekper.robots[robot_directive] for OctoberCMS
 *
 * @category   Gerekper+ Addons | Toolbox Plugin File
 * @package    Devnull.robots.robot_directive | Octobercms
 * @author     devnull <www.gerekper.asia>
 * @copyright  2012-2019 Gerekper Inc
 * @license    http://www.gerekper.asia/license/modules.txt
 * @version    1.0.0
 * @link       http://www.gerekper.asia/package/toolbox
 * @see        http://www.github.com/gerekper/toolbox
 * @since      File available since Release 1.0.0
 * @deprecated -
 */

class RobotDirective extends Model
{
    //----------------------------------------------------------------------//
    //	Constant Functions - Start
    //----------------------------------------------------------------------//

	public $table           =   'gp_robots_robot_directive';
	public static $_table   =   'gp_robots_robot_directive';

	protected $primaryKey   =   'id';
	public $timestamps      =   true;
	public $exists          =   true;
	protected $dates        =   [];
	protected $jsonable     =   [];
	protected $visible      =   [];
	protected $hidden       =   [];
	protected $guarded      =   [];

	public $fillable        =   ['rbt_id', 'position', 'type', 'data'];
	public $belongsTo       =   ['robot' => ['Devnull\Robots\Models\Robot', 'table' => 'gp_robots_robot']];

    //----------------------------------------------------------------------//
    //	Constant Functions - End
    //----------------------------------------------------------------------//

	//----------------------------------------------------------------------//
	//	Validation Functions - Start
	//----------------------------------------------------------------------//

	use \October\Rain\Database\Traits\Validation;
	public $rules           =   ['type' => 'required|between:1,100', 'data' => 'required|between:1,100'];
	public $customMessages  =   [
        'between'   =>  'devnull.robots::model.customMessages.between',
        'required'  =>  'devnull.robots::lang.customMessages.required',
        'boolean'   =>  'devnull.robots::lang.customMessages.boolean',
        'url'       =>  'devnull.robots::lang.customMessages.url',
	];

	//----------------------------------------------------------------------//
	//	__construct Functions - Start
	//----------------------------------------------------------------------//

	function _construct(){ parent::__construct();}

	//----------------------------------------------------------------------//
	//	Main Functions - Start
	//----------------------------------------------------------------------//

	//----------------------------------------------------------------------//
	//	Overridden Functions - Start
	//----------------------------------------------------------------------//

	public function getTypeOptions($fieldName = null, $keyvalue = null)
	{
		return [
			'true'  =>  ['devnull.main::lang.models.allow_label', 'devnull.main::lang.models.allow_description'],
			'false' =>  ['devnull.main::lang.models.disallow_label', 'devnull.main::lang.models.disallow_description']
		];
	}
	//----------------------------------------------------------------------//
	//	Shared Functions - Start
	//----------------------------------------------------------------------//

	//----------------------------------------------------------------------//
	//	onAjax Functions - Start
	//----------------------------------------------------------------------//

	public static function DoTruncate()
	{
		$installations = new InstallMain();
		$installations->trunctate(RobotDirective::$_table);
		return TRUE;
	}

	public static function DoDefault()
	{
		$installations = new InstallMain();
		$installations->check_existing(RobotDirective::$_table);
		$_schema_directive = Seeding::get_schema_robot_directive();

		foreach ($_schema_directive as $_schema)
		{
			RobotDirective::updateOrCreate([
				'robot'     =>  $_schema['robot_id'],
				'position'  =>  $_schema['position'],
				'type'      =>  $_schema['type'],
				'data'      =>  $_schema['data']
			]);
		}
		$installations->optimize_table(RobotDirective::$_table);
		return TRUE;
	}

	//----------------------------------------------------------------------//
	//	Robot Functions - Ends
	//----------------------------------------------------------------------//
}
