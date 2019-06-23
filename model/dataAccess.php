<?php

$connection = new DBConn();
$pdo = $connection->connect();


class DAO
{


    public function getSearchedBus($bus)
    {

        global $pdo;
        $sql = "SELECT * FROM `VEHICLE` AS V JOIN VEHICLE_MODEL AS VM JOIN LICENSE AS L JOIN VEHICLE_MAKE AS VMK  ON  VMK.MAKE_ID = V.MAKE_ID AND  V.MODEL_ID = VM.MODEL_ID AND V.LICENSE_REQUIRED = L.ID WHERE L.TYPE = :license AND DAILY_RATE BETWEEN :rate_min AND :rate_max AND V.MAX_CAPACITY >= :cap AND VEHICLE_ID NOT IN (SELECT VEHICLE_ID FROM VEHICLE_ORDER WHERE BOOKING_DATE = :booking_date)";

        $statement = $pdo->prepare($sql);
        $statement->bindValue(':license', $bus->LICENSE_REQUIRED, PDO::PARAM_STR);
        $statement->bindValue(':rate_min', $bus->MIN_COST, PDO::PARAM_INT);
        $statement->bindValue(':rate_max', $bus->MAX_COST, PDO::PARAM_INT);
        $statement->bindValue(':cap', $bus->MAX_CAPACITY, PDO::PARAM_INT);
        $statement->bindValue(':booking_date', $bus->DATE_REQUIRED, PDO::PARAM_INT);


        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_CLASS, 'Bus');



        return $results;

    }


    public function loginAttempt($cust)
    {

        global $pdo;
        $sql = "SELECT * FROM CUSTOMERS WHERE EMAIL_ADDRESS = :email AND PASSWORD = :password";

        $statement = $pdo->prepare($sql);
        $statement->bindValue(':email', $cust->EMAIL_ADDRESS, PDO::PARAM_STR);
        $statement->bindValue(':password', $cust->PASSWORD, PDO::PARAM_STR);
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_CLASS, 'Customer');

        return $results;

    }

    private static $daoObject;

    public static function getInstance() {
        if(!isset(self::$daoObject)){
            self::$daoObject =  new DAO();
        }
        return self::$daoObject;
    }

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

    public function checkEmailValidity($customer) {


        global $pdo;
        $sql = "SELECT * FROM CUSTOMERS WHERE EMAIL_ADDRESS = :email";

        $statement = $pdo->prepare($sql);
        $statement->bindValue(':email', $customer->EMAIL_ADDRESS, PDO::PARAM_STR);

        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_CLASS, 'Customer');

        return $results;
    }



    public function addCustomer($customer)
    {

        global $pdo;
        $sql = "INSERT INTO CUSTOMERS(CONTACT_NAME, ADDRESS, EMAIL_ADDRESS, CONTACT_NUMBER, PASSWORD) VALUES(:c_name, :address, :email, :phone, :password)";

        $statement = $pdo->prepare($sql);
        $statement->bindValue(':c_name', $customer->CONTACT_NAME, PDO::PARAM_STR);
        $statement->bindValue(':address', $customer->ADDRESS, PDO::PARAM_STR);
        $statement->bindValue(':email', $customer->EMAIL_ADDRESS, PDO::PARAM_STR);
        $statement->bindValue(':phone', $customer->CONTACT_NUMBER, PDO::PARAM_STR);
        $statement->bindValue(':password', $customer->PASSWORD, PDO::PARAM_STR);

        $statement->execute();


        return $id = $pdo->lastInsertId();

    }





}