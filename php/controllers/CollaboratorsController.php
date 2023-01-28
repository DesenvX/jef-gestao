<?php
require_once '../services/Collaborators.php';
require_once '../functions/Validations.php';

use services\Collaborators;
use functions\Validations;


$collaborators = new Collaborators();
$validations = new Validations();

if (isset($_POST['register'])) {
    $validacaoCpf = $validations->ValidateCpf($_POST['cpf']);
    if ($validacaoCpf == true) {
        return $collaborators->postCollaborators($_POST);
    } else {
        session_start();
        $_SESSION['validate_cpf_failed'] = true;
        header('Location: ../pages/areaCollaborators.php');
    }
}
