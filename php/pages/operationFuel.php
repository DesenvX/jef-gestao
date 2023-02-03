<!DOCTYPE html>
<html lang="pt-br">

<?php
session_start();
?>

<head>

    <title> JEF Gestão </title>

    <?php
    include('../../html/links_and_cdns.html');
    ?>

</head>

<?php

require_once '../services/Services.php';
require_once '../services/Pastures.php';
require_once '../services/Tractors.php';
require_once '../services/Collaborators.php';

use services\Services;
use services\Pastures;
use services\Tractors;
use services\Collaborators;

$services = new Services();
$services_list = $services->getServices();
$pastures = new Pastures();
$pastures_list = $pastures->getPastures();
$tractors = new Tractors();
$tractors_list = $tractors->getTractors();
$collaborators = new Collaborators();
$collaborators_list = $collaborators->getCollaborators();

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
                    <h1 class="h3 mb-2 text-gray-800"> Combustível </h1>

                    <div class="card shadow mb-3">

                        <div class="card-body">

                            <div class="row">
                                <div class="col-xl-3 col-md-6">
                                    <div class="card border-left-success shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                        Entrada</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">500 Litros</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-3 col-md-6">
                                    <div class="card border-left-danger shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                        Saida</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">200 Litros</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-6 col-md-6">
                                    <div class="card border-left-dark shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-dark text-uppercase mb-1"> Tanque
                                                    </div>
                                                    <div class="row no-gutters align-items-center">
                                                        <div class="col-auto">
                                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">300 Litros (50%)</div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="progress progress-sm mr-2">
                                                                <div class="progress-bar bg-dark" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card shadow mb-4" style="display:flex;">

                        <div class="card-header py-3" style="display: flex; justify-content: center;" id="heading">

                            <button type="button" style="margin: 5px;" class="btn btn-primary btn-sm btn-icon-split" data-toggle="collapse" data-target="#collapseHistoric" aria-expanded="true" aria-controls="collapseHistoric">
                                <span class="icon text-white-50">
                                    <i class="fas fa-list-alt"></i>
                                </span>
                                <span class="btn-sm"> Historico </span>
                            </button>

                            <button style="margin: 5px;" class="btn btn-info btn-sm btn-icon-split">
                                <span class="btn-sm"> Entradas </span>
                                <a class="btn btn-dark btn-sm" style="background: #06B8D4; margin-left:2px; margin-right:1px; border-color:#D5D8DC;" role="button" data-toggle="collapse" data-target="#collapseEntry" aria-expanded="true" aria-controls="collapseEntry">
                                    <i class="fas fa-eye" data-toggle="tooltip" data-placement="top" title="Vusializar"> </i>
                                </a>

                                <a class="btn btn-dark btn-sm" style="background: #06B8D4; margin-left:1px; margin-right:2px; border-color:#D5D8DC;" data-toggle="modal" data-target="#modalRegisterFuelEntry"> <i class="fas fa-plus-circle" data-toggle="tooltip" data-placement="top" title="Cadastrar"></i> </a>
                                </a>
                            </button>
                            <div name="RegisterFuelEntry" class="modal fade" id="modalRegisterFuelEntry" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-sm" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="text-center">
                                                <img src="../../img/combustivel.png" width="100" height="100" style="margin-bottom: 10px;">
                                            </div>
                                            <div class="text-center">
                                                <h1 class="h4 text-gray-900 mb-4">
                                                    <b style="color: #566573;"> Entrada de Combustivel </b>
                                                </h1>
                                            </div>
                                            <form class="user" action="../controllers/FuelController.php" method="POST">
                                                <input type="hidden" name="register" value="true">
                                                <input type="hidden" name="intake" value="Entrada">
                                                <div class="form-group row">
                                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                                        <input type="date" class="form-control" name="date-entry" placeholder="Data">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                                        <!--  -->
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                                        <input type="number" class="form-control" step=".01" name="liters" placeholder="Litros">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                                        <input type="number" class="form-control" step=".01" id="value-liters" placeholder="Valor p/ Litro">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                                        <input type="number" class="form-control" step=".01" id="value-total" placeholder="Valor Total">
                                                    </div>
                                                </div>
                                                <hr>
                                                <button type="submit" class="btn btn-user btn-info btn-block"> Cadastrar </button>
                                                <button type="button" class="btn btn-user btn-danger btn-block" data-dismiss="modal"> Cancelar </button>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button style="margin: 5px;" type="button" class="btn btn-danger btn-sm btn-icon-split">
                                <span class="btn-sm"> Saidas </span>
                                <a class="btn btn-dark btn-sm" style="background: #FF5A4A; margin-left:2px; margin-right:1px; border-color:#D5D8DC;" role="button" data-toggle="collapse" data-target="#collapseOutput" aria-expanded="false" aria-controls="collapseOutput">
                                    <i class="fas fa-eye" data-toggle="tooltip" data-placement="top" title="Vusializar"></i>
                                </a>

                                <a class="btn btn-dark btn-sm" style="background: #FF5A4A; margin-left:2px; margin-right:1px; border-color:#D5D8DC;" data-toggle="modal" data-target="#modalRegisterFuelOutput"> <i class="fas fa-plus-circle" data-toggle="tooltip" data-placement="top" title="Cadastrar"></i> </a>
                                </a>
                            </button>
                            <div name="RegisterFuelOutput" class="modal fade" id="modalRegisterFuelOutput" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-sm" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="text-center">
                                                <img src="../../img/combustivel.png" width="100" height="100" style="margin-bottom: 10px;">
                                            </div>
                                            <div class="text-center">
                                                <h1 class="h4 text-gray-900 mb-4">
                                                    <b style="color: #566573;"> Saida de Combustivel </b>
                                                </h1>
                                            </div>
                                            <form class="user" action="../controllers/FuelController.php" method="POST">
                                                <input type="hidden" name="register" value="true">
                                                <input type="hidden" name="output" value="Saida">
                                                <div class="form-group row">
                                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                                        <input type="date" class="form-control " name="date-output" placeholder="Data de Saida">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                                        <input type="number" step=".01" class="form-control " name="liters" placeholder="Litros">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                                        <select class="form-control" name="service" required>
                                                            <option value="" selected> Serviço </option>
                                                            <?php while ($servicos = $services_list->fetch_assoc()) { ?>
                                                                <option value="<?= $servicos['id'] ?>"> <?= $servicos['descricao'] ?> </option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                                        <select class="form-control" name="pasture" required>
                                                            <option value="" selected> Pasto </option>
                                                            <?php while ($pastos = $pastures_list->fetch_assoc()) { ?>
                                                                <option value="<?= $pastos['id'] ?>"> <?= $pastos['nome'] ?> </option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                                        <select class="form-control" name="tractor" required>
                                                            <option value="" selected> Trator </option>
                                                            <?php while ($tratores = $tractors_list->fetch_assoc()) { ?>
                                                                <option value="<?= $tratores['id'] ?>"> <?= $tratores['modelo'] ?> </option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                                        <select class="form-control" name="collaborator" required>
                                                            <option value="" selected> Cobalorador </option>
                                                            <?php while ($colaboradores = $collaborators_list->fetch_assoc()) { ?>
                                                                <option value="<?= $colaboradores['id'] ?>"> <?= $colaboradores['nome'] ?> </option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <hr>
                                                <button type="submit" class="btn btn-user btn-info btn-block"> Cadastrar </button>
                                                <button type="button" class="btn btn-user btn-danger btn-block" data-dismiss="modal"> Cancelar </button>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="accordion" id="accordionActionsTables">

                            <div id="collapseHistoric" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionActionsTables">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h5 class="mb-0">
                                            <i class="fas fa-list-alt"></i> Histórico
                                        </h5>
                                    </div>
                                    <div class="card-body">
                                        <div name="SearchAndFilter" class="row" style="justify-content: end; margin-bottom:20px;">
                                            <div class="col-md-5">
                                                <div id="dataTable_filter" class="dataTables_filter">
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
                                                        <th>Tipo</th>
                                                        <th>Litros</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Data</th>
                                                        <th>Tipo</th>
                                                        <th>Litros</th>
                                                    </tr>
                                                </tfoot>
                                                <tbody>
                                                    <tr class="table-danger">
                                                        <th>1</th>
                                                        <td>17/01/2023</td>
                                                        <td>Saída</td>
                                                        <td>500</td>
                                                    </tr>
                                                    <tr class="table-info">
                                                        <th>1</th>
                                                        <td>17/01/2023</td>
                                                        <td>Entrada</td>
                                                        <td>500</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="collapseEntry" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionActionsTables">
                                <div class="card">
                                    <div class="card-header" id="headingTwo">
                                        <h5 class="mb-0">
                                            <i class="fas fa-sign-in-alt"></i> Entradas
                                        </h5>
                                    </div>
                                    <div class="card-body">
                                        <div name="SearchAndFilter" class="row" style="justify-content: end; margin-bottom:20px;">
                                            <div class="col-md-5">
                                                <div id="dataTable_filter" class="dataTables_filter">
                                                    <input type="search" id="search" class="form-control form-control-sm" placeholder="Buscar" aria-controls="dataTable">
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="dataTables_length" id="dataTable_length">
                                                    <select name="dataTable_length" aria-controls="dataTable" class="custom-select custom-select-sm form-control form-control-sm">
                                                        <option value="10">10</option>
                                                        <option value="25">25</option>
                                                        <option value="50">50</option>
                                                        <option value="100">100</option>
                                                    </select>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Data</th>
                                                        <th>Fonecedor</th>
                                                        <th>litros</th>
                                                        <th>Valor Unitario</th>
                                                        <th>Total R$</th>
                                                        <th>Opções</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Data</th>
                                                        <th>Fonecedor</th>
                                                        <th>litros</th>
                                                        <th>Valor Unitario</th>
                                                        <th>Total R$</th>
                                                        <th>Opções</th>
                                                    </tr>
                                                </tfoot>
                                                <tbody>
                                                    <tr>
                                                        <th>1</th>
                                                        <td>17/01/2023</td>
                                                        <td>Inpiranga</td>
                                                        <td>500</td>
                                                        <td>R$ 5.40</td>
                                                        <td>2.700</td>
                                                        <td>
                                                            <button type="button" class="btn btn-warning btn-circle btn-sm" data-toggle="modal" data-target="#modalEditFuelEntry" data-date-Entry="17/01/2023" data-provider="Inpiranga" data-liters="500" data-unitary-value="R$ 5.40" data-total="2.700">
                                                                <i class="fas fa-pen"></i>
                                                            </button>
                                                            <button class="btn btn-danger btn-circle btn-sm" onclick="swalDelete()">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="collapseOutput" class="collapse" aria-labelledby="headingThree" data-parent="#accordionActionsTables">
                                <div class="card">
                                    <div class="card-header" id="headingThree">
                                        <h5 class="mb-0">
                                            <i class="fas fa-sign-out-alt"></i> Saídas
                                        </h5>
                                    </div>
                                    <div class="card-body">
                                        <div name="SearchAndFilter" class="row" style="justify-content: end; margin-bottom:20px;">
                                            <div class="col-md-5">
                                                <div id="dataTable_filter" class="dataTables_filter">
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
                                                        <th>Litros</th>
                                                        <th>Serviço</th>
                                                        <th>Pasto</th>
                                                        <th>Trator</th>
                                                        <th>Colaborador</th>
                                                        <th>Opções</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Data</th>
                                                        <th>Litros</th>
                                                        <th>Serviço</th>
                                                        <th>Pasto</th>
                                                        <th>Trator</th>
                                                        <th>Colaborador</th>
                                                        <th>Opções</th>
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
                                                        <td>
                                                            <button type="button" class="btn btn-warning btn-circle btn-sm" data-toggle="modal" data-target="#modalEditFuelEntry">
                                                                <i class="fas fa-pen"></i>
                                                            </button>
                                                            <div name="EditFuelEntry" class="modal fade" id="modalEditFuelEntry" tabindex="-1" role="dialog" aria-hidden="true">
                                                                <div class="modal-dialog modal-sm" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-body">
                                                                            <div class="text-center">
                                                                                <img src="../../img/combustivel.png" width="100" height="100" style="margin-bottom: 10px;">
                                                                            </div>
                                                                            <div class="text-center">
                                                                                <h1 class="h4 text-gray-900 mb-4"><b style="color: #566573;">Editar Saída de Combustível</b></h1>
                                                                            </div>
                                                                            <form class="user" action="../controllers/FuelController.php" method="POST">
                                                                                <input type="hidden" name="edit" value="true">
                                                                                <input type="hidden" name="output" value="Saida">
                                                                                <div class="form-group row">
                                                                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                                                                        <input type="date" class="form-control" name="date-output" placeholder="Data de Saida">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group row">
                                                                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                                                                        <input type="number" step=".01" class="form-control" name="liters" placeholder="Litros">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group row">
                                                                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                                                                        <select class="form-control" name="service" required>
                                                                                            <?php while ($servicos = $services_list->fetch_assoc()) { ?>
                                                                                                <option value="<?= $servicos['id'] ?>"> <?= $servicos['descricao'] ?> </option>
                                                                                            <?php } ?>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group row">
                                                                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                                                                        <select class="form-control" name="pasture" required>
                                                                                            <?php while ($pastos = $pastures_list->fetch_assoc()) { ?>
                                                                                                <option value="<?= $pastos['id'] ?>"> <?= $pastos['nome'] ?> </option>
                                                                                            <?php } ?>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group row">
                                                                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                                                                        <select class="form-control" name="tractor" required>
                                                                                            <?php while ($tratores = $tractors_list->fetch_assoc()) { ?>
                                                                                                <option value="<?= $tratores['id'] ?>"> <?= $tratores['modelo'] ?> </option>
                                                                                            <?php } ?>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group row">
                                                                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                                                                        <select class="form-control" name="collaborator" required>
                                                                                            <?php while ($colaboradores = $collaborators_list->fetch_assoc()) { ?>
                                                                                                <option value="<?= $colaboradores['id'] ?>"> <?= $colaboradores['nome'] ?> </option>
                                                                                            <?php } ?>
                                                                                        </select>
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

                                                            <button class="btn btn-danger btn-circle btn-sm" data-toggle="modal" data-target="#modalDeleteFuel">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                            <div name="DeleteFuel" class="modal fade" id="modalDeleteFuel" tabindex="-1" role="dialog" aria-hidden="true">
                                                                <div class="modal-dialog modal-sm" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-body">
                                                                            <div class="text-center">
                                                                                <h1 class="h4 text-gray-900 mb-4"><b style="color: #566573;"> Deseja excluir a Saída de Combustível do dia <br><strong> </strong> ?</span></b></h1>
                                                                            </div>
                                                                            <form class="user" action="../controllers/FuelController.php" method="POST">
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
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
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
if (isset($_SESSION['register_fuel_success'])) {
?>
    <script>
        swalRegisterSuccess();
    </script>
<?php
    unset($_SESSION['register_fuel_success']);
}
?>

<?php
if (isset($_SESSION['register_fuel_fail'])) {
?>
    <script>
        swalRegisterError();
    </script>
<?php
    unset($_SESSION['register_fuel_fail']);
}
?>

<?php
if (isset($_SESSION['edit_fuel_success'])) {
?>
    <script>
        swalEditSuccess();
    </script>
<?php
    unset($_SESSION['edit_fuel_success']);
}
?>

<?php
if (isset($_SESSION['edit_fuel_fail'])) {
?>
    <script>
        swalEditError();
    </script>
<?php
    unset($_SESSION['edit_fuel_fail']);
}
?>

<?php
if (isset($_SESSION['delete_fuel_success'])) {
?>
    <script>
        swalDeleteSuccess();
    </script>
<?php
    unset($_SESSION['delete_fuel_success']);
}
?>

<?php
if (isset($_SESSION['delete_fuel_fail'])) {
?>
    <script>
        swalDeleteError();
    </script>
<?php
    unset($_SESSION['delete_fuel_fail']);
}
?>

</html>