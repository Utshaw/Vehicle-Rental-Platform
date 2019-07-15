<?php

require_once '../../model/dbconnection.php';
require_once '../../model/bus.php';
require_once '../../model/bus_model.php';
require_once '../../model/bus_make.php';

require_once '../../model/dataAccess.php';


$daoObject = DAO::getInstance();

if(isset($_POST['make']) && isset($_POST['model']) && isset($_POST['rate']) && isset($_POST['mcap'])  && isset($_POST['vid'])){

    $make_id = htmlentities($_POST['make']);
    $model_id =  htmlentities($_POST['model']);
    $rate =  htmlentities($_POST['rate']);
    $max_capacity = htmlentities($_POST['mcap']);
    $vid = htmlentities($_POST['vid']);

    $v = new Bus();
    $v->MAKE_ID = $make_id;
    $v->MODEL_ID = $model_id;
    $v->DAILY_RATE = $rate;
    $v->MAX_CAPACITY = $max_capacity;
    $v->VEHICLE_ID = $vid;

    $daoObject->editVehicle($v);

    if($_POST["fileToUpload"]){
        $daoObject->updateVehicleImage($v);
        //uploadImage($v->VEHICLE_ID);

    }
    



    header("location:./dashboard.php?alert_header=Notice&alert_body="."Vehicle with id: ". $vid . " updated");
}

if(isset($_GET["vehicle_id"])){


    $vehicle_id = $_GET["vehicle_id"];

    $b = new Bus();
    $b->VEHICLE_ID =  htmlentities($vehicle_id);

    $result = $daoObject->getSingleBus($b)[0];


    $bus_models = $daoObject->getAllModels();


    $makes = $daoObject->getAllMakes();



}




