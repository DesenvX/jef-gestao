<?php
require_once '../services/Suppliers.php';
require_once '../functions/Validations.php';

use functions\Validations;
use services\Suppliers;

$suppliers = new Suppliers();
$validations = new Validations();

if (isset($_POST['register'])) {

    $cpf_or_cnpj = $_POST['cpf_or_cnpj'];
    $type_persona = $_POST['type_persona'];

    if ($type_persona == 'Pessoa Fisica') {
        if (strlen($cpf_or_cnpj) == 11) {

            $validacaoCpf = $validations->ValidateCpf($_POST['cpf_or_cnpj']);
            if ($validacaoCpf == true) {
                return $suppliers->postSuppliers($_POST);
            } else {
                session_start();
                $_SESSION['validate_cpf_failed'] = true;
                header('Location: ../pages/areaSuppliers.php');
            }
        } else {
            session_start();
            $_SESSION['validate_cpf_failed'] = true;
            header('Location: ../pages/areaSuppliers.php');
        }
    }

    if ($type_persona == 'Pessoa Juridica') {

        if (strlen($cpf_or_cnpj) == 14) {
            $validacaoCnpj = $validations->ValidateCnpj($_POST['cpf_or_cnpj']);
            if ($validacaoCnpj == true) {
                return $suppliers->postSuppliers($_POST);
            } else {
                session_start();
                $_SESSION['validate_cnpj_failed'] = true;
                header('Location: ../pages/areaSuppliers.php');
            }
        } else {
            session_start();
            $_SESSION['validate_cnpj_failed'] = true;
            header('Location: ../pages/areaSuppliers.php');
        }
    }
}

if (isset($_POST['edit'])) {
    return $suppliers->putSuppliers($_POST);
}

if (isset($_POST['delete'])) {
    return $suppliers->deleteSuppliers($_POST['id']);
}
