<?php

require_once '../../model/dbconnection.php';
// require_once '../../model/promotion.php';
require_once '../../model/company.php';
require_once '../../model/dataAccess.php';


$daoObject = DAO::getInstance();

$results1 = $daoObject->getAllCompanyVehicleCount();
$results2 = $daoObject->getAllCompanyVehicleSoldCount();
$results3 = $daoObject->getAllCompanyVehicleIncome();
$results4 = $daoObject->getTotalRevenue();
$results5 = $daoObject->getRevenueThisMonth();

