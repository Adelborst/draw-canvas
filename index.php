<?

// PHP 5.5.10

error_reporting(0);

define('BASEPATH', __DIR__);

// Подключаем контроллер проекта
require_once BASEPATH.'/app/draw.php';

// Инициализируем класс проекта
$draw = new Draw();

// Назначаем методы обработки запросов
// Надо сделать класс роутинга
switch ($_GET['action']) {
	case 'create':
		$draw->imgEdit();
		break;
	case 'edit':
		$draw->imgEdit($_GET['id']);
		break;
	case 'insert':
		$draw->ajaxInsert();
		break;
	case 'update':
		$draw->ajaxUpdate();
		break;
	default:
		$draw->imgList();
}

// $draw->run();

?>