<?php
require_once '../services/Vehicle.php';

use services\Vehicle;

$vehicle = new Vehicle();

if (isset($_POST['register'])) {
    return $vehicle->postVehicle($_POST);
}

if (isset($_POST['edit'])) {
    return $vehicle->putVehicle($_POST);
}

if (isset($_POST['delete'])) {
    return $vehicle->deleteVehicle($_POST['id']);
}
