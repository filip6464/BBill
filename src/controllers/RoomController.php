<?php

require_once 'AppController.php';

class RoomController extends AppController
{
    private $messages = [];

    public function Room(){
        return $this->render('room',['messages' => $this->messages]);
    }

    public function newRoom(){
            return $this->render('new-room',['messages' => $this->messages]);
    }

}