<?

if(!defined('BASEPATH')) exit('No direct script access allowed');

/*
* Класс подключения к БД
*/

class DB
{
	private static $db;

	private function __construct() {}

	private function __clone() {}

	public static function getInstance() 
	{
		if (!isset(self::$db))
		{
			require_once BASEPATH.'/app/config/database.php';
			self::$db = new PDO($db_config['dsn'], $db_config['user'], $db_config['password'], $db_config['opt']);   
		}
		return self::$db;
	}
}

?>