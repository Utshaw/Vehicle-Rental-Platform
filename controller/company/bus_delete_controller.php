<?php

require_once '../../model/dbconnection.php';
require_once '../../model/bus.php';
require_once '../../model/bus_model.php';
require_once '../../model/bus_make.php';

require_once '../../model/dataAccess.php';



$daoObject = DAO::getInstance();




header("location:./dashboard.php?alert_header=Notice&alert_body="."Vehicle with id: ". $vid . " deleted");