<?php namespace Devnull\Robots\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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

class Settings extends Model
{
    //----------------------------------------------------------------------//
    //	Constant Functions - Start
    //----------------------------------------------------------------------//

    public $implement               =   ['System.Behaviors.SettingsModel'];
    public $settingsCode            =   'devnull_main_settings';
    public $settingsFields          =   'fields.yaml';

    public static $_table           =   'system_settings';
    public static $_system_plugin   =   'system_plugin_versions';
    public static $_code_robots     =   'Devnull.Robots';

    //----------------------------------------------------------------------//
    //	Constant Functions - End
    //----------------------------------------------------------------------//

    //----------------------------------------------------------------------//
    //	Construct Functions - Start
    //----------------------------------------------------------------------//

    function __construct(){parent::__construct();}

    //----------------------------------------------------------------------//
    //	Construct Functions - End
    //----------------------------------------------------------------------//

    //----------------------------------------------------------------------//
    //	Main Functions - Start
    //----------------------------------------------------------------------//

    //----------------------------------------------------------------------//
    //	Main Functions - End
    //----------------------------------------------------------------------//

    //----------------------------------------------------------------------//
    //	Overridden Functions - Start
    //----------------------------------------------------------------------//

    public function afterUpdate()
    {
        ((Settings::get('use_plugin') == FALSE)? $this->update_plugin_versions(TRUE) : $this->update_plugin_versions(FALSE));
    }

    //----------------------------------------------------------------------//
    //	Shared Functions - Start
    //----------------------------------------------------------------------//

    private function update_plugin_versions($_value)
    {
        DB::table(Settings::$_system_plugin)->where('code', Settings::$_code_robots)->update(['is_disabled' => $_value]);
    }

    //----------------------------------------------------------------------//
    //	Settings Functions - End
    //----------------------------------------------------------------------//
}