<?php


session_start();

require_once '../model/dbconnection.php';
require_once '../model/dataAccess.php';

$message = "";

$daoObject = DAO::getInstance();



if(isset($_SESSION["customer_id"])){
    header("location:index.php");

}else{
    if(isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        if(empty($email) || empty($password)){
            $message = "Please fill up email and password";
        }else{
            $customer = new Customer();
            $customer->EMAIL_ADDRESS = $email;
            $customer->PASSWORD = $password;
            $results  = $daoObject->loginAttempt($customer);


            if(count($results) > 0){
                $customer_id = $results[0]->CUSTOMER_ID;
                $customer_name = $results[0]->CONTACT_NAME;

                $_SESSION["customer_name"] = $customer_name;
                $_SESSION["customer_id"] = $customer_id;
                header("location:index.php");

            }else{
                $message = "Incorrect email or password!";
            }



        }

    }
}

