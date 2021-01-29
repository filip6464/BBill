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
        $this->userCookieVerification();

        $ownerID = intval($_COOKIE['user']);
        //echo "to jest cookie".$ownerID;

        //array of last users' rooms with roommates inside
        $lastusersrooms = [];

        $lastrooms = $this->roomRepostiory->getLinkedRooms($ownerID);
        if($lastrooms !=null) {
            foreach ($lastrooms as $lastroom) {
                $user = $this->userRepostiory->getUserByID($lastroom->getOwnerID());
                $lastusersroom = new UsersRoom($user, $lastroom);
                $lastusersroom->setRoommates($this->userRepostiory->getRoommates($lastroom->getLocalID()));
                array_push($lastusersrooms, $lastusersroom);
            }
        }
        return $this->render('new-bill',['messages' => $this->messages,'lastusersrooms' => $lastusersrooms]);
    }

    public function search()
    {
        $this->userCookieVerification();
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        if ($contentType === 'application/json') {
            $content = file_get_contents("php://input");
            $decoded = json_decode($content, true);

            //TODO getUserID from session
            $ownerID = $_COOKIE['user'];

            $lastusersrooms = [];

            $lastrooms = $this->roomRepostiory->getLinkedRooms($ownerID);

            foreach ($lastrooms as $lastroom) {
                $user = $this->userRepostiory->getUserByID($lastroom->getOwnerID());
                $lastusersroom = [];
                array_push($lastusersroom, ['id' => $lastroom->getLocalID(), 'title' => $lastroom->getTitle(), 'createdat' => $lastroom->getCreatedAt()]);
                array_push($lastusersroom, $this->userRepostiory->getRoommatesLike($lastroom->getLocalID(), $decoded['search']));
                array_push($lastusersrooms, $lastusersroom);
            }
            header('Content-type: application/json');
            http_response_code(200);

            echo json_encode($lastusersrooms, true);

        }
    }

    public function bill(){
        return $this->render('bill',['messages' => $this->messages]);
    }

    public function addbill()
    {
        $this->userCookieVerification();
        //TODO create object from POST fields
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        if ($contentType === 'application/json') {
            $content = file_get_contents("php://input");
            $decoded = json_decode($content, true);
            //TODO call addBill from BillRepository

            $array = [];

            $bill = new Bill(0,$_COOKIE['user'],$decoded['title'],"",$decoded['itemsList'],json_encode($array));
            $id_bill = $this->billRepostiory->addBill($bill);
            $this->userRepostiory->assignUsersToBills($id_bill,$decoded['assignedList']);
            $this->userRepostiory->assignUserToBill($id_bill,intval($_COOKIE['user']));

            $url = "http://$_SERVER[HTTP_HOST]";
            http_response_code(200);
        }
    }



}