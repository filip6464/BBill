<?php


class Bill
{
    protected $localID;
    protected $title;
    protected $created_at;
    protected $itemList;
    protected $incomeList;
    protected $ownerID;

    /**
     * Bill constructor.
     * @param int $localID
     * @param string $title
     * @param string $created_at
     * @param null $itemList
     * @param null $incomeList
     * @param null $ownerID
     */
    public function __construct(int $localID,int $ownerID, string $title, string $created_at, $itemList=null, $incomeList=null)
    {
        $this->localID = $localID;
        $this->title = $title;
        $this->created_at = $created_at;
        if($this->itemList == null){
            $this->itemList = [0];
        }
        else
            $this->itemList = json_decode($itemList);
        if($this->incomeList == null)
            $this->incomeList = [0];
        else
            $this->incomeList = json_decode($incomeList);

        $this->ownerID = $ownerID;
    }

    public function getAmount():string{

        foreach ($this->itemList as $item => $item_value){
            $result += $item_value['amount'];
        }
        return $result;
}

    /**
     * @return null
     */
    public function getOwnerID()
    {
        return $this->ownerID;
    }

    public function getLocalID(): int
    {
        return $this->localID;
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

    public function getItemList()
    {
        return $this->itemList;
    }
    public function getItemListJson()
    {
        return json_encode($this->itemList);
    }


    /**
     * @param JSON $itemList
     */
    public function setItemList($itemList): void
    {
        $this->itemList = json_decode($itemList);
    }

    public function getIncomeList()
    {
        return $this->incomeList;
    }

    public function getIncomeListJson()
    {
        return json_encode($this->incomeList);
    }

    /*
     * @param
     * $incomeList is JSON
     */
    /**
     * @param JSON $incomeList
     */
    public function setIncomeList($incomeList): void
    {
        $this->incomeList = json_decode($incomeList);
    }

    public function addItem(string $title, float $amount, bool $isIncome){
        array_push($this->itemList,["title" => $title,"amount" => $amount,"incomeList" => $isIncome]);
    }

    public function removeItem(int $index){
        unset($this->itemList[$index]);
    }


}