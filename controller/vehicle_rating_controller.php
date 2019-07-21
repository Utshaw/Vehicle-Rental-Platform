<?php

require_once '../model/dbconnection.php';
require_once '../model/bus.php';
require_once '../model/dataAccess.php';



if(  isset($_POST["order_id"])){

    $order_id =  htmlentities($_POST["order_id"]);

    $rating = 5;
    $review = "";
    if(isset($_COOKIE["rating"])){
        $rating = htmlentities($_COOKIE["rating"]);
    }
    if(isset($_POST["review"])){
        $review = htmlentities($_POST["review"]);
    }
    
   
    $vehicle_order = new VehicleOrder();
    $vehicle_order->ORDER_ID = $order_id;
    $vehicle_order->RATING = $rating;
    $vehicle_order->REVIEW = $review;

    $daoObject = DAO::getInstance();

   $daoObject->updateRating($vehicle_order);
   header("location: http://localhost/VRP/view/booking.php");
}
else{
  //  echo "here";

}

?>
