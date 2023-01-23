<?php

require_once('../../config/Environment.php');

use config\Environment;

Environment::load();

$host = "{$_ENV['HOST']}";
$user = "{$_ENV['USER']}";
$pass = "{$_ENV['PASSWORD']}";
$db = "{$_ENV['DATABASE']}";

$connection = new mysqli($host, $user, $pass, $db);
if ($connection->connect_error) {
    echo "Falha na Conexao: " . $connection->connect_error;
    exit();
}
