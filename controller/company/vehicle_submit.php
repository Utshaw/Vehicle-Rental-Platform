<?php
require_once '../../model/dbconnection.php';
require_once '../../model/bus.php';
require_once '../../model/bus_model.php';
require_once '../../model/bus_make.php';
require_once '../../model/dataAccess.php';


session_start();

$daoObject = DAO::getInstance();


$bus_models = $daoObject->getAllModels();

    $makes = $daoObject->getAllMakes();

if(isset($_POST['make'])) {
    $make_id = htmlentities($_POST['make']);
    $model_id =  htmlentities($_POST['model']);
    $rate =  htmlentities($_POST['rate']);
    $max_capacity = htmlentities($_POST['mcap']);

    $v = new Bus();
    $v->MAKE_ID = $make_id;
    $v->MODEL_ID = $model_id;
    $v->DAILY_RATE = $rate;
    $v->IMAGE = "default.jpg";
    $v->LICENSE_REQUIRED = $license_id;
    $v->MAX_CAPACITY = $max_capacity;
    $v->COMPANY_ID = $_SESSION['company_id'];
    

    $lastId = $daoObject->addVehicle($v);



    header("location:../../view/company/dashboard.php?alert_header=Notice&alert_body="."A new vehicle with id: ". $lastId . " added");
}




?>