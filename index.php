<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

//Tablica routingu
Routing::get('','DefaultController');
Routing::get('homepage','HomepageController');
Routing::post('newbill','BillController');
Routing::post('bill','BillController');
Routing::post('login','SecurityController');
Routing::post('register','SecurityController');
Routing::post('usersettings','HomepageController');
Routing::post('newroom','RoomController');
Routing::post('room','RoomController');

Routing::run($path);