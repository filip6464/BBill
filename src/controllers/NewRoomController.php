<?php

require_once 'AppController.php';

class NewRoomController extends AppController
{
    private $messages = [];

    public function newRoom(){
            return $this->render('new-room',['messages' => $this->messages]);
    }

}