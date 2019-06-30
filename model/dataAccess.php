<?php

$connection = new DBConn();
$pdo = $connection->connect();


class DAO
{


    public function getAllAdmins()
    {

        global $pdo;
        $sql = "SELECT * FROM ADMIN";

        $statement = $pdo->prepare($sql);

        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_CLASS, 'Admin');

        return $results;
    }

    public function getAllCompanies()
    {

        global $pdo;
        $sql = "SELECT * FROM VEHICLE_COMPANY";

        $statement = $pdo->prepare($sql);

        $statement->execute();

        $results = $statement->fetchAll(PDO::FETCH_CLASS, 'Company');

        return $results;
    }


    public function removeAllCartItemsOfCustomer($customer) {

        global $pdo;

        $sql = "DELETE FROM CART WHERE CUSTOMER_ID = :customer_id";

        $statement = $pdo->prepare($sql);
        $statement->bindValue(':customer_id', $customer->CUSTOMER_ID, PDO::PARAM_INT);


        $statement->execute();

    }


    public function addVehicleOrder($orderObj)
    {

        global $pdo;

        $sql = "INSERT INTO VEHICLE_ORDER(CUSTOMER_ID, VEHICLE_ID, BOOKING_DATE) VALUES(:customer_id, :vehicle_id, :booking_date)";

        $statement = $pdo->prepare($sql);
        $statement->bindValue(':customer_id', $orderObj->CUSTOMER_ID, PDO::PARAM_INT);
        $statement->bindValue(':vehicle_id', $orderObj->VEHICLE_ID, PDO::PARAM_INT);
        $statement->bindValue(':booking_date', $orderObj->BOOKING_DATE);

        return $statement->execute();


    }


    public function getMyAllBooking($vehicle_order) {

        global $pdo;
        $sql = "SELECT * FROM VEHICLE_ORDER AS VOR JOIN `VEHICLE` AS V JOIN VEHICLE_MODEL AS VM JOIN  VEHICLE_MAKE AS VMK  ON  VMK.MAKE_ID = V.MAKE_ID AND  V.MODEL_ID = VM.MODEL_ID AND VOR.VEHICLE_ID = V.VEHICLE_ID WHERE VOR.CUSTOMER_ID = :customer_id ORDER BY VOR.BOOKING_DATE DESC";



        $statement = $pdo->prepare($sql);
        $statement->bindValue(':customer_id', $vehicle_order->CUSTOMER_ID, PDO::PARAM_INT);

        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_CLASS, 'Bus');



        return $results;

    }




    public function getAllBooking() {

        global $pdo;
        $sql = "SELECT * FROM VEHICLE_ORDER AS VOR JOIN `VEHICLE` AS V JOIN VEHICLE_MODEL AS VM JOIN  VEHICLE_MAKE AS VMK JOIN CUSTOMERS AS C  ON  VMK.MAKE_ID = V.MAKE_ID AND  V.MODEL_ID = VM.MODEL_ID AND VOR.VEHICLE_ID = V.VEHICLE_ID AND C.CUSTOMER_ID = VOR.CUSTOMER_ID ORDER BY VOR.BOOKING_DATE DESC";



        $statement = $pdo->prepare($sql);

        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_CLASS, 'Bus');



        return $results;

    }





    public function getSearchedBusAllCompany($bus)
    {

        global $pdo;
        $sql = "SELECT * FROM `VEHICLE` AS V JOIN VEHICLE_MODEL AS VM  JOIN VEHICLE_MAKE AS VMK JOIN VEHICLE_COMPANY AS VCM ON  VMK.MAKE_ID = V.MAKE_ID AND  V.MODEL_ID = VM.MODEL_ID  AND VCM.COMPANY_ID = V.COMPANY_ID WHERE  DAILY_RATE BETWEEN :rate_min AND :rate_max AND V.MAX_CAPACITY >= :cap AND
        VEHICLE_ID NOT IN (SELECT VEHICLE_ID FROM VEHICLE_ORDER WHERE :date_from BETWEEN RENT_FROM AND RENT_TO)
        AND
        VEHICLE_ID NOT IN (SELECT VEHICLE_ID FROM VEHICLE_ORDER WHERE :date_to BETWEEN RENT_FROM AND RENT_TO)";

        $statement = $pdo->prepare($sql);
        $statement->bindValue(':rate_min', $bus->MIN_COST, PDO::PARAM_INT);
        $statement->bindValue(':rate_max', $bus->MAX_COST, PDO::PARAM_INT);
        $statement->bindValue(':cap', $bus->MAX_CAPACITY, PDO::PARAM_INT);
        $statement->bindValue(':date_from', $bus->DATE_FROM, PDO::PARAM_INT);
        $statement->bindValue(':date_to', $bus->DATE_TO, PDO::PARAM_INT);



        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_CLASS, 'Bus');



        return $results;
    }

    public function getSearchedBus($bus)
    {

        global $pdo;
        $sql = "SELECT * FROM `VEHICLE` AS V JOIN VEHICLE_MODEL AS VM  JOIN VEHICLE_MAKE AS VMK JOIN VEHICLE_COMPANY AS VCM ON  VMK.MAKE_ID = V.MAKE_ID AND  V.MODEL_ID = VM.MODEL_ID  AND VCM.COMPANY_ID = V.COMPANY_ID WHERE  DAILY_RATE BETWEEN :rate_min AND :rate_max AND V.MAX_CAPACITY >= :cap AND
        VEHICLE_ID NOT IN (SELECT VEHICLE_ID FROM VEHICLE_ORDER WHERE :date_from BETWEEN RENT_FROM AND RENT_TO) AND V.COMPANY_ID = :company_id
        AND
        VEHICLE_ID NOT IN (SELECT VEHICLE_ID FROM VEHICLE_ORDER WHERE :date_to BETWEEN RENT_FROM AND RENT_TO) AND V.COMPANY_ID = :company_id";

        $statement = $pdo->prepare($sql);
        $statement->bindValue(':rate_min', $bus->MIN_COST, PDO::PARAM_INT);
        $statement->bindValue(':rate_max', $bus->MAX_COST, PDO::PARAM_INT);
        $statement->bindValue(':cap', $bus->MAX_CAPACITY, PDO::PARAM_INT);
        $statement->bindValue(':date_from', $bus->DATE_FROM, PDO::PARAM_INT);
        $statement->bindValue(':date_to', $bus->DATE_TO, PDO::PARAM_INT);
        $statement->bindValue(':company_id', $bus->COMPANY_ID, PDO::PARAM_INT);


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

    public function companyLoginAttempt($cust)
    {

        global $pdo;
        $sql = "SELECT * FROM VEHICLE_COMPANY WHERE EMAIL_ADDRESS = :email AND PASSWORD = :password";

        $statement = $pdo->prepare($sql);
        $statement->bindValue(':email', $cust->EMAIL_ADDRESS, PDO::PARAM_STR);
        $statement->bindValue(':password', $cust->PASSWORD, PDO::PARAM_STR);
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_CLASS, 'Company');

        return $results;
    }

    public function adminLoginAttempt($cust)
    {

        global $pdo;
        $sql = "SELECT * FROM ADMIN WHERE EMAIL_ADDRESS = :email AND PASSWORD = :password";

        $statement = $pdo->prepare($sql);
        $statement->bindValue(':email', $cust->EMAIL_ADDRESS, PDO::PARAM_STR);
        $statement->bindValue(':password', $cust->PASSWORD, PDO::PARAM_STR);
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_CLASS, 'Admin');

        return $results;
    }

    private static $daoObject;

    public static function getInstance()
    {
        if (!isset(self::$daoObject)) {
            self::$daoObject =  new DAO();
        }
        return self::$daoObject;
    }

    private function __construct()
    { }


    public function getAllBuses()
    {

        global $pdo;
        $statement = $pdo->query("SELECT * FROM VEHICLE AS V JOIN VEHICLE_MODEL AS VM JOIN VEHICLE_MAKE AS VMK ON V.MAKE_ID = VMK.MAKE_ID AND VM.MODEL_ID = V.MODEL_ID ");
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_CLASS, 'Bus');
        return $results;
    }

    public function checkEmailValidity($customer)
    {


        global $pdo;
        $sql = "SELECT * FROM CUSTOMERS WHERE EMAIL_ADDRESS = :email";

        $statement = $pdo->prepare($sql);
        $statement->bindValue(':email', $customer->EMAIL_ADDRESS, PDO::PARAM_STR);

        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_CLASS, 'Customer');

        return $results;
    }

    public function checkEmailValidityCompany($company)
    {


        global $pdo;
        $sql = "SELECT * FROM VEHICLE_COMPANY WHERE EMAIL_ADDRESS = :email";

        $statement = $pdo->prepare($sql);
        $statement->bindValue(':email', $company->EMAIL_ADDRESS, PDO::PARAM_STR);

        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_CLASS, 'Company');

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


    public function addCompany($company)
    {

        global $pdo;
        $sql = "INSERT INTO VEHICLE_COMPANY(COMPANY_NAME, ADDRESS, EMAIL_ADDRESS, CONTACT_NUMBER, PASSWORD) VALUES(:c_name, :address, :email, :phone, :password)";

        $statement = $pdo->prepare($sql);
        $statement->bindValue(':c_name', $company->COMPANY_NAME, PDO::PARAM_STR);
        $statement->bindValue(':address', $company->ADDRESS, PDO::PARAM_STR);
        $statement->bindValue(':email', $company->EMAIL_ADDRESS, PDO::PARAM_STR);
        $statement->bindValue(':phone', $company->CONTACT_NUMBER, PDO::PARAM_STR);
        $statement->bindValue(':password', $company->PASSWORD, PDO::PARAM_STR);

        $statement->execute();


        return $id = $pdo->lastInsertId();
    }
}
