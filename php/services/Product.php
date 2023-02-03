<?php

namespace services;

class Product
{
    public function getProduct()
    {
        require 'Conexao.php';

        $product_query = "SELECT * FROM produtos";
        $product_response = $mysqli->query($product_query);
        return $product_response;
    }

    public function postProduct($request)
    {
        require 'Conexao.php';

        $nomeProduto = $mysqli->escape_string($request['nameProduct']);
        $quantidade = $mysqli->escape_string($request['quantityProduct']);
        $categoria = $mysqli->escape_string($request['category']);
        $maximum = $mysqli->escape_string($request['maximum']);
        $minimum = $mysqli->escape_string($request['minimum']);

        $create_query = "INSERT INTO produtos (nome, quantidade, categorias, maxima, minima) VALUES ('$nomeProduto', '$quantidade', '$categoria', '$maximum', '$minimum')";
        $create_response = $mysqli->query($create_query);

        if ($create_response == true) {
            session_start();
            $_SESSION['register_product_success'] = true;
            header('Location: ../pages/areaProduct.php');
        } else {
            session_start();
            $_SESSION['register_product_fail'] = true;
            header('Location: ../pages/areaProduct.php');
        }
    }

    public function putProduct($request)
    {
        require 'Conexao.php';

        $id = $mysqli->escape_string($request['id']);
        $nomeProduto = $mysqli->escape_string($request['nameProduct']);
        $quantidade = $mysqli->escape_string($request['quantityProduct']);
        $categoria = $mysqli->escape_string($request['category']);
        $maximum = $mysqli->escape_string($request['maximum']);
        $minimum = $mysqli->escape_string($request['minimum']);


        $update_query = "UPDATE produtos SET nome = '$nomeProduto', quantidade = '$quantidade', categorias = '$categoria', maxima = '$maximum', minima = '$minimum' WHERE id = $id";
        $update_response = $mysqli->query($update_query);

        if ($update_response == true) {
            session_start();
            $_SESSION['edit_product_success'] = true;
            header('Location: ../pages/areaProduct.php');
        } else {
            session_start();
            $_SESSION['edit_product_fail'] = true;
            header('Location: ../pages/areaProduct.php');
        }
    }

    public function deleteProduct($id)
    {
        require 'Conexao.php';

        $delete_query = " DELETE FROM produtos WHERE id = $id";
        $delete_response = $mysqli->query($delete_query);

        if ($delete_response == true) {
            session_start();
            $_SESSION['delete_product_success'] = true;
            header('Location: ../pages/areaProduct.php');
        } else {
            session_start();
            $_SESSION['delete_product_fail'] = true;
            header('Location: ../pages/areaProduct.php');
        }
    }
}
