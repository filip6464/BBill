<?php

require_once 'AppController.php';

class DefaultController extends AppController {

    public function index(){
//TODO display login.php
    $this->render('login');
    }
    public function homepage(){
//TODO display homepage.php
    $this->render('homepage');
    }
}