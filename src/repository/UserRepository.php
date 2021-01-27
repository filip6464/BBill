<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';

class UserRepository extends Repository
{
    public function getUser(string $email): ?User{
        $stmt = $this->database->connect()->prepare('
            Select email,password,name,surname,image from users u Join users_details ud on u.id_user_details= ud.id WHERE email = :email
        ');

        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        //TODO trzeba wyrzucić informacje jaki dokładnie błąd został tu wywołany, exeption w try catch
        if($user == false){
            return null;
        }

        return new User(
          $user['email'],$user['password'],$user['name'],$user['surname'],$user['image']
        );
    }

    public function getRoommates(int $givenRoomID): ?array{

        $result = [];

        $stmt = $this->database->connect()->prepare('
            Select email,password,name,surname,image from users u Join users_details ud on u.id_user_details= ud.id WHERE u.id = (SELECT id_user from users_rooms WHERE id_room = :givenID);
        ');

        $stmt->bindParam(':givenID', $givenRoomID, PDO::PARAM_INT);
        $stmt->execute();

        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($users == false) {
            return null;
        }

        foreach ($users as $user){
            $result[] = new User(
                $user['email'],$user['password'],$user['name'],$user['surname'],$user['image']
            );
        }
        return $result;
    }

    public function getUserByID(int $givenID): ?User{
        $stmt = $this->database->connect()->prepare('
            Select email,password,name,surname,image from users u Join users_details ud on u.id_user_details= ud.id WHERE u.id = :givenID
        ');

        $stmt->bindParam(':givenID', $givenID, PDO::PARAM_INT);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        //TODO trzeba wyrzucić informacje jaki dokładnie błąd został tu wywołany, exeption w try catch
        if($user == false){
            return null;
        }

        return new User(
            $user['email'],$user['password'],$user['name'],$user['surname'],$user['image']
        );
    }

    public function addUser(User $user)
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO users_details (name, surname)
            VALUES (?, ?)
        ');

        $stmt->execute([
            $user->getName(),
            $user->getSurname(),
        ]);

        $stmt = $this->database->connect()->prepare('
            INSERT INTO users (email, password, id_user_details)
            VALUES (?, ?, ?)
        ');

        $stmt->execute([
            $user->getEmail(),
            $user->getPassword(),
            $this->getUserDetailsId($user)
        ]);
    }


    public function getUserDetailsId(User $user): int
    {
        $stmt = $this->database->connect()->prepare('
            SELECT id FROM public.users_details where id = (SELECT max(id) from public.users_details)
        ');

        $stmt->execute();

        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data['id'];
    }

}