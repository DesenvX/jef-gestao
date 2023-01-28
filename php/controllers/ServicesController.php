<?php
require_once '../services/Services.php';

use services\Services;

$services = new Services();

if (isset($_POST['register'])) {
    return $services->postServices($_POST);
}

if (isset($_POST['edit'])) {
    return $services->putServices($_POST);
}

if (isset($_POST['delete'])) {
    return $services->deleteServices($_POST['id']);
}