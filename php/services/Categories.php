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

        if ($create_response == true) {
            session_start();
            $_SESSION['register_success'] = true;
            header('Location: ../pages/areaCategories.php');
        } else {
            session_start();
            $_SESSION['register_fail'] = true;
            header('Location: ../pages/areaCategories.php');
        }
    }

    public function getCategories()
    {
        require 'Conexao.php';

        $categories_query = "SELECT * FROM categorias";
        $categories_response = $mysqli->query($categories_query);
        return $categories_response;
    }
}
