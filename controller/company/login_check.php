<?php

session_start();

if(isset($_SESSION["company_id"])){

    $session_admin_id = $_SESSION["company_id"];
    $session_admin_email = $_SESSION["company_email"];
}
