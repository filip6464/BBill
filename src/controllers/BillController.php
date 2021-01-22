<?php

require_once 'AppController.php';

class BillController extends AppController
{
    private $messages = [];

    public function bill(){
            return $this->render('bill',['messages' => $this->messages]);
    }

}