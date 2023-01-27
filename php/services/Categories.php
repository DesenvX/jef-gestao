<?php

namespace services;

class Categories
{
    public function postCategories($request)
    {
        require 'Conexao.php';
        $name = $mysqli->escape_string($request['name']);

        $create_query = "INSERT INTO categorias (nome) VALUES ('$name')";

        $create_response = $mysqli->query($create_query);

        if ($create_response == 1) {
            session_start();
            $_SESSION['register_success'] = true;
            header('Location: ../pages/areaCategories.php');
        } else {
            session_start();
            $_SESSION['register_fail'] = true;
            header('Location: ../pages/areaCategories.php');
        }
    }
}
