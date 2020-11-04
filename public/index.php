<?php
session_start();

require_once __DIR__ . '/../vendor/autoload.php';

require_once '../src/auth.php';
require '../src/validator.php';

use BookNotes\Core\Router;


$config = require_once '../config/config.php';
$connectionToDb = new \BookNotes\Core\Database\Connection($config);
$query = new \BookNotes\Core\Database\QueryBuilder($connectionToDb->pdo);


$uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
$router = Router::load('../app/routes.php');


$requestMethod = $_SERVER['REQUEST_METHOD'];
$router->direct($uri, $requestMethod);


//$urlMap = [
//    '/' => 'index.html',
//    '/signup' => 'signup.php',
//    '/login' => 'login.php',
//    '/logout' => 'logout.php',
//    '/library' => 'library.php',
//    '/create_notes' => 'create_notes.php',
//    '/user_notes' => 'user_notes.php',
//    '/note' => 'note.php'
//];
//
//$pathInfo = $_SERVER['PATH_INFO'] ?? '/';
//
//include(__DIR__ . '/../app/views/base.php');







