

<?php

$connection = new DBConn();
$pdo = $connection->connect();


class DAO
{

    public function getCompanyWithVerificationCode($company)
    {

        global $pdo;
        $sql = "SELECT * FROM VEHICLE_COMPANY WHERE COMPANY_ID = :company_id AND VERIFICATION_CODE = :verification_code AND BLOCKED = 0";

        $statement = $pdo->prepare($sql);
        $statement->bindValue(':company_id', $company->COMPANY_ID, PDO::PARAM_INT);
        $statement->bindValue(':verification_code', $company->VERIFICATION_CODE, PDO::PARAM_STR);
        $statement->execute();
        $statement->debugDumpParams();
        $results = $statement->fetchAll(PDO::FETCH_CLASS, 'Company');
        return $results;
    }


    public function setCompanyVerificationCodeNull($company)
    {

        global $pdo;
        $sql = "UPDATE VEHICLE_COMPANY SET VERIFICATION_CODE = NULL WHERE COMPANY_ID = :company_id  ";

        $statement = $pdo->prepare($sql);
        $statement->bindValue(':company_id', $company->COMPANY_ID, PDO::PARAM_INT);
        // $statement->bindValue(':verification_code', $customer->VERIFICATION_CODE, PDO::PARAM_STR);
        $statement->execute();
    }


    public function getCustomerWithVerificationCode($customer)
    {

        global $pdo;
        $sql = "SELECT * FROM CUSTOMERS WHERE CUSTOMER_ID = :customer_id AND VERIFICATION_CODE = :verification_code AND BLOCKED = 0";

        $statement = $pdo->prepare($sql);
        $statement->bindValue(':customer_id', $customer->CUSTOMER_ID, PDO::PARAM_INT);
        $statement->bindValue(':verification_code', $customer->VERIFICATION_CODE, PDO::PARAM_STR);
        $statement->execute();

        $results = $statement->fetchAll(PDO::FETCH_CLASS, 'Customer');
        return $results;
    }







    public function setCustomerVerificationCodeNull($customer)
    {

        global $pdo;
        $sql = "UPDATE CUSTOMERS SET VERIFICATION_CODE = NULL WHERE CUSTOMER_ID = :customer_id  ";

        $statement = $pdo->prepare($sql);
        $statement->bindValue(':customer_id', $customer->CUSTOMER_ID, PDO::PARAM_INT);
        // $statement->bindValue(':verification_code', $customer->VERIFICATION_CODE, PDO::PARAM_STR);
        $statement->execute();
    }



    public function changeCustomerBlockValue($customer)
    {

        global $pdo;
        $sql = "UPDATE CUSTOMERS SET BLOCKED = :block_value WHERE CUSTOMER_ID = :customer_id  ";

        $statement = $pdo->prepare($sql);
        $statement->bindValue(':customer_id', $customer->CUSTOMER_ID, PDO::PARAM_INT);
        $statement->bindValue(':block_value', $customer->BLOCKED, PDO::PARAM_INT);
        // $statement->bindValue(':verification_code', $customer->VERIFICATION_CODE, PDO::PARAM_STR);
        $statement->execute();
    }



    public function deletePromotion($promotion)
    {

        global $pdo;
        $sql = "DELETE  FROM PROMOTION WHERE PROMOTION_ID = :promo_id";

        $statement = $pdo->prepare($sql);
        $statement->bindValue(':promo_id', $promotion->PROMOTION_ID, PDO::PARAM_INT);
        $statement->execute();
    }

    public function similarity_distance($matrix, $person1, $person2)
    {
        $similar = array();
        $sum = 0;

        foreach ($matrix[$person1] as $key => $value) {

            // echo $key . ' -- ' . $value;

            // var_dump($matrix[$person2]);

            // echo "<br>";

            if (array_key_exists($key, $matrix[$person2])) {



                // echo "JJUI";

                $similar[$key] = 1;
            }
        }

        if ($similar == 0) {
            return 0;
        }

        foreach ($matrix[$person1] as $key => $value) {

            if (array_key_exists($key, $matrix[$person2])) {



                $sum = $sum + pow($value - $matrix[$person2][$key], 2);
            }
        }

        return 1 / (1 + sqrt($sum));
    }


    public function getRecommendation($matrix, $person)
    {

        $total = array();
        $simsums = array();
        $ranks = array();


        $similarMatrix=array();

        foreach ($matrix as $otherPerson => $value) {

            // var_dump($otherPerson);
            // var_dump($person);
            // echo $otherPerson;
            // print_r($value);



            if ($otherPerson != $person) {
                $sim = $this->similarity_distance($matrix, $person, $otherPerson);

                $similarMatrix[$otherPerson]=$sim;

                // foreach ($matrix[$otherPerson] as $key => $value) {
                //     if (!array_key_exists($key, $matrix[$person])) {


                //         if (!array_key_exists($key, $total)) {

                //             $total[$key] = 0;
                //         }



                //         $total[$key] += $matrix[$otherPerson][$key] * $sim;

                //         if (!array_key_exists($key, $simsums)) {
                //             $simsums[$key] = 0;
                //         }

                //         $simsums[$key] += $sim;
                //     }
                // }


            }
        }

        $max = 0.0;
        $maxCustomer = -1;
        foreach($similarMatrix as $eachCustomer=>$value) {
            // echo $eachCustomer. '-' . $value;

            if($value > $max) {
                $max = $value;
                $maxCustomer = $eachCustomer;
            }
        }

        return $maxCustomer;

        // print_r($similarMatrix);


        // foreach($total as $key=>$value) {
        //     $ranks[$key]=$value/$simsums[$key];
        // }

        // array_multisort($similarMatrix, SORT_DESC);
        return $similarMatrix;
    }

    public function getRecommendationMatrix()
    {
        global $pdo;

        $sql_delete_same_model_promo = "DELETE FROM PROMOTION WHERE MODEL_ID = :model_id AND COMPANY_ID = :company_id";

        $matrix = array();


        global $pdo;

        $sql = "SELECT * FROM VEHICLE_ORDER";

        $statement = $pdo->prepare($sql);
        // $statement->bindValue(':company_id', $company->COMPANY_ID, PDO::PARAM_INT);
        // $statement->bindValue(':verification_code', $company->VERIFICATION_CODE, PDO::PARAM_STR);
        $statement->execute();
        // $statement->debugDumpParams();
        $results = $statement->fetchAll(PDO::FETCH_CLASS, 'VehicleOrder');

        foreach ($results as $order) {


            if (!is_null($order->RATING)) {
                $matrix[$order->CUSTOMER_ID][$order->VEHICLE_ID] = $order->RATING;
            }
        }

        // print_r($matrix);


        $customer_id = '1123031';
        if (empty($matrix[$customer_id])) {
            return 0;
        }

        // var_dump($matrix['1123068']); echo "<br>";
        $max_customer_id =  $this->getRecommendation($matrix, $customer_id);

        //CC

        global $pdo;
        $sql = "SELECT * FROM VEHICLE AS V JOIN VEHICLE_ORDER AS VOR ON V.VEHICLE_ID=VOR.VEHICLE_ID  WHERE CUSTOMER_ID = :customer_id LIMIT 3";

        $statement = $pdo->prepare($sql);
        $statement->bindValue(':customer_id', $customer->CUSTOMER_ID, PDO::PARAM_INT);
        $statement->execute();

        $results = $statement->fetchAll(PDO::FETCH_CLASS, 'Customer');
        return $results;
    }


    public function addPromotion($promo)
    {


        $sql_delete_same_model_promo = "DELETE FROM PROMOTION WHERE MODEL_ID = :model_id";
        $statement = $pdo->prepare($sql_delete_same_model_promo);
        $statement->bindValue(':model_id', $promo->MODEL_ID);
        $statement->bindValue(':company_id', $promo->COMPANY_ID);
        $statement->execute();


        $sql = "INSERT INTO PROMOTION(DISCOUNT_AMOUNT, EXPIRY_DATE, MODEL_ID, COMPANY_ID) VALUES(:damount, :expiry_date, :model_id, :company_id)";

        $statement = $pdo->prepare($sql);
        $statement->bindValue(':damount', $promo->DISCOUNT_AMOUNT);
        $statement->bindValue(':expiry_date', $promo->EXPIRY_DATE);
        $statement->bindValue(':model_id', $promo->MODEL_ID);
        $statement->bindValue(':company_id', $promo->COMPANY_ID);
        $statement->execute();


        return $id = $pdo->lastInsertId();
    }


    public function getAllAdmins()
    {

        global $pdo;
        $sql = "SELECT * FROM ADMIN";

        $statement = $pdo->prepare($sql);

        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_CLASS, 'Admin');

        return $results;
    }

    public function deleteOldPromotion()
    {
        global $pdo;

        $sql = "DELETE FROM PROMOTION WHERE EXPIRY_DATE < now()";
        $statement = $pdo->prepare($sql);
        $statement->execute();
    }

    public function getAllPromotions()
    {
        // deleteOldPromotion();
        global $pdo;

        $sql = "SELECT * FROM PROMOTION AS P JOIN VEHICLE_MODEL AS VM ON P.MODEL_ID = VM.MODEL_ID ORDER BY PROMOTION_ID DESC";

        $statement = $pdo->prepare($sql);
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_CLASS, 'Promotion');


        return $results;
    }

    public function reducePrice($promotion)
    {

        global $pdo;


        $sql = "UPDATE VEHICLE SET PROMOTIONAL_DAILY_RATE = DAILY_RATE - DAILY_RATE* :discount_amount /100 WHERE MODEL_ID = :model_id AND COMPANY_ID = :company_id";

        $model_id = $promotion->MODEL_ID;
        $company_id = $promotion->COMPANY_ID;
        $discount_amount = $promotion->DISCOUNT_AMOUNT;

        $statement = $pdo->prepare($sql);
        $statement->bindValue(':model_id', $model_id, PDO::PARAM_INT);
        $statement->bindValue(':company_id', $company_id, PDO::PARAM_INT);
        $statement->bindValue(':discount_amount', $discount_amount, PDO::PARAM_INT);

        $statement->execute();
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

    public function getAllCompanyVehicleCount()
    {
        global $pdo;
        $sql = "SELECT VC.COMPANY_NAME, COUNT(V.VEHICLE_ID) AS VEHICLE_COUNT 
        FROM VEHICLE_COMPANY VC LEFT JOIN VEHICLE V on VC.COMPANY_ID = V.COMPANY_ID 
        GROUP BY VC.COMPANY_ID";

        $statement = $pdo->prepare($sql);

        $statement->execute();

        $results = $statement->fetchAll(PDO::FETCH_CLASS, 'Company');

        return $results;
    }
    public function getAllCompanyVehicleSoldCount()
    {
        global $pdo;
        $sql = "SELECT VC.COMPANY_NAME, NEW_TABLE.ORDER_COUNT 
            FROM (SELECT V.COMPANY_ID, COUNT(V_ORDER.ORDER_ID) AS ORDER_COUNT FROM VEHICLE V LEFT JOIN VEHICLE_ORDER V_ORDER on V.VEHICLE_ID = V_ORDER.VEHICLE_ID GROUP BY V.COMPANY_ID) NEW_TABLE 
            LEFT JOIN VEHICLE_COMPANY VC ON NEW_TABLE.COMPANY_ID = VC.COMPANY_ID";

        $statement = $pdo->prepare($sql);

        $statement->execute();

        $results = $statement->fetchAll(PDO::FETCH_CLASS, 'Company');

        return $results;
    }
    public function getAllCompanyVehicleIncome()
    {
        global $pdo;
        $sql = "SELECT VC.COMPANY_NAME, NEW_TABLE.TOTAL_INCOME 
        FROM (SELECT V.COMPANY_ID, COALESCE(SUM(V_ORDER.COST),0) AS TOTAL_INCOME FROM VEHICLE V LEFT JOIN VEHICLE_ORDER V_ORDER on V.VEHICLE_ID = V_ORDER.VEHICLE_ID GROUP BY V.COMPANY_ID) NEW_TABLE 
        LEFT JOIN VEHICLE_COMPANY VC ON NEW_TABLE.COMPANY_ID = VC.COMPANY_ID";

        $statement = $pdo->prepare($sql);

        $statement->execute();

        $results = $statement->fetchAll(PDO::FETCH_CLASS, 'Company');

        return $results;
    }
    public function getAllCustomers()
    {

        global $pdo;
        $sql = "SELECT * FROM CUSTOMERS";

        $statement = $pdo->prepare($sql);

        $statement->execute();

        $results = $statement->fetchAll(PDO::FETCH_CLASS, 'Customer');

        return $results;
    }


    public function removeAllCartItemsOfCustomer($customer)
    {

        global $pdo;

        $sql = "DELETE FROM CART WHERE CUSTOMER_ID = :customer_id";

        $statement = $pdo->prepare($sql);
        $statement->bindValue(':customer_id', $customer->CUSTOMER_ID, PDO::PARAM_INT);


        $statement->execute();
    }


    public function editVehicle($v)
    {

        global $pdo;
        $vid = $v->VEHICLE_ID;
        $mkid = $v->MAKE_ID;
        $mid = $v->MODEL_ID;
        $rate = $v->DAILY_RATE;
        $im = $v->IMAGE;
        $mcap = $v->MAX_CAPACITY;


        $sql = "UPDATE VEHICLE SET MAKE_ID = :mkid, MODEL_ID = :mid, DAILY_RATE = :rate  , MAX_CAPACITY = :mcap WHERE VEHICLE_ID = :vid";

        $statement = $pdo->prepare($sql);
        $statement->bindValue(':vid', $vid, PDO::PARAM_INT);
        $statement->bindValue(':mkid', $mkid, PDO::PARAM_INT);
        $statement->bindValue(':mid', $mid, PDO::PARAM_INT);
        $statement->bindValue(':rate', $rate);
        $statement->bindValue(':mcap', $mcap, PDO::PARAM_INT);
        //    $statement->debugDumpParams();

        $statement->execute();
    }

    public function deleteVehicle($vehicle)
    {

        global $pdo;
        $sql = "DELETE FROM VEHICLE WHERE VEHICLE_ID=:vehicle_id";

        $statement = $pdo->prepare($sql);
        $statement->bindValue(':vehicle_id', $vehicle->VEHICLE_ID, PDO::PARAM_INT);
        $statement->execute();
    }


    public function getVehicleOrders($vehicle)
    {

        global $pdo;
        $sql = "SELECT CONTACT_NAME, ADDRESS, EMAIL_ADDRESS, CONTACT_NUMBER, BOOKING_DATE, RENT_FROM, RENT_TO FROM CUSTOMERS AS C JOIN VEHICLE_ORDER AS VOR ON C.CUSTOMER_ID = VOR.CUSTOMER_ID WHERE VEHICLE_ID = :vehicle_id ORDER BY BOOKING_DATE DESC";

        $statement = $pdo->prepare($sql);
        $statement->bindValue(':vehicle_id', $vehicle->VEHICLE_ID, PDO::PARAM_INT);
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_CLASS, 'VehicleOrder');

        return $results;
    }

    public function getSingleBus($b)
    {

        global $pdo;
        $sql = "SELECT * FROM VEHICLE AS V JOIN VEHICLE_MODEL AS VM JOIN VEHICLE_MAKE AS VMK ON V.MAKE_ID = VMK.MAKE_ID AND VM.MODEL_ID = V.MODEL_ID WHERE VEHICLE_ID = :vid";

        $statement = $pdo->prepare($sql);
        $statement->bindValue(':vid', $b->VEHICLE_ID, PDO::PARAM_INT);
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_CLASS, 'Bus');

        return $results;
    }



    public function addVehicle($v)
    {

        global $pdo;

        $mkid = $v->MAKE_ID;
        $mid = $v->MODEL_ID;
        $rate = $v->DAILY_RATE;
        $im = $v->IMAGE;
        $mcap = $v->MAX_CAPACITY;
        $company_id = $v->COMPANY_ID;


        $sql = "INSERT INTO VEHICLE (MAKE_ID, MODEL_ID, DAILY_RATE, IMAGE, MAX_CAPACITY, COMPANY_ID, PROMOTIONAL_DAILY_RATE) VALUES(:mkid, :mid, :rate, :im, :mcap, :company_id, :rate)";

        $statement = $pdo->prepare($sql);

        $statement->bindValue(':mkid', $mkid, PDO::PARAM_INT);
        $statement->bindValue(':mid', $mid, PDO::PARAM_INT);
        $statement->bindValue(':rate', $rate);
        $statement->bindValue(':im', $im, PDO::PARAM_STR);
        $statement->bindValue(':mcap', $mcap, PDO::PARAM_INT);
        $statement->bindValue(':company_id', $company_id, PDO::PARAM_INT);


        //    $statement->debugDumpParams();
        $statement->execute();

        $id = $pdo->lastInsertId();


        return $id;
    }
    public function updateVehicleImage($v)
    {
        global $pdo;

        $sql = "UPDATE VEHICLE SET IMAGE=:image WHERE VEHICLE_ID=:vehicle_id";


        $statement = $pdo->prepare($sql);

        $statement->bindValue(':vehicle_id', $v->VEHICLE_ID, PDO::PARAM_INT);
        $statement->bindValue(':image', $v->IMAGE, PDO::PARAM_STR);
        //    $statement->debugDumpParams();
        $statement->execute();
    }

    public function addVehicleOrder($orderObj)
    {

        global $pdo;

        $sql = "INSERT INTO VEHICLE_ORDER(CUSTOMER_ID, VEHICLE_ID, BOOKING_DATE, RENT_FROM,  RENT_TO, COST) VALUES(:customer_id, :vehicle_id, :booking_date, :date_from, :date_to, :cost)";

        $statement = $pdo->prepare($sql);
        $statement->bindValue(':customer_id', $orderObj->CUSTOMER_ID, PDO::PARAM_INT);
        $statement->bindValue(':vehicle_id', $orderObj->VEHICLE_ID, PDO::PARAM_INT);
        $statement->bindValue(':booking_date', $orderObj->BOOKING_DATE);
        $statement->bindValue(':date_from', $orderObj->DATE_FROM);
        $statement->bindValue(':date_to', $orderObj->DATE_TO);
        $statement->bindValue(':cost', $orderObj->COST);

        return $statement->execute();
    }


    public function getMyAllBooking($vehicle_order)
    {

        global $pdo;
        $sql = "SELECT * FROM VEHICLE_ORDER AS VOR JOIN `VEHICLE` AS V JOIN VEHICLE_MODEL AS VM JOIN  VEHICLE_MAKE AS VMK  ON  VMK.MAKE_ID = V.MAKE_ID AND  V.MODEL_ID = VM.MODEL_ID AND VOR.VEHICLE_ID = V.VEHICLE_ID WHERE VOR.CUSTOMER_ID = :customer_id ORDER BY VOR.BOOKING_DATE DESC";



        $statement = $pdo->prepare($sql);
        $statement->bindValue(':customer_id', $vehicle_order->CUSTOMER_ID, PDO::PARAM_INT);

        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_CLASS, 'Bus');



        return $results;
    }


    public function getAllMakes()
    {

        global $pdo;
        $sql = "SELECT * FROM VEHICLE_MAKE ORDER BY MAKE_ID DESC";

        $statement = $pdo->prepare($sql);
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_CLASS, 'Make');

        //    print_r($results);
        return $results;
    }

    public function getAllModels()
    {

        global $pdo;
        $sql = "SELECT * FROM VEHICLE_MODEL ORDER BY MODEL_ID DESC";

        $statement = $pdo->prepare($sql);
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_CLASS, 'Model');

        //    print_r($results);
        return $results;
    }



    public function getAllBooking()
    {

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
        $sql = "SELECT *, (SELECT AVG(RATING)  FROM VEHICLE_ORDER WHERE VEHICLE_ID=V.VEHICLE_ID) AS RATING FROM VEHICLE AS V JOIN VEHICLE_MODEL AS VM  JOIN VEHICLE_MAKE AS VMK JOIN VEHICLE_COMPANY AS VCM ON  VMK.MAKE_ID = V.MAKE_ID AND  V.MODEL_ID = VM.MODEL_ID  AND VCM.COMPANY_ID = V.COMPANY_ID WHERE  DAILY_RATE BETWEEN :rate_min AND :rate_max AND V.MAX_CAPACITY >= :cap AND
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
        // var_dump($results);


        return $results;
    }

    public function getSearchedBus($bus)
    {

        global $pdo;
        $sql = "SELECT *, (SELECT AVG(RATING)  FROM VEHICLE_ORDER WHERE VEHICLE_ID=V.VEHICLE_ID) AS RATING FROM `VEHICLE` AS V JOIN VEHICLE_MODEL AS VM  JOIN VEHICLE_MAKE AS VMK JOIN VEHICLE_COMPANY AS VCM ON  VMK.MAKE_ID = V.MAKE_ID AND  V.MODEL_ID = VM.MODEL_ID  AND VCM.COMPANY_ID = V.COMPANY_ID WHERE  DAILY_RATE BETWEEN :rate_min AND :rate_max AND V.MAX_CAPACITY >= :cap AND
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
        // var_dump($results);


        return $results;
    }




    public function getBusOfCompany($bus)
    {

        global $pdo;
        $sql = "SELECT * FROM `VEHICLE` AS V JOIN VEHICLE_MODEL AS VM  JOIN VEHICLE_MAKE AS VMK JOIN VEHICLE_COMPANY AS VCM ON  VMK.MAKE_ID = V.MAKE_ID AND  V.MODEL_ID = VM.MODEL_ID  AND VCM.COMPANY_ID = V.COMPANY_ID WHERE  
        V.COMPANY_ID = :company_id";

        $statement = $pdo->prepare($sql);
        $statement->bindValue(':company_id', $bus->COMPANY_ID, PDO::PARAM_INT);


        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_CLASS, 'Bus');



        return $results;
    }


    public function loginAttempt($cust)
    {

        global $pdo;
        $sql = "SELECT * FROM CUSTOMERS WHERE EMAIL_ADDRESS = :email AND PASSWORD = :password AND VERIFICATION_CODE IS NULL AND BLOCKED = 0";

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
        $statement = $pdo->query("SELECT * FROM VEHICLE AS V JOIN VEHICLE_MODEL AS VM JOIN VEHICLE_MAKE AS VMK JOIN VEHICLE_COMPANY AS VCM ON V.MAKE_ID = VMK.MAKE_ID AND V.COMPANY_ID = VCM.COMPANY_ID AND VM.MODEL_ID = V.MODEL_ID ");
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

    public function sendEmail($customer)
    {
        if (get_class($customer) == "Customer") {
            $email = new Email($customer->CUSTOMER_ID, $customer->EMAIL_ADDRESS, $customer->VERIFICATION_CODE, 1);
        } else {
            $email = new Email($customer->COMPANY_ID, $customer->EMAIL_ADDRESS, $customer->VERIFICATION_CODE, 0);
        }

        // var_dump($email);
        $email->sendEmail();
    }

    public function addCustomer($customer)
    {

        global $pdo;
        $sql = "INSERT INTO CUSTOMERS(CONTACT_NAME, ADDRESS, EMAIL_ADDRESS, CONTACT_NUMBER, PASSWORD, VERIFICATION_CODE) VALUES(:c_name, :address, :email, :phone, :password, :verification_code)";

        $statement = $pdo->prepare($sql);
        $statement->bindValue(':c_name', $customer->CONTACT_NAME, PDO::PARAM_STR);
        $statement->bindValue(':address', $customer->ADDRESS, PDO::PARAM_STR);
        $statement->bindValue(':email', $customer->EMAIL_ADDRESS, PDO::PARAM_STR);
        $statement->bindValue(':phone', $customer->CONTACT_NUMBER, PDO::PARAM_STR);
        $statement->bindValue(':password', $customer->PASSWORD, PDO::PARAM_STR);
        $statement->bindValue(':verification_code', $customer->VERIFICATION_CODE, PDO::PARAM_STR);


        $statement->execute();



        $id = $pdo->lastInsertId();



        $customer->CUSTOMER_ID = $id;
        $this->sendEmail($customer);
        return $id;
    }


    public function addCompany($company)
    {

        global $pdo;
        $sql = "INSERT INTO VEHICLE_COMPANY(COMPANY_NAME, ADDRESS, EMAIL_ADDRESS, CONTACT_NUMBER, PASSWORD, VERIFICATION_CODE) VALUES(:c_name, :address, :email, :phone, :password, :verification_code)";

        $statement = $pdo->prepare($sql);
        $statement->bindValue(':c_name', $company->COMPANY_NAME, PDO::PARAM_STR);
        $statement->bindValue(':address', $company->ADDRESS, PDO::PARAM_STR);
        $statement->bindValue(':email', $company->EMAIL_ADDRESS, PDO::PARAM_STR);
        $statement->bindValue(':phone', $company->CONTACT_NUMBER, PDO::PARAM_STR);
        $statement->bindValue(':password', $company->PASSWORD, PDO::PARAM_STR);
        $statement->bindValue(':verification_code', $company->VERIFICATION_CODE, PDO::PARAM_STR);

        $statement->execute();


        $id = $pdo->lastInsertId();

        $company->COMPANY_ID = $id;
        $this->sendEmail($company);

        return $id;
    }

    public function updateRating($vehicle_order)
    {

        global $pdo;
        $sql = "UPDATE VEHICLE_ORDER SET RATING=:rating, REVIEW=:review WHERE ORDER_ID=:order_id";

        $statement = $pdo->prepare($sql);
        $statement->bindValue(':rating', $vehicle_order->RATING, PDO::PARAM_STR);
        $statement->bindValue(':review', $vehicle_order->REVIEW, PDO::PARAM_STR);
        $statement->bindValue(':order_id', $vehicle_order->ORDER_ID, PDO::PARAM_STR);

        $statement->execute();
    }
}
