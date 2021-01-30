<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Bill.php';


class BillRepository extends Repository
{

    public function getBill(int $id): ?Bill
    {
        $stmt = $this->database->connect()->prepare('
            Select b."id",title,b.created_at,b."itemList",b."incomeList",image From bills b JOIN users u on u.id = b.id_owner JOIN users_details ud on ud.id = u.id_user_details WHERE b.id = :id;
        ');

        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $bill = $stmt->fetch(PDO::FETCH_ASSOC);

        //TODO trzeba wyrzucić informacje jaki dokładnie błąd został tu wywołany, exeption w try catch
        if ($bill == false) {
            return null;
        }

        $itemlist= json_decode($bill['itemList']);
        $incomelist= json_decode($bill['incomeList']);

        return new Bill(
            $bill['id'],$bill['title'], $bill['created_at'],$itemlist , $incomelist,$bill['image']
        );
    }

    public function addBill(Bill $bill)
    {
        $date = new DateTime();
        $stmt = $this->database->connect()->prepare('
        INSERT INTO bills (id_owner, title, created_at, "itemList", "incomeList") VALUES (?,?,?,?,?);
        ');


        //TODO get active userID to assign bill owner
        $ownerID = 1;

        $stmt->execute([
            $bill->getOwnerID(),
            $bill->getTitle(),
            $date->format('Y-m-d'),
            json_encode($bill->getItemList()),
            json_encode($bill->getIncomeList())
        ]);

        $stmt = $this->database->connect()->prepare('
        SELECT max(id) from bills;
        ');
        $stmt->execute();


        $id = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $id = $id[0]['max'];
        return $id;
    }


    public function getBills(): ?array
    {
        $result = [];

        $stmt = $this->database->connect()->prepare('
            Select * From bills;
        ');
        $stmt->execute();

        $bills = $stmt->fetchAll(PDO::FETCH_ASSOC);

        //TODO trzeba wyrzucić informacje jaki dokładnie błąd został tu wywołany, exeption w try catch
        if ($bills == false) {
            return null;
        }

        foreach ($bills as $bill){
            $itemlist= json_decode($bill['itemList']);
            $incomelist= json_decode($bill['incomeList']);
            $result[] = new Bill(
                $bill['id'],$bill['id_owner'],$bill['title'], $bill['created_at'],$itemlist , $incomelist
            );
        }
        return $result;
    }

    public function getUsersBills(int $userid): ?array
    {
        $result = [];

        $stmt = $this->database->connect()->prepare('
Select * From bills b
JOIN users_bills ub on b.id = ub.id_bill
WHERE ub.id_user= :userid;
');

        $stmt->bindParam(':userid', $userid, PDO::PARAM_INT);
        $stmt->execute();

        $bills = $stmt->fetchAll(PDO::FETCH_ASSOC);

        //TODO trzeba wyrzucić informacje jaki dokładnie błąd został tu wywołany, exeption w try catch
        if ($bills == false) {
            return null;
        }

        foreach ($bills as $bill){
            $itemlist= json_decode($bill['itemList']);
            $incomelist= json_decode($bill['incomeList']);
            $result[] = new Bill(
                $bill['id'],$bill['id_owner'],$bill['title'], $bill['created_at'],$itemlist , $incomelist
            );
        }
        return $result;
    }

}