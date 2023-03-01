<?php

require_once '../services/Moviments.php';
require_once '../functions/CalcMoviments.php';

use services\Moviments;

$moviments = new Moviments();
$calcMoviments = new CalcMoviments();

if (isset($_POST['register'])) {

    $_HOURS = $calcMoviments->CalcWorkedHoursMoviment($_POST['collaborator'], intval($_POST['startTime']), intval($_POST['endTime']));

    $_VALUEDAY = $calcMoviments->CalcValueDayMoviment($_POST['dayWeek'], $_POST['adversity'], $_HOURS);

    if ($_POST['dayWeek'] == 'Sábado' || $_POST['dayWeek'] == 'Domingo') {
        $_POST['adversity'] = 'on';
    }

    return $moviments->postMoviments($_POST, $_HOURS, $_VALUEDAY);
}

if (isset($_POST['edit'])) {

    $_WORKEDHOURS = $calcMoviments->CalcWorkedHoursMoviment($_POST['data'], $_POST['startTime'], $_POST['endTime']);

    $_VALUEDAY = $calcMoviments->CalcValueDayMoviment($_POST['dayWeek'], $_POST['adversity'], $_WORKEDHOURS);

    return $moviments->putMoviments($_POST, $_WORKEDHOURS, $_VALUEDAY);
}

if (isset($_POST['delete'])) {
    return $moviments->deleteMoviments($_POST['id']);
}

if (isset($_POST['print-report'])) {
    return $moviments->getPrintReportMoviments($_POST);
}

if (isset($_POST['filter-data-report'])) {
    $moviments_filter = $moviments->getDataReportMoviments($_POST);
}

if(isset($_POST['close'])) {
    return $moviments->closeWeek($_POST);
}
