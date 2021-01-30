<?php

require_once 'AppController.php';
require_once __DIR__.'/../repository/RoomRepository.php';
require_once __DIR__.'/../models/UsersBill.php';
require_once __DIR__.'/../models/UsersRoom.php';

class HomepageController extends AppController
{
    const MAX_FILE_SIZE = 1024*1024;
    const SUPPORTED_TYPES = ['image/png','image/jpeg'];
    const UPLOAD_DIRECTORY = '/../public/img/uploads/';

    private $messages = array();
    private $billRepostiory;
    private $userRepository;
    private $roomRepostiory;

    public function __construct()
    {
        parent::__construct();
        $this->billRepostiory = new BillRepository();
        $this->userRepository = new UserRepository();
        $this->roomRepostiory = new RoomRepository();
    }


    public function homepage(){
        $this->userCookieVerification();

        $bills = $this->billRepostiory->getUsersBills(intval($_COOKIE['user']));
        if($bills !=null) {
            $usersbills = array();
            foreach ($bills as $bill) {
                $user = $this->userRepository->getUserByID($bill->getOwnerID());
                array_push($usersbills, new UsersBill($user, $bill));
            }
        }


        $rooms = $this->roomRepostiory->getLinkedRooms(intval($_COOKIE['user']));
        if($rooms != null) {
            $usersrooms = array();
            foreach ($rooms as $room) {
                $user = $this->userRepository->getUserByID($room->getOwnerID());
                $usersroom = new UsersRoom($user, $room);
                $usersroom->setRoommates($this->userRepository->getRoommates($room->getLocalID()));
                array_push($usersrooms, $usersroom);
            }
        }

        $this->render('homepage', ['usersbills' => $usersbills,'usersrooms' => $usersrooms,'name'=>$_COOKIE['name'],'surname'=>$_COOKIE['surname']]);
    }

    public function userSettings(){
        $this->userCookieVerification();

        if( is_uploaded_file($_FILES['file']['tmp_name']) &&
            $this->isPost() &&
            $this->validate($_FILES['file'])){
            move_uploaded_file(
                $_FILES['file']['tmp_name'],
                dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES['file']['name']
            );

            $oldUser = $this->userRepository->getUserByID(intval($_COOKIE['user']));

            $_POST['name'] ==='' ?: $oldUser->setName($_POST['name']);
            $_POST['surname'] ==='' ?: $oldUser->setSurname($_POST['surname']);
            $_FILES['file']['name'] ==='' ?: $oldUser->setImage($_FILES['file']['name']);

            if($_POST['password2'] !== '' && strcasecmp($_POST['password'], $_POST['password2']) == 0)
                $oldUser->setPassword($this->hashPassword($_POST['password']));

            $this->userRepository->updateUser(intval($_COOKIE['user']),$oldUser);

            setcookie("user", $oldUser->getLocalID(), time()+3600);
            setcookie("name", $oldUser->getName(), time()+3600);
            setcookie("surname", $oldUser->getSurname(), time()+3600);
            setcookie("avatar", $oldUser->getImage(), time()+3600);

            array_push($this->messages,"Zakutalizowano uzytkownika");

            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/homepage");
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