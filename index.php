<?

// PHP 5.5.10

error_reporting(0);

define('BASEPATH', __DIR__);

// Подключаем контроллер проекта
require_once BASEPATH.'/app/controllers/draw.php';

// Инициализируем класс проекта
$draw = new Draw();

// Назначаем методы обработки запросов
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