<?php
require_once '../services/Suppliers.php';

use services\Suppliers;

$suppliers = new Suppliers();

if (isset($_POST['register'])) {
    if (strlen($cpf_or_cnpj) == 11) {
        // Verifica se é um CPF
        return $suppliers->postSuppliers($_POST);
    } elseif (strlen($cpf_or_cnpj) == 14) {
        // Verifica se é um CNPJ
        return $suppliers->postSuppliers($_POST);
    } else {
        session_start();
        $_SESSION['validate_cnpj_failed'] = true;
        header('Location: ../pages/areaSuppliers.php');
    }
}

if (isset($_POST['edit'])) {
    return $suppliers->putSuppliers($_POST);
}

if (isset($_POST['delete'])) {
    return $suppliers->deleteSuppliers($_POST['id']);
}
