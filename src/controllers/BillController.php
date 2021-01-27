<?php

require_once 'AppController.php';
require_once __DIR__.'/../repository/BillRepository.php';

class BillController extends AppController
{
    private $messages = [];
    private $billRepostiory;

    public function __construct()
    {
        parent::__construct();
        $this->billRepostiory = new BillRepository();
    }


    public function newBill(){
        return $this->render('new-bill',['messages' => $this->messages]);
    }

    public function bill(){
        return $this->render('bill',['messages' => $this->messages]);
    }

    public function addBill(){
        //TODO create object from POST fields

        //TODO call addBill from BillRepository
    }



}