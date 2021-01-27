<?php

require_once __DIR__.'/../models/Bill.php';

class UsersBill extends Bill
{
    private User $user;

    /**
     * UsersBill constructor.
     * @param $user
     * @param $bill
     */
    public function __construct($user, $bill)
    {
        $this->localID = $bill->getLocalID();
        $this->title = $bill->getTitle();
        $this->created_at = $bill->getCreatedAt();
        if($this->itemList == null){
            $this->itemList = [0];
        }
        else
            $this->itemList = $bill->getItemList();
        if($this->incomeList == null)
            $this->incomeList = [0];
        else
            $this->incomeList = $bill->getIncomeList();

        $this->ownerID = $bill->getOwnerID();
        $this->user = $user;
    }

    public function getOwnerImage(): string
    {
        return $this->user->getimage();
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