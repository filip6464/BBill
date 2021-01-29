<?php

require_once 'AppController.php';


class RoomController extends AppController
{


    private $messages = [];


    public function __construct()
    {
        parent::__construct();
    }

    public function Room(){
        $this->userCookieVerification();
        return $this->render('room',['messages' => $this->messages]);
    }

    public function newRoom(){
        $this->userCookieVerification();
            return $this->render('new-room',['messages' => $this->messages,'name'=>$_COOKIE['users'],'surname'=>$_COOKIE['users']]);
    }

}