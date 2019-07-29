<?php

require_once '../../model/dbconnection.php';
require_once '../../model/promotion.php';
require_once '../../model/bus_model.php';
require_once '../../model/dataAccess.php';


$daoObject = DAO::getInstance();

if(isset($_POST['discount_amount']) && isset($_POST['expiry_date']) ){
    $promotion_amount = $_POST['discount_amount'];
    $expiry_date = $_POST['expiry_date'];
    $model = $_POST['model'];

    $promo = new Promotion();
    $promo->DISCOUNT_AMOUNT	=htmlentities($promotion_amount);
    $promo->EXPIRY_DATE	=htmlentities($expiry_date);    
    $promo->MODEL_ID	=htmlentities($model);
    $promo->COMPANY_ID	=htmlentities($_SESSION['company_id']);
    $id = $daoObject->addPromotion($promo);

    $daoObject->reducePrice($promo);

    $_GET['alert_header'] = "Notice";
    $_GET['alert_body'] = "A new promotion with id " . $id. " added";


}else{

    if(isset($_GET['promotion_id'])) {

        $promotion_id  = $_GET['promotion_id'];
        $promotion = new Promotion();
        $promotion->PROMOTION_ID = $promotion_id;
        $daoObject->deletePromotion($promotion);

        $_GET['alert_header'] = "Notice";
        $_GET['alert_body'] = "Promotion with id " . $promotion_id. " deleted";

        header("Location: http://localhost/VRP/view/admin/promotion.php?");


    }
}

$models = $daoObject->getAllModels();
$results = $daoObject->getAllPromotions();

