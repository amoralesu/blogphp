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
$router->get('/', function () use ($pdo) {
    $query = $pdo->prepare('SELECT * FROM blog_posts ORDER BY  id DESC ');
    $query->execute();
    $blogs = $query->fetchAll(PDO::FETCH_ASSOC);
    //include '../views/index.php';
    return render('../views/index.php', ['blogs' => $blogs]);
});

$router->get('/admin', function () use ($pdo) {
    return render('../views/admin/index.php');
});

$router->get('/admin/posts', function () use ($pdo) {

    $query = $pdo->prepare('SELECT * FROM blog_posts ORDER BY  id DESC ');
    $query->execute();
    $blogs = $query->fetchAll(PDO::FETCH_ASSOC);
    return render('../views/admin/posts.php', ['blogs' => $blogs]);

});


$router->get('/admin/posts/create', function () use ($pdo) {
    return render('../views/admin/insert-post.php');
});

$router->post('/admin/posts/create', function () use ($pdo) {
    $sql = 'INSERT INTO blog_posts(title, content) VALUES(:title, :content)';
    $query = $pdo->prepare($sql);

    $result = $query->execute([
        'title' => $_POST['title'],
        'content' => $_POST['content']
    ]);

    return render('../views/admin/insert-post.php', ['result' => $result]);
});


//dispacher

$dispatcher = new Phroute\Phroute\Dispatcher($router->getData());

$response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $route);

echo $response;
