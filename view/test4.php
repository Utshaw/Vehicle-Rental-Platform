<?php



require_once '../model/dbconnection.php';
require_once "../model/customer.php";
require_once "../model/vehicle_order.php";
require_once '../model/dataAccess.php';



$daoObject = DAO::getInstance();

$customer = new Customer();
$customer->CUSTOMER_ID=1123031;
$recommends = $daoObject->getRecommendationMatrix($customer);
$total_rec_result = count($recommends );

?>