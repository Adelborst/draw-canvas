<?

if(!defined('BASEPATH')) exit('No direct script access allowed');

$db_config = array(
	'dsn' => 'mysql:host=localhost;dbname=draw',
	'opt' => array (
		PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
		PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
	),
	'user' => 'root',
	'password' => 'root'
);

?>