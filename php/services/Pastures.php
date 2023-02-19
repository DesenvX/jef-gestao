<?php

namespace services;

class Pastures
{
    public function getCountPastures()
    {
        require 'Conexao.php';

        $pastures_query = "SELECT COUNT(*) as count_pastos FROM pastos";
        $pastures_response = $mysqli->query($pastures_query);
        $pastures_result = $pastures_response->fetch_assoc();

        return $pastures_result;
    }

    public function getPasturesForSomething($id)
    {
        require 'Conexao.php';

        $pastures_query = "SELECT * FROM pastos WHERE id = $id";
        $pastures_response = $mysqli->query($pastures_query);
        $pastures_result = $pastures_response->fetch_assoc();

        return $pastures_result;
    }

    public function getPastures()
    {
        require 'Conexao.php';

        $pastures_query = "SELECT * FROM pastos";
        $pastures_response = $mysqli->query($pastures_query);
        return $pastures_response;
    }

    public function postPastures($request, $retreat)
    {
        require 'Conexao.php';

        $retreat_id = $mysqli->escape_string($retreat['id']);
        $retreat_nome = $mysqli->escape_string($retreat['nome']);
        $name = $mysqli->escape_string($request['name']);
        $farm = $mysqli->escape_string($request['farm']);

        $create_query = "INSERT INTO pastos (nome, id_retiro, retiro, fazenda) VALUES ('$name', '$retreat_id', '$retreat_nome', '$farm')";
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

    public function putPastures($request, $retreat)
    {
        require 'Conexao.php';

        $retreat_id = $retreat['id'];
        $retreat_nome = $retreat['nome'];
        $id = $mysqli->escape_string($request['id']);
        $name = $mysqli->escape_string($request['name']);
        $farm = $mysqli->escape_string($request['farm']);
        
        $update_query = "UPDATE pastos SET nome = '$name', id_retiro = '$retreat_id', retiro = '$retreat_nome', fazenda = '$farm' WHERE id = $id";
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
