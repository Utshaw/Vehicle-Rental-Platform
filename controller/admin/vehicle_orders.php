<?php

require_once '../../model/dbconnection.php';
require_once '../../model/vehicle_order.php';
require_once '../../model/dataAccess.php';


$results = [];

$daoObject = DAO::getInstance();

$vehicle_id  = 0;

if(isset($_GET['vehicle_id'])){

    $vehicle = new VehicleOrder();
    $vehicle_id = $_GET['vehicle_id'];
    $vehicle->VEHICLE_ID = $vehicle_id;

    $results = $daoObject->getVehicleOrders($vehicle);

}



