<?php

namespace services;

class Retreats
{
    public function getRetreats()
    {
        require 'Conexao.php';

        $retreats_query = "SELECT * FROM retiros";
        $retreats_response = $mysqli->query($retreats_query);
        return $retreats_response;
    }

    public function getRetreatByPasture($id)
    {
        require 'Conexao.php';

        $retreats_query = "SELECT * FROM retiros WHERE id = $id";
        $retreats_response = $mysqli->query($retreats_query);
        $retreats_result = $retreats_response->fetch_assoc();

        return $retreats_result;
    }

    public function postRetreats($request)
    {
        require 'Conexao.php';

        $name = $mysqli->escape_string($request['name']);

        $create_query = "INSERT INTO retiros (nome) VALUES ('$name')";
        $create_response = $mysqli->query($create_query);

        if ($create_response == true) {
            session_start();
            $_SESSION['register_retreats_success'] = true;
            header('Location: ../pages/areaRetreats.php');
        } else {
            session_start();
            $_SESSION['register_retreats_fail'] = true;
            header('Location: ../pages/areaRetreats.php');
        }
    }

    public function putRetreats($request)
    {
        require 'Conexao.php';

        $id = $mysqli->escape_string($request['id']);
        $name = $mysqli->escape_string($request['name']);

        $update_query = "UPDATE retiros SET nome = '$name' WHERE id = $id";
        $update_response = $mysqli->query($update_query);

        if ($update_response == true) {
            session_start();
            $_SESSION['edit_retreats_success'] = true;
            header('Location: ../pages/areaRetreats.php');
        } else {
            session_start();
            $_SESSION['edit_retreats_fail'] = true;
            header('Location: ../pages/areaRetreats.php');
        }
    }

    public function deleteRetreats($id)
    {
        require 'Conexao.php';

        $delete_query = " DELETE FROM retiros WHERE id = $id";
        $delete_response = $mysqli->query($delete_query);

        if ($delete_response == true) {
            session_start();
            $_SESSION['delete_retreats_success'] = true;
            header('Location: ../pages/areaRetreats.php');
        } else {
            session_start();
            $_SESSION['delete_retreats_fail'] = true;
            header('Location: ../pages/areaRetreats.php');
        }
    }
}
