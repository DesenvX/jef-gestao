<?php

namespace services;

class Login
{

    public function getLogin($request)
    {
        /* 
        require 'Conexao.php';

        $usuario = $request['user'];
        $senha = $request['password'];

        $user_query = "SELECT * FROM usuarios WHERE usuario='$usuario', senha='$senha'";
        $user_response = $connection->query($user_query); 

        if ($user_response) {
            session_start();
            $_SESSION['login_success'];
            header('Location: ../pages/dashboard.php');
        } else {
            session_start();
            $_SESSION['login_fail'];
            header('Location: ../pages/authLogin.php');
        }
        */

        session_start();
        $_SESSION['login_success'];
        header('Location: ../pages/dashboard.php');
    }
}
