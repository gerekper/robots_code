<?php namespace Devnull\Main\Classes;

use DB;

class Robots
{
	//----------------------------------------------------------------------//
	//	Robots Construct - Start
	//----------------------------------------------------------------------//

	function __constuct(){}

	//----------------------------------------------------------------------//
	//	Robots Generation Functions - Start
	//----------------------------------------------------------------------//

	protected $lines = array();

	public function generate()
	{
		return implode(PHP_EOL, $this->lines);
	}

	public function addSitemap($_sitemap)
	{
		$this->addLine("Sitemap: $_sitemap");
	}

	public function addUserAgent($_userAgent)
	{
		$this->addLine("User-Agent: $_userAgent");
	}

	public function addHost($_host)
	{
		$this->addLine("Host: $_host");
	}

	public function addDisallow($_directories)
	{
		$this->addRuleLine($_directories, 'Disallow');
	}

	public function addAllow($_directories)
	{
		$this->addRuleLine($_directories, 'Allow');
	}

	protected function addRuleLine($_directories, $_rule)
	{
		foreach ((array) $_directories as $_directory)
		{
			$this->addLine("$_rule: $_directory");
		}
	}

	public function addComment($_comment)
	{
		$this->addLine("# $_comment");
	}

	public function addSpacer()
	{
		$this->addLine("");
	}

	protected function addLine($_line)
	{
		$this->lines[] = (string) $_line;
	}

	protected function addLines($_lines)
	{
		foreach ((array) $_lines as $_line)
		{
			$this->addLine($_line);
		}
	}

	public function reset()
	{
		$this->lines = array();
	}

	public static function check_isDisabled()
	{
		$_value = DB::table('system_plugin_versions')->where('code', '=', 'Devnull.Robot')->pluck('is_disabled');
		return $_value;
	}

	//----------------------------------------------------------------------//
	//	Robots Helpers Functions - Start
	//----------------------------------------------------------------------//

	public function returnActivateDe($_value)
	{
		if ($_value == TRUE) { return 'Activated'; }
		else { return 'Deactivated'; }
	}

	public static function getIcon($_value)
	{
		if ($_value == FALSE) {  return 'negative'; }
		else { return 'positive'; }
	}

	public static function getCSS($_value)
	{
		if ($_value == FALSE)
			return 'btn btn-success';
		else if ($_value == TRUE)
			return 'btn btn-danger';
	}

	public static function getTranslation($_value)
	{
		if ($_value == FALSE)
			return 'devnull.robots::lang.propertiesWidget.label_toggle_on';
		else if ($_value == TRUE)
			return 'devnull.robots::lang.propertiesWidget.label_toggle_off';
	}

	public static function getToggle($_value)
	{
		if ($_value == FALSE)
			return 'fa icon-toggle-on';
		else if ($_value == TRUE)
			return 'fa icon-toggle-off';
	}

	public function do_inverse($_value, $_option)
	{
		if ($_value == FALSE) { return $_option; }
		else
		{
			if ($_option == 'btn btn-success'){ return 'btn btn-danger'; }
			else if ($_option = 'btn btn-danger'){ return 'btn btn-success';}
		}
	}

	//----------------------------------------------------------------------//
	//	Robots Helpers Functions - End
	//----------------------------------------------------------------------//
}