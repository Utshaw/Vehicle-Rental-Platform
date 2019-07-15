<?php

require_once '../../model/dbconnection.php';
require_once '../../model/bus.php';
require_once '../../model/bus_model.php';
require_once '../../model/bus_make.php';

require_once '../../model/dataAccess.php';





if (isset($_POST['v_delete_id'])) {
    $daoObject = DAO::getInstance();
    $v_delete_id = $_POST['v_delete_id'];
    $v = new Bus();
    $v->VEHICLE_ID = $v_delete_id;

    $daoObject->deleteVehicle($v);

    header("location:./dashboard.php?alert_header=Notice&alert_body=" . "Vehicle with id: " . $v_delete_id . " deleted");
}
