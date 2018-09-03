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
 * @package    Devnull.robots.classes.seeding | Octobercms
 * @author     devnull <www.gerekper.asia>
 * @copyright  2012-2019 Gerekper Inc
 * @license    http://www.gerekper.asia/license/modules.txt
 * @version    1.0.0
 * @link       http://www.gerekper.asia/package/toolbox
 * @see        http://www.github.com/gerekper/toolbox
 * @since      File available since Release 1.0.0
 * @deprecated -
 */

class Seeding
{
	//----------------------------------------------------------------------//
	//	Construct Functions - Start
	//----------------------------------------------------------------------//

	function __construct()
	{
		$this->_schema          =   [];
	}

	//----------------------------------------------------------------------//
	//	Seeding Functions - Start
	//----------------------------------------------------------------------//

	public static function get_schema_robot()
	{
		$_get_schema_robot = [
			['agent'    =>  '*',        'status' => TRUE],
			['agent'    =>  'googlebot', 'status' => TRUE]
		];

		return $_get_schema_robot;
	}

	public static function get_schema_robot_agent()
	{
		$_get_schema_robot_agent = [
			['nameId'        =>  '*',
				'name'          =>  '*',
				'details_url'   =>  Null,
				'cover_url'     =>  Null,
				'owner_name'    =>  Null,
				'owner_url'     =>  Null,
				'owner_email'   =>  Null,
				'ostatus'       =>  Null,
				'purpose'       =>  Null,
				'type'          =>  Null,
				'platform'      =>  Null,
				'avail'         =>  Null,
				'excl_agent'    =>  Null,
				'noindex'       =>  Null,
				'nofollow'      =>  Null,
				'host'          =>  Null,
				'from'          =>  Null,
				'user_agent'    =>  Null,
				'lang'          =>  Null,
				'desc'          =>  "All",
				'history'       =>  Null,
				'env'           =>  Null,
				'status'        =>  True],

			['nameId'        =>  'googlebot',
				'name'          =>  'Googlebot',
				'details_url'   =>  "http://www.googlebot.com/bot.html",
				'cover_url'     =>  "http://www.googlebt.com/",
				'owner_name'    =>   'Google Inc.',
				'owner_url'     =>  "http://www.google.com",
				'owner_email'   =>  'googlebot@google.com',
				'ostatus'       =>  'active',
				'purpose'       =>  'indexing',
				'type'          =>  'standalone',
				'platform'      =>  'Linux',
				'avail'         =>  'none', 'agt_excl' => 'yes',
				'excl_agent'    =>  'googlebot',
				'noindex'       =>  'yes',
				'nofollow'      =>  'yes',
				'host'          =>  'googlebot.com',
				'from'          =>  'yes',
				'user_agent'    =>  'Googlebot/2.X (+http://www.googlebot.com/bot.html)',
				'lang'          =>  'C++',
				'desc'          =>  "Google's Crawler",
				'history'       =>  'Developed by Google Inc',
				'env'           =>  'commercial',
				'status'        =>   True],

			['nameId'        =>  'askjeeves',
				'name'          =>  'AskJeeves',
				'details_url'   =>  "http://www.ask.com/",
				'cover_url'     =>  "http://www.ask.com/",
				'owner_name'    =>  'Ask Jeeves, Inc.',
				'owner_url'     =>  "http://www.ask.com/",
				'owner_email'   =>  'postmaster@ask.com',
				'ostatus'       =>  'active',
				'purpose'       =>  'indexing, maintenance',
				'type'          =>  'standalone',
				'platform'      =>  'Linux',
				'avail'         =>  'none', 'agt_excl' => 'yes',
				'excl_agent'    =>  'Teoma or Ask Jeeves or Jeeves',
				'noindex'       =>  'yes',
				'nofollow'      =>  'yes',
				'host'          =>  'ez*.directhit.com',
				'from'          =>  'no',
				'user_agent'    =>  'Mozilla/2.0 (compatible; Ask Jeeves/Teoma)',
				'lang'          =>  'C++',
				'desc'          =>  "Ask Jeeves / Teoma spider",
				'history'       =>  'Developed by Direct Hit Technologies which was aquired by Ask Jeeves in 2000.',
				'env'           =>  'service',
				'status'        =>   True],
		];

		return $_get_schema_robot_agent;
	}

	public static function get_schema_robot_directive()
	{
		$_get_schema_robot_directive = [
			['robot_id' => '1', 'position' => '0', 'type' => 'Disallow', 'data' => '/sex'],
			['robot_id' => '1', 'position' => '1', 'type' => 'Disallow', 'data' => '/lanjiao'],
			['robot_id' => '2', 'position' => '0', 'type' => 'Disallow', 'data' => '/pukimak'],
			['robot_id' => '2', 'position' => '1', 'type' => 'Disallow', 'data' => '/babi'],
			['robot_id' => '2', 'position' => '2', 'type' => 'Disallow', 'data' => '/kkpl'],
		];

		return $_get_schema_robot_directive;
	}

	public static function get_schema_robot_logs() {}

	public static function get_schema_human()
	{
		$_get_schema_human = [
			['attribution' =>   'TEAM',         'status' => true],
			['attribution' =>   'THANKS',       'status' => true],
			['attribution' =>   'SITE',         'status' => true],
			['attribution' =>   'TECHNOLOGY',   'status' => true],
		];

		return $_get_schema_human;
	}

	public static function get_schema_human_config()
	{
		$_get_schema_human_config = [
			['title' => 'robots.txt',
				'desc'  => 'This is the sample of syntax that is needed to be in the robots.txt',
				'value' =>
					'# www.robotstxt.org/
# www.google.com/support/webmasters/bin/answer.py?hl=en&answer=156449
# To block the entire site, use a forward slash.
# User-agent: *
# Disallow: /
# To block a directory and everything in it, follow the directory name with a forward slash.
# Disallow: /junk-directory/
# To remove a specific image from Google Images, add the following:
# User-agent: Googlebot-Image
# Disallow: /images/dogs.jpg
# To remove all images on your site from Google Images:
# User-agent: Googlebot-Image
# Disallow: /
# To block files of a specific file type (for example, .gif), use the following:
# User-agent: Googlebot
# Disallow: /*.gif$', 'status' => true, 'url' => 'http://localhost/sitemap.xml'],
			['title'    =>  'humans.info',
				'desc'      =>  'This is the sample of Default headers in the humans.txt',
				'value'     =>  "Team, Thanks, Site, Technology",
				'status'    =>  true,
				'url'       =>  "http://localhost/humans.info",
			],
			['title'    =>  'humans2.info',
				'desc'      =>  'This is the sample of Default subheaders in the humans.txt',
				'value'     =>  "Developer, Doctype, Site, Facebook, Location, Source, Language, Components, Tools, IDE, PHP, MySQL, SQLite, FastCGI, MemCache, Others",
				'status'    =>  true,
				'url'       =>  "http://localhost/humans2.info",
			],
			['title'    =>  'robots.url',
				'desc'  =>  'This is the sample of the default URLs for download of Agents',
				'value' =>  "https://www.aqtronix.com/downloads/WebKnight/Robots/Robots.xml",
				'status'=>  True,
				'url'   =>  "http://localhost/robots.url",
			],
		];

		Return $_get_schema_human_config;
	}

	public static function get_schema_human_info()
	{
		$_get_schema_human_info = [
			['human_id' => '1', 'position' => '0', 'field' => 'Developer',          'value' => 'Richard Irwan Shah / devnull'               ],
			['human_id' => '1', 'position' => '1', 'field' => 'Site',               'value' => 'http://www.gerekper.asia'                   ],
			['human_id' => '1', 'position' => '2', 'field' => 'Facebook',           'value' => 'http://www.facebook.com/richard.irwanshah'  ],
			['human_id' => '1', 'position' => '3', 'field' => 'Location',           'value' => 'Singapore',                                 ],
			['human_id' => '2', 'position' => '0', 'field' => 'Source',             'value' => 'OctoberCMS, Laravel 5'                      ],
			['human_id' => '3', 'position' => '0', 'field' => 'Last Update',        'value' => '2015/08/03'                                 ],
			['human_id' => '3', 'position' => '1', 'field' => 'Language',           'value' => 'English'                                    ],
			['human_id' => '3', 'position' => '2', 'field' => 'Doctype',            'value' => 'HTML5, CSS3'                               ],
			['human_id' => '3', 'position' => '3', 'field' => 'Components',         'value' => 'Laravel 5, Packagist, OctoberCMS'           ],
			['human_id' => '3', 'position' => '4', 'field' => 'Tools',              'value' => 'PHP & MySQL',                               ],
			['human_id' => '3', 'position' => '5', 'field' => 'IDE',                'value' => 'PHPStorm'                                   ],
			['human_id' => '4', 'position' => '0', 'field' => 'Nginx',              'value' => 'http://www.nginx.org'                     ],
			['human_id' => '4', 'position' => '1', 'field' => 'PHP',                'value' => 'http://www.php.net'                       ],
			['human_id' => '4', 'position' => '2', 'field' => 'MySQL',              'value' => 'http://www.mysql.com'                     ],
			['human_id' => '4', 'position' => '3', 'field' => 'SQLite',             'value' => 'http://www.sqlite.org'                    ],
			['human_id' => '4', 'position' => '4', 'field' => 'FastCGI',            'value' => 'http://www.fastcgi.com'                   ],
			['human_id' => '4', 'position' => '5', 'field' => 'MemCache',           'value' => 'http://www.memcached.org'                 ],
		];

		return $_get_schema_human_info;
	}

	public static function get_schema_human_ascii()
	{
		$_get_schema_human_ascii = [
			['title' => 'signature',
				'desc' => 'This is the sample of signature that is not needed to be in humans.txt',
				'value' => <<<EOT
,---,---,---,---,---,---,---,---,---,---,---,---,---,-------,
| ~ | 1 | 2 | 3 | 4 | 5 | 6 | 6 | 6 | 9 | 0 | [ | ] | <-    |
|---'-,-'-,-'-,-'-,-'-,-'-,-'-,-'-,-'-,-'-,-'-,-'-,-'-,-----|
| ->| | " | , | . | D | E | V | N | U | L | L | / | = |  \  |
|-----',--',--',--',--',--',--',--',--',--',--',--',--'-----|
| Caps | G | E | R | E | K | . | P | E | R | ! | ! |  Enter |
|------'-,-'-,-'-,-'-,-'-,-'-,-'-,-'-,-'-,-'-,-'-,-'--------|
|     | I | N | C | . | N | E | T | W | O | R | K |         |
|------,-',--'--,'---'---'---'---'---'---'-,-'---',--,------|
| ctrl |  | alt |                          | alt  |  | ctrl |
'------'  '-----'--------------------------'------'  '------'
EOT
				,'url' => 'http://localhost/humans.txt', 'status' => TRUE]];
				return $_get_schema_human_ascii;
	}

	public static function get_schema_human_sig()
	{
		$_get_schema_human_sig = [
			[   'title' => 'humans.txt',
				'desc'  => 'This is the sample of syntax that is needed to be in the humans.txt',
				'value' => "
                     _                             _
  __ _  ___ _ __ ___| | ___ __   ___ _ __ __ _ ___(_) __ _
 / _` |/ _ \ '__/ _ \ |/ / '_ \ / _ \ '__/ _` / __| |/ _` |
| (_| |  __/ | |  __/   <| |_) |  __/ | | (_| \__ \ | (_| |
 \__, |\___|_|  \___|_|\_\ .__/ \___|_|(_)__,_|___/_|\__,_|
 |___/                   |_|
    ",
				'url' => 'http://localhost/humans.txt', 'status' => TRUE]];

		return $_get_schema_human_sig;
	}

	//----------------------------------------------------------------------//
	//	Seeding Functions - Start
	//----------------------------------------------------------------------//

}