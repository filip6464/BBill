<?php

require_once 'AppController.php';
require_once __DIR__.'/../repository/UserRepository.php';
require_once __DIR__.'/../repository/BillRepository.php';
require_once __DIR__.'/../repository/RoomRepository.php';
require_once __DIR__.'/../models/UsersRoom.php';

class BillController extends AppController
{
    private $messages = [];
    private $billRepostiory;
    private $userRepostiory;
    private $roomRepostiory;

    public function __construct()
    {
        parent::__construct();
        $this->billRepostiory = new BillRepository();
        $this->userRepostiory = new UserRepository();
        $this->roomRepostiory = new RoomRepository();
    }


    public function newBill(){
        //TODO getUserID from session
        $ownerID = 1;

        //array of last users' rooms with roommates inside
        $lastusersrooms = [];

        $lastrooms = $this->roomRepostiory->getLinkedRooms($ownerID);

        foreach ($lastrooms as $lastroom){
            $user = $this->userRepostiory->getUserByID($lastroom->getOwnerID());
            $lastusersroom = new UsersRoom($user,$lastroom);
            $lastusersroom->setRoommates($this->userRepostiory->getRoommates($lastroom->getLocalID()));
            array_push($lastusersrooms,$lastusersroom);
        }
        return $this->render('new-bill',['messages' => $this->messages,'lastusersrooms' => $lastusersrooms]);
    }

    public function search(){

        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        if($contentType === 'application/json') {
            $content = file_get_contents("php://input");
            $decoded = json_decode($content, true);

            //TODO getUserID from session
            $ownerID = 1;

            $lastusersrooms = [];

            $lastrooms = $this->roomRepostiory->getLinkedRooms($ownerID);

            foreach ($lastrooms as $lastroom){
                $user = $this->userRepostiory->getUserByID($lastroom->getOwnerID());
                $lastusersroom = [];
                array_push($lastusersroom, ['title'=> $lastroom->getTitle(),'createdat'=> $lastroom->getCreatedAt()]);
                array_push($lastusersroom,$this->userRepostiory->getRoommatesLike($lastroom->getLocalID(),$decoded['search']));
                array_push($lastusersrooms,$lastusersroom);
            }
            header('Content-type: application/json');
            http_response_code(200);

            echo json_encode($lastusersrooms,true);

        }



    }

    public function bill(){
        return $this->render('bill',['messages' => $this->messages]);
    }

    public function addBill(){
        //TODO create object from POST fields

        //TODO call addBill from BillRepository
    }



}