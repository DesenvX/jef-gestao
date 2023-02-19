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
require_once '../services/Services.php';
require_once '../services/Tractors.php';
require_once '../services/Pastures.php';
require_once '../services/Prices.php';

use services\Collaborators;
use services\Services;
use services\Tractors;
use services\Pastures;
use services\Prices;

$collaborators = new Collaborators();
$collaborators_list = $collaborators->getCollaborators();
$services = new Services();
$services_list = $services->getServices();
$tractors = new Tractors();
$tractors_list = $tractors->getTractors();
$pastures = new Pastures();
$pastures_list = $pastures->getPastures();
$prices = new Prices();
$prices_list = $prices->getPrices();

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
                    <h1 class="h3 mb-2 text-gray-800"> Relatório de Máquinas </h1>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <a href="operationMovimentsHistoric.php" role="button" class="btn btn-primary btn-sm btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-list-alt"></i>
                                </span>
                                <span class="text"> Historico </span>
                            </a>
                            <a href="operationMovimentsReports.php" role="button" class="btn btn-dark btn-sm btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-file-pdf"></i>
                                </span>
                                <span class="text"> Relatório </span>
                            </a>
                        </div>
                        <div class="card-body">
                            <form class="user" action="../controllers/MovimentsController.php" method="POST">
                                <input type="hidden" name="register" value="true">
                                <input type="hidden" name="valueDay" value="">
                                <input type="hidden" name="workedHours" value="">
                                <div class="form-group row" style="align-items: center;">
                                    <div class="col-sm-2 mb-3 mb-sm-0">
                                        <label for="start-time">Hora Inicial</label>
                                        <input type="time" class="form-control" name="startTime" placeholder="Hora Inicial" required>
                                    </div>
                                    <div class="col-sm-2 mb-3 mb-sm-0">
                                        <label for="end-time">Hora Final</label>
                                        <input type="time" class="form-control" name="endTime" placeholder="Hora Final" required>
                                    </div>
                                    <div class="col-sm-2 mb-3 mb-sm-0">
                                        <label for="date">Data</label>
                                        <input type="date" id="date" class="form-control" name="data" placeholder="Data" required>
                                    </div>
                                    <div class="col-sm-2 mb-3 mb-sm-0">
                                        <label for="day-week">Dia da Semana</label>
                                        <input type="text" class="form-control" id="day-week" name="dayWeek" placeholder="Dia da Semana" disabled>
                                    </div>
                                    <div class="col-sm-3 ml-5 mb-3 mb-sm-0">
                                        <?php
                                        while ($preco = $prices_list->fetch_assoc()) { ?>
                                            <?php if ($preco['descricao'] == 'Hora Extra') { ?>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="adversity" name="adversity" value="<?= $preco['valor'] ?>" >
                                                    <label class="form-check-label" for="adversity">
                                                        Nortuno, Sexta de Pagamento,<br> Final de Semana, Feriado.
                                                    </label>
                                                </div>
                                            <?php } ?>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-3 mb-3 mb-sm-0">
                                        <label for="operator">Operador</label>
                                        <select class="form-control" name="operator" placeholder="Operador">
                                            <option value=""> Operador </option>
                                            <option value="1"> João </option>
                                            <option value="2"> Pedro </option>
                                        </select>
                                    </div>
                                    <div class="col-sm-3 mb-3 mb-sm-0">
                                        <label for="service">Serviço</label>
                                        <select class="form-control" name="service" placeholder="Serviço">
                                            <option value=""> Serviço </option>
                                            <option value="1"> Roço </option>
                                        </select>
                                    </div>
                                    <div class="col-sm-3 mb-3 mb-sm-0">
                                        <label for="machine">Maquina</label>
                                        <select class="form-control" name="machine" placeholder="Maquina">
                                            <option value=""> Maquina </option>
                                            <option value="1"> Bm - 125 </option>
                                        </select>
                                    </div>
                                    <div class="col-sm-3 mb-3 mb-sm-0">
                                        <label for="pasture">Pasto</label>
                                        <select class="form-control" name="pasture" placeholder="Pasto">
                                            <option value=""> Pasto </option>
                                            <option value="1"> B12 - (Nazaré) </option>
                                            <option value="2"> B13 - (Vale da Serra) </option>
                                        </select>
                                    </div>
                                </div>
                                <hr>
                                <div style="display: flex; justify-content: center;">
                                    <button style="margin: 5px;" type="submit" class="btn btn-info">
                                        <span class="text"> Cadastrar </span>
                                    </button>
                                    <button style="margin: 5px;" type="button" class="btn btn-danger">
                                        <span class="text"> Cancelar </span>
                                    </button>
                                </div>
                            </form>

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

    <script>
        $(function() {

            $("#date").on("change", function() {

                var d = this.value.split("-");
                var data = new Date(d[0], d[1] - 1, d[2]).getDay();
                var dia_semana = ['Domingo', 'Segunda-feira', 'Terça-feira', 'Quarta-feira', 'Quinta-feira', 'Sexta-feira', 'Sábado'][data];
                $("#day-week").val(dia_semana);

            }).change();

        });
    </script>



</body>

</html>