<?php



require_once '../model/dbconnection.php';
require_once "../model/vehicle_order.php";
require_once '../model/dataAccess.php';



$daoObject = DAO::getInstance();
$daoObject->getRecommendationMatrix();







?>