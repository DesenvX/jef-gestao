<?php

namespace services;

class Functions
{
    public function postFunctions($request)
    {
        require 'Conexao.php';

        $name = $mysqli->escape_string($request['name']);

        $create_query = "INSERT INTO funcao (nome) VALUES ('$name')";
        $create_response = $mysqli->query($create_query);

        if ($create_response == true) {
            session_start();
            $_SESSION['register_success'] = true;
            header('Location: ../pages/areaFunctions.php');
        } else {
            session_start();
            $_SESSION['register_fail'] = true;
            header('Location: ../pages/areaFunctions.php');
        }
    }
    public function getFunctions()
    {
        require 'Conexao.php';

        $functions_query = "SELECT * FROM funcao";
        $functions_response = $mysqli->query($functions_query);
        return $functions_response;
    }
}
