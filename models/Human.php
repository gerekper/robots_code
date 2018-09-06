<?php namespace Devnull\Robots\Models;

use Illuminate\Database\Eloquent\Model;
use Devnull\Main\Classes\InstallMain;
use Devnull\Robots\Classes\Seeding;
use Devnull\Robots\Classes\Humans;

/**                _                             _
__ _  ___ _ __ ___| | ___ __   ___ _ __ __ _ ___(_) __ _
/ _` |/ _ \ '__/ _ \ |/ / '_ \ / _ \ '__/ _` / __| |/ _` |
| (_| |  __/ | |  __/   <| |_) |  __/ | | (_| \__ \ | (_| |
\__, |\___|_|  \___|_|\_\ .__/ \___|_|(_)__,_|___/_|\__,_|
|___/                   |_|

 * This is a gerekper.robots[human] for OctoberCMS
 *
 * @category   Gerekper+ Addons | Toolbox Plugin File
 * @package    Devnull.robots.models.human | Octobercms
 * @author     devnull <www.gerekper.asia>
 * @copyright  2012-2019 Gerekper Inc
 * @license    http://www.gerekper.asia/license/modules.txt
 * @version    1.0.0
 * @link       http://www.gerekper.asia/package/toolbox
 * @see        http://www.github.com/gerekper/toolbox
 * @since      File available since Release 1.0.0
 * @deprecated -
 */

class Human extends Model
{
    //----------------------------------------------------------------------//
    //	Constant Functions - Start
    //----------------------------------------------------------------------//

    public $table           =   'gp_robots_human';
    public static $_table   =   'gp_robots_human';

    protected $primaryKey   =   'id';
    public $timestamps      =   true;
    public $exists          =   true;
    protected $dates        =   [];
    protected $jsonable     =   [];
    protected $visible      =   [];
    protected $hidden       =   [];
    protected $guarded      =   [];
    public $fillable        =   ['attribution', 'others', 'status'];

    public $hasMany         =   [
        'information'   =>  ['Devnull\Robots\Models\HumanInfo', 'table' => 'gp_robots_human_info', 'order' => 'position asc']
    ];

    //----------------------------------------------------------------------//
    //	Validation Functions - Start
    //----------------------------------------------------------------------//

    use \October\Rain\Database\Traits\Validation;
    public $rules           =   ['attribution' => 'required|between:1,200', 'others' => 'between:0,200', 'status' => 'required|boolean' ];
    public $customMessages  =   [
                                'between'   => 'devnull.robots::model.customMessages.between',
                                'required'  =>  'devnull.robots::lang.customMessages.required',
                                'boolean'   =>  'devnull.robots::lang.customMessages.boolean',
                                'url'       =>  'devnull.robots::lang.customMessages.url'];

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

	public function getAtrributionOptions($fieldName = null, $keyValue = null)
	{
		$human_fields = explode(',', Str::upper(HumanConfig::where('title', 'humans.info')->pluck('value')));
		array_map('trim', $human_fields);
		foreach ($human_fields as $fields) { $_new_fields[] = trim($_fields);}
		$fields = array_combine($_new_fields, $_new_fields);
		return $fields;
	}

	//----------------------------------------------------------------------//
	//	Shared Functions - Start
	//----------------------------------------------------------------------//

	public static function generateHumans()
	{
		$humans = new Humans();
		$humans->addComment(HumanConfig::getConfig('humans.txt'));
		$humans->addSpacer();

		foreach (Human::all() as $human)
		{
			foreach($human->information as $information)
			{
				switch($information->field) {
					case 'Nginx':
					case 'PHP':
					case 'MySQL':
					case 'SQLite':
					case 'FastCGI':
					case 'MemCache':
                    case 'Redis':
						$humans->addTechnology($information->field, $information->value);
						break;
					default:
						$humans->addSuperman($information->value, $information->field);
						break;
				}
			}
			$humans->addSpacer();
		}
		$humans->addComment(HumanConfig::getconfig('signature'));
		$humans->addSpacer();
		return $humans->generate();
	}


	//----------------------------------------------------------------------//
	//	onAjax Functions - Start
	//----------------------------------------------------------------------//

	public static function DoTruncate()
	{
		$installations = new InstallMain();
		$installations->truncate(Human::$_table);
		return TRUE;
	}

	public static function DoDefault()
	{
		$installations = new InstallMain();
		$installations->check_existing(Human::$_table);
		$_schema_human = Seeding::get_schema_human();

		foreach ($_schema_human as $_schema)
		{
			Human::updateOrCreate([
				'attribution'   =>  $_schema['attribution'],
				'status'        =>  $_schema['status']
			]);
		}
		$installations->optimize_table(Human::$_table);
		return TRUE;
	}

	//----------------------------------------------------------------------//
	//	Robot Functions - Ends
	//----------------------------------------------------------------------//
}
