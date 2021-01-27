<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Room.php';

class RoomRepository extends Repository
{

    public function getRoom(int $givenID): ?Room{
        $stmt = $this->database->connect()->prepare('
            Select * from rooms WHERE id = :givenID
        ');
        $stmt->bindParam(':givenID', $givenID, PDO::PARAM_INT);
        $stmt->execute();

        $room = $stmt->fetch(PDO::FETCH_ASSOC);

        //TODO trzeba wyrzucić informacje jaki dokładnie błąd został tu wywołany, exeption w try catch
        if($room == false){
            return null;
        }

        return new Room(
            $room['id'],$room['id_owner'],$room['title'],$room['created_at']
        );
    }

    public function getRooms(): ?array
    {
        $result = [];

        $stmt = $this->database->connect()->prepare('
            Select * From rooms;
        ');
        $stmt->execute();

        $rooms = $stmt->fetchAll(PDO::FETCH_ASSOC);

        //TODO trzeba wyrzucić informacje jaki dokładnie błąd został tu wywołany, exeption w try catch
        if ($rooms == false) {
            return null;
        }

        foreach ($rooms as $room){
            $result[] = new Room(
                $room['id'],$room['id_owner'],$room['title'], $room['created_at']
            );
        }
        return $result;
    }

    public function addRoom(Room $room)
    {
        $date = new DataTime();
        $stmt = $this->database->connect()->prepare('
            INSERT INTO room (id_owner,title,created_at)
            VALUES (?, ?, ?)
        ');

        //TODO get active userID to assign bill owner
        $ownerID = 1;

        $stmt->execute([
            $ownerID,
            $room->getTitle(),
            $date->format('Y-m-d')
        ]);



        $stmt = $this->database->connect()->prepare('
        INSERT INTO bills (id_owner, title, created_at, itemList, incomeList) VALUES (?,?,?,?,?)
        ');

    }

}