<?php
require_once '../src/databases/database.php';
require_once '../src/auth.php';

session_start();

$urlMap = [
    '/' => 'index.html',
    '/signup' => 'signup.php',
    '/login' => 'login.php',
    '/logout' => 'logout.php',
    '/library' => 'library.php',
    '/create_notes' => 'create_notes.php'
];

$pathInfo = $_SERVER['PATH_INFO'] ?? '/';

include(__DIR__ . '/../src/views/base.php');







