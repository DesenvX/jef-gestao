<?php

namespace services;

class Fuel
{
    public function getFuelHistoric()
    {
    }

    public function getFuelOutput()
    {
    }

    public function getFuelIntake()
    {
    }

    public function postFuelHistoric($request)
    {
    }

    public function postFuelOutput($request)
    {
        require 'Conexao.php';

        $id_service = $mysqli->escape_string($request['service']);
        $id_pasture = $mysqli->escape_string($request['pasture']);
        $id_tractor = $mysqli->escape_string($request['tractor']);
        $id_collaborator = $mysqli->escape_string($request['collaborator']);

        $tipo = $mysqli->escape_string($request['output']);
        $date = $mysqli->escape_string($request['date-output']);
        $liters = $mysqli->escape_string($request['liters']);

        $fuel_output_query = "INSERT INTO combustivel_saida (data, litros, id_servico, servico, id_pasto, pasto, id_tractor, tractor, id_colaborador, colaborador) VALUES('$name', '$phone', '$cpf')";
        $fuel_historic_query = "INSERT INTO combustivel_historico (data, tipo, litros) VALUES('$date', '$tipo', '$liters')";

        $fuel_output_response = $mysqli->query($fuel_output_query);
        $fuel_historic_response = $mysqli->query($fuel_historic_query);

        if ($fuel_output_response == true && $fuel_historic_response == true) {
            session_start();
            $_SESSION['register_collaborators_success'] = true;
            header('Location: ../pages/areaCollaborators.php');
        } else {
            session_start();
            $_SESSION['register_collaborators_fail'] = true;
            header('Location: ../pages/areaCollaborators.php');
        }
    }

    public function postFuelIntake($request)
    {
    }

    public function putFuel($request)
    {
    }

    public function deleteFuel($id)
    {
    }
}
