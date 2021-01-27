<?php


use PHPUnit\Framework\TestCase;

class RepositoryTest extends TestCase
{

    public function testGetArrayfromJSON()
    {
        //given
        $jsonObject = '{
        "billItems": [
        { "title": "beer Round1", "amount": "45", "isIncome": "false" },
        { "title": "beer Round2", "amount": "50", "isIncome": "false" },
        { "title": "Jack", "amount": "55", "isIncome": "true" },
    ]
        }';
        //when
        $result = Repository::getArrayfromJSON($jsonObject,"billItems");
        //then
    }
}
