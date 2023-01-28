<?php
require_once '../services/Functions.php';

use services\Functions;

$functions = new Functions();

if (isset($_POST['register'])) {
    return $functions->postFunctions($_POST);
}

if (isset($_POST['edit'])) {
    return $functions->putFunctions($_POST);
}

if (isset($_POST['delete'])) {
    return $functions->deleteFunctions($_POST['id']);
}