<?php
require_once '../services/Pastures.php';

use services\Pastures;

$pastures = new Pastures();

if (isset($_POST['register'])) {
    
    return $pastures->postPastures($_POST);
}

if (isset($_POST['edit'])) {
    return $pastures->putPastures($_POST);
}

if (isset($_POST['delete'])) {
    return $pastures->deletePastures($_POST['id']);
}