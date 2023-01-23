<?php
require_once '../services/Login.php';

use services\Login;

$login = new Login();

if ($_POST['user'] != '' || $_POST['password'] != '') {
    return $login->getLogin($_POST);
} else {
    header('Location: ../pages/authLogin.php');
}
