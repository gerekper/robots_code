<?php namespace Devnull\Main\Classes;

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



