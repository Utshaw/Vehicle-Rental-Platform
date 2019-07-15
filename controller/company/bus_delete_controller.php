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
    $v->IMAGE = $v->VEHICLE_ID . ".jpg";
    $daoObject->deleteVehicle($v);

    deleteImage($v->IMAGE);
    


    header("location:../../view/company/dashboard.php?alert_header=Notice&alert_body=" . "Vehicle with id: " . $v_delete_id . " deleted");
}else{
    
}


function deleteImage($IMAGE)
{
    //echo "inside dele"
    $target_dir = "../../images/";
    $target_file = $target_dir . "/" . $IMAGE;

    // Check if file already exists
    if (file_exists($target_file)) {
        unlink($target_file);
        echo 'File ' . $IMAGE . ' has been deleted';
    } else {
        echo 'Could not delete ' . $IMAGE . ', file does not exist';
    }
}
