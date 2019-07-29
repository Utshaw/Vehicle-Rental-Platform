<?php



require_once '../model/dbconnection.php';
require_once "../model/customer.php";
require_once "../model/vehicle_order.php";
require_once '../model/dataAccess.php';



$daoObject = DAO::getInstance();

$customer = new Customer();
var_dump($daoObject->getRecommendationMatrix());







?>