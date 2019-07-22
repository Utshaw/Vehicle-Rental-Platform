<?php

header('Content-type: application/json');
require_once '../model/dbconnection.php';
require_once '../model/promotion.php';
require_once '../model/dataAccess.php';

$daoObject = DAO::getInstance();

$daoObject->deleteOldPromotion();

$promotions = $daoObject->getAllPromotions();

echo json_encode($promotions);


