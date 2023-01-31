<?php

namespace services;

class Retreat
{
    public function getRetreat()
    {
        require 'Conexao.php';

        $retreat_query = "SELECT * FROM retiros";
        $retreat_response = $mysqli->query($retreat_query);
        return $retreat_response;
    }

    public function postRetreat($request)
    {
        require 'Conexao.php';

        $name = $mysqli->escape_string($request['name']);

        $create_query = "INSERT INTO retiros (nome) VALUES ('$name')";
        $create_response = $mysqli->query($create_query);

        if ($create_response == true) {
            session_start();
            $_SESSION['register_retreat_success'] = true;
            header('Location: ../pages/areaRetreat.php');
        } else {
            session_start();
            $_SESSION['register_retreat_fail'] = true;
            header('Location: ../pages/areaRetreat.php');
        }
    }

    public function putRetreat($request)
    {
        require 'Conexao.php';

        $id = $mysqli->escape_string($request['id']);
        $name = $mysqli->escape_string($request['name']);

        $update_query = "UPDATE retiros SET nome = '$name' WHERE id = $id";
        $update_response = $mysqli->query($update_query);

        if ($update_response == true) {
            session_start();
            $_SESSION['edit_retreat_success'] = true;
            header('Location: ../pages/areaRetreat.php');
        } else {
            session_start();
            $_SESSION['edit_retreat_fail'] = true;
            header('Location: ../pages/areaRetreat.php');
        }
    }

    public function deleteRetreat($id)
    {
        require 'Conexao.php';

        $delete_query = " DELETE FROM retiros WHERE id = $id";
        $delete_response = $mysqli->query($delete_query);

        if ($delete_response == true) {
            session_start();
            $_SESSION['delete_retreat_success'] = true;
            header('Location: ../pages/areaRetreat.php');
        } else {
            session_start();
            $_SESSION['delete_retreat_fail'] = true;
            header('Location: ../pages/areaRetreat.php');
        }
    }
}
