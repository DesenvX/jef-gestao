<?php 

require_once '../services/Moviments.php';

use services\Movements;

$movements = new Movements();

if (isset($_POST['register'])) {

    $startTime = $mysqli->escape_string($_POST['startTime']);
    $endTime = $mysqli->escape_string($_POST['endTime']);


    echo $startTime;
    echo $endTime;


    //return $movements->postMovements($_POST);
}

if (isset($_POST['edit'])) {
    return $movements->putMovements($_POST);
}

if (isset($_POST['delete'])) {
    return $movements->deleteMovements($_POST['id']);
}

if (isset($_POST['filter-data-report'])) {
    return $movements->getDataReportMoviments($_POST);
}

if (isset($_POST['print-report'])) {
    return $movements->getPrintReportMoviments($_POST);
}

?>