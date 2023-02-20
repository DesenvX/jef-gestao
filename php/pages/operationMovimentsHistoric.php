<!DOCTYPE html>
<html lang="pt-br">

<head>

    <title> JEF Gestão </title>

    <?php
    include('../../html/links_and_cdns.html');
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
use services\Movements;

$collaborators = new Collaborators();
$collaborators_list = $collaborators->getCollaborators();
$tractor = new Tractors();
$tractor_list = $tractor->getCountTractor();
$pastures = new Pastures();
$pastures_list = $pastures->getPastures();
$moviments = new Movements();
$moviments_list = $moviments->getMovements();

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
                                            <th>Hora Inicial</th>
                                            <th>Hora Final</th>
                                            <th>Operador</th>
                                            <th>Maquina</th>
                                            <th>Pasto</th>
                                            <th>Opções</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Data</th>
                                            <th>Hora Inicial</th>
                                            <th>Hora Final</th>
                                            <th>Operador</th>
                                            <th>Maquina</th>
                                            <th>Pasto</th>
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
                                                <td><?= $pasto['nome'] ?> (<?= $pasto['retiro']?>) </td>
                                                <td>
                                                    <button type="button" class="btn btn-warning btn-circle btn-sm" data-toggle="modal" data-target="#modalEditMoviment">
                                                        <i class="fas fa-pen"></i>
                                                    </button>
                                                    <div name="EditMoviment" class="modal fade" id="modalEditMoviment" tabindex="-1" role="dialog" aria-hidden="true">
                                                        <div class="modal-dialog modal-sm" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-body">
                                                                    <div class="text-center">
                                                                        <img src="../../img/trator.png" width="100" height="100" style="margin-bottom: 10px;">
                                                                    </div>
                                                                    <div class="text-center">
                                                                        <h1 class="h4 text-gray-900 mb-4"><b style="color: #566573;">Editar Historico</b></h1>
                                                                    </div>
                                                                    <form class="user" action="../controllers/MovimentsController.php" method="POST">
                                                                        <input type="hidden" name="edit" value="true">
                                                                        <input type="hidden" name="id" value="">
                                                                        <div class="form-group row">
                                                                            <div class="col-sm-12 mb-3 mb-sm-0">
                                                                                <input type="text" class="form-control  " id="date" placeholder="Data">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <div class="col-sm-12 mb-3 mb-sm-0">
                                                                                <input type="text" class="form-control  " id="start-time" placeholder="Hora Inicial">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <div class="col-sm-12 mb-3 mb-sm-0">
                                                                                <input type="text" class="form-control  " id="end-time" placeholder="Hora Final ">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <div class="col-sm-12 mb-3 mb-sm-0">
                                                                                <input type="text" class="form-control  " id="operator" placeholder="Operador">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <div class="col-sm-12 mb-3 mb-sm-0">
                                                                                <input type="text" class="form-control  " id="machine" placeholder="Maquina">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <div class="col-sm-12 mb-3 mb-sm-0">
                                                                                <input type="text" class="form-control  " id="pasture" placeholder="Pasto">
                                                                            </div>
                                                                        </div>
                                                                        <hr>
                                                                        <button type="submit" class="btn btn-user btn-warning btn-block"> Salvar </button>
                                                                        <button type="button" class="btn btn-user btn-danger btn-block" data-dismiss="modal"> Cancelar </button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <button class="btn btn-danger btn-circle btn-sm" data-toggle="modal" data-target="#modalDeleteMoviment">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                    <div name="DeleteCategories" class="modal fade" id="modalDeleteMoviment" tabindex="-1" role="dialog" aria-hidden="true">
                                                        <div class="modal-dialog modal-sm" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-body">
                                                                    <div class="text-center">
                                                                        <h1 class="h4 text-gray-900 mb-4"><b style="color: #566573;">Deseja excluir este registro de <br><strong> </strong> ?</span></b></h1>
                                                                    </div>
                                                                    <form class="user" action="../controllers/MovimentsController.php" method="POST">
                                                                        <input type="hidden" name="delete" value="true">
                                                                        <input type="hidden" name="id" value="">
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

</html>