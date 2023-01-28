<?php

namespace services;

class Functions
{
    public function getFunctions()
    {
        require 'Conexao.php';

        $functions_query = "SELECT * FROM funcoes";
        $functions_response = $mysqli->query($functions_query);
        return $functions_response;
    }

    public function postFunctions($request)
    {
        require 'Conexao.php';

        $name = $mysqli->escape_string($request['name']);

        $create_query = "INSERT INTO funcoes (nome) VALUES ('$name')";
        $create_response = $mysqli->query($create_query);

        if ($create_response == true) {
            session_start();
            $_SESSION['register_functions_success'] = true;
            header('Location: ../pages/areaFunctions.php');
        } else {
            session_start();
            $_SESSION['register_functions_fail'] = true;
            header('Location: ../pages/areaFunctions.php');
        }
    }

    public function putFunctions($request)
    {
        require 'Conexao.php';

        $id = $mysqli->escape_string($request['id']);
        $name = $mysqli->escape_string($request['name']);

        $update_query = "UPDATE funcoes SET nome = '$name' WHERE id = $id";
        $update_response = $mysqli->query($update_query);

        if ($update_response == true) {
            session_start();
            $_SESSION['edit_functions_success'] = true;
            header('Location: ../pages/areaFunctions.php');
        } else {
            session_start();
            $_SESSION['edit_functions_fail'] = true;
            header('Location: ../pages/areaFunctions.php');
        }
    }

    public function deleteFunctions($id)
    {
        require 'Conexao.php';

        $delete_query = " DELETE FROM funcoes WHERE id = $id";
        $delete_response = $mysqli->query($delete_query);

        if ($delete_response == true) {
            session_start();
            $_SESSION['delete_functions_success'] = true;
            header('Location: ../pages/areaFunctions.php');
        } else {
            session_start();
            $_SESSION['delete_functions_fail'] = true;
            header('Location: ../pages/areaFunctions.php');
        }
    }
}
