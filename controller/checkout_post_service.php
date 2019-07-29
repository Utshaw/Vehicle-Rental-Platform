<?php

require_once '../model/dbconnection.php';
require_once '../model/vehicle_order.php';
require_once '../model/customer.php';
require_once '../model/dataAccess.php';

$daoObject = DAO::getInstance();

if(isset($_POST['checkout_arr'])){


    $checkoutArr = $_POST['checkout_arr'];

    $lastIndex = count($checkoutArr) - 1;
    $customer_id = $checkoutArr[$lastIndex]['customer_id'];


    $retVal = true;

    for($i = 0; $i < count($checkoutArr) - 1; $i++){
        $vehicle_id = $checkoutArr[$i]['id'];
        $booking_date = $checkoutArr[$i]['date'];
        $date_from = $checkoutArr[$i]['date_from'];
        $date_to = $checkoutArr[$i]['date_to'];

        $order = new VehicleOrder();
        $order->CUSTOMER_ID =  htmlentities($customer_id);
        $order->VEHICLE_ID =  htmlentities($vehicle_id);
        $order->BOOKING_DATE =  htmlentities($booking_date);
        $order->DATE_FROM =  htmlentities($date_from);
        $order->DATE_TO =  htmlentities($date_to);
        $order->COST = htmlentities($checkoutArr[$i]['total']);

        $rslt =  $daoObject->addVehicleOrder($order);

        if($rslt == false){
            $retVal = false;
        }
    }

    $customer = new Customer();
    $customer->CUSTOMER_ID = $customer_id;

    // if($retVal == true){

    //     $daoObject->removeAllCartItemsOfCustomer($customer);
    // }


    /*This echo is for communication channel with the client side*/
    echo $retVal;


}

