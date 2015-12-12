<?

if(!defined('BASEPATH')) exit('No direct script access allowed');

/*
* Роутер
*/

class Router {

	private static $routes = array();

	private function __construct() {}
	private function __clone() {}

	public static function route($pattern, $callback) {
		$pattern = '/^' . str_replace('/', '\/', $pattern) . '$/';
		self::$routes[$pattern] = $callback;
	}

	public static function execute($app, $action) {
		foreach (self::$routes as $pattern => $callback) {
			if (preg_match($pattern, $action, $params)) {
				array_shift($params);
				
				return call_user_func_array(array($app, $callback), array_values($params));
			}
		}
		self::error404();
	}

	public static function error404()
	{
		header('HTTP/1.1 404 Not Found');
		header("Status: 404 Not Found");
		exit;
	}

}

?>