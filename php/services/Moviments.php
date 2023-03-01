<?php

namespace services;

class Moviments
{
    public function getMovimentsSumaHoursForSomething($id)
    {
        require 'Conexao.php';

        $suma_hours_query = "SELECT SUM(horas_trabalhadas) as soma_horas_trabalhadas FROM movimentos WHERE id_colaborador = $id";
        $suma_hours_response = $mysqli->query($suma_hours_query);
        $suma_hours_result = $suma_hours_response->fetch_assoc();

        return intval($suma_hours_result['soma_horas_trabalhadas']);
    }

    public function getDataReportMoviments($request)
    {
        require 'Conexao.php';

        $id_tractor = $mysqli->escape_string($request['machine']);
        $id_collaborator = $mysqli->escape_string($request['collaborator']);
        $date_init = $mysqli->escape_string($request['date-init']);
        $date_finish = $mysqli->escape_string($request['date-finish']);

        $resquetsPost = array('maquina' => $id_tractor, 'operador' => $id_collaborator, 'data_inicial' => $date_init, 'data_final' => $date_finish);

        if ($id_tractor == 'all') {
            $data_report_moviments_query = "SELECT * FROM movimentos  WHERE id_colaborador = '$id_collaborator' AND situacao = 'Aberta' AND data BETWEEN '$date_init' AND '$date_finish'";
            $data_report_moviments_response = $mysqli->query($data_report_moviments_query);

            return array('resultado_tabela' => $data_report_moviments_response, 'dados_filtro' => $resquetsPost);
        } else {
            $data_report_moviments_query = "SELECT * FROM movimentos  WHERE id_maquina = '$id_tractor' AND id_colaborador = '$id_collaborator' AND situacao = 'Aberta' AND data BETWEEN '$date_init' AND '$date_finish'";
            $data_report_moviments_response = $mysqli->query($data_report_moviments_query);

            return array('resultado_tabela' => $data_report_moviments_response, 'dados_filtro' => $resquetsPost);
        }
    }

    public function getPrintReportMoviments($request)
    {
        require 'Conexao.php';
        require '../generate_pdf/GeneratePdf.php';

        $id_tractor = $mysqli->escape_string($request['machine']);
        $id_collaborator = $mysqli->escape_string($request['collaborator']);
        $date_init = $mysqli->escape_string($request['date-init']);
        $date_finish = $mysqli->escape_string($request['date-finish']);

        $dataReports = array('maquina' => $id_tractor, 'operador' => $id_collaborator, 'data_inicial' => $date_init, 'data_final' => $date_finish);

        if ($id_tractor == 'all') {

            $data_report_moviments_query = "SELECT * FROM movimentos  WHERE id_colaborador = '$id_collaborator' AND situacao = 'Aberta' AND data BETWEEN '$date_init' AND '$date_finish'";
            $data_report_moviments_response = $mysqli->query($data_report_moviments_query);

            $soma_worked_hours_query = "SELECT SUM(horas_trabalhadas) as soma_horas_trabalhadas FROM movimentos  WHERE id_colaborador = '$id_collaborator' AND situacao = 'Aberta' AND data BETWEEN '$date_init' AND '$date_finish'";
            $soma_worked_hours_response = $mysqli->query($soma_worked_hours_query);
            $soma_worked_hours_result = $soma_worked_hours_response->fetch_assoc();

            $soma_normal_hours_query = "SELECT SUM(horas_normais) as soma_horas_normais FROM movimentos  WHERE id_colaborador = '$id_collaborator' AND extra_hora != 'on' AND situacao = 'Aberta' AND data BETWEEN '$date_init' AND '$date_finish'";
            $soma_normal_hours_response = $mysqli->query($soma_normal_hours_query);
            $soma_normal_hours_result = $soma_normal_hours_response->fetch_assoc();

            $soma_exceded_hours_query = "SELECT SUM(horas_excedentes) as soma_horas_excedentes FROM movimentos  WHERE id_colaborador = '$id_collaborator' AND situacao = 'Aberta' AND data BETWEEN '$date_init' AND '$date_finish'";
            $soma_exceded_hours_response = $mysqli->query($soma_exceded_hours_query);
            $soma_exceded_hours_result = $soma_exceded_hours_response->fetch_assoc();

            $soma_bonus_hours_query = "SELECT SUM(horas_trabalhadas) as soma_extra_horas FROM movimentos  WHERE id_colaborador = '$id_collaborator' AND extra_hora = 'on' AND situacao = 'Aberta' AND data BETWEEN '$date_init' AND '$date_finish'";
            $soma_bonus_hours_response = $mysqli->query($soma_bonus_hours_query);
            $soma_bonus_hours_result = $soma_bonus_hours_response->fetch_assoc();

            $soma_value_day_query = "SELECT SUM(valor_diaria) as soma_valor_diaria FROM movimentos  WHERE id_colaborador = '$id_collaborator' AND situacao = 'Aberta' AND data BETWEEN '$date_init' AND '$date_finish'";
            $soma_value_day_response = $mysqli->query($soma_value_day_query);
            $soma_value_day_result = $soma_value_day_response->fetch_assoc();

            $hours = [$soma_normal_hours_result, $soma_exceded_hours_result, $soma_worked_hours_result, $soma_bonus_hours_result];
            return PDFReportMoviment($data_report_moviments_response, $hours, $soma_value_day_result, $dataReports);
        } else {

            $data_report_moviments_query = "SELECT * FROM movimentos  WHERE id_maquina = '$id_tractor' AND id_colaborador = '$id_collaborator' AND situacao = 'Aberta' AND data BETWEEN '$date_init' AND '$date_finish'";
            $data_report_moviments_response = $mysqli->query($data_report_moviments_query);

            $soma_worked_hours_query = "SELECT SUM(horas_trabalhadas) as soma_horas_trabalhadas FROM movimentos  WHERE id_maquina = '$id_tractor' AND id_colaborador = '$id_collaborator' AND situacao = 'Aberta' AND data BETWEEN '$date_init' AND '$date_finish'";
            $soma_worked_hours_response = $mysqli->query($soma_worked_hours_query);
            $soma_worked_hours_result = $soma_worked_hours_response->fetch_assoc();

            $soma_normal_hours_query = "SELECT SUM(horas_normais) as soma_horas_normais FROM movimentos  WHERE id_maquina = '$id_tractor' AND id_colaborador = '$id_collaborator' AND extra_hora != 'on' AND situacao = 'Aberta' AND data BETWEEN '$date_init' AND '$date_finish'";
            $soma_normal_hours_response = $mysqli->query($soma_normal_hours_query);
            $soma_normal_hours_result = $soma_normal_hours_response->fetch_assoc();

            $soma_exceded_hours_query = "SELECT SUM(horas_excedentes) as soma_horas_excedentes FROM movimentos  WHERE id_maquina = '$id_tractor' AND id_colaborador = '$id_collaborator' AND situacao = 'Aberta' AND data BETWEEN '$date_init' AND '$date_finish'";
            $soma_exceded_hours_response = $mysqli->query($soma_exceded_hours_query);
            $soma_exceded_hours_result = $soma_exceded_hours_response->fetch_assoc();

            $soma_bonus_hours_query = "SELECT SUM(horas_trabalhadas) as soma_extra_horas FROM movimentos  WHERE id_maquina = '$id_tractor' AND id_colaborador = '$id_collaborator' AND extra_hora = 'on' AND situacao = 'Aberta' AND data BETWEEN '$date_init' AND '$date_finish'";
            $soma_bonus_hours_response = $mysqli->query($soma_bonus_hours_query);
            $soma_bonus_hours_result = $soma_bonus_hours_response->fetch_assoc();

            $soma_value_day_query = "SELECT SUM(valor_diaria) as soma_valor_diaria FROM movimentos  WHERE id_maquina = '$id_tractor' AND id_colaborador = '$id_collaborator' AND situacao = 'Aberta' AND data BETWEEN '$date_init' AND '$date_finish'";
            $soma_value_day_response = $mysqli->query($soma_value_day_query);
            $soma_value_day_result = $soma_value_day_response->fetch_assoc();

            $hours = [$soma_normal_hours_result, $soma_exceded_hours_result, $soma_worked_hours_result, $soma_bonus_hours_result];
            return PDFReportMoviment($data_report_moviments_response,  $hours, $soma_value_day_result, $dataReports);
        }
    }

    public function getMoviments()
    {

        require 'Conexao.php';

        $moviments_query = "SELECT * FROM movimentos";
        $moviments_response = $mysqli->query($moviments_query);
        return $moviments_response;
    }

    public function postMoviments($request, $hours, $valueday)
    {

        require 'Conexao.php';

        $valueday;
        $workedHours = $hours['HORAS_TRABALHADAS'];
        $normalHours = $hours['HORAS_NORMAIS'];
        $excededHours = $hours['HORAS_EXCEDENTES'];

        $id_service = $mysqli->escape_string($request['service']);
        $id_pasture = $mysqli->escape_string($request['pasture']);
        $id_machine = $mysqli->escape_string($request['machine']);
        $id_collaborator = $mysqli->escape_string($request['collaborator']);

        $startTime = $mysqli->escape_string($request['startTime']);
        $endTime = $mysqli->escape_string($request['endTime']);
        $data = $mysqli->escape_string($request['data']);
        $dayWeek = $mysqli->escape_string($request['dayWeek']);
        $adversity = $mysqli->escape_string($request['adversity']);

        $moviments_report = "INSERT INTO movimentos (hora_inicial, hora_final, horas_trabalhadas, horas_normais, horas_excedentes, extra_hora, data, dia_semana, valor_diaria, id_colaborador, id_servico, id_maquina, id_pasto, situacao) VALUES ('$startTime', '$endTime', '$workedHours', '$normalHours', '$excededHours', '$adversity', '$data', '$dayWeek','$valueday', '$id_collaborator', '$id_service', '$id_machine', '$id_pasture', 'Aberta')";
        $moviments_report_response = $mysqli->query($moviments_report);


        if ($moviments_report_response == true) {
            session_start();
            $_SESSION['register_moviments_success'] = true;
            header('Location: ../pages/operationMoviments.php');
        }
    }

    public function deleteMoviments($id)
    {
        require 'Conexao.php';

        $delete_query = "DELETE FROM movimentos WHERE id = $id";
        $delete_response = $mysqli->query($delete_query);

        if ($delete_response == true) {
            session_start();
            $_SESSION['delete_moviments_success'] = true;
            header('Location: ../pages/operationMovimentsHistoric.php');
        } else {
            session_start();
            $_SESSION['delete_moviments_fail'] = true;
            header('Location: ../pages/operationMovimentsHistoric.php');
        }
    }

    public function closeWeek()
    {
        require 'Conexao.php';

        $close_sql = "UPDATE movimentos SET situacao = 'Fechado'";
        $close_sql_response = $mysqli->query($close_sql);

        if($close_sql_response == true) {
            session_start();
            $_SESSION['close_moviments_success'] = true;
            header('Location: ../pages/operationMoviments.php');
        } else {
            session_start();
            $_SESSION['close_moviments_fail'] = true;
            header('Location: ../pages/operationMoviments.php');
        }
        
    }
}
