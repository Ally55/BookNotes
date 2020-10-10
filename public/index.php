<?php

$urlMap = [
    '/' => 'index.html',
    '/signup' => 'signup.html'
];

$pathInfo = $_SERVER['PATH_INFO'] ?? '/';

include(__DIR__ . '/../src/views/base.php');







