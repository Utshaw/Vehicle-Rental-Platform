<?php

$connection = new DBConn();
$pdo = $connection->connect();


class DAO
{

    private static $daoObject;


    private function __construct()
    {

    }



    public function getAllBuses()
    {

        global $pdo;
        $statement = $pdo->query("SELECT * FROM VEHICLE AS V JOIN VEHICLE_MODEL AS VM JOIN VEHICLE_MAKE AS VMK ON V.MAKE_ID = VMK.MAKE_ID AND VM.MODEL_ID = V.MODEL_ID ");
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_CLASS, 'Bus');
        return $results;
    }





}