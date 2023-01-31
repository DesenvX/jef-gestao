<?php
require_once '../services/Retreat.php';

use services\Retreat;

$retreat = new Retreat();

if (isset($_POST['register'])) {
    return $retreat->postRetreat($_POST);
}

if (isset($_POST['edit'])) {
    return $retreat->putRetreat($_POST);
}

if (isset($_POST['delete'])) {
    return $retreat->deleteRetreat($_POST['id']);
}