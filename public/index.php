<?php
require_once '../src/databases/database.php';

$urlMap = [
    '/' => 'index.html',
    '/signup' => 'signup.php',
    '/login' => 'login.php',
    '/library' => 'library.php'
];

$pathInfo = $_SERVER['PATH_INFO'] ?? '/';

include(__DIR__ . '/../src/views/base.php');







