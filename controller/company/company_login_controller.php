<?php


session_start();

require_once '../../model/dbconnection.php';
require_once '../../model/dataAccess.php';

$message = "";

$daoObject = DAO::getInstance();



if(isset($_SESSION["company_id"])){
    header("location:dashboard.php");

}else{
    if(isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        if(empty($email) || empty($password)){
            $message = "Please fill up email and password";
        }else{
            $company = new Company();
            $company->EMAIL_ADDRESS = $email;
            $company->PASSWORD = $password;
            $results  = $daoObject->companyLoginAttempt($company);


            if(count($results) > 0){
                $company_id = $results[0]->COMPANY_ID;
                $company_email = $results[0]->EMAIL_ADDRESS;

                $_SESSION["company_email"] = $company_email;
                $_SESSION["company_id"] = $company_id;
                header("location:dashboard.php");

            }else{
                $message = "Incorrect email or password!";
            }



        }

    }
}

