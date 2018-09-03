<?php namespace Devnull\Robots\Facades;

use October\Rain\Support\Facade;

class SystemSettings extends Facade
{
    protected static function getFacadeAccessor(){ return 'robots.systemsettings';}
}