<?php
require_once '../services/Prices.php';

use services\Prices;

$prices = new Prices();

if (isset($_POST['register'])) {
    return $prices->postPrices($_POST);
}

if (isset($_POST['edit'])) {
    return $prices->putPrices($_POST);
}

if (isset($_POST['delete'])) {
    return $prices->deletePrices($_POST['id']);
}