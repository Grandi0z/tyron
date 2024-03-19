<?php

use Router\Router;

require '../vendor/autoload.php';
// define a Constant that take the the path to our views
// dirname ../views/
define('VIEWS', dirname(__DIR__) . DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR);
// use SERVER to get the right path when we will call a css or js file
define('SCRIPTS', dirname($_SERVER['SCRIPT_NAME']).DIRECTORY_SEPARATOR);


$router = new Router($_GET['url']);

$router->get('/', 'App\Controllers\BlogController@welcome');
$router->get('/posts/:id', 'App\Controllers\BlogController@show');
$router->get('/posts', 'App\Controllers\BlogController@index');

$router->run();