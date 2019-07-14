<?php

require_once '../model/dbconnection.php';
require_once '../model/bus.php';
require_once '../model/bus_model.php';
require_once '../model/bus_make.php';
require_once '../model/license.php';

require_once '../model/dataAccess.php';


$daoObject = DAO::getInstance();

if(isset($_POST['make']) && isset($_POST['model']) && isset($_POST['rate']) && isset($_POST['mcap']) && isset($_POST['license']) && isset($_POST['vid'])){

    $make_id = htmlentities($_POST['make']);
    $model_id =  htmlentities($_POST['model']);
    $rate =  htmlentities($_POST['rate']);
    $max_capacity = htmlentities($_POST['mcap']);
    $license_id = htmlentities($_POST['license']);
    $vid = htmlentities($_POST['vid']);

    $v = new Bus();
    $v->MAKE_ID = $make_id;
    $v->MODEL_ID = $model_id;
    $v->DAILY_RATE = $rate;
    $v->MAX_CAPACITY = $max_capacity;
    $v->LICENSE_REQUIRED = $license_id;
    $v->VEHICLE_ID = $vid;

    $daoObject->editVehicle($v);



    header("location:./admin_bus_list.php?alert_header=Notice&alert_body="."Vehicle with id: ". $vid . " updated");
}

if(isset($_GET["vehicle_id"])){


    $vehicle_id = $_GET["vehicle_id"];

    $b = new Bus();
    $b->VEHICLE_ID =  htmlentities($vehicle_id);

    $result = $daoObject->getSingleBus($b)[0];


    $bus_models = $daoObject->getAllModels();

    $licenses = $daoObject->getAllLicenses();

    $makes = $daoObject->getAllMakes();




    require_once "../view/admin_vehicle_edit.php";

}




