<?php

namespace services;

class Services
{
    public function getServicesForSomething($id)
    {
        
    }

    public function getServices()
    {
        require 'Conexao.php';

        $services_query = "SELECT * FROM servicos";
        $services_response = $mysqli->query($services_query);
        return $services_response;
    }

    public function postServices($request)
    {
        require 'Conexao.php';

        $description = $mysqli->escape_string($request['description']);

        $create_query = "INSERT INTO servicos (descricao) VALUES ('$description')";
        $create_response = $mysqli->query($create_query);

        if ($create_response == true) {
            session_start();
            $_SESSION['register_services_success'] = true;
            header('Location: ../pages/areaServices.php');
        } else {
            session_start();
            $_SESSION['register_services_fail'] = true;
            header('Location: ../pages/areaServices.php');
        }
    }

    public function putServices($request)
    {
        require 'Conexao.php';

        $id = $mysqli->escape_string($request['id']);
        $description = $mysqli->escape_string($request['description']);

        $update_query = "UPDATE servicos SET descricao = '$description' WHERE id = $id";
        $update_response = $mysqli->query($update_query);

        if ($update_response == true) {
            session_start();
            $_SESSION['edit_services_success'] = true;
            header('Location: ../pages/areaServices.php');
        } else {
            session_start();
            $_SESSION['edit_services_fail'] = true;
            header('Location: ../pages/areaServices.php');
        }
    }

    public function deleteServices($id)
    {
        require 'Conexao.php';

        $delete_query = " DELETE FROM servicos WHERE id = $id";
        $delete_response = $mysqli->query($delete_query);

        if ($delete_response == true) {
            session_start();
            $_SESSION['delete_services_success'] = true;
            header('Location: ../pages/areaServices.php');
        } else {
            session_start();
            $_SESSION['delete_services_fail'] = true;
            header('Location: ../pages/areaServices.php');
        }
    }
}
