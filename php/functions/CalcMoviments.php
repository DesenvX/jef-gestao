<?php

require_once '../services/Moviments.php';
require_once '../services/Prices.php';

use services\Prices;
use services\Moviments;

class CalcMoviments
{

    public function CalcWorkedHoursMoviment($id_collaborators, $startTimeStr, $endTimeStr)
    {
        $moviments = new Moviments();
        $NORMAL_HOURS_DB = $moviments->getMovimentsSumaHoursForSomething($id_collaborators);

        $HOURS_INPUT = $endTimeStr - $startTimeStr;
        $MAX_HOURS = 40;

        if ($NORMAL_HOURS_DB < $MAX_HOURS) {

            $HOURS_EXCEDED = $NORMAL_HOURS_DB + $HOURS_INPUT;

            if ($HOURS_EXCEDED > $MAX_HOURS) {

                $VALUE_HOUR_EXC = $HOURS_EXCEDED - $MAX_HOURS;
                $VALUE_HOUR_NORMAL = $HOURS_INPUT - $VALUE_HOUR_EXC;
                $WORKED_HOURS = $VALUE_HOUR_NORMAL + $VALUE_HOUR_EXC;

                $HOURS = ['HORAS_TRABALHADAS' => $WORKED_HOURS, 'HORAS_NORMAIS' => $VALUE_HOUR_NORMAL, 'HORAS_EXCEDENTES' => $VALUE_HOUR_EXC];

                return $HOURS;
            } else {
                $WORKED_HOURS = $HOURS_INPUT;
                $HOURS = ['HORAS_TRABALHADAS' => $WORKED_HOURS, 'HORAS_NORMAIS' => $HOURS_INPUT, 'HORAS_EXCEDENTES' => 0];
                return $HOURS;
            }
        } else {
            $WORKED_HOURS = $HOURS_INPUT;
            $HOURS = ['HORAS_TRABALHADAS' => $WORKED_HOURS, 'HORAS_NORMAIS' => 0, 'HORAS_EXCEDENTES' => $HOURS_INPUT];
            return $HOURS;
        }

        /* ; 
        return $workedHours; */
    }

    public function CalcValueDayMoviment($dayWeek, $adversity, $_HOURS)
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
            $_VALUEDAY = ($_HOURS['HORAS_TRABALHADAS'] * $value_hora_extra);
            return $_VALUEDAY;
        } else {
            if ($_HOURS['HORAS_NORMAIS'] == 0 && $_HOURS['HORAS_EXCEDENTES'] != 0) {
                $_VALUEDAY = ($_HOURS['HORAS_EXCEDENTES'] * $value_hora_extra);
                return $_VALUEDAY;
            } elseif ($_HOURS['HORAS_EXCEDENTES'] == 0 && $_HOURS['HORAS_NORMAIS'] != 0) {
                $_VALUEDAY = $_HOURS['HORAS_NORMAIS'] * $value_hora_normal;
                return $_VALUEDAY;
            } elseif ($_HOURS['HORAS_EXCEDENTES'] != 0 && $_HOURS['HORAS_NORMAIS'] != 0) {
                $value_normal = ($_HOURS['HORAS_NORMAIS'] * $value_hora_normal);
                $value_exc = ($_HOURS['HORAS_EXCEDENTES'] * $value_hora_extra);
                $_VALUEDAY = $value_normal + $value_exc;
                return $_VALUEDAY;
            }
        }
    }
}
