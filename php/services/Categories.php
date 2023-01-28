<?php

namespace services;
class Categories
{

    public function getCategories()
    {
        require 'Conexao.php';

        $categories_query = "SELECT * FROM categorias";
        $categories_response = $mysqli->query($categories_query);
        return $categories_response;
    }

    public function postCategories($request)
    {
        require 'Conexao.php';
        
        $name = $mysqli->escape_string($request['name']);

        $create_query = "INSERT INTO categorias (nome) VALUES ('$name')";

        $create_response = $mysqli->query($create_query);

        if ($create_response == true) {
            session_start();
            $_SESSION['register_categories_success'] = true;
            header('Location: ../pages/areaCategories.php');
        } else {
            session_start();
            $_SESSION['register_categories_fail'] = true;
            header('Location: ../pages/areaCategories.php');
        }
    }

    public function putCategories($request)
    {
        require 'Conexao.php';

        $id = $mysqli->escape_string($request['id']);
        $name = $mysqli->escape_string($request['name']);

        $update_query = "UPDATE categorias SET nome = '$name' WHERE id = $id";
        $update_response = $mysqli->query($update_query);

        if ($update_response == true) {
            session_start();
            $_SESSION['edit_categories_success'] = true;
            header('Location: ../pages/areaCategories.php');
        } else {
            session_start();
            $_SESSION['edit_categories_fail'] = true;
            header('Location: ../pages/areaCategories.php');
        }
    }

    public function deleteCategories($id)
    {
        require 'Conexao.php';

        $delete_query = " DELETE FROM categorias WHERE id = $id";
        $delete_response = $mysqli->query($delete_query);

        if ($delete_response == true) {
            session_start();
            $_SESSION['delete_categories_success'] = true;
            header('Location: ../pages/areaCategories.php');
        } else {
            session_start();
            $_SESSION['delete_categories_fail'] = true;
            header('Location: ../pages/areaCategories.php');
        }

    }
}