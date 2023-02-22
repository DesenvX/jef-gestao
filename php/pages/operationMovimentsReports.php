<!DOCTYPE html>
<html lang="pt-br">
<?php
session_start();
?>

<head>

    <title>  Gestão de Logística </title>

    <?php
    include('../../html/links_and_cdns.html');
    ?>

</head>

<?php

require_once '../services/Moviments.php';
require_once '../services/Collaborators.php';
require_once '../services/Tractors.php';

use services\Moviments;
use services\Collaborators;
use services\Tractors;

if (isset($_POST['filter-data-report'])) {
    $moviments = new Moviments();
    $moviments_filter = $moviments->getDataReportMoviments($_POST);
}

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
                            <form action="#" method="POST">
                                <input type="hidden" name="filter-data-report" value="true">
                                <div class="form-group row" style="align-items:center;">
                                    <div class="col-sm-2">
                                        <select class="form-control" name="machine" placeholder="Maquina" required>
                                            <option value=""> Maquina </option>
                                            <option value="all"> Todas </option>
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
                                    <?php
                                        $dados_filtro = $moviments_filter['dados_filtro'];
                                        
                                    ?>
                                    <form action="../controllers/MovimentsController.php" method="POST">
                                        <input type="hidden" name="print-report" value="true">
                                        <input type="hidden" name="machine" value="<?= $dados_filtro['maquina'] ?>">
                                        <input type="hidden" name="collaborator" value="<?= $dados_filtro['operador'] ?>">
                                        <input type="hidden" name="date-init" value="<?= $dados_filtro['data_inicial'] ?>">
                                        <input type="hidden" name="date-finish" value="<?= $dados_filtro['data_final'] ?>">
                                        <button type="submit" class="btn btn-dark btn-sm btn-icon-split" <?php if (!isset($_POST['filter-data-report'])) { ?> disabled <?php } ?>>
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
                                            <th>Horimetro I.</th>
                                            <th>Horimetro F.</th>
                                            <th>Operador</th>
                                            <th>Maquina</th>
                                            <th>Pasto</th>
                                            <th>Horas</th>
                                            <th>Valor Horas</th>

                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Data</th>
                                            <th>Horimetro I.</th>
                                            <th>Horimetro F.</th>
                                            <th>Operador</th>
                                            <th>Maquina</th>
                                            <th>Pasto</th>
                                            <th>Horas</th>
                                            <th>Valor Horas</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        if (isset($_POST['filter-data-report'])) {
                                            while ($movimento_filtrado = $moviments_filter['resultado_tabela']->fetch_assoc()) {
                                        ?>
                                                <tr>
                                                    <td><?= date('d/m/Y', strtotime($movimento_filtrado['data'])) ?></td>
                                                    <td><?= $movimento_filtrado['hora_inicial'] ?></td>
                                                    <td><?= $movimento_filtrado['hora_final'] ?></td>
                                                    <td><?= $movimento_filtrado['id_colaborador'] ?></td>
                                                    <td><?= $movimento_filtrado['id_maquina'] ?></td>
                                                    <td><?= $movimento_filtrado['id_pasto'] ?></td>
                                                    <td><?= $movimento_filtrado['horas_trabalhadas'] ?></td>
                                                    <td><?= $movimento_filtrado['valor_diaria'] ?></td>
                                                </tr>
                                        <?php }
                                        }
                                        ?>
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