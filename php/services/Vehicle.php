<?php

namespace services;

class Vehicle
{
    public function getVehicle()
    {
        require 'Conexao.php';

        $vehicle_query = "SELECT * FROM veiculos";
        $vehicle_response = $mysqli->query($vehicle_query);
        return $vehicle_response;
    }

    public function postVehicle($request)
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
            header('Location: ../pages/areaVehicle.php');
        } else {
            session_start();
            $_SESSION['register_vehicles_fail'] = true;
            header('Location: ../pages/areaVehicle.php');
        }
    }

    public function putVehicle($request)
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
            header('Location: ../pages/areaVehicle.php');
        } else {
            session_start();
            $_SESSION['edit_vehicles_fail'] = true;
            header('Location: ../pages/areaVehicle.php');
        }
    }

    public function deleteVehicle($id)
    {
        require 'Conexao.php';

        $delete_query = "DELETE FROM veiculos WHERE id = $id";
        $delete_response = $mysqli->query($delete_query);

        if ($delete_response == true) {
            session_start();
            $_SESSION['delete_vehicles_success'] = true;
            header('Location: ../pages/areaVehicle.php');
        } else {
            session_start();
            $_SESSION['delete_vehicles_fail'] = true;
            header('Location: ../pages/areaVehicle.php');
        }
    }
}
