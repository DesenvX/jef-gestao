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

use services\Collaborators;
use services\Tractors;

$collaborators = new Collaborators();
$collaborators_list = $collaborators->getCollaborators();
$tractors = new Tractors();
$tractors_list = $tractors->getTractors();

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

                    <div class="row" style="align-items:center;">
                        <div class="col">
                            <span style="font-size: small;"> Operações </span>
                            <h1 class="h3 mb-2 text-gray-800"> Gerar Relatório de Máquinas </h1>
                        </div>
                        <div class="col row mr-1" style="justify-content: end;">
                            <a href="operationMoviments.php" type="button" class="btn btn-danger btn-sm btn-icon-split" href="operationMoviments.php">
                                <span class="icon text-white-50">
                                    <i class="fas fa-arrow-left"></i>
                                </span>
                                <span class="text"> Voltar </span>
                            </a>
                        </div>
                    </div>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <form action="../controllers/MovimentsController" method="POST">
                                <input type="hidden" name="filter-data-report" value="true">
                                <div class="form-group row" style="align-items:center;">
                                    <div class="col-sm-2">
                                        <select class="form-control" name="machine" placeholder="Maquina" required>
                                            <option value=""> Maquina </option>
                                            <?php while ($trator = $tractors_list->fetch_assoc()) { ?>
                                                <option value="<?= $trator['id'] ?>"><?= $trator['modelo'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <select class="form-control" name="collaborator" placeholder="Operador" required>
                                            <option value=""> Operador </option>
                                            <?php while ($colaborador = $collaborators_list->fetch_assoc()) { ?>
                                                <option value="<?= $colaborador['id'] ?>"><?= $colaborador['nome'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <input class="form-control" type="date" name="date-init" required>
                                    </div>
                                    <div class="col-sm-2">
                                        <input class="form-control" type="date" name="date-finish" required>
                                    </div>
                                    <div class="col-sm-2">
                                        <button type="submit" class="btn btn-outline-dark btn-md btn-icon-split">
                                            <span class="text"> Filtrar </span>
                                            <span class="icon text-white-50">
                                                <i class="fas fa-search"></i>
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="card-body">
                            <div name="button-generate-pdf" class="row mb-3">
                                <div class="col">
                                    <form action="../controllers/MovimentsController.php" method="POST">
                                        <input type="hidden" name="print-report" value="true">
                                        <input type="hidden" name="" value="">
                                        <input type="hidden" name="" value="">
                                        <input type="hidden" name="" value="">
                                        <input type="hidden" name="" value="">
                                        <input type="hidden" name="" value="">
                                        <input type="hidden" name="" value="">
                                        <input type="hidden" name="" value="">
                                        <input type="hidden" name="" value="">
                                        <input type="hidden" name="" value="">
                                        <button type="submit" class="btn btn-dark btn-sm btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-file-pdf"></i>
                                            </span>
                                            <span class="text"> Imprimir Relatório </span>
                                        </button>
                                    </form>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Data</th>
                                            <th>Hora Inicial</th>
                                            <th>Hora Final</th>
                                            <th>Operador</th>
                                            <th>Maquina</th>
                                            <th>Pasto</th>
                                            <th>Horimetro</th>
                                            <th>Diária</th>
                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Data</th>
                                            <th>Hora Inicial</th>
                                            <th>Hora Final</th>
                                            <th>Operador</th>
                                            <th>Maquina</th>
                                            <th>Pasto</th>
                                            <th>Horimetro</th>
                                            <th>Diária</th>
                                            
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <tr>
                                            <th></th>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
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