<?php
require_once '../services/Functions.php';

use services\Functions;

$functions = new Functions();

if (isset($_POST['register'])) {
    return $functions->postFunctions($_POST);
}