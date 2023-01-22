<?php

namespace services;

class Login
{
    public function getLogin($user, $password)
    {
        header("Location: ../pages/dashboard.php");
        exit;
    }
}
