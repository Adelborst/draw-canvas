<?

// PHP 5.5.10

define('BASEPATH', __DIR__);

error_reporting(0);

// Подключаем контроллер
require 'app/controller.php';

// Инициализируем класс контроллера
$controller = new Controller();

// GET-роутинг назначает методы контроллера 
switch ($_GET['action']) {
	case 'create':
		$controller->img_edit();
		break;
	case 'edit':
		$controller->img_edit($_GET['id']);
		break;
	case 'insert':
		$controller->ajax_insert();
		break;
	case 'update':
		$controller->ajax_update();
		break;
	default:
		$controller->img_list();
}

?>