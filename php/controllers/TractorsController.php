<?php
require_once '../services/Tractors.php';

use services\Tractors;

$tractors = new Tractors();

if (isset($_POST['register'])) {
    return $tractors->postTractors($_POST);
}

if (isset($_POST['edit'])) {
    return $tractors->putTractors($_POST);
}

if (isset($_POST['delete'])) {
    return $tractors->deleteTractors($_POST['id']);
}