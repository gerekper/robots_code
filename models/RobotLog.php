<?php namespace Devnull\Robots\Models;

use Illuminate\Database\Eloquent\Model;

/**                _                             _
__ _  ___ _ __ ___| | ___ __   ___ _ __ __ _ ___(_) __ _
/ _` |/ _ \ '__/ _ \ |/ / '_ \ / _ \ '__/ _` / __| |/ _` |
| (_| |  __/ | |  __/   <| |_) |  __/ | | (_| \__ \ | (_| |
\__, |\___|_|  \___|_|\_\ .__/ \___|_|(_)__,_|___/_|\__,_|
|___/                   |_|

 * This is a gerekper.robots[robot_log] for OctoberCMS
 *
 * @category   Gerekper+ Addons | Toolbox Plugin File
 * @package    Devnull.robots.robot_log | Octobercms
 * @author     devnull <www.gerekper.asia>
 * @copyright  2012-2019 Gerekper Inc
 * @license    http://www.gerekper.asia/license/modules.txt
 * @version    1.0.0
 * @link       http://www.gerekper.asia/package/toolbox
 * @see        http://www.github.com/gerekper/toolbox
 * @since      File available since Release 1.0.0
 * @deprecated -
 */

class RobotLog extends Model
{
    //----------------------------------------------------------------------//
    //	Constant Functions - Start
    //----------------------------------------------------------------------//

    public $table           =   'gp_robots_robot_log';
    public static $_table   =   'gp_robots_robot_log';

    protected $primaryKey   =   'id';
    public $timestamps      =   true;
    public $exists          =   true;
    protected $dates        =   [];
    protected $jsonable     =   [];
    protected $visible      =   [];
    protected $hidden       =   [];
    protected $guarded      =   [];

    public $fillable        =   [];
    public $belongsTo       =   [];

    //----------------------------------------------------------------------//
    //	Validation Functions - Start
    //----------------------------------------------------------------------//

    use \October\Rain\Database\Traits\Validation;
    public $rules           =   [];

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

    //----------------------------------------------------------------------//
    //	Shared Functions - Start
    //----------------------------------------------------------------------//

    //----------------------------------------------------------------------//
    //	onAjax Functions - Start
    //----------------------------------------------------------------------//

    //----------------------------------------------------------------------//
    //	Robot Functions - Ends
    //----------------------------------------------------------------------//
}
