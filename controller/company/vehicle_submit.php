<?php
require_once '../../model/dbconnection.php';
require_once '../../model/bus.php';
require_once '../../model/bus_model.php';
require_once '../../model/bus_make.php';
require_once '../../model/dataAccess.php';


session_start();

$daoObject = DAO::getInstance();


$bus_models = $daoObject->getAllModels();

    $makes = $daoObject->getAllMakes();

if(isset($_POST['make'])) {
    $make_id = htmlentities($_POST['make']);
    $model_id =  htmlentities($_POST['model']);
    $rate =  htmlentities($_POST['rate']);
    $max_capacity = htmlentities($_POST['mcap']);

    $v = new Bus();
    $v->MAKE_ID = $make_id;
    $v->MODEL_ID = $model_id;
    $v->DAILY_RATE = $rate;
    $v->IMAGE = "default.jpg";
    $v->MAX_CAPACITY = $max_capacity;
    $v->COMPANY_ID = $_SESSION['company_id'];
    

    $lastId = $daoObject->addVehicle($v);
    $v->IMAGE = $lastId.".jpg";
    $v->VEHICLE_ID = $lastId;
    $daoObject->updateVehicleImage($v);

    uploadImage($v->VEHICLE_ID);

    header("location:../../view/company/dashboard.php?alert_header=Notice&alert_body="."A new vehicle with id: ". $lastId . " added");
}

function uploadImage($VEHICLE_ID){

    $target_dir = "../../images/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
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
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        $new_file_name = $VEHICLE_ID.".jpg";
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            rename($target_file, $target_dir."/".$new_file_name);
            echo "The file ".$new_file_name." has been uploaded.";
            
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

}


?>