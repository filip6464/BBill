<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';

class UserRepository extends Repository
{
    public function getUser(string $email): ?User
    {
        $stmt = $this->database->connect()->prepare('
            Select u.id,email,password,name,surname,image from users u 
                Join users_details ud on u.id_user_details= ud.id 
            WHERE email = :email
        ');

        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        //TODO trzeba wyrzucić informacje jaki dokładnie błąd został tu wywołany, exeption w try catch
        if ($user == false) {
            return null;
        }
        $result = new User(
            $user['email'], $user['password'], $user['name'], $user['surname'], $user['image']
        );
        $result->setLocalID($user['id']);
        return $result;
    }

    public function getRoommates(int $givenRoomID): ?array
    {

        $result = [];

        $stmt = $this->database->connect()->prepare('
            Select u.id,email,password,name,surname,image from users u 
                Join users_details ud on u.id_user_details= ud.id 
                JOIN users_rooms ur on ur.id_user = u.id 
            WHERE ur.id_room = :givenID;
        ');

        $stmt->bindParam(':givenID', $givenRoomID, PDO::PARAM_INT);
        $stmt->execute();

        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($users == false) {
            return null;
        }

        foreach ($users as $user) {
            $temp = new User(
                $user['email'], $user['password'], $user['name'], $user['surname'], $user['image']
            );
            $temp->setLocalID($user['id']);
            $result[] = $temp;
        }
        return $result;
    }

    public function getRoommatesLike(int $givenRoomID, string $searchPhraze): ?array
    {

        $searchPhraze = '%' . strtolower($searchPhraze) . '%';

        $stmt = $this->database->connect()->prepare('
            Select u.id,email,password,name,surname,image from users u
                Join users_details ud on u.id_user_details= ud.id
                JOIN users_rooms ur on ur.id_user = u.id
            WHERE ur.id_room = :givenID
              AND (
                  LOWER(ud.name) LIKE :str OR LOWER(ud.surname) LIKE :str
                  );     
           ');

        $stmt->bindParam(':givenID', $givenRoomID, PDO::PARAM_INT);
        $stmt->bindParam(':str', $searchPhraze, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getUserByID(int $givenID): ?User
    {
        $stmt = $this->database->connect()->prepare('
            Select u.id,email,password,name,surname,image from users u 
                Join users_details ud on u.id_user_details= ud.id 
            WHERE u.id = :givenID
        ');

        $stmt->bindParam(':givenID', $givenID, PDO::PARAM_INT);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        //TODO trzeba wyrzucić informacje jaki dokładnie błąd został tu wywołany, exeption w try catch
        if ($user == false) {
            return null;
        }
        $result = new User(
            $user['email'], $user['password'], $user['name'], $user['surname'], $user['image']
        );
        $result->setLocalID($user['id']);
        return $result;
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


    public function assignUsersToBills(int $bill_id, string $jsonlist)
    {

        $array = json_decode($jsonlist);

        foreach ($array as $item) {
            $stmt = $this->database->connect()->prepare('
            INSERT INTO users_bills (id_bill,id_user)
            VALUES (?, ?)
        ');

            $stmt->execute([
                $bill_id,
                $item
            ]);

        }


    }

    public function assignUserToBill(int $bill_id, int $userid)
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO users_bills (id_bill,id_user)
            VALUES (?, ?)
        ');
        $stmt->execute([
            $bill_id,
            $userid
        ]);

    }

    public function updateUser(int $actualUserID, User $user)
    {
        $name = $user->getName();
        $surname = $user->getSurname();
        $image = $user->getImage();
        $password = $user->getPassword();

        $stmt = $this->database->connect()->prepare('
        UPDATE users_details
SET name = :name, surname = :surname, image = :image
Where id = (Select id_user_details from users where id = :actualUserID)
        ');
        $stmt->bindParam(':actualUserID', $actualUserID, PDO::PARAM_INT);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':surname', $surname, PDO::PARAM_STR);
        $stmt->bindParam(':image', $image, PDO::PARAM_STR);
        $stmt->execute();

        $stmt = $this->database->connect()->prepare('
        UPDATE users
SET password = :password
Where id = :actualUserID
        ');
        $stmt->bindParam(':password', $password, PDO::PARAM_INT);
        $stmt->bindParam(':actualUserID', $actualUserID, PDO::PARAM_INT);
        $stmt->execute();
    }
}