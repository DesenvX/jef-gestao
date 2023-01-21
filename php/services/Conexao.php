<?php

require_once('../../config/Environment.php');

use config\Environment;

Environment::load();

$host = "{$_ENV['HOST']}";
$user = "{$_ENV['USER']}";
$pass = "{$_ENV['PASSWORD']}";
$db = "{$_ENV['DATABASE']}";

$mysqli = new mysqli($host, $user, $pass, $db);
if ($mysqli->connect_errno) {
    echo "Falha na Conexao: " . $mysqli->connect_error;
    exit();
}
