<?php 

namespace services;

class Movements 
{
    
    public function getDataReportMoviments($request) {

    }

    public function getPrintReportMoviments($request) {

    }

    public function getMovements() {

        require 'Conexao.php';

        $moviments_query = "SELECT * FROM movimentos";
        $moviments_response = $mysqli->query($moviments_query);
        return $moviments_response;
    }

    public function postMovements($request, $workedhours, $valueday) {

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
        
  
        if($moviments_report_response == true){
            session_start();
            $_SESSION['register_moviments_success'] = true;
            header('Location: ../pages/operationMoviments.php');
        } 
    }

    public function putMovements() {

    }

    public function deleteMovements() {

    }
}