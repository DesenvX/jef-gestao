<?php 

require_once '../services/Collaborators.php';

use services\collaborators;

$collaborators = new collaborators();

$phone = $_POST['phone'];
$cpf = $_POST['cpf'];

$contPhone = strlen($phone);
$contCpf = strlen($cpf);

if($_POST('name') != '' || $contPhone == 11 || $contCpf == 11){
    return $collaborators->postCollaborators($_POST);
} else {
    header('Location: ../pages/areaCollaborators.php');
}

