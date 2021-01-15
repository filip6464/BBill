<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

//Tablica routingu
Routing::get('','DefaultController');
Routing::get('homepage','DefaultController');
Routing::post('newbill','NewBillController');
Routing::post('login','SecurityController');
Routing::post('usersettings','HomepageController');

Routing::run($path);