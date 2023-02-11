<?php

namespace services;

class Fuel
{
    public function getIntakeHistoricForSomething($id) 
    {
        require 'Conexao.php';

        $intake_historic_query = "SELECT * FROM combustivel_entrada WHERE id_tabelas = $id";
        $intake_historic_response = $mysqli->query($intake_historic_query);
        $intake_historic_result = $intake_historic_response->fetch_assoc();

        return $intake_historic_result;
    }

    public function getOutputHistoricForSomething($id) 
    {
        require 'Conexao.php';

        $output_historic_query = "SELECT * FROM combustivel_saida WHERE id_tabelas = $id";
        $output_historic_response = $mysqli->query($output_historic_query);
        $output_historic_result = $output_historic_response->fetch_assoc();

        return $output_historic_result;
    }

    public function getFuelHistoric()
    {
        require 'Conexao.php';

        $fuel_historic_query = "SELECT * FROM combustivel_historico";
        $fuel_historic_response = $mysqli->query($fuel_historic_query);
        return $fuel_historic_response;
    }

    public function getFuelOutput()
    {
        require 'Conexao.php';

        $fuel_output_query = "SELECT * FROM combustivel_saida";
        $fuel_output_response = $mysqli->query($fuel_output_query);
        return $fuel_output_response;
    }

    public function getFuelIntake()
    {
        require 'Conexao.php';

        $fuel_intake_query = "SELECT * FROM combustivel_entrada";
        $fuel_intake_response = $mysqli->query($fuel_intake_query);
        return $fuel_intake_response;
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
            $_SESSION['register_fuel_success'] = true;
            header('Location: ../pages/operationFuel.php');
        } else {
            session_start();
            $_SESSION['register_fuel_fail'] = true;
            header('Location: ../pages/operationFuel.php');
        }
    }

    public function postFuelIntake($request, $supplier)
    {
        require 'Conexao.php';

        require '../functions/GenerateUuid.php';
        $id_link_tables = uuid();

        $fuel_type = $mysqli->escape_string($request['fuel-type']);
        $date_entry = $mysqli->escape_string($request['date-entry']);
        $liters = $mysqli->escape_string($request['liters']);
        $value_liters = $mysqli->escape_string($request['value-liters']);
        $value_total = $mysqli->escape_string($request['value-total']);
        $type = $mysqli->escape_string($request['intake']);
        $id_supplier = $mysqli->escape_string($supplier['id']);
        $supplier = $mysqli->escape_string($supplier['nome_razao']);

        $fuel_intake_query = "INSERT INTO combustivel_entrada (id_tabelas, id_fornecedor, fornecedor, tipo_combustivel, data, litros, valor_litro, valor_total) VALUES('$id_link_tables', '$id_supplier', '$supplier', '$fuel_type', '$date_entry', '$liters', '$value_liters', '$value_total')";
        $fuel_intake_response = $mysqli->query($fuel_intake_query);

        if ($fuel_intake_response == true) {
            $fuel_historic_query = "INSERT INTO combustivel_historico (id_tabelas, data, tipo) VALUES('$id_link_tables', '$date_entry', '$type')";
            $fuel_historic_response = $mysqli->query($fuel_historic_query);
        }

        if ($fuel_intake_response == true && $fuel_historic_response == true) {
            session_start();
            $_SESSION['register_fuel_success'] = true;
            header('Location: ../pages/operationFuel.php');
        } else {
            session_start();
            $_SESSION['register_fuel_fail'] = true;
            header('Location: ../pages/operationFuel.php');
        }
    }

    public function putFuel($request)
    {
    }

    public function deleteFuelIntake($id)
    {
        require 'Conexao.php';

        $delete_query = " DELETE FROM combustivel_entrada WHERE id_tabelas = $id";
        $delete_response = $mysqli->query($delete_query);

        if ($delete_response == true) {
            $delete_historic_query = " DELETE FROM combustivel_historico WHERE id_tabelas = $id";
            $delete_historic_response = $mysqli->query($delete_historic_query);
        }

        if ($delete_response == true && $delete_historic_response) {
            session_start();
            $_SESSION['delete_fuel_success'] = true;
            header('Location: ../pages/operationFuel.php');
        } else {
            session_start();
            $_SESSION['delete_fuel_fail'] = true;
            header('Location: ../pages/operationFuel.php');
        }
    }

    public function deleteFuelOutput($id)
    {
        require 'Conexao.php';

        $delete_query = " DELETE FROM combustivel_saida WHERE id_tabelas = $id";
        $delete_response = $mysqli->query($delete_query);

        if($delete_response == true) {
            $delete_historic_query = " DELETE FROM combustivel_historico WHERE id_tabelas = $id";
            $delete_historic_response = $mysqli->query($delete_historic_query);
        }
        
        if ($delete_response == true && $delete_historic_response == true) {
            session_start();
            $_SESSION['delete_fuel_success'] = true;
            header('Location: ../pages/operationFuel.php');
        } else {
            session_start();
            $_SESSION['delete_fuel_fail'] = true;
            header('Location: ../pages/operationFuel.php');
        }
    }
}
