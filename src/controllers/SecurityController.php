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

        if(isset($_COOKIE["user"])){
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/homepage");
        }

        if (!$this->isPost()) {
            return $this->render('login');
        }

        $email = $_POST["email"];
        $password = $this->hashPassword($_POST['password']);

        $user = $this->userRepostiory->getUser($email);


        if (!$user) {
            return $this->render('login', ['messages' => ['User not found!']]);
        }

        if ($user->getEmail() !== $email) {
            return $this->render('login', ['messages' => ['User with this email not exist!']]);
        }

        if(password_verify($password, $user->getPassword())){
            return $this->render('login', ['messages' => ['Wrong password!',"wproadzone[".$password."]","DB[".$user->getPassword()."]"]]);
        }

        setcookie("user", $user->getLocalID(), time()+3600);
        setcookie("name", $user->getName(), time()+3600);
        setcookie("surname", $user->getSurname(), time()+3600);
        setcookie("avatar", $user->getImage(), time()+3600);

        //TODO uncomment after add role to user
        //setcookie("role", $user->getRole(), time()+3600);

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

        $user = new User($email, $this->hashPassword($password), $name, $surname);

        $this->userRepository = new UserRepository();
        $this->userRepository->addUser($user);

        return $this->render('login', ['messages' => ['You\'ve been succesfully registrated!'],$this->userRepository]);
    }

    public function logout(){
        $this->userCookieVerification();
        setcookie("user", 0, time()-3600);
        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/login");
    }


}