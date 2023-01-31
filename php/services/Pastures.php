<?php

namespace services;

class Pastures
{
    public function getPastures()
    {
        require 'Conexao.php';

        $pastures_query = "SELECT * FROM pastos";
        $pastures_response = $mysqli->query($pastures_query);
        return $pastures_response;
    }

    public function postPastures($request)
    {
        require 'Conexao.php';

        $name = $mysqli->escape_string($request['name']);
        $id_retreat = $mysqli->escape_string($request['id_retreat']);
        $retreat = $mysqli->escape_string($request['retreat']);
        $farm = $mysqli->escape_string($request['farm']);

        $create_query = "INSERT INTO pastos (nome, id_retiro, retiro, fazenda) VALUES ('$name', '$id_retreat', '$retreat', '$farm')";
        $create_response = $mysqli->query($create_query);

        if ($create_response == true) {
            session_start();
            $_SESSION['register_pastures_success'] = true;
            header('Location: ../pages/areaPastures.php');
        } else {
            session_start();
            $_SESSION['register_pastures_fail'] = true;
            header('Location: ../pages/areaPastures.php');
        }
    }

    public function putPastures($request)
    {
        require 'Conexao.php';

        $id = $mysqli->escape_string($request['id']);
        $name = $mysqli->escape_string($request['name']);
        $id_retreat = $mysqli->escape_string($request['id_retreat']);
        $retreat = $mysqli->escape_string($request['retreat']);
        $farm = $mysqli->escape_string($request['farm']);

        $update_query = "UPDATE pastos SET nome = '$name', 'id_retiro' = '$id_retreat', retiro = '$retreat', fazenda = '$farm' WHERE id = $id";
        $update_response = $mysqli->query($update_query);

        if ($update_response == true) {
            session_start();
            $_SESSION['edit_pastures_success'] = true;
            header('Location: ../pages/areaPastures.php');
        } else {
            session_start();
            $_SESSION['edit_pastures_fail'] = true;
            header('Location: ../pages/areaPastures.php');
        }
    }

    public function deletePastures($id)
    {
        require 'Conexao.php';

        $delete_query = " DELETE FROM pastos WHERE id = $id";
        $delete_response = $mysqli->query($delete_query);

        if ($delete_response == true) {
            session_start();
            $_SESSION['delete_pastures_success'] = true;
            header('Location: ../pages/areaPastures.php');
        } else {
            session_start();
            $_SESSION['delete_pastures_fail'] = true;
            header('Location: ../pages/areaPastures.php');
        }
    }
}
