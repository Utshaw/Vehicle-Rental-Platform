<?php

require_once '../model/dbconnection.php';
require_once '../model/cart.php';
require_once '../model/dataAccess.php';

$daoObject = DAO::getInstance();

if (isset($_POST['checkout_arr'])) {


    $checkoutArr = $_POST['checkout_arr'];

    $lastIndex = 1;
    $customer_id = $checkoutArr[$lastIndex]['customer_id'];


    $retVal = true;

    $rslt = 0;

    $vehicle_id = $checkoutArr[0]['id'];
    $booking_date = $checkoutArr[0]['date'];

    $cart = new Cart();
    $cart->CUSTOMER_ID = htmlentities($customer_id);
    $cart->VEHICLE_ID = htmlentities($vehicle_id);
    $cart->BOOKING_DATE = htmlentities($booking_date);

    $rslt = $daoObject->addCartItem($cart);


    /*This echo is for communication channel with the client side*/
    echo $rslt;


}

