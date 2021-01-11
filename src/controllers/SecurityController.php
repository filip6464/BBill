<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';

class SecurityController extends AppController
{
    public function login(){
        $user = new User('jkowalski@gmail.com','admin','Jan','Kowalski');

        if($this->isPost()){
            return $this->login('login');
        }

        $email = $_POST["email"];
        $passowrd = $_POST["password"];

        if($user->getEmail()!=$email){
            return $this->render('login',['messages'=> ['User with this email not exits']]);
        }else if($user->getPassword() != $passowrd){
            return $this->render('login',['messages'=> ['Incorrect password']]);
        }else{
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/homepage");
            //$this->render('homepage');
        }

    }
}