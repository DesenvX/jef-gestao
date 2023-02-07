<?php

namespace services;


class Collaborators
{
    public function getCollaborators()
    {
        require 'Conexao.php';

        $colaboradores_query = "SELECT * FROM colaboradores";
        $colaboradores_response = $mysqli->query($colaboradores_query);
        return $colaboradores_response;
    }

    public function postCollaborators($request)
    {
        require 'Conexao.php';

        $name = $mysqli->escape_string($request['name']);
        $phone = $mysqli->escape_string($request['phone']);
        $cpf = $mysqli->escape_string($request['cpf']);

        $collaborators_query = "INSERT INTO colaboradores (nome,telefone,cpf) VALUES('$name', '$phone', '$cpf')";
        $collaborators_response = $mysqli->query($collaborators_query);

        if ($collaborators_response == true) {
            session_start();
            $_SESSION['register_collaborators_success'] = true;
            header('Location: ../pages/areaCollaborators.php');
        } else {
            session_start();
            $_SESSION['register_collaborators_fail'] = true;
            header('Location: ../pages/areaCollaborators.php');
        }
    }

    public function putCollaborators($request)
    {
        require 'Conexao.php';

        $id = $mysqli->escape_string($request['id']);
        $name = $mysqli->escape_string($request['name']);
        $phone = $mysqli->escape_string($request['phone']);
        $cpf = $mysqli->escape_string($request['cpf']);

        $update_query = "UPDATE colaboradores SET nome = '$name', telefone = '$phone', cpf = '$cpf' WHERE id = $id";
        $update_response = $mysqli->query($update_query);

        if ($update_response == true) {
            session_start();
            $_SESSION['edit_collaborators_success'] = true;
            header('Location: ../pages/areaCollaborators.php');
        } else {
            session_start();
            $_SESSION['edit_collaborators_fail'] = true;
            header('Location: ../pages/areaCollaborators.php');
        }
    }

    public function deleteCollaborators($id)
    {
        require 'Conexao.php';

        $delete_query = " DELETE FROM colaboradores WHERE id = $id";
        $delete_response = $mysqli->query($delete_query);

        if ($delete_response == true) {
            session_start();
            $_SESSION['delete_collaborators_success'] = true;
            header('Location: ../pages/areaCollaborators.php');
        } else {
            session_start();
            $_SESSION['delete_collaborators_fail'] = true;
            header('Location: ../pages/areaCollaborators.php');
        }

    }
}
