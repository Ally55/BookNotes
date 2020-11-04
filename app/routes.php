<?php

$router->get('', 'IndexController@index');

$router->get('signup', 'SignupController@index');
$router->post('signup', 'SignupController@create');

$router->get('login', 'LoginController@index');
$router->post('login', 'LoginController@login');

$router->post('logout', 'LogoutController@index');

$router->get('library', 'LibraryController@listAll');

$router->get('create_notes', 'LibraryController@createNotes');
$router->post('create-notes', 'LibraryController@create');

$router->get('user_notes', 'LibraryController@userNotes');

$router->get('note', 'LibraryController@read');
