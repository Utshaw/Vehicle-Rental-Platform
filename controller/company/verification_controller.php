<?php 


session_start();


require_once '../model/dbconnection.php';
require_once '../model/dataAccess.php';
require_once '../model/company.php';

$message = "";

$daoObject = DAO::getInstance();

if(isset($_SESSION["company_id"])){
    header("location:index.php");

}else {

    if(isset($_GET['company_id']) && isset($_GET['code'])  ) {
        $company_id = $_GET['company_id'];
        $code = $_GET['code'];
        if(empty($company_id) || empty($code)){
            $message = "Invalid registration format";

        }else{
            $company = new company();
            $company->company_ID = htmlentities($company_id);
            $company->VERIFICATION_CODE = htmlentities($code);
            
            $results  = $daoObject->getCompanyWithVerificationCode($company);
            if(count($results) > 0){
                
                $daoObject->setCompanyVerificationCodeNull($company);
                // var_dump($results);
                $_SESSION["company_name"] = $results[0]->COMPANY_NAME;
                $_SESSION["company_id"] = $company_id;
                header("location:index.php");

            }else{
                $message = "Incorrect registration format";
            }
        }


    }else{
        $message = "Incorrect registration format";
    }

}