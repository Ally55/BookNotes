<?php
session_start();

require_once __DIR__ . '/../vendor/autoload.php';
require_once '../src/databases/database.php';
require_once '../src/auth.php';
require  '../src/validator.php';

$config = require_once '../config/config.php';

$connectionToDb = new \BookNotes\Database\Connection($config);
$query = new \BookNotes\Database\QueryBuilder($connectionToDb->pdo);

$urlMap = [
    '/' => 'index.html',
    '/signup' => 'signup.php',
    '/login' => 'login.php',
    '/logout' => 'logout.php',
    '/library' => 'library.php',
    '/create_notes' => 'create_notes.php',
    '/user_notes' => 'user_notes.php',
    '/note' => 'note.php'
];

$pathInfo = $_SERVER['PATH_INFO'] ?? '/';

include(__DIR__ . '/../src/views/base.php');







