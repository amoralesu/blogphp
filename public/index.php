<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../vendor/autoload.php';

include_once '../config.php';


$baseUrl = '';
$baseDir = $_SERVER['SCRIPT_NAME'];
//var_dump($baseDir);
$baseDir = str_replace(basename($baseDir), '', $_SERVER['SCRIPT_NAME']);
//var_dump($baseDir);

$baseUrl = 'http://' . $_SERVER['HTTP_HOST'] . $baseDir;


define('BASE_URL', $baseUrl);

$route = isset($_GET['route']) ? $_GET['route'] : '/';


function render($fileName, $params = [])
{
    ob_start();
    extract($params);
    include $fileName;
    return ob_get_clean();
}

//switch ($route) {
//    case '/':
//        require '../index.php';
//        break;
//    case '/admin':
//        require '../admin/index.php';
//        break;
//    case '/admin/posts':
//        require '../admin/posts.php';
//        break;
//}

use Phroute\Phroute\RouteCollector;

$router = new RouteCollector();

$router->controller(
    '/',
    App\Controllers\IndexController::class
);

$router->controller(
    '/admin',
    App\Controllers\Admin\IndexController::class
);

$router->controller(
    '/admin/posts',
    App\Controllers\Admin\PostController::class
);

$router->controller(
    '/admin/posts/create',
    App\Controllers\Admin\PostController::class
);

//$router->controller(
//    '/admin/posts/create',
//    App\Controllers\Admin\PostController::class
//);

//dispacher

$dispatcher = new Phroute\Phroute\Dispatcher($router->getData());

$response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $route);

echo $response;
