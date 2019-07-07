<?php

require_once '../../model/dbconnection.php';
require_once '../../model/customer.php';
require_once '../../model/dataAccess.php';


$daoObject = DAO::getInstance();

if(isset($_GET['customer_id']) && isset($_GET['block'])) {
    $customer_id  = $_GET['customer_id'];
    $block =  $_GET['block'];
    
    $customer = new Customer();
    $customer->CUSTOMER_ID = $customer_id;
    $customer->BLOCKED = $block;
    $daoObject->changeCustomerBlockValue($customer);



}


$results = $daoObject->getAllCustomers();




