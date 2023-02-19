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

    public function postMovements() {

    }

    public function putMovements() {

    }

    public function deleteMovements() {

    }
}