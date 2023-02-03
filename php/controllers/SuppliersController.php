<?php
require_once '../services/Suppliers.php';

use services\Suppliers;

$suppliers = new Suppliers();

if (isset($_POST['register'])) {
    return $suppliers->postSuppliers($_POST);
}

if (isset($_POST['edit'])) {
    return $suppliers->putSuppliers($_POST);
}

if (isset($_POST['delete'])) {
    return $suppliers->deleteSuppliers($_POST['id']);
}
