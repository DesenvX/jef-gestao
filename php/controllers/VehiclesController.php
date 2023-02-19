<?php
require_once '../services/Vehicles.php';

use services\Vehicles;

$vehicle = new Vehicles();

if (isset($_POST['register'])) {
    return $vehicle->postVehicles($_POST);
}

if (isset($_POST['edit'])) {
    return $vehicle->putVehicles($_POST);
}

if (isset($_POST['delete'])) {
    return $vehicle->deleteVehicles($_POST['id']);
}
