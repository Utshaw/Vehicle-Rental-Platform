<?php
/**
 * Created by PhpStorm.
 * User: utshaw
 * Date: 5/12/19
 * Time: 11:59 PM
 */



require_once '../model/dbconnection.php';
require_once '../model/bus.php';
require_once '../model/dataAccess.php';

$daoObject = DAO::getInstance();

$results = [];

$bus = new Bus();
$results = $daoObject->getAllBuses();

