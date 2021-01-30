<?php

require_once __DIR__.'/../models/Room.php';

class UsersRoom extends Room
{
    private User $user;
    private $roommates = [];

    /**
     * UsersBill constructor.
     * @param $user
     * @param $bill
     */
    public function __construct($user, $room)
    {
        $this->localID = $room->getLocalID();
        $this->title = $room->getTitle();
        $this->created_at = $room->getCreatedAt();
        $this->ownerID = $room->getOwnerID();
        $this->user = $user;
    }

    public function getOwnerImage(): string
    {
        return $this->user->getimage();
    }

    public function setRoommates(array $roommates): void
    {
        $this->roommates = $roommates;
    }

    public function getRoommates(): array
    {
        return $this->roommates;
    }

    public function getEmail(): string
    {
        return $this->user->getemail();
    }

    public function getPassword(): string
    {
        return $this->user->getpassword();
    }

    public function getName(): string
    {
        return $this->user->getname();
    }

    public function getSurname(): string
    {
        return $this->user->getsurname();
    }

}