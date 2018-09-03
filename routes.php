<?php

use Cms\Classes\Page;
use Illuminate\Support\Facades\Redirect;
use Devnull\Robots\Models\Settings;
use Devnull\Robots\Models\SettingsRobot;
use Devnull\Robots\Models\SettingsHuman;
use Devnull\Robots\Models\SettingsRobotLog;
use Devnull\Robots\Models\Robot;
use Devnull\Robots\Models\Human;
use Devnull\Robots\Models\RobotLog;

//----------------------------------------------------------------------//
//	Gerkeper.main Route Functions - Start
//----------------------------------------------------------------------//

//----------------------------------------------------------------------//
//	Gerkeper.robots Route Functions - Start
//----------------------------------------------------------------------//

Route::get('robots.txt', function()
{
	if(!SettingsRobot::get('use_plugin_robot') || !Robot::first() || !SettingsRobot::get('use_robots'))
		return Redirect::to(Page::url(SettingsRobot::get('redirectpage')));
	else
		if (SettingsRobotLog::get('use_plugin_robot_log')) { Robotlog::inputAccess(Robotlog::getAccess('robots'));}
		Return Response::make(Robot::first()->generateRobots(), 200, array('Content-Type' => 'text/plain'));
});

Route::get('robot', function() {return Redirect::to((Settings::get('use_redirect')? 'robots.txt' : '404'));});
Route::get('robots', function() {return Redirect::to((Settings::get('use_redirect')? 'robots.txt' : '404'));});

//----------------------------------------------------------------------//
//	Gerkeper.human Route Functions - Start
//----------------------------------------------------------------------//

Route::get('humans.txt', function ()
{
	if(!SettingsHuman::get('use_plugin_human') || !Human::first())
		return Redirect::to(Page::url(SettingsHuman::get('redirectpage')));
	else
		if (SettingsRobotLog::get('use_plugin_human_log')) { RobotLog::inputAccess(RobotLog::getAccess('humans'));}
		Return Response::make(Human::first()->generateHumans(), 200, array('Content-Type' => 'text/plain'));
});

Route::get('human', function() {return Redirect::to((Settings::get('use_redirect')? 'humans.txt' : '404'));});
Route::get('humans', function() {return Redirect::to((Settings::get('use_redirect')? 'humans.txt' : '404'));});

//----------------------------------------------------------------------//
//	Gerkeper.Cookies Route Functions - Start
//----------------------------------------------------------------------//
Route::get('cookies-policy', function(){return Redirect::to((Settings::get('use_redirect')? 'policy/cookies' : '404'));});
Route::get('cookies', function(){return Redirect::to((Settings::get('use_redirect')? 'policy/cookies' : '404'));});

//----------------------------------------------------------------------//
//	Pages Route Functions - Start
//----------------------------------------------------------------------//

Route::get('about', function(){return Redirect::to((Settings::get('use_redirect')? 'about-us' : '404'));});
Route::get('contact', function(){return Redirect::to((Settings::get('use_redirect')? 'contact' : '404'));});
Route::get('terms', function(){return Redirect::to((Settings::get('use_redirect')? 'terms-of-use' : '404'));});
Route::get('terms-of-use', function(){return Redirect::to((Settings::get('use_redirect')? 'terms-of-use' : '404'));});
Route::get('tou', function(){return Redirect::to((Settings::get('use_redirect')? 'terms-of-use' : '404'));});
Route::get('privacy', function(){return Redirect::to((Settings::get('use_redirect')? 'policy/privacy' : '404'));});
Route::get('accessibility', function(){return Redirect::to((Settings::get('use_redirect')? 'policy/accessibility' : '404'));});

//----------------------------------------------------------------------//
//	Gerkeper.main Route Functions - End
//----------------------------------------------------------------------//