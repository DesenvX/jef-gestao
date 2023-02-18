<?php

namespace services;

class Tractors
{
    public function getTractorForSomething($id)
    {
        require 'Conexao.php';

        $tractor_query = "SELECT * FROM tratores WHERE id = $id";
        $tractor_response = $mysqli->query($tractor_query);
        $tractor_result = $tractor_response->fetch_assoc();

        return $tractor_result;
    }

    public function getTractors()
    {
        require 'Conexao.php';

        $tractors_query = "SELECT * FROM tratores";
        $tractors_response = $mysqli->query($tractors_query);
        return $tractors_response;
    }

    public function postTractors($request)
    {
        require 'Conexao.php';

        $mark = $mysqli->escape_string($request['mark']);
        $model = $mysqli->escape_string($request['model']);
        $year = $mysqli->escape_string($request['year']);

        $create_query = "INSERT INTO tratores (marca, modelo, ano) VALUES ('$mark','$model','$year')";
        $create_response = $mysqli->query($create_query);

        if ($create_response == true) {
            session_start();
            $_SESSION['register_tractors_success'] = true;
            header('Location: ../pages/areaTractors.php');
        } else {
            session_start();
            $_SESSION['register_tractors_fail'] = true;
            header('Location: ../pages/areaTractors.php');
        }
    }

    public function putTractors($request)
    {
        require 'Conexao.php';

        $id = $mysqli->escape_string($request['id']);
        $mark = $mysqli->escape_string($request['mark']);
        $model = $mysqli->escape_string($request['model']);
        $year = $mysqli->escape_string($request['year']);

        $update_query = "UPDATE tratores SET marca = '$mark', modelo = '$model', ano = '$year' WHERE id = $id";
        $update_response = $mysqli->query($update_query);

        if ($update_response == true) {
            session_start();
            $_SESSION['edit_tractors_success'] = true;
            header('Location: ../pages/areaTractors.php');
        } else {
            session_start();
            $_SESSION['edit_tractors_fail'] = true;
            header('Location: ../pages/areaTractors.php');
        }
    }

    public function deleteTractors($id)
    {
        require 'Conexao.php';

        $delete_query = " DELETE FROM tratores WHERE id = $id";
        $delete_response = $mysqli->query($delete_query);

        if ($delete_response == true) {
            session_start();
            $_SESSION['delete_tractors_success'] = true;
            header('Location: ../pages/areaTractors.php');
        } else {
            session_start();
            $_SESSION['delete_tractors_fail'] = true;
            header('Location: ../pages/areaTractors.php');
        }
    }
}
