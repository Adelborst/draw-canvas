<?

// PHP 5.5.10

define('BASEPATH', __DIR__);

error_reporting(0);

// Подключаем контроллер
require 'app/controllers/draw.php';

// Инициализируем класс
$draw = new Draw();

// GET-роутинг назначает методы контроллера 
switch ($_GET['action']) {
	case 'create':
		$draw->img_edit();
		break;
	case 'edit':
		$draw->img_edit($_GET['id']);
		break;
	case 'insert':
		$draw->ajax_insert();
		break;
	case 'update':
		$draw->ajax_update();
		break;
	default:
		$draw->img_list();
}

?>