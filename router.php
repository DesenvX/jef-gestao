<?php

if ($_SERVER['REQUEST_URI'] === '/login' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once 'php/controllers/LoginController.php';
    $login = new LoginController();
    $login->verifyAuth($_POST);
  }
