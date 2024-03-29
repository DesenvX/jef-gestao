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

require_once '../services/Services.php';
require_once '../services/Pastures.php';
require_once '../services/Tractors.php';
require_once '../services/Collaborators.php';
require_once '../services/Suppliers.php';
require_once '../services/Prices.php';
require_once '../services/Fuel.php';
require_once '../services/Vehicles.php';

use services\Services;
use services\Pastures;
use services\Tractors;
use services\Collaborators;
use services\Suppliers;
use services\Prices;
use services\Fuel;
use services\Vehicles;

$fuel = new Fuel();
$fuel_historic_list = $fuel->getFuelHistoric();
$fuel_intake_list = $fuel->getFuelIntake();
$fuel_output_list = $fuel->getFuelOutput();
$fuel_output_list_vehicle = $fuel->getFuelOutput();
$fuel_output_list_vehicle_edit = $fuel->getFuelOutput();
$fuel_porcent_tank = $fuel->getPorcentTankDashboard();

$suppliers = new Suppliers();
$suppliers_list = $suppliers->getSuppliers();
$prices = new Prices();
$prices_list = $prices->getPrices();

$services = new Services();
$services_list = $services->getServices();
$pastures = new Pastures();
$pastures_list = $pastures->getPastures();
$tractors = new Tractors();
$tractors_list = $tractors->getTractors();
$collaborators = new Collaborators();
$collaborators_list_veiculo = $collaborators->getCollaborators();
$collaborators_list_trator = $collaborators->getCollaborators();
$vehicle = new Vehicles();
$vehicle_list = $vehicle->getVehicles();
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
                                <div class="col-xl-12 col-md-6">
                                    <div class="card border-left-dark shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-dark text-uppercase mb-1"> Tanque </div>
                                                    <div class="row no-gutters align-items-center">
                                                        <?php
                                                        $tank = 10000;
                                                        $fuel_porcent = ($fuel_porcent_tank * 100) / $tank;
                                                        ?>
                                                        <div class="col-auto">
                                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $fuel_porcent_tank ?> Litros (<?= $fuel_porcent ?>%)</div>
                                                        </div>
                                                        <div class="col">

                                                            <div class="progress progress-sm mr-2">
                                                                <div class="progress-bar bg-dark" role="progressbar" style="width: <?= $fuel_porcent ?>%" aria-valuemin="0" aria-valuemax="<?= $tank ?>"></div>
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

                            <button type="button" style="margin: 5px;" class="btn btn-dark btn-sm btn-icon-split" data-toggle="modal" data-target="#modalReports">
                                <span class="icon text-white-50">
                                    <i class="fas fa-file-pdf"></i>
                                </span>
                                <span class="btn-sm"> Relatório </span>
                            </button>

                            <div id="modalReports" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-md" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="text-center">
                                                <h1 class="h4 text-gray-900 mb-4"><b style="color: #566573;"> Gerar Relatório </b></h1>
                                            </div>
                                            <form class="user" action="../controllers/FuelController.php" method="POST">
                                                <input type="hidden" name="generate-report" value="true">
                                                <div class="form-group row">
                                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                                        <select class="form-control" name="type_register" onchange="filterTypeRegister()" id="type_register" required>
                                                            <option value=""> Tipo de Cadastro </option>
                                                            <option value="intake"> Entrada </option>
                                                            <option value="output"> Saída </option>
                                                        </select>
                                                    </div>

                                                    <div class="col-sm-6 mb-3 mb-sm-0" id="type_register_intake" style="display: none;">
                                                        <input type="text" class="form-control" value="Disel" disabled>
                                                        <input type="hidden" name="type_fuel_intake" value="Disel">
                                                    </div>

                                                    <div class="col-sm-6 mb-3 mb-sm-0" id="type_register_output" style="display: none;">
                                                        <select class="form-control" name="type_fuel_output" id="type_fuel_output" onchange="validateTypeFuelOutput()">
                                                            <option value="Disel"> Tipo de Combustível </option>
                                                            <option value="Disel"> Disel </option>
                                                            <option value="Gasolina"> Gasolina </option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group row" style="justify-content: center;">
                                                    <div class="col-sm-6 mb-3 mb-sm-0 text-center">
                                                        <span style="font-size: 12px;">Data Inicial</span>
                                                        <input class="form-control" name="filter-date-start" type="date" required>
                                                    </div>
                                                    <div class="col-sm-6 mb-3 mb-sm-0 text-center">
                                                        <span style="font-size: 12px;">Data Final</span>
                                                        <input class="form-control" name="filter-date-finish" type="date" required>
                                                    </div>
                                                </div>

                                                <hr>
                                                <button type="submit" class="btn btn-user btn-warning btn-block"> Gerar Relatório </button>
                                                <button type="button" class="btn btn-user btn-danger btn-block" data-dismiss="modal"> Cancelar </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

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

                                <a class="btn btn-dark btn-sm" style="background: #06B8D4; margin-left:1px; margin-right:2px; border-color:#D5D8DC;" data-toggle="modal" data-target="#modalRegisterFuelEntry">
                                    <i class="fas fa-tint" data-toggle="tooltip" data-placement="top" title="Cadastrar Entrada"></i>
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
                                                        <?php $typeFuel = "Disel" ?>
                                                        <input type="text" class="form-control" value="Disel" placeholder="Combustível" disabled>
                                                        <input type="hidden" class="form-control" name="fuel-type" value="Disel">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                                        <input type="date" class="form-control" name="date-entry" placeholder="Data" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                                        <select class="form-control" name="supplier" required>
                                                            <option value="" selected> Fornecedor </option>
                                                            <?php while ($fornecedores = $suppliers_list->fetch_assoc()) { ?>
                                                                <option value="<?= $fornecedores['id'] ?>"> <?= $fornecedores['nome_razao'] ?> </option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                                        <input type="number" class="form-control" step=".01" name="liters" id="liters" placeholder="Litros" required>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-sm-12 mb-3 mb-sm-0">

                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1">R$</span>
                                                            </div>
                                                            <?php
                                                            while ($preco = $prices_list->fetch_assoc()) { ?>
                                                                <?php if ($preco['descricao'] == $typeFuel) { ?>
                                                                    <input type="number" class="form-control" step=".01" name="value-liters" id="value-liters" value="<?= $preco['valor'] ?>" placeholder="Valor p/ Litro" disabled>
                                                                    <input type="hidden" class="form-control" name="value-liters" value="<?= $preco['valor'] ?>">
                                                                <?php } ?>
                                                            <?php } ?>
                                                        </div>

                                                    </div>
                                                </div>

                                                <hr>

                                                <div class="form-group row">
                                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                                        <button type="button" class="form-control" onclick="loadValueTotality()">Calcular Valor Total</button>
                                                    </div>
                                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1">R$</span>
                                                            </div>
                                                            <input type="number" class="form-control" step=".01" id="value-total" disabled>
                                                            <input type="hidden" class="form-control" name="value-total" id="value-total-hidden">
                                                        </div>
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

                                <a class="btn btn-dark btn-sm" style="background: #FF5A4A; margin-left:2px; margin-right:1px; border-color:#D5D8DC;" data-toggle="modal" data-target="#modalRegisterFuelOutput">
                                    <span data-toggle="tooltip" data-placement="top" title="Cadastrar Saída das Máquinas">
                                        <i class="fas fa-tractor"></i>
                                    </span>
                                </a>
                                <a class="btn btn-dark btn-sm" style="background: #FF5A4A; margin-left:2px; margin-right:1px; border-color:#D5D8DC;" data-toggle="modal" data-target="#modalRegisterFuelOutputVehicles">
                                    <span data-toggle="tooltip" data-placement="top" title="Cadastrar Saída dos Veículos">
                                        <i class="fas fa-motorcycle"></i>
                                        <i class="fas fa-truck-pickup"></i>
                                    </span>
                                </a>
                            </button>

                            <!-- Veiculo -->
                            <div name="RegisterFuelOutputVehicles" class="modal fade" id="modalRegisterFuelOutputVehicles" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-sm" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="text-center">
                                                <img src="../../img/combustivel.png" width="100" height="100" style="margin-bottom: 10px;">
                                            </div>
                                            <div class="text-center">
                                                <h1 class="h4 text-gray-900 mb-4">
                                                    <b style="color: #566573;"> Saida de Combustivel dos Veiculos </b>
                                                </h1>
                                            </div>
                                            <form class="user" action="../controllers/FuelController.php" method="POST">
                                                <input type="hidden" name="register" value="true">
                                                <input type="hidden" name="output" value="Saida">
                                                <div class="form-group row">
                                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                                        <select name="fuel-type" class="form-control">
                                                            <option value="">Tipo de combustivel</option>
                                                            <option value="Gasolina">Gasolina</option>
                                                            <option value="Disel">Disel</option>
                                                        </select>
                                                    </div>
                                                </div>
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
                                                        <select class="form-control" name="vehicle" required>
                                                            <option value="" selected> Veiculo </option>
                                                            <?php while ($veiculos = $vehicle_list->fetch_assoc()) { ?>
                                                                <option value="<?= $veiculos['id'] ?>"> <?= $veiculos['modelo'] ?> </option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                                        <select class="form-control" name="collaborator" required>
                                                            <option value="" selected> Cobalorador </option>
                                                            <?php while ($colaboradoVeiculo = $collaborators_list_veiculo->fetch_assoc()) { ?>
                                                                <option value="<?= $colaboradoVeiculo['id'] ?>"> <?= $colaboradoVeiculo['nome'] ?> </option>
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

                            <div name="RegisterFuelOutput" class="modal fade" id="modalRegisterFuelOutput" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-sm" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="text-center">
                                                <img src="../../img/combustivel.png" width="100" height="100" style="margin-bottom: 10px;">
                                            </div>
                                            <div class="text-center">
                                                <h1 class="h4 text-gray-900 mb-4">
                                                    <b style="color: #566573;"> Saida de Combustivel das Máquinas </b>
                                                </h1>
                                            </div>
                                            <form class="user" action="../controllers/FuelController.php" method="POST">
                                                <input type="hidden" name="register" value="true">
                                                <input type="hidden" name="output" value="Saida">
                                                <div class="form-group row">
                                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                                        <input type="text" class="form-control" value="Disel" placeholder="Combustível" disabled>
                                                        <input type="hidden" class="form-control" name="fuel-type" value="Disel">
                                                    </div>
                                                </div>
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
                                                                <option value="<?= $pastos['id'] ?>"> <?= $pastos['nome'] ?> (<?= $pastos['retiro'] ?>)</option>
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
                                                            <?php while ($colaboradoTrator = $collaborators_list_trator->fetch_assoc()) { ?>
                                                                <option value="<?= $colaboradoTrator['id'] ?>"> <?= $colaboradoTrator['nome'] ?> </option>
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
                                                        <th>Tipo de Combustível</th>
                                                        <th>Litros</th>
                                                        <th>Valor Total</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Data</th>
                                                        <th>Tipo de Combustível</th>
                                                        <th>Litros</th>
                                                        <th>Valor Total</th>
                                                    </tr>
                                                </tfoot>
                                                <tbody>
                                                    <?php while ($historico = $fuel_historic_list->fetch_assoc()) {
                                                    ?>
                                                        <?php

                                                        if ($historico['tipo'] == 'Saida') {
                                                            $historic_output = $fuel->getOutputHistoricForSomething($historico['id_tabelas']);
                                                        ?>
                                                            <tr class="table-danger">
                                                                <th><?= $historico['id'] ?></th>
                                                                <td><?= date('d/m/Y', strtotime($historico['data'])) ?></td>
                                                                <td><?= $historic_output['tipo_combustivel'] ?></td>
                                                                <td><?= $historic_output['litros'] ?></td>
                                                                <td></td>
                                                            </tr>
                                                        <?php } ?>

                                                        <?php if ($historico['tipo'] == 'Entrada') {
                                                            $historic_intake = $fuel->getIntakeHistoricForSomething($historico['id_tabelas']);
                                                            $valor_total_historic = number_format($historic_intake['valor_total'], 2, ',', '.');
                                                        ?>
                                                            <tr class="table-info">
                                                                <th><?= $historico['id'] ?></th>
                                                                <td><?= date('d/m/Y', strtotime($historico['data'])) ?></td>
                                                                <td><?= $historic_intake['tipo_combustivel'] ?></td>
                                                                <td><?= $historic_intake['litros'] ?></td>
                                                                <td>R$ <?= $valor_total_historic ?></td>
                                                            </tr>
                                                        <?php } ?>
                                                    <?php } ?>
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
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Data</th>
                                                        <th>Fonecedor</th>
                                                        <th>Tipo</th>
                                                        <th>Litros</th>
                                                        <th>Valor U.</th>
                                                        <th>Valor T.</th>
                                                        <th>Opções</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Data</th>
                                                        <th>Fonecedor</th>
                                                        <th>Tipo</th>
                                                        <th>Litros</th>
                                                        <th>Valor U.</th>
                                                        <th>Valor T.</th>
                                                        <th>Opções</th>
                                                    </tr>
                                                </tfoot>
                                                <tbody>
                                                    <?php while ($combustivel_entrada = $fuel_intake_list->fetch_assoc()) {
                                                        $fornecedor = $suppliers->getSupplierForSomething($combustivel_entrada['id_fornecedor']);
                                                        $valor_total_entrada = number_format($combustivel_entrada['valor_total'], 2, ',', '.');
                                                    ?>
                                                        <tr>
                                                            <th><?= $combustivel_entrada['id'] ?></th>
                                                            <td><?= date('d/m/Y', strtotime($combustivel_entrada['data'])) ?></td>
                                                            <td><?= $fornecedor['nome_razao'] ?></td>
                                                            <td><?= $combustivel_entrada['tipo_combustivel'] ?></td>
                                                            <td><?= $combustivel_entrada['litros'] ?></td>
                                                            <td>R$ <?= $combustivel_entrada['valor_litro'] ?></td>
                                                            <td>R$ <?= $valor_total_entrada ?></td>
                                                            <td>
                                                                <button type="button" class="btn btn-warning btn-circle btn-sm" data-toggle="modal" data-target="#modalEditFuelEntry_<?= $combustivel_entrada['id'] ?>">
                                                                    <i class="fas fa-pen"></i>
                                                                </button>

                                                                <div name="EditFuelEntry" class="modal fade" id="modalEditFuelEntry_<?= $combustivel_entrada['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                                    <div class="modal-dialog modal-sm" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-body">
                                                                                <div class="text-center">
                                                                                    <img src="../../img/combustivel.png" width="100" height="100" style="margin-bottom: 10px;">
                                                                                </div>
                                                                                <div class="text-center">
                                                                                    <h1 class="h4 text-gray-900 mb-4"><b style="color: #566573;">Editar Entrada de Combustível</b></h1>
                                                                                </div>
                                                                                <form class="user" action="../controllers/FuelController.php" method="POST">
                                                                                    <input type="hidden" name="edit" value="true">
                                                                                    <input type="hidden" name="intake" value="Entrada">
                                                                                    <input type="hidden" name="id" value="<?= $combustivel_entrada['id'] ?>">
                                                                                    <input type="hidden" name="id_tables" value="<?= $combustivel_entrada['id_tabelas'] ?>">
                                                                                    <div class="form-group row">
                                                                                        <div class="col-sm-12 mb-3 mb-sm-0">
                                                                                            <input type="text" class="form-control" value="<?= $combustivel_entrada['tipo_combustivel'] ?>" placeholder="Combustível" disabled>
                                                                                            <input type="hidden" class="form-control" name="fuel-type" value="<?= $combustivel_entrada['tipo_combustivel'] ?>">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group row">
                                                                                        <div class="col-sm-12 mb-3 mb-sm-0">
                                                                                            <input type="date" class="form-control" name="date-entry" value="<?= $combustivel_entrada['data'] ?>" placeholder="Data" required>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group row">
                                                                                        <div class="col-sm-12 mb-3 mb-sm-0">
                                                                                            <select class="form-control" name="supplier" required>
                                                                                                <?php
                                                                                                $suppliers_edit = new Suppliers();
                                                                                                $suppliers_list_edit = $suppliers_edit->getSuppliers();
                                                                                                while ($fornecedores_edit = $suppliers_list_edit->fetch_assoc()) { ?>
                                                                                                    <option value="<?= $fornecedores_edit['id'] ?>" <?php if ($combustivel_entrada['id_fornecedor'] == $fornecedores_edit['id']) { ?> selected <?php } ?>><?= $fornecedores_edit['nome_razao'] ?></option>
                                                                                                <?php } ?>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group row">
                                                                                        <div class="col-sm-12 mb-3 mb-sm-0">
                                                                                            <input type="number" class="form-control" step=".01" name="liters" value="<?= $combustivel_entrada['litros'] ?>" placeholder="Litros" required>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="form-group row">
                                                                                        <div class="col-sm-12 mb-3 mb-sm-0">

                                                                                            <div class="input-group">
                                                                                                <div class="input-group-prepend">
                                                                                                    <span class="input-group-text">R$</span>
                                                                                                </div>

                                                                                                <input type="number" class="form-control" step=".01" name="value-liters" value="<?= $combustivel_entrada['valor_litro'] ?>" placeholder="Valor p/ Litro" disabled>
                                                                                                <input type="hidden" class="form-control" name="value-liters" value="<?= $combustivel_entrada['valor_litro'] ?>">

                                                                                            </div>
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

                                                                <button class="btn btn-danger btn-circle btn-sm" data-toggle="modal" data-target="#modalDeleteFuelEntry_<?= $combustivel_entrada['id'] ?>">
                                                                    <i class="fas fa-trash"></i>
                                                                </button>

                                                                <div name="DeleteFuel" class="modal fade" id="modalDeleteFuelEntry_<?= $combustivel_entrada['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                                    <div class="modal-dialog modal-sm" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-body">
                                                                                <div class="text-center">
                                                                                    <h1 class="h4 text-gray-900 mb-4"><b style="color: #566573;"> Deseja excluir esta Entrada de Combustível ?</span></b></h1>
                                                                                </div>
                                                                                <form class="user" action="../controllers/FuelController.php" method="POST">
                                                                                    <input type="hidden" name="delete" value="true">
                                                                                    <input type="hidden" name="intake" value="Entrada">
                                                                                    <input type="hidden" name="id" value="<?= $combustivel_entrada['id_tabelas'] ?>">
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

                            <div id="collapseOutput" class="collapse" aria-labelledby="headingThree" data-parent="#accordionActionsTables">
                                <div class="card">
                                    <div class="card-header" id="headingThree">
                                        <h5 class="mb-0">
                                            <i class="fas fa-sign-out-alt"></i> Saídas
                                        </h5>
                                        <div class="row" style="text-align: right;">

                                        </div>
                                    </div>
                                    <div>
                                    </div>
                                    <div class="card-body">

                                        <div name="SearchAndFilter" class="row" style="margin-bottom:20px;">

                                            <div class="col-md-7" style="justify-content: start">
                                                <div class=" form-check ">
                                                    <input onclick="filterTableManchine('tableMachine', 'tableVehicle')" id="radioMachine" class=" form-check-input" type="radio" name="tableOutput" checked>
                                                    <label class="form-check-label" for="radioMachine">
                                                        Tabela Maquinas
                                                    </label>
                                                </div>

                                                <div class=" form-check ">
                                                    <input onclick="filterTableVehicle('tableVehicle', 'tableMachine')" id="radioVehicle" class="form-check-input" type="radio" name="tableOutput">
                                                    <label class="form-check-label" for="radioVehicle">
                                                        Tabela Veiculos
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="col-md-5" style="justify-content: end">
                                                <div id=" dataTable_filter" class="dataTables_filter">
                                                    <input type="search" id="search" class="form-control form-control-sm" placeholder="Buscar" aria-controls="dataTable">
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Table Manchine -->
                                        <div class="table-responsive" id="tableMachine" style="display: block">
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
                                                    <?php

                                                    while ($combustivel_saida = $fuel_output_list->fetch_assoc()) {
                                                        if ($combustivel_saida['id_trator'] != 0 && $combustivel_saida['id_veiculo'] == 0) {

                                                            $servico = $services->getServicesForSomething($combustivel_saida['id_servico']);
                                                            $pasto = $pastures->getPasturesForSomething($combustivel_saida['id_pasto']);
                                                            $trator = $tractors->getTractorForSomething($combustivel_saida['id_trator']);
                                                            $colaborador = $collaborators->getCollaboratorsForSomething($combustivel_saida['id_colaborador'])
                                                    ?>
                                                            <tr>
                                                                <th><?= $combustivel_saida['id'] ?></th>
                                                                <td><?= date('d/m/Y', strtotime($combustivel_saida['data'])) ?></td>
                                                                <td><?= $combustivel_saida['litros'] ?></td>
                                                                <td><?= $servico['descricao'] ?></td>
                                                                <td><?= $pasto['nome'] ?> (<?= $pasto['retiro'] ?>)</td>
                                                                <td><?= $trator['modelo'] ?></td>
                                                                <td><?= $colaborador['nome'] ?></td>
                                                                <td>
                                                                    <button type="button" class="btn btn-warning btn-circle btn-sm" data-toggle="modal" data-target="#modalEditFuelOutput_<?= $combustivel_saida['id'] ?>">
                                                                        <i class="fas fa-pen"></i>
                                                                    </button>
                                                                    <div name="EditFuelOutput" class="modal fade" id="modalEditFuelOutput_<?= $combustivel_saida['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
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
                                                                                        <input type="hidden" name="id" value="<?= $combustivel_saida['id'] ?>">
                                                                                        <input type="hidden" name="id_tables" value="<?= $combustivel_saida['id_tabelas'] ?>">
                                                                                        <div class="form-group row">
                                                                                            <div class="col-sm-12 mb-3 mb-sm-0">
                                                                                                <input type="date" class="form-control" name="date-output" value="<?= $combustivel_saida['data'] ?>" placeholder="Data de Saida">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-group row">
                                                                                            <div class="col-sm-12 mb-3 mb-sm-0">
                                                                                                <input type="number" step=".01" class="form-control" name="liters" value="<?= $combustivel_saida['litros'] ?>" placeholder="Litros">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-group row">
                                                                                            <div class="col-sm-12 mb-3 mb-sm-0">
                                                                                                <select class="form-control" name="service" required>
                                                                                                    <?php
                                                                                                    $services_edit = new Services();
                                                                                                    $services_list_edit = $services_edit->getServices();
                                                                                                    while ($servicos_edit = $services_list_edit->fetch_assoc()) { ?>
                                                                                                        <option value="<?= $servicos_edit['id'] ?>" <?php if ($combustivel_saida['id_servico'] == $servicos_edit['id']) { ?> selected <?php } ?>><?= $servicos_edit['descricao'] ?>
                                                                                                        </option>
                                                                                                    <?php } ?>
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-group row">
                                                                                            <div class="col-sm-12 mb-3 mb-sm-0">
                                                                                                <select class="form-control" name="pasture" required>
                                                                                                    <?php
                                                                                                    $pastures_edit = new Pastures();
                                                                                                    $pastures_list_edit = $pastures_edit->getPastures();
                                                                                                    while ($pasto_edit = $pastures_list_edit->fetch_assoc()) { ?>
                                                                                                        <option value="<?= $pasto_edit['id'] ?>" <?php if ($combustivel_saida['id_pasto'] == $pasto_edit['id']) { ?> selected <?php } ?>>
                                                                                                            <?= $pasto_edit['nome'] ?> (<?= $pasto_edit['retiro'] ?>)
                                                                                                        </option>
                                                                                                    <?php } ?>
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-group row">
                                                                                            <div class="col-sm-12 mb-3 mb-sm-0">
                                                                                                <select class="form-control" name="tractor" required>
                                                                                                    <?php
                                                                                                    $tractor_edit = new Tractors();
                                                                                                    $tractors_list_edit = $tractor_edit->getTractors();
                                                                                                    while ($trato_edit = $tractors_list_edit->fetch_assoc()) { ?>
                                                                                                        <option value="<?= $trato_edit['id'] ?>" <?php if ($combustivel_saida['id_trator'] == $trato_edit['id']) { ?> selected <?php } ?>><?= $trato_edit['modelo'] ?>
                                                                                                        </option>
                                                                                                    <?php } ?>
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-group row">
                                                                                            <div class="col-sm-12 mb-3 mb-sm-0">
                                                                                                <select class="form-control" name="collaborator" required>
                                                                                                    <?php
                                                                                                    $collaborators_edit = new Collaborators();
                                                                                                    $collaborators_list_edit = $collaborators_edit->getCollaborators();
                                                                                                    while ($colaborador_edit = $collaborators_list_edit->fetch_assoc()) { ?>
                                                                                                        <option value="<?= $colaborador_edit['id'] ?>" <?php if ($combustivel_saida['id_colaborador'] == $colaborador_edit['id']) { ?> selected <?php } ?>><?= $colaborador_edit['nome'] ?>
                                                                                                        </option>
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

                                                                    <button class="btn btn-danger btn-circle btn-sm" data-toggle="modal" data-target="#modalDeleteFuel_<?= $combustivel_saida['id'] ?>">
                                                                        <i class="fas fa-trash"></i>
                                                                    </button>

                                                                    <div name="DeleteFuel" class="modal fade" id="modalDeleteFuel_<?= $combustivel_saida['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                                        <div class="modal-dialog modal-sm" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-body">
                                                                                    <div class="text-center">
                                                                                        <h1 class="h4 text-gray-900 mb-4"><b style="color: #566573;"> Deseja excluir a Saída de Combustível do dia <br><strong> </strong> ?</span></b></h1>
                                                                                    </div>
                                                                                    <form class="user" action="../controllers/FuelController.php" method="POST">
                                                                                        <input type="hidden" name="delete" value="true">
                                                                                        <input type="hidden" name="output" value="true">
                                                                                        <input type="hidden" name="id" value="<?= $combustivel_saida['id_tabelas'] ?>">
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
                                                    <?php }
                                                    }  ?>
                                                </tbody>
                                            </table>
                                        </div>

                                        <!-- Table Vehicle -->
                                        <div class="table-responsive" id="tableVehicle" style="display: none">
                                            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Tipo</th>
                                                        <th>Data</th>
                                                        <th>Litro</th>
                                                        <th>Veiculo</th>
                                                        <th>Colaborador</th>
                                                        <th>Opções</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Tipo</th>
                                                        <th>Data</th>
                                                        <th>Litro</th>
                                                        <th>Veiculo</th>
                                                        <th>Colaborador</th>
                                                        <th>Opções</th>
                                                    </tr>
                                                </tfoot>
                                                <tbody>
                                                    <?php

                                                    while ($combustivel_saida_vehicle = $fuel_output_list_vehicle->fetch_assoc()) {
                                                        if ($combustivel_saida_vehicle['id_veiculo'] != 0) {

                                                            $veiculo = $vehicle->getVehiclesForSomething($combustivel_saida_vehicle['id_veiculo']);
                                                            $colaborador = $collaborators->getCollaboratorsForSomething($combustivel_saida_vehicle['id_colaborador'])
                                                    ?>
                                                            <tr>
                                                                <th><?= $combustivel_saida_vehicle['id'] ?></th>
                                                                <td><?= $combustivel_saida_vehicle['tipo_combustivel'] ?></td>
                                                                <td><?= date('d/m/Y', strtotime($combustivel_saida_vehicle['data'])) ?></td>
                                                                <td><?= $combustivel_saida_vehicle['litros'] ?></td>
                                                                <td><?= $veiculo['descricao'] ?></td>
                                                                <td><?= $colaborador['nome'] ?></td>
                                                                <td>
                                                                    <button type="button" class="btn btn-warning btn-circle btn-sm" data-toggle="modal" data-target="#modalEditFuelOutputVehicle_<?= $combustivel_saida_vehicle['id'] ?>">
                                                                        <i class="fas fa-pen"></i>
                                                                    </button>

                                                                    <div name="EditFuelOutputVehicle" class="modal fade" id="modalEditFuelOutputVehicle_<?= $combustivel_saida_vehicle['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
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
                                                                                        <input type="hidden" name="id" value="<?= $combustivel_saida_vehicle['id'] ?>">
                                                                                        <input type="hidden" name="id_tables" value="<?= $combustivel_saida_vehicle['id_tabelas'] ?>">
                                                                                        <div class="form-group row">
                                                                                            <div class="col-sm-12 mb-3 mb-sm-0">
                                                                                                <select name="fuel-type" class="form-control">
                                                                                                   <option value="Gasolina" <?php if($combustivel_saida_vehicle['tipo_combustivel'] == 'Gasolina') { ?> 
                                                                                                    selected <?php } ?>> Gasolina </option>
                                                                                                   <option value="Disel" <?php if($combustivel_saida_vehicle['tipo_combustivel'] == 'Disel') { ?> 
                                                                                                    selected <?php } ?>> Disel </option>
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-group row">
                                                                                            <div class="col-sm-12 mb-3 mb-sm-0">
                                                                                                <input type="date" class="form-control" name="date-output" value="<?= $combustivel_saida_vehicle['data'] ?>"
                                                                                                 placeholder="Data de Saida">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-group row">
                                                                                            <div class="col-sm-12 mb-3 mb-sm-0">
                                                                                                <input type="number" step=".01" class="form-control" name="liters" value="<?= $combustivel_saida_vehicle['litros'] ?>"
                                                                                                 placeholder="Litros">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-group row">
                                                                                            <div class="col-sm-12 mb-3 mb-sm-0">
                                                                                                <select class="form-control" name="tractor" required>
                                                                                                    <?php
                                                                                                    $vehicle_edit = new Vehicles();
                                                                                                    $vehicle_list_edit = $vehicle_edit->getVehicles();
                                                                                                    while ($veiculo_edit = $vehicle_list_edit->fetch_assoc()) { ?>
                                                                                                        <option value="<?= $veiculo_edit['id'] ?>" 
                                                                                                        <?php if ($combustivel_saida_vehicle['id_trator'] == $veiculo_edit['id']) { ?>
                                                                                                             selected <?php } ?>><?= $veiculo_edit['modelo'] ?>
                                                                                                        </option>
                                                                                                    <?php } ?>
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-group row">
                                                                                            <div class="col-sm-12 mb-3 mb-sm-0">
                                                                                                <select class="form-control" name="collaborator" required>
                                                                                                    <?php
                                                                                                    $collaborators_edit = new Collaborators();
                                                                                                    $collaborators_list_edit = $collaborators_edit->getCollaborators();
                                                                                                    while ($colaborador_edit = $collaborators_list_edit->fetch_assoc()) { ?>
                                                                                                        <option value="<?= $colaborador_edit['id'] ?>" <?php if ($combustivel_saida_vehicle['id_colaborador'] == $colaborador_edit['id']) {
                                                                                                            ?> selected <?php } ?>><?= $colaborador_edit['nome'] ?>
                                                                                                        </option>
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

                                                                    <button class="btn btn-danger btn-circle btn-sm" data-toggle="modal" data-target="#modalDeleteFuel_<?= $combustivel_saida_vehicle['id'] ?>">
                                                                        <i class="fas fa-trash"></i>
                                                                    </button>

                                                                    <div name="DeleteFuel" class="modal fade" id="modalDeleteFuel_<?= $combustivel_saida_vehicle['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                                        <div class="modal-dialog modal-sm" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-body">
                                                                                    <div class="text-center">
                                                                                        <h1 class="h4 text-gray-900 mb-4"><b style="color: #566573;"> Deseja excluir a Saída de Combustível do dia <br><strong> </strong> ?</span></b></h1>
                                                                                    </div>
                                                                                    <form class="user" action="../controllers/FuelController.php" method="POST">
                                                                                        <input type="hidden" name="delete" value="true">
                                                                                        <input type="hidden" name="output" value="true">
                                                                                        <input type="hidden" name="id" value="<?= $combustivel_saida_vehicle['id_tabelas'] ?>">
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
                                                    <?php }
                                                    }  ?>
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

<script>
    function loadValueTotality() {
        const elem_litros = document.getElementById('liters')
        const elem_valor_litros = document.getElementById('value-liters')
        let litros = elem_litros.value
        let valor_litro = elem_valor_litros.value
        let value_totality = litros * valor_litro
        $("#value-total").val(value_totality);
        $("#value-total-hidden").val(value_totality);
    }

    function filterTypeRegister() {
        const elem_type_register = document.getElementById('type_register')
        if (elem_type_register.value == 'intake') {
            $('#type_register_intake').show()
            $('#type_register_output').hide()
        } else if (elem_type_register.value == 'output') {
            $('#type_register_output').show()
            $('#type_register_intake').hide()
        } else {
            $('#type_register_output').hide()
            $('#type_register_intake').hide()
        }
    }

    function filterTableManchine(elMachine, elVehicle) {
        var displayMachine = document.getElementById(elMachine).style.display;
        var displayVehicle = document.getElementById(elVehicle).style.display;

        document.getElementById(elMachine).style.display = 'block';
        document.getElementById(elVehicle).style.display = 'none';
    }

    function filterTableVehicle(elVehicle, elMachine) {
        var displayVehicle = document.getElementById(elVehicle).style.display;
        var displayMachine = document.getElementById(elMachine).style.display;

        document.getElementById(elVehicle).style.display = 'block';
        document.getElementById(elMachine).style.display = 'none';
    }
</script>

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