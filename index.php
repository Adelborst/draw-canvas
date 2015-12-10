<?

// PHP 5.5.10

error_reporting(0);

define('BASEPATH', __DIR__);

// Подключаем роутер
require_once BASEPATH.'/app/core/router.php';

// Подключаем контроллер проекта
require_once BASEPATH.'/app/draw.php';

// Инициализируем класс проекта (контроллер)
$draw = new Draw();

// Назначаем роуты приложения
Router::route('', array($draw, 'imgList'));
Router::route('list', array($draw, 'imgList'));
Router::route('edit', array($draw, 'imgEdit'));
Router::route('create', array($draw, 'imgEdit'));
Router::route('insert', array($draw, 'ajaxInsert'));
Router::route('update', array($draw, 'ajaxUpdate'));

// Запускаем роутер
Router::execute($_GET['action']);

?>