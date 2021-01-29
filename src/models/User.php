<?php


class User {
    private $localID;
    private $email;
    private $password;
    private $name;
    private $surname;
    protected $image;


    public function __construct(string $email, string $password, string $name,string $surname,string $image=null)
    {
        $this->localID =0;
        $this->email = $email;
        $this->password = $password;
        $this->name = $name;
        $this->surname = $surname;
        $this->image = $image;
    }

    public function setLocalID(int $localID): void
    {
        $this->localID = $localID;
    }

    public function getLocalID()
    {
        return $this->localID;
    }



    public function getImage(): string
    {
        return $this->image;
    }

    public function setImage(string $image)
    {
        $this->image = $image;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password)
    {
        $this->password = $password;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getSurname(): string
    {
        return $this->surname;
    }

    public function setSurname(string $surname)
    {
        $this->surname = $surname;
    }


}