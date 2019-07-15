<?php

require_once '../../model/dbconnection.php';
require_once '../../model/bus.php';
require_once '../../model/bus_model.php';
require_once '../../model/bus_make.php';

require_once '../../model/dataAccess.php';


$daoObject = DAO::getInstance();

if (isset($_POST['make']) && isset($_POST['model']) && isset($_POST['rate']) && isset($_POST['mcap'])  && isset($_POST['vid'])) {

    $make_id = htmlentities($_POST['make']);
    $model_id =  htmlentities($_POST['model']);
    $rate =  htmlentities($_POST['rate']);
    $max_capacity = htmlentities($_POST['mcap']);
    $vid = htmlentities($_POST['vid']);

    $v = new Bus();
    $v->MAKE_ID = $make_id;
    $v->MODEL_ID = $model_id;
    $v->DAILY_RATE = $rate;
    $v->MAX_CAPACITY = $max_capacity;
    $v->VEHICLE_ID = $vid;
    $v->IMAGE = $vid . ".jpg";

    $daoObject->editVehicle($v);

    if (isset($_FILES["fileToUpload"]["name"])) {
        $daoObject->updateVehicleImage($v);
        deleteImage($v->IMAGE);
        uploadImage($v->VEHICLE_ID);
    }




    header("location:./dashboard.php?alert_header=Notice&alert_body=" . "Vehicle with id: " . $vid . " updated");
}

if (isset($_GET["vehicle_id"])) {


    $vehicle_id = $_GET["vehicle_id"];

    $b = new Bus();
    $b->VEHICLE_ID =  htmlentities($vehicle_id);

    $result = $daoObject->getSingleBus($b)[0];


    $bus_models = $daoObject->getAllModels();


    $makes = $daoObject->getAllMakes();
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

function uploadImage($VEHICLE_ID)
{

    $target_dir = "../../images/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    // if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
    // }
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        $new_file_name = $VEHICLE_ID . ".jpg";
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            rename($target_file, $target_dir . "/" . $new_file_name);
            echo "The file " . $new_file_name . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
