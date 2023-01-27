<?php

namespace services;

class Login
{

    public function getLogin($request)
    {

        require 'Conexao.php';

        $usuario = $mysqli->escape_string($request['user']);
        $senha = $mysqli->escape_string($request['password']);

        $user_query = "SELECT * FROM usuarios WHERE usuario='$usuario' AND senha='$senha'";
        $user_response = $mysqli->query($user_query);
        $user_result = $user_response->num_rows;

        if ($user_result == 1) {
            session_start();
            $user = $user_response->fetch_assoc();
            $_SESSION[$user['nome']] = true;
            $_SESSION['login_success'] = true;
            header('Location: ../pages/dashboard.php');
        } else {
            session_start();
            $_SESSION['login_fail'] = true;
            header('Location: ../pages/authLogin.php');
        }
    }
}
