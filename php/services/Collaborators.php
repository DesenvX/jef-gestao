<?php

namespace services;


class Collaborators
{
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
            $_SESSION['register_fail'] = true;
            header('Location: ../pages/areaCollaborators.php');
        }
    }

    public function getColaboradores()
    {
        require 'Conexao.php';

        $colaboradores_query = "SELECT * FROM colaboradores";
        $colaboradores_response = $mysqli->query($colaboradores_query);
        return $colaboradores_response;
    }
}
