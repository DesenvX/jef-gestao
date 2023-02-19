<?php

namespace services;

class Fuel
{

    public function getDataFueIntake($request)
    {

        require 'Conexao.php';

        $date_init = $mysqli->escape_string($request['filter-date-start']);
        $date_finish = $mysqli->escape_string($request['filter-date-finish']);

        $data_fuel_intake_query = "SELECT * FROM combustivel_entrada WHERE data BETWEEN '$date_init' AND '$date_finish'";
        $data_fuel_intake_response = $mysqli->query($data_fuel_intake_query);

        $soma_liters_intake_query = "SELECT SUM(litros) as soma_litros_entrada FROM combustivel_entrada  WHERE data BETWEEN '$date_init' AND '$date_finish'";
        $soma_liters_intake_response = $mysqli->query($soma_liters_intake_query);
        $soma_liters_intake_result = $soma_liters_intake_response->fetch_assoc();

        $soma_value_totality_intake_query = "SELECT SUM(valor_total) as soma_valor_total_entrada FROM combustivel_entrada  WHERE data BETWEEN '$date_init' AND '$date_finish'";
        $soma_value_totality_intake_response = $mysqli->query($soma_value_totality_intake_query);
        $soma_value_totality_intake_result = $soma_value_totality_intake_response->fetch_assoc();

        $dates_filters = array(date('d/m/Y', strtotime($date_init)), date('d/m/Y', strtotime($date_finish)));

        require '../generate_pdf/GeneratePdf.php';

        return PDFIntakeFuel($data_fuel_intake_response, $soma_liters_intake_result, $soma_value_totality_intake_result, $dates_filters);
    }

    public function getDataFueOutput($request)
    {
        require 'Conexao.php';

        $date_init = $mysqli->escape_string($request['filter-date-start']);
        $date_finish = $mysqli->escape_string($request['filter-date-finish']);
        $type_fuel = $mysqli->escape_string($request['type_fuel_output']);

        $data_fuel_output_query = "SELECT * FROM combustivel_saida WHERE tipo_combustivel = '$type_fuel' AND data BETWEEN '$date_init' AND '$date_finish'";
        $data_fuel_output_response = $mysqli->query($data_fuel_output_query);
        $data_fuel_output_result = $data_fuel_output_response->fetch_assoc();

        $soma_liters_output_query = "SELECT SUM(litros) as soma_litros_saida FROM combustivel_saida  WHERE tipo_combustivel = '$type_fuel' AND data BETWEEN '$date_init' AND '$date_finish'";
        $soma_liters_output_response = $mysqli->query($soma_liters_output_query);
        $soma_liters_output_result = $soma_liters_output_response->fetch_assoc();

        print_r($data_fuel_output_result);
        print_r($soma_liters_output_result);
    }

    public function getPorcentTankDashboard()
    {
        require 'Conexao.php';

        $soma_intake_query = "SELECT SUM(litros) as soma_litros_entrada FROM combustivel_entrada";
        $soma_intake_response = $mysqli->query($soma_intake_query);
        $soma_intake_result = $soma_intake_response->fetch_assoc();

        $soma_output_query = "SELECT SUM(litros) as soma_litros_saida FROM combustivel_saida WHERE tipo_combustivel = 'disel'";
        $soma_output_response = $mysqli->query($soma_output_query);
        $soma_output_result = $soma_output_response->fetch_assoc();

        $value_tank_result = $soma_intake_result['soma_litros_entrada'] - $soma_output_result['soma_litros_saida'];

        return $value_tank_result;
    }

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

        require '../functions/GenerateUuid.php';

        $id_link_tables = uuid();
        $id_service = $mysqli->escape_string($request['service']);
        $id_pasture = $mysqli->escape_string($request['pasture']);
        $id_tractor = $mysqli->escape_string($request['tractor']);
        $id_vehicle = $mysqli->escape_string($request['vehicle']);
        $id_collaborator = $mysqli->escape_string($request['collaborator']);

        $tipo = $mysqli->escape_string($request['output']);
        $typeFuel = $mysqli->escape_string($request['fuel-type']);
        $data = $mysqli->escape_string($request['date-output']);
        $liters = $mysqli->escape_string($request['liters']);

        $fuel_output_query = "INSERT INTO combustivel_saida (id_tabelas, data, tipo_combustivel, litros, id_servico, id_pasto, id_trator, id_veiculo, id_colaborador) VALUES('$id_link_tables', '$data', '$typeFuel', '$liters', '$id_service', '$id_pasture', '$id_tractor', '$id_vehicle', '$id_collaborator')";
        $fuel_historic_query = "INSERT INTO combustivel_historico (id_tabelas, data, tipo) VALUES('$id_link_tables', '$data', '$tipo')";

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

    public function putFuelIntake($request, $supplier)
    {
        require 'Conexao.php';

        $id = $mysqli->escape_string($request['id']);
        $id_tables = $mysqli->escape_string($request['id_tables']);
        $fuel_type = $mysqli->escape_string($request['fuel-type']);
        $date_entry = $mysqli->escape_string($request['date-entry']);
        $liters = $mysqli->escape_string($request['liters']);
        $value_liters = $mysqli->escape_string($request['value-liters']);
        $value_total = $mysqli->escape_string($request['value-total']);
        $id_supplier = $mysqli->escape_string($supplier['id']);
        $supplier = $mysqli->escape_string($supplier['nome_razao']);

        $update_intake_query = "UPDATE combustivel_entrada SET id_fornecedor = '$id_supplier', fornecedor = '$supplier', tipo_combustivel = '$fuel_type', data = '$date_entry', litros = '$liters', valor_litro = '$value_liters', valor_total = '$value_total' WHERE id = $id";
        $update_intake_response = $mysqli->query($update_intake_query);

        if ($update_intake_response == true) {
            $update_historic_query = "UPDATE combustivel_historico SET data = '$date_entry' WHERE id_tabelas = $id_tables";
            $update_historic_response = $mysqli->query($update_historic_query);
        }

        if ($update_intake_response == true && $update_historic_response == true) {
            session_start();
            $_SESSION['edit_fuel_success'] = true;
            header('Location: ../pages/operationFuel.php');
        } else {
            session_start();
            $_SESSION['edit_fuel_fail'] = true;
            header('Location: ../pages/operationFuel.php');
        }
    }

    public function putFuelOutput($request)
    {
        require 'Conexao.php';

        $id = $mysqli->escape_string($request['id']);
        $id_tables = $mysqli->escape_string($request['id_tables']);
        $id_service = $mysqli->escape_string($request['service']);
        $id_pasture = $mysqli->escape_string($request['pasture']);
        $id_tractor = $mysqli->escape_string($request['tractor']);

        $id_collaborator = $mysqli->escape_string($request['collaborator']);
        $typeFuel = $mysqli->escape_string($request['fuel-type']);
        $data = $mysqli->escape_string($request['date-output']);
        $liters = $mysqli->escape_string($request['liters']);

        $update_output_query_tractor = "UPDATE combustivel_saida SET tipo_combustivel = '$typeFuel', data = '$data', litros = '$liters', id_servico = '$id_service', id_pasto = '$id_pasture', id_trator = '$id_tractor', id_colaborador = '$id_collaborator' WHERE id = '$id'";
        $update_output_response = $mysqli->query($update_output_query_tractor);

        if ($update_output_response == true) {
            $update_historic_query = "UPDATE combustivel_historico SET data = '$data' WHERE id_tabelas = $id_tables";
            $update_historic_response = $mysqli->query($update_historic_query);
        }

        if ($update_output_response == true && $update_historic_response == true) {
            session_start();
            $_SESSION['edit_fuel_success'] = true;
            header('Location: ../pages/operationFuel.php');
        } else {
            session_start();
            $_SESSION['edit_fuel_fail'] = true;
            header('Location: ../pages/operationFuel.php');
        }
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

        if ($delete_response == true) {
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
