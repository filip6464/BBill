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

        $ownerID = intval($_COOKIE['user']);

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
        return $this->render('new-room',['messages' => $this->messages,'lastusersrooms' => $lastusersrooms]);

    }


}