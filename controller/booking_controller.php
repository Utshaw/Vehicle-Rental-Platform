<?php


require_once "../controller/login_check.php";
require_once '../model/dbconnection.php';
require_once '../model/bus.php';
require_once '../model/vehicle_order.php';
require_once '../model/dataAccess.php';



$vehicleOrder = new VehicleOrder();

$vehicleOrder->CUSTOMER_ID = $session_customer_id;

$daoObject = DAO::getInstance();

$results = $daoObject->getMyAllBooking($vehicleOrder);











