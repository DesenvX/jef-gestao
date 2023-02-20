<?php

namespace services;

class Moviments
{

    public function getDataReportMoviments($request)
    {

        require 'Conexao.php';

        $id_tractor = $mysqli->escape_string($request['machine']);
        $id_collaborator = $mysqli->escape_string($request['collaborator']);
        $date_init = $mysqli->escape_string($request['date-init']);
        $date_finish = $mysqli->escape_string($request['date-finish']);

        $data_report_moviments_query = "SELECT * FROM movimentos  WHERE id_maquina = '$id_tractor' AND id_colaborador = '$id_collaborator' AND data BETWEEN '$date_init' AND '$date_finish'";
        $data_report_moviments_response = $mysqli->query($data_report_moviments_query);

        return $data_report_moviments_response;
    }

    public function getPrintReportMoviments($request)
    {
    }

    public function getMoviments()
    {

        require 'Conexao.php';

        $moviments_query = "SELECT * FROM movimentos";
        $moviments_response = $mysqli->query($moviments_query);
        return $moviments_response;
    }

    public function postMoviments($request, $workedhours, $valueday)
    {

        require 'Conexao.php';

        $valueday;
        $workedhours;

        $id_service = $mysqli->escape_string($request['service']);
        $id_pasture = $mysqli->escape_string($request['pasture']);
        $id_machine = $mysqli->escape_string($request['machine']);
        $id_collaborator = $mysqli->escape_string($request['collaborator']);

        $startTime = $mysqli->escape_string($request['startTime']);
        $endTime = $mysqli->escape_string($request['endTime']);
        $data = $mysqli->escape_string($request['data']);
        $dayWeek = $mysqli->escape_string($request['dayWeek']);


        $moviments_report = "INSERT INTO movimentos (hora_inicial, hora_final, horas_trabalhadas, data, dia_semana, valor_diaria, id_colaborador, id_servico, id_maquina, id_pasto) VALUES ('$startTime', '$endTime', '$workedhours', '$data', '$dayWeek','$valueday', '$id_collaborator', '$id_service', '$id_machine', '$id_pasture')";
        $moviments_report_response = $mysqli->query($moviments_report);


        if ($moviments_report_response == true) {
            session_start();
            $_SESSION['register_moviments_success'] = true;
            header('Location: ../pages/operationMoviments.php');
        }
    }

    public function putMoviments($request, $workedHours, $valueday)
    {
       

        require 'Conexao.php';

        $id = $mysqli->escape_string($request['id']);
        $id_service = $mysqli->escape_string($request['service']);
        $id_pasture = $mysqli->escape_string($request['pasture']);
        $id_machine = $mysqli->escape_string($request['machine']);
        $id_collaborator = $mysqli->escape_string($request['collaborator']);

        $startTime = $mysqli->escape_string($request['startTime']);
        $endTime = $mysqli->escape_string($request['endTime']);
        $data = $mysqli->escape_string($request['data']);
        $dayWeek = $mysqli->escape_string($request['dayWeek']);


        $update_moviments = "UPDATE movimentos SET hora_inicial = '$startTime', hora_final = '$endTime', horas_trabalhadas = '$workedHours', data = '$data', dia_semana = '$dayWeek', valor_diaria = '$valueday', id_colaborador = '$id_collaborator', id_servico = '$id_service', id_maquina = '$id_machine', id_pasto = '$id_pasture' WHERE id = '$id'";
        $moviments_response = $mysqli->query($update_moviments);

        if ($moviments_response == true) {
            session_start();
            $_SESSION['edit_moviments_success'] = true;
            header('Location: ../pages/operationMovimentsHistoric.php');
        } else {
            session_start();
            $_SESSION['edit_moviments_fail'] = true;
            header('Location: ../pages/operationMovimentsHistoric.php');
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
}
