<?php

require_once 'AppController.php';

class NewBillController extends AppController
{
    private $messages = [];

    public function newBill(){
            return $this->render('new-bill',['messages' => $this->messages]);
    }

}