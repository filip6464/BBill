<?php


class Room
{
    protected $localID;
    protected $ownerID;
    protected $title;
    protected $created_at;

    public function __construct(int $localID,int $ownerID,string $title,string $created_at)
    {
        $this->localID = $localID;
        $this->ownerID = $ownerID;
        $this->title = $title;
        $this->created_at = $created_at;
    }

    public function getLocalID()
    {
        return $this->localID;
    }

    public function setLocalID($localID): void
    {
        $this->localID = $localID;
    }

    public function getOwnerID()
    {
        return $this->ownerID;
    }

    public function setOwnerID($ownerID): void
    {
        $this->ownerID = $ownerID;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title): void
    {
        $this->title = $title;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function setCreatedAt($created_at): void
    {
        $this->created_at = $created_at;
    }


}