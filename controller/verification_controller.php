<?php 


session_start();


require_once '../model/dbconnection.php';
require_once '../model/dataAccess.php';
require_once '../model/customer.php';

$message = "";

$daoObject = DAO::getInstance();

if(isset($_SESSION["customer_id"])){
    header("location:index.php");

}else {

    if(isset($_GET['customer_id']) && isset($_GET['code'])  ) {
        $customer_id = $_GET['customer_id'];
        $code = $_GET['code'];
        if(empty($customer_id) || empty($code)){
            $message = "Invalid registration format";

        }else{
            $customer = new Customer();
            $customer->CUSTOMER_ID = htmlentities($customer_id);
            $customer->VERIFICATION_CODE = htmlentities($code);
            
            $results  = $daoObject->getCustomerWithVerificationCode($customer);
            if(count($results) > 0){
                
                $daoObject->setCustomerVerificationCodeNull($customer);
                // var_dump($results);
                $_SESSION["customer_name"] = $results[0]->CONTACT_NAME;
                $_SESSION["customer_id"] = $customer_id;
                header("location:index.php");

            }else{
                $message = "Incorrect registration format";
            }
        }


    }else{
        $message = "Incorrect registration format";
    }

}