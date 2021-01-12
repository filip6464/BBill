<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';

class UserRepository extends Repository
{
    public function getuser(string $email): ?User{
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.users WHERE email = :email
        ');

        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        //TODO trzeba wyrzucić informacje jaki dokładnie błąd został tu wywołany, exeption w try catch
        if($user == false){
            return null;
        }

        return new User(
          $user['email'],$user['password'],$user['name'],$user['surname']
        );
    }

}