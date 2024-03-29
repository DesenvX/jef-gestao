<!DOCTYPE html>
<html lang="pt-br">

<head>

    <title> Gestão de Logística </title>

    <?php
    include('../../html/links_and_cdns.html');
    session_start();
    ?>

</head>
<?php

require_once '../services/Collaborators.php';
require_once '../services/Services.php';
require_once '../services/Tractors.php';
require_once '../services/Pastures.php';

use services\Collaborators;
use services\Services;
use services\Tractors;
use services\Pastures;

$collaborators = new Collaborators();
$collaborators_list = $collaborators->getCollaborators();
$services = new Services();
$services_list = $services->getServices();
$tractors = new Tractors();
$tractors_list = $tractors->getTractors();
$pastures = new Pastures();
$pastures_list = $pastures->getPastures();

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
                            <a href="#" role="button" class="btn btn-info btn-sm btn-icon-split" data-toggle="modal" data-target="#modalCloseWeek">
                                <span class="icon text-white-50">
                                    <i class="fas fa-lock"></i>
                                </span>
                                <span class="text"> Fechar Mês </span>
                            </a>

                            <div name="closeWeek" class="modal fade" id="modalCloseWeek" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-sm" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="text-center">
                                                <h1 class="h4 text-gray-900 mb-4"><b style="color: #566573; font-size: 20px;text-align: justify;"><strong>OBS:</strong> Certifique-se de ter feito o lançamento de todos os relatórios do mês dos colaboradores.</b></h1>
                                            </div>
                                            <form class="user" action="../controllers/MovimentsController.php" method="POST">
                                                <input type="hidden" name="close" value="true">
                                                <hr>
                                                <button type="submit" class="btn btn-user btn-dark btn-block">
                                                    Continuar
                                                </button>
                                                <button type="button" class="btn btn-user btn-danger btn-block" data-dismiss="modal"> Cancelar </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="card-body">
                            <form class="user" action="../controllers/MovimentsController.php" method="POST">
                                <input type="hidden" name="register" value="true">
                                <div class="form-group row" style="align-items: center;">
                                    <div class="col-sm-2 mb-3 mb-sm-0">
                                        <label for="start-time">Horimetro Inicial</label>
                                        <input type="number" class="form-control" name="startTime" required>
                                    </div>
                                    <div class="col-sm-2 mb-3 mb-sm-0">
                                        <label for="end-time">Horimetro Final</label>
                                        <input type="number" class="form-control" name="endTime" required>
                                    </div>
                                    <div class="col-sm-2 mb-3 mb-sm-0">
                                        <label for="date">Data</label>
                                        <input type="date" id="date" class="form-control" name="data" placeholder="Data" required>
                                    </div>
                                    <div class="col-sm-2 mb-3 mb-sm-0">
                                        <label for="day-week">Dia da Semana</label>
                                        <input type="text" class="form-control" id="day-week-disabled" placeholder="Dia da Semana" disabled>
                                        <input type="hidden" id="day-week" name="dayWeek" required>
                                    </div>
                                    <div class="col-sm-3 ml-5 mb-3 mb-sm-0">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="adversity" name="adversity">
                                            <label class="form-check-label" for="adversity">
                                                Nortuno, Sexta de Pagamento,<br> Final de Semana, Feriado.
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-3 mb-3 mb-sm-0">
                                        <label for="operator">Operador</label>
                                        <select class="form-control" name="collaborator" placeholder="Operador" required>
                                            <option value=""> Operador </option>
                                            <?php while ($colaborador = $collaborators_list->fetch_assoc()) { ?>
                                                <option value="<?= $colaborador['id'] ?>"><?= $colaborador['nome'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-3 mb-3 mb-sm-0">
                                        <label for="service">Serviço</label>
                                        <select class="form-control" name="service" placeholder="Serviço" required>
                                            <option value=""> Serviço </option>
                                            <?php while ($servico = $services_list->fetch_assoc()) { ?>
                                                <option value="<?= $servico['id'] ?>"><?= $servico['descricao'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-3 mb-3 mb-sm-0">
                                        <label for="machine">Maquina</label>
                                        <select class="form-control" name="machine" placeholder="Maquina" required>
                                            <option value=""> Maquina </option>
                                            <?php while ($trator = $tractors_list->fetch_assoc()) { ?>
                                                <option value="<?= $trator['id'] ?>"><?= $trator['modelo'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-3 mb-3 mb-sm-0">
                                        <label for="pasture">Pasto</label>
                                        <select class="form-control" name="pasture" placeholder="Pasto" required>
                                            <option value=""> Pasto </option>
                                            <?php while ($pasto = $pastures_list->fetch_assoc()) { ?>
                                                <option value="<?= $pasto['id'] ?>"><?= $pasto['nome'] ?> (<?= $pasto['retiro'] ?>)</option>
                                            <?php } ?>
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
                var dia_semana = ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado'][data];
                $("#day-week-disabled").val(dia_semana);
                $("#day-week").val(dia_semana);

            }).change();

        });
    </script>



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
if (isset($_SESSION['close_moviments_success'])) {
?>
    <script>
        swalCloseMovimentSuccess();
    </script>
<?php
    unset($_SESSION['close_moviments_success']);
}
?>

<?php
if (isset($_SESSION['close_moviments_fail'])) {
?>
    <script>
        swalCloseMovimentError();
    </script>
<?php
    unset($_SESSION['close_moviments_fail']);
}
?>

</html>