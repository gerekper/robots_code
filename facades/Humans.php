<?php namespace Devnull\Robots\Facades;

use October\Rain\Support\Facade;

class Humans extends Facade
{
	protected static function getFacadeAccessor(){ return 'robots.humans'; }
}