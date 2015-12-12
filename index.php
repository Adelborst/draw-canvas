<?

// PHP 5.5.10

error_reporting(0);

define('BASEPATH', __DIR__);

// Подключаем роутер, он будет обрабатывать запросы, 
// назначать им методы приложения или отображать страницу 
// 404 для некооректных запросов
require_once BASEPATH.'/app/core/router.php';

// Подключаем контроллер проекта
require_once BASEPATH.'/app/draw.php';

// Инициализируем класс проекта (контроллер)
$draw = new Draw();

// Назначаем роуты приложения
Router::route('', 'imgList');
Router::route('list', 'imgList');
Router::route('edit', 'imgEdit');
Router::route('create', 'imgEdit');
Router::route('insert', 'ajaxInsert');
Router::route('update', 'ajaxUpdate');

// Запускаем роутер для нашего приложения
Router::execute($draw, $_GET['action']);

?>