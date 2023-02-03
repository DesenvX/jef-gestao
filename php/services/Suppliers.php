<?php

namespace services;

class Suppliers
{

    public function getSuppliers()
    {
        require 'Conexao.php';

        $suppliers_query = "SELECT * FROM fornecedores";
        $suppliers_response = $mysqli->query($suppliers_query);
        return $suppliers_response;
    }

    public function postSuppliers($request)
    {
        require 'Conexao.php';

        $name = $mysqli->escape_string($request['name']);
        $nameFantasy = $mysqli->escape_string($request['nameFantasy']);
        $kindOfPerson = $mysqli->escape_string($request['kindOfPerson']);
        $telephone = $mysqli->escape_string($request['telephone']);

        $create_query = "INSERT INTO fornecedores (nome, nomeFantasia, tipo, telefone) VALUES ('$name','$nameFantasy','$kindOfPerson', '$telephone')";
        $create_response = $mysqli->query($create_query);

        if ($create_response == true) {
            session_start();
            $_SESSION['register_categories_success'] = true;
            header('Location: ../pages/areaSuppliers.php');
        } else {
            session_start();
            $_SESSION['register_categories_fail'] = true;
            header('Location: ../pages/areaSuppliers.php');
        }
    }

    public function putSuppliers($request)
    {
        require 'Conexao.php';

        $id = $mysqli->escape_string($request['id']);
        $name = $mysqli->escape_string($request['name']);
        $nameFantasy = $mysqli->escape_string($request['nameFantasy']);
        $kindOfPerson = $mysqli->escape_string($request['kindOfPerson']);
        $telephone = $mysqli->escape_string($request['telephone']);

        $update_query = "UPDATE fornecedores SET nome = '$name', nomeFantasia = '$nameFantasy', tipo = '$kindOfPerson', telefone = '$telephone'  WHERE id = $id";
        $update_response = $mysqli->query($update_query);

        if ($update_response == true) {
            session_start();
            $_SESSION['edit_categories_success'] = true;
            header('Location: ../pages/areaSuppliers.php');
        } else {
            session_start();
            $_SESSION['edit_categories_fail'] = true;
            header('Location: ../pages/areaSuppliers.php');
        }
    }

    public function deleteSuppliers($id)
    {
        require 'Conexao.php';

        $delete_query = " DELETE FROM fornecedores WHERE id = $id";
        $delete_response = $mysqli->query($delete_query);

        if ($delete_response == true) {
            session_start();
            $_SESSION['delete_categories_success'] = true;
            header('Location: ../pages/areaSuppliers.php');
        } else {
            session_start();
            $_SESSION['delete_categories_fail'] = true;
            header('Location: ../pages/areaSuppliers.php');
        }
    }
}
