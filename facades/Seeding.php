<?php namespace Devnull\Robots\Facades;

use October\Rain\Support\Facade;

class Seeding extends Facade
{
	protected static function getFacadeAccessor(){ return 'robots.seeding'; }
}
