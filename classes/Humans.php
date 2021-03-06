<?php namespace Devnull\Robots\Classes;

/**                _                             _
__ _  ___ _ __ ___| | ___ __   ___ _ __ __ _ ___(_) __ _
/ _` |/ _ \ '__/ _ \ |/ / '_ \ / _ \ '__/ _` / __| |/ _` |
| (_| |  __/ | |  __/   <| |_) |  __/ | | (_| \__ \ | (_| |
\__, |\___|_|  \___|_|\_\ .__/ \___|_|(_)__,_|___/_|\__,_|
|___/                   |_|

 * This is a gerekper.main[robots] for OctoberCMS
 *
 * @category   Gerekper+ Addons | Toolbox Plugin File
 * @package    Devnull.robots.classes.humans | Octobercms
 * @author     devnull <www.gerekper.asia>
 * @copyright  2012-2019 Gerekper Inc
 * @license    http://www.gerekper.asia/license/modules.txt
 * @version    1.0.0
 * @link       http://www.gerekper.asia/package/toolbox
 * @see        http://www.github.com/gerekper/toolbox
 * @since      File available since Release 1.0.0
 * @deprecated -
 */

class Humans
{

	//----------------------------------------------------------------------//
    //	Constant Functions - Start
    //----------------------------------------------------------------------//

    protected $lines = Array();

    //----------------------------------------------------------------------//
    //	Constant Functions - End
    //----------------------------------------------------------------------//

    //----------------------------------------------------------------------//
    //	Construct Functions - Start
    //----------------------------------------------------------------------//

    //----------------------------------------------------------------------//
    //	Construct Functions - End
    //----------------------------------------------------------------------//

	public function generate()
	{
		return implode(PHP_EOL, $this->lines);
	}

    //----------------------------------------------------------------------//
    //	Main Functions - Start
    //----------------------------------------------------------------------//

	public function addHeader($_header)
	{
		$this->addLine("/* $_header /*");
	}

	public function addSuperman($_value, $_title)
	{
		$this->addLine("$_title: $_value");
	}

	public function addTechnology($_value, $_url)
	{
		$this->addLine("$_value [$_url]");
	}

	protected function addLine($line)
	{
		$this->lines[] = (string) $line;
	}

	public function addSpacer()
	{
		self::addLine("");
	}

	public function addComment($comment)
	{
		self::addLine("$comment");
	}

	public function reset()
	{
		$this->lines = array();
	}

    //----------------------------------------------------------------------//
    //	Main Functions - End
    //----------------------------------------------------------------------//
}



