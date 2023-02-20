<?php

require_once '../services/Moviments.php';

use services\Moviments;

require_once '../services/Prices.php';

use services\Prices;

$moviments = new Moviments();

if (isset($_POST['register'])) {

    /* Calc. Horas Trabalhadas */
    $data = new DateTime($_POST['data'] . '00:00:00');
    $startTime = new DateTime($data->format('Y-m-d') . $_POST['startTime']);
    $endTime = new DateTime($data->format('Y-m-d') .  $_POST['endTime']);
    $differenceTime = $startTime->diff($endTime);
    $hours_of_hours = $differenceTime->h;
    $hours_of_minutes = $differenceTime->i / 60; //Arredondar - round()/floor() - cima/baixo
    $hours = $hours_of_hours + $hours_of_minutes;
    $workedHours = floatval(number_format($hours, 2));
    $_WORKEDHOURS = $workedHours;


    /* Calc. Valor da Diária */
    $prices = new Prices();
    $prices_list = $prices->getPrices();
    while ($preco = $prices_list->fetch_assoc()) {
        if ($preco['descricao'] == 'Hora Normal') {
            $value_hora_normal = $preco['valor'];
        } elseif ($preco['descricao'] == 'Hora Extra') {
            $value_hora_extra = $preco['valor'];
        }
    }
    if ($_POST['dayWeek'] == 'Sábado' || $_POST['dayWeek'] == 'Domingo' || $_POST['adversity'] == 'on') {
        $_VALUEDAY = ($_WORKEDHOURS * $value_hora_extra);
    } else {
        $_VALUEDAY = ($_WORKEDHOURS * $value_hora_normal);
    }

    return $moviments->postMoviments($_POST, $_WORKEDHOURS, $_VALUEDAY);

}

if (isset($_POST['edit'])) {
    return $moviments->putMoviments($_POST);
}

if (isset($_POST['delete'])) {
    return $moviments->deleteMoviments($_POST['id']);
}

if (isset($_POST['filter-data-report'])) {
    return $moviments->getDataReportMoviments($_POST);
}

if (isset($_POST['print-report'])) {
    return $moviments->getPrintReportMoviments($_POST);
}
