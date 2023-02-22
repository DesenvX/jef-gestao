<?php

require_once '../services/Prices.php';

use services\Prices;

class CalcMoviments
{

    public function CalcWorkedHoursMoviment($startTimeStr, $endTimeStr)
    {
        $workedHours = $endTimeStr - $startTimeStr; 
        return $workedHours;
    }

    public function CalcValueDayMoviment($dayWeek, $adversity, $_WORKEDHOURS)
    {
        $prices = new Prices();
        $prices_list = $prices->getPrices();
        while ($preco = $prices_list->fetch_assoc()) {
            if ($preco['descricao'] == 'Hora Normal') {
                $value_hora_normal = $preco['valor'];
            } elseif ($preco['descricao'] == 'Hora Extra') {
                $value_hora_extra = $preco['valor'];
            }
        }
        if ($dayWeek == 'Sábado' || $dayWeek == 'Domingo' || $adversity == 'on') {
            $_VALUEDAY = ($_WORKEDHOURS * $value_hora_extra);
            return $_VALUEDAY;
        } else {
            $_VALUEDAY = ($_WORKEDHOURS * $value_hora_normal);
            return $_VALUEDAY;
        }
    }
}
