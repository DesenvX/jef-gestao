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

        $type = $mysqli->escape_string($request['type_persona']);
        $name = $mysqli->escape_string($request['name_or_corporate']);
        $cpf_cnpj = $mysqli->escape_string($request['cpf_or_cnpj']);
        $phone = $mysqli->escape_string($request['phone']);

        $create_query = "INSERT INTO fornecedores (tipo_pessoa, nome_razao, cpf_cnpj, telefone) VALUES ('$type','$name','$cpf_cnpj','$phone')";
        $create_response = $mysqli->query($create_query);

        if ($create_response == true) {
            session_start();
            $_SESSION['register_suppliers_success'] = true;
            header('Location: ../pages/areaSuppliers.php');
        } else {
            session_start();
            $_SESSION['register_suppliers_fail'] = true;
            header('Location: ../pages/areaSuppliers.php');
        }
    }

    public function putSuppliers($request)
    {
        require 'Conexao.php';

        $id = $mysqli->escape_string($request['id']);
        $type = $mysqli->escape_string($request['type_persona']);
        $name = $mysqli->escape_string($request['name_or_corporate']);
        $cpf_cnpj = $mysqli->escape_string($request['cpf_or_cnpj']);
        $phone = $mysqli->escape_string($request['phone']);

        $update_query = "UPDATE fornecedores SET tipo_pessoa = '$type', nome_razao = '$name', cpf_cnpj = '$cpf_cnpj', telefone = '$phone'  WHERE id = $id";
        $update_response = $mysqli->query($update_query);

        if ($update_response == true) {
            session_start();
            $_SESSION['edit_suppliers_success'] = true;
            header('Location: ../pages/areaSuppliers.php');
        } else {
            session_start();
            $_SESSION['edit_suppliers_fail'] = true;
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
            $_SESSION['delete_suppliers_success'] = true;
            header('Location: ../pages/areaSuppliers.php');
        } else {
            session_start();
            $_SESSION['delete_suppliers_fail'] = true;
            header('Location: ../pages/areaSuppliers.php');
        }
    }
}
