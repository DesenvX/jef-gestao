<?php
require_once '../services/Pastures.php';
require_once '../services/Retreats.php';

use services\Pastures;
use services\Retreats;

$pastures = new Pastures();
$retreats = new Retreats();

if (isset($_POST['register'])) {
    $retreat = $retreats->getRetreatByPasture($_POST['retreat']);
    $_RETREAT = $retreat;
    return $pastures->postPastures($_POST, $_RETREAT);
}

if (isset($_POST['edit'])) {
    $retreat = $retreats->getRetreatByPasture($_POST['retreat']);
    $_RETREAT = $retreat;
    return $pastures->putPastures($_POST, $_RETREAT);
}

if (isset($_POST['delete'])) {
    return $pastures->deletePastures($_POST['id']);
}