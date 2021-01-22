<?php

require_once 'src/controllers/DefaultController.php';
require_once 'src/controllers/SecurityController.php';
require_once 'src/controllers/HomepageController.php';
require_once 'src/controllers/NewBillController.php';
require_once 'src/controllers/BillController.php';

class Routing {
    public static $routes;

    public static function get($url, $viewController){
        self::$routes[$url] = $viewController;
    }

    public static function post($url, $viewController){
        self::$routes[$url] = $viewController;
    }

    public static function run($url){
        $action = explode("/",$url)[0];

        if(!array_key_exists($action,self::$routes)){
            echo "action: [".$action."]";
            die("Wrong url!");
        }

        $controller = self::$routes[$action];
        $object = new $controller;

        $action = $action ?: 'index';
        $object->$action();
    }

}