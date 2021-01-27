<?php

require_once 'AppController.php';
require_once __DIR__.'/../repository/RoomRepository.php';
require_once __DIR__.'/../models/UsersBill.php';
require_once __DIR__.'/../models/UsersRoom.php';

class HomepageController extends AppController
{
    const MAX_FILE_SIZE = 1024*1024;
    const SUPPORTED_TYPES = ['image/png','image/jpeg'];
    const UPLOAD_DIRECTORY = '/../public/uploads/';

    private $messages = [];
    private $billRepostiory;
    private $userRepository;
    private $roomRepostiory;

    public function __construct()
    {
        $this->billRepostiory = new BillRepository();
        $this->userRepository = new UserRepository();
        $this->roomRepostiory = new RoomRepository();
    }


    public function homepage(){

        $bills = $this->billRepostiory->getBills();

        $usersbills = [];
        foreach ($bills as $bill){
            $user = $this->userRepository->getUserByID($bill->getOwnerID());
            array_push($usersbills,new UsersBill($user,$bill));
        }

        $rooms = $this->roomRepostiory->getRooms();
        $usersrooms = [];
        foreach ($rooms as $room){
            $user = $this->userRepository->getUserByID($room->getOwnerID());
            $usersroom = new UsersRoom($user,$room);
            $usersroom->setRoommates($this->userRepository->getRoommates($room->getLocalID()));
            array_push($usersrooms,$usersroom);
        }

        $this->render('homepage', ['usersbills' => $usersbills,'usersrooms' => $usersrooms]);
    }

    public function userSettings(){

        if($this->isPost() && is_uploaded_file($_FILES['file']['tmp_name']) && $this->validate($_FILES['file'])){

            move_uploaded_file(
                $_FILES['file']['tmp_name'],
                dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES['file']['name']
            );

            $user = new User($_POST['name'],$_POST['surname'],$_POST['description'], $_FILES['file']['name']);

            return $this->render('homepage',['messages' => $this->messages]);
        }

        $this->render('user-settings',['messages' => $this->messages]);
    }

    private function validate($file): bool
    {
        if($file['size'] > self::MAX_FILE_SIZE){
            $this->messages[] = 'File is too large for destination file system';
            return false;
        }

        if(!isset($file['type']) && !in_array($file['type'], self::SUPPORTED_TYPES)){
            $this->messages[] = 'File type is not supported';
            return false;
        }
        return true;
    }


}