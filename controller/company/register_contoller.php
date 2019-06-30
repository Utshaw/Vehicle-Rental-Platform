<?php



session_start();

require_once '../../model/dbconnection.php';
require_once '../../model/dataAccess.php';



$message = "";

$daoObject = DAO::getInstance();



if(isset($_SESSION["company_id"])){
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


            $company = new Company();
            $company->COMPANY_NAME = $name;
            $company->ADDRESS = $address;
            $company->CONTACT_NUMBER = $phone;
            $company->EMAIL_ADDRESS = $email;
            $company->PASSWORD = $password;
            $results  = $daoObject->checkEmailValidityCompany($company);


            if(count($results) != 0){

                $message = "This email is already used for another account";

            }else{

                $last_id = $daoObject->addCompany($company);

                $_SESSION["company_name"] = $name;
                $_SESSION["company_id"] = $last_id;
                header("location:../../view/company/dashboard.php");
            }



        }

    }
}
