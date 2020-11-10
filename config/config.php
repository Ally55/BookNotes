<?php

return [
    'db' => [
        'user' => $_ENV['MYSQL_USER'],
        'password' => $_ENV['MYSQL_PASSWORD'],
        'host' => $_ENV['MYSQL_HOST'],
        'dbname' => $_ENV['MYSQL_DB']
    ]
];