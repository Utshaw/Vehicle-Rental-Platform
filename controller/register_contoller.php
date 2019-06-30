<?php



session_start();

require_once '../../model/dbconnection.php';
require_once '../../model/dataAccess.php';



$message = "";

$daoObject = DAO::getInstance();



if(isset($_SESSION["customer_id"])){
    header("location:index.php");

}else{
    if(isset($_POST['email']) && isset($_POST['password'])  && isset($_POST['address'])  && isset($_POST['name']) && isset($_POST['phone'])) {

        $name = htmlentities($_POST['name']);
        $address = htmlentities($_POST['address']);
        $phone = htmlentities($_POST['phone']);
        $email = htmlentities($_POST['email']);
        $password = htmlentities($_POST['password']);

        if(empty($email) || empty($password) || empty($name)  || empty($address)  || empty($phone) ){


            $message = "Please fill up email and password";
        }else{


            $customer = new Customer();
            $customer->CONTACT_NAME = $name;
            $customer->ADDRESS = $address;
            $customer->CONTACT_NUMBER = $phone;
            $customer->EMAIL_ADDRESS = $email;
            $customer->PASSWORD = $password;
            $results  = $daoObject->checkEmailValidity($customer);


            if(count($results) != 0){

                $message = "This email is already used for another account";

            }else{

                $last_id = $daoObject->addCustomer($customer);

                $_SESSION["customer_name"] = $name;
                $_SESSION["customer_id"] = $last_id;
                header("location:index.php");
            }



        }

    }
}
