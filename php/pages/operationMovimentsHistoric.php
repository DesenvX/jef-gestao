<!DOCTYPE html>
<html lang="pt-br">

<head>

    <title>  Gestão de Logística </title>

    <?php
    include('../../html/links_and_cdns.html');
    session_start();
    ?>

</head>
<?php
require_once '../services/Collaborators.php';
require_once '../services/Tractors.php';
require_once '../services/Pastures.php';
require_once '../services/Moviments.php';

use services\Collaborators;
use services\Tractors;
use services\Pastures;
use services\Moviments;

$collaborators = new Collaborators();
$collaborators_list = $collaborators->getCollaborators();
$tractor = new Tractors();
$tractor_list = $tractor->getCountTractor();
$pastures = new Pastures();
$pastures_list = $pastures->getPastures();
$moviments = new Moviments();
$moviments_list = $moviments->getMoviments();

?>

<body id="page-top">

    <div id="wrapper">

        <?php
        include('../../html/sidebar.html');
        ?>

        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">

                <?php
                include('../../html/topbar.html');
                ?>

                <div class="container-fluid">

                    <span style="font-size: small;"> Operações </span>
                    <h1 class="h3 mb-2 text-gray-800"> Historico </h1>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <a href="operationMoviments.php" type="button" class="btn btn-danger btn-sm btn-icon-split" href="controlFuel.php">
                                <span class="icon text-white-50">
                                    <i class="fas fa-arrow-left"></i>
                                </span>
                                <span class="text"> Voltar </span>
                            </a>
                        </div>
                        <div class="card-body">

                            <div name="SearchAndFilter" class="row" style="margin-bottom:20px;">
                                <div class="col-md-5" style="justify-content: end">
                                    <div id=" dataTable_filter" class="dataTables_filter">
                                        <input type="search" id="search" class="form-control form-control-sm" placeholder="Buscar" aria-controls="dataTable">
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Data</th>
                                            <th>Horimetro I.</th>
                                            <th>Horimetro F.</th>
                                            <th>Operador</th>
                                            <th>Maquina</th>
                                            <th>Pasto</th>
                                            <th>Situação</th>
                                            <th>Opções</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Data</th>
                                            <th>Horimetro I.</th>
                                            <th>Horimetro F.</th>
                                            <th>Operador</th>
                                            <th>Maquina</th>
                                            <th>Pasto</th>
                                            <th>Situação</th>
                                            <th>Opções</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php


                                        while ($movimento = $moviments_list->fetch_assoc()) {
                                            $colaborador = $collaborators->getCollaboratorsForSomething($movimento['id_colaborador']);
                                            $pasto = $pastures->getPasturesForSomething($movimento['id_pasto']);
                                            $maquina = $tractor->getTractorForSomething($movimento['id_maquina']);
                                        ?>
                                            <tr>
                                                <th><?= $movimento['id'] ?></th>
                                                <td><?= date('d/m/Y', strtotime($movimento['data'])) ?></td>
                                                <td><?= $movimento['hora_inicial'] ?></td>
                                                <td><?= $movimento['hora_final'] ?></td>
                                                <td><?= $colaborador['nome'] ?></td>
                                                <td><?= $maquina['modelo'] ?></td>
                                                <td><?= $pasto['nome'] ?> (<?= $pasto['retiro'] ?>) </td>
                                                <td><?= $movimento['situacao'] ?></td>
                                                <td>
                                                    <button class="btn btn-danger btn-circle btn-sm" data-toggle="modal" data-target="#modalDeleteMoviment_<?= $movimento['id'] ?>">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                    <div name="DeleteCategories" class="modal fade" id="modalDeleteMoviment_<?= $movimento['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                        <div class="modal-dialog modal-sm" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-body">
                                                                    <div class="text-center">
                                                                        <h1 class="h4 text-gray-900 mb-4"><b style="color: #566573;">Deseja excluir este registro de <br><strong><?= $colaborador['nome'] ?> </strong> ?</span></b></h1>
                                                                    </div>
                                                                    <form class="user" action="../controllers/MovimentsController.php" method="POST">
                                                                        <input type="hidden" name="delete" value="true">
                                                                        <input type="hidden" name="id" value="<?= $movimento['id'] ?>">
                                                                        <hr>
                                                                        <button type="submit" class="btn btn-user btn-dark btn-block"> Sim, excluir! </button>
                                                                        <button type="button" class="btn btn-user btn-danger btn-block" data-dismiss="modal"> Cancelar </button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            include('../../html/footer.html');
            ?>

        </div>

    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <?php include('../../html/scripts.html'); ?>

</body>

<?php
if (isset($_SESSION['register_moviments_success'])) {
?>
    <script>
        swalRegisterSuccess();
    </script>
<?php
    unset($_SESSION['register_moviments_success']);
}
?>

<?php
if (isset($_SESSION['register_moviments_fail'])) {
?>
    <script>
        swalRegisterError();
    </script>
<?php
    unset($_SESSION['register_moviments_fail']);
}
?>

<?php
if (isset($_SESSION['delete_moviments_success'])) {
?>
    <script>
        swalDeleteSuccess();
    </script>
<?php
    unset($_SESSION['delete_moviments_success']);
}
?>

<?php
if (isset($_SESSION['delete_moviments_fail'])) {
?>
    <script>
        swalDeleteError();
    </script>
<?php
    unset($_SESSION['delete_moviments_fail']);
}
?>
<?php
if (isset($_SESSION['validate_cnpj_failed'])) {
?>
    <script>
        swalValidateCnpjError();
    </script>
<?php
    unset($_SESSION['validate_cnpj_failed']);
}
?>
<?php
if (isset($_SESSION['validate_cpf_failed'])) {
?>
    <script>
        swalValidateCpfError();
    </script>
<?php
    unset($_SESSION['validate_cpf_failed']);
}
?>

</html>