<?php
require_once '../services/Retreats.php';

use services\Retreats;

$retreats = new Retreats();

if (isset($_POST['register'])) {
    return $retreats->postRetreats($_POST);
}

if (isset($_POST['edit'])) {
    return $retreats->putRetreats($_POST);
}

if (isset($_POST['delete'])) {
    return $retreats->deleteRetreats($_POST['id']);
}