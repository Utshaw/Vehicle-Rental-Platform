<?php

require_once '../model/dbconnection.php';
require_once '../model/company.php';
require_once '../model/dataAccess.php';

$companies = [];



$vehicleCompany = new VehicleCompany();

$daoObject = DAO::getInstance();

$companies = $daoObject->getAllCompanies();




