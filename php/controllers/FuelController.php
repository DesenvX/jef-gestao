<?php

require_once '../services/Fuel.php';
require_once '../services/Services.php';
require_once '../services/Pastures.php';
require_once '../services/Tractors.php';
require_once '../services/Collaborators.php';

use services\Fuel;
use services\Services;
use services\Pastures;
use services\Tractors;
use services\Collaborators;

$fuel = new Fuel();
$services = new Services();
$pastures = new Pastures();
$tractors = new Tractors();
$collaborators = new Collaborators();

if (isset($_POST['register'])) {

    if ($_POST['output']) {

        $retreat = $retreats->getServicesForSomething($_POST['retreat']);
        $_RETREAT = $retreat;
        $_SELECTS = '';
        return $fuel->postFuelOutput($_POST, $_SELECTS);
        
    }
    if ($_POST['intake']) {

        $_SUPPLIER = '';
        $_POST['value-total'] = $_POST['value-liters'] * $_POST['liters'];
        return $fuel->postFuelIntake($_POST, $_SUPPLIER);

    } else {

        session_start();
        $_SESSION['register_fuel_failed'] = true;
        header('Location: ../pages/operationFuel.php');

    }
}
if (isset($_POST['edit'])) {
    return $fuel->putFuel($_POST);
}

if (isset($_POST['delete'])) {

    if ($_POST['output']) {

        return $fuel->deleteFuelOutput($_POST['id']);

    }
    if ($_POST['intake']) {

        return $fuel->deleteFuelIntake($_POST['id']);

    } else {

        session_start();
        $_SESSION['register_fuel_failed'] = true;
        header('Location: ../pages/operationFuel.php');

    }
}
