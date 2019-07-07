<?php

require_once '../../model/dbconnection.php';
require_once '../../model/bus.php';
require_once '../../model/dataAccess.php';

$daoObject = DAO::getInstance();
$results = $daoObject->getAllBooking();




