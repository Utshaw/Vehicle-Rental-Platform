<?php

session_start();

if(isset($_SESSION["customer_id"])){
    $session_customer_id = $_SESSION["customer_id"];
    $session_customer_name = $_SESSION["customer_name"];

}
