<?php

require_once '../services/Moviments.php';

use services\Movements;

$movements = new Movements();

if (isset($_POST['register'])) {
    $data = new DateTime($_POST['data'].'00:00:00');

    $startTime = new DateTime($data->format('Y-m-d') . $_POST['startTime']);
    $endTime = new DateTime($data->format('Y-m-d') .  $_POST['endTime']);

    $differenceTime = $startTime->diff($endTime);
    $hours_of_hours = $differenceTime->h;
    $hours_of_minutes = $differenceTime->i / 60; //round() - Arredonda para cima / floor() - Arredonda para baixo
    $hours = $hours_of_hours + $hours_of_minutes;

    $workedHours = floatval(number_format($hours, 2));
    $_POST['workedHours'] = $workedHours;

    return $movements->postMovements($_POST);
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
