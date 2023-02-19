<?php

namespace services;

class Vehicles
{
    public function getCountVehicles()
    {
        require 'Conexao.php';

        $vehicles_query = "SELECT COUNT(*) as count_veiculo FROM veiculos";
        $vehicles_response = $mysqli->query($vehicles_query);
        $vehicles_result = $vehicles_response->fetch_assoc();

        return $vehicles_result;
    }

    public function getVehiclesForSomething($id)
    {
        require 'Conexao.php';

        $suppliers_query = "SELECT * FROM veiculos WHERE id = $id";
        $suppliers_response = $mysqli->query($suppliers_query);
        $suppliers_result = $suppliers_response->fetch_assoc();

        return $suppliers_result;
    }

    public function getVehicles()
    {
        require 'Conexao.php';

        $vehicle_query = "SELECT * FROM veiculos";
        $vehicle_response = $mysqli->query($vehicle_query);
        return $vehicle_response;
    }

    public function postVehicles($request)
    {
        require 'Conexao.php';

        $description = $mysqli->escape_string($request['description']);
        $brand = $mysqli->escape_string($request['brand']);
        $model = $mysqli->escape_string($request['model']);        
        $year = $mysqli->escape_string($request['year']);
        $plate = $mysqli->escape_string($request['plate']);

        $create_query = "INSERT INTO veiculos (descricao, marca, modelo, ano, placa) VALUES ('$description','$brand', '$model', '$year', '$plate')";
        $create_response = $mysqli->query($create_query);

        if ($create_response == true) {
            session_start();
            $_SESSION['register_vehicles_success'] = true;
            header('Location: ../pages/areaVehicles.php');
        } else {
            session_start();
            $_SESSION['register_vehicles_fail'] = true;
            header('Location: ../pages/areaVehicles.php');
        }
    }

    public function putVehicles($request)
    {
        require 'Conexao.php';

        $id = $mysqli->escape_string($request['id']);
        $description = $mysqli->escape_string($request['description']);
        $brand = $mysqli->escape_string($request['brand']);
        $model = $mysqli->escape_string($request['model']);
        $year = $mysqli->escape_string($request['year']);
        $plate = $mysqli->escape_string($request['plate']);

        $update_query = "UPDATE veiculos SET descricao = '$description', marca = '$brand', modelo = '$model', ano = '$year', placa = '$plate' WHERE id = $id";
        $update_response = $mysqli->query($update_query);

        if ($update_response == true) {
            session_start();
            $_SESSION['edit_vehicles_success'] = true;
            header('Location: ../pages/areaVehicles.php');
        } else {
            session_start();
            $_SESSION['edit_vehicles_fail'] = true;
            header('Location: ../pages/areaVehicles.php');
        }
    }

    public function deleteVehicles($id)
    {
        require 'Conexao.php';

        $delete_query = "DELETE FROM veiculos WHERE id = $id";
        $delete_response = $mysqli->query($delete_query);

        if ($delete_response == true) {
            session_start();
            $_SESSION['delete_vehicles_success'] = true;
            header('Location: ../pages/areaVehicles.php');
        } else {
            session_start();
            $_SESSION['delete_vehicles_fail'] = true;
            header('Location: ../pages/areaVehicles.php');
        }
    }
}
