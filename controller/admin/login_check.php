<?php

session_start();

if(isset($_SESSION["admin_id"])){

    $session_admin_id = $_SESSION["admin_id"];
    $session_admin_email = $_SESSION["admin_email"];
}else{
    header("Location: ../../view/admin/login.php");
}

