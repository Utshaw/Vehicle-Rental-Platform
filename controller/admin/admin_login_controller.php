<?php


session_start();

require_once '../../model/dbconnection.php';
require_once '../../model/dataAccess.php';

$message = "";

$daoObject = DAO::getInstance();



if(isset($_SESSION["admin_id"])){
    header("location:dashboard.php");

}else{
    if(isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        if(empty($email) || empty($password)){
            $message = "Please fill up email and password";
        }else{
            $admin = new Admin();
            $admin->EMAIL_ADDRESS = $email;
            $admin->PASSWORD = $password;
            $results  = $daoObject->adminLoginAttempt($admin);


            if(count($results) > 0){
                $admin_id = $results[0]->ADMIN_ID;
                $admin_email = $results[0]->EMAIL_ADDRESS;

                $_SESSION["admin_email"] = $admin_email;
                $_SESSION["admin_id"] = $admin_id;
                header("location:dashboard.php");

            }else{
                $message = "Incorrect email or password!";
            }



        }

    }
}

