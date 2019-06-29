<?php

session_start();

if(isset($_SESSION["company_id"])){
    $session_company_id = $_SESSION["company_id"];
    $session_company_name = $_SESSION["company_name"];
}
