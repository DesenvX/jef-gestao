<?php

$host = "localhost";
$user = "root";
$pass = "12345678"; //Alterei por causa do meu banco de dados
$db = "jef_gestao";

$mysqli = new mysqli($host, $user, $pass, $db); 
    if ($mysqli->connect_errno) {
        echo "Connect Falid: " . $mysqli->connect_error;
        exit();
    }