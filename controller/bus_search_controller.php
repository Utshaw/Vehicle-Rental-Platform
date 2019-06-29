<?php

require_once '../model/dbconnection.php';
require_once '../model/bus.php';
require_once '../model/dataAccess.php';

$results = [];


if(isset($_GET['num_passengers'])
    && isset($_GET['date'])
    && isset($_GET['company'])
    && isset($_GET['min_cost'])
    && isset($_GET['max_cost'])){

    $bus = new Bus();
    $num_passengers = $_GET['num_passengers'];
    $date= $_GET['date'];
    $min_cost= $_GET['min_cost'];
    $max_cost= $_GET['max_cost'];
    $company = $_GET['company'];

    $bus->MIN_COST = $min_cost;
    $bus->MAX_COST = $max_cost;
    $bus->MAX_CAPACITY = $num_passengers;
    $bus->DATE_REQUIRED = $date;
    $bus->COMPANY_ID = $company;

    $daoObject = DAO::getInstance();

    if($bus->COMPANY_ID == -1){
        $results = $daoObject->getSearchedBusAllCompany($bus);
    }else{
        $results = $daoObject->getSearchedBus($bus);
    }
    


    $num_buses = 0;
    $total_result = count($results);




    require_once "../view/bus_list_view.php";


}









?>
