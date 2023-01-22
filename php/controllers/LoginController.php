<?php

require_once('../services/Login.php');

use services\Login;

class LoginController
{
    public function verifyAuth($request)
    {
        $login = new Login();

        $user = 'João';
        $password = '27072001';

        $request = $login->getLogin($user, $password);

        return $request;

    }
}
