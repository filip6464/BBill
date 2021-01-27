<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';

class SecurityController extends AppController
{
  private UserRepository $userRepostiory;


    public function __construct()
    {
        parent::__construct();
        $this->userRepostiory = new UserRepository();
    }

    public function login(){

        if (!$this->isPost()) {
            return $this->render('login');
        }

        $email = $_POST["email"];
        $password = md5($_POST['password']);

        $user = $this->userRepostiory->getUser($email);


        if (!$user) {
            return $this->render('login', ['messages' => ['User not found!']]);
        }

        if ($user->getEmail() !== $email) {
            return $this->render('login', ['messages' => ['User with this email not exist!']]);
        }

        if ($user->getPassword() !== $password) {
            return $this->render('login', ['messages' => ['Wrong password!']]);
        }

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/homepage");

    }

    public function register()
    {
        if (!$this->isPost()) {
            return $this->render('register');
        }

        $email = $_POST['email'];
        $password = $_POST['password'];
        $password2 = $_POST['password2'];
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        if ($password !== $password2) {
            return $this->render('register', ['messages' => ['Please provide proper password']]);
        }

        //TODO change hash function

        $user = new User($email, md5($password), $name, $surname);

       // return $this->render('login', ['messages' => ['You\'ve been succesfully registrated!'],var_dump($this->userRepository)]);

        $this->userRepository = new UserRepository();
        $this->userRepository->addUser($user);

        return $this->render('login', ['messages' => ['You\'ve been succesfully registrated!'],$this->userRepository]);
    }


}