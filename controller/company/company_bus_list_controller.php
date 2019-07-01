<?php

require_once '../../model/dbconnection.php';
require_once '../../model/bus.php';
require_once '../../model/dataAccess.php';

$daoObject = DAO::getInstance();
$bus = new Bus();

$bus->COMPANY_ID = $_SESSION['company_id'];

$results = $daoObject->getBusOfCompany($bus);




