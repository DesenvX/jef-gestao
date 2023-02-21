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

                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"> Painel de Controle </h1>
                    </div>

                    <div class="row">

                        <div class="col-lg-8 mb-4">

                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary"> Áreas </h6>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-xl-6 col-md-6 mb-4">
                                            <div class="card border-left-dark shadow h-100 py-2">
                                                <div class="card-body">
                                                    <div class="row no-gutters align-items-center">
                                                        <div class="col mr-2">
                                                            <?php
                                                            require_once '../services/Collaborators.php';

                                                            use services\Collaborators;

                                                            $collaborators = new Collaborators();
                                                            $countCollaborators = $collaborators->getCountCollaborators();
                                                            ?>
                                                            <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                                                Colaboradores
                                                            </div>
                                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                                <?= $countCollaborators['count_colaboradores'] ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-auto">
                                                            <i class="fas fa-users fa-2x text-gray-300"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6 mb-4">
                                            <div class="card border-left-success shadow h-100 py-2">
                                                <div class="card-body">
                                                    <div class="row no-gutters align-items-center">
                                                        <?php
                                                        require_once '../services/Pastures.php';

                                                        use services\Pastures;

                                                        $pastures = new Pastures();
                                                        $countPastures = $pastures->getCountPastures();
                                                        ?>
                                                        <div class="col mr-2">
                                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                                Pastos
                                                            </div>
                                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                                <?= $countPastures['count_pastos'] ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-auto">
                                                            <i class="fas fa-seedling fa-2x text-gray-300"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-6 col-md-6 mb-4">
                                            <div class="card border-left-danger shadow h-100 py-2">
                                                <div class="card-body">
                                                    <div class="row no-gutters align-items-center">
                                                        <div class="col mr-2">
                                                            <?php
                                                            require_once '../services/Tractors.php';

                                                            use services\Tractors;

                                                            $tractor = new Tractors();
                                                            $countTractor = $tractor->getCountTractor();
                                                            ?>
                                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                                Tratores
                                                            </div>
                                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                                <?= $countTractor['count_tratores'] ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-auto">
                                                            <i class="fas fa-tractor fa-2x text-gray-300"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6 mb-4">
                                            <div class="card border-left-warning shadow h-100 py-2">
                                                <div class="card-body">
                                                    <div class="row no-gutters align-items-center">
                                                        <div class="col mr-2">
                                                            <?php
                                                            require_once '../services/Vehicles.php';

                                                            use services\Vehicles;

                                                            $vehicle = new Vehicles();
                                                            $countVehicle = $vehicle->getCountVehicles();
                                                            ?>
                                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                                Veículos
                                                            </div>
                                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                                <?= $countVehicle['count_veiculo'] ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-auto">
                                                            <i class="fas fa-truck-pickup fa-2x text-gray-300"></i>
                                                            <i class="fas fa-motorcycle fa-2x text-gray-300"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <?php
                                    require_once '../services/Fuel.php';

                                    use services\Fuel;

                                    $fuel = new Fuel();
                                    $fuel_porcent_tank = $fuel->getPorcentTankDashboard();
                                    ?>
                                    <input type="hidden" id="tank-total" value="10000">
                                    <input type="hidden" id="tank-porcent" value="<?= $fuel_porcent_tank ?>">
                                    <h6 class="m-0 font-weight-bold text-primary"> Tanque de Combustível </h6>
                                </div>
                                <div class="card-body">
                                    <div class="chart-pie pt-4 pb-2">
                                        <canvas id="myPieChartFuel"></canvas>
                                    </div>
                                    <div class="mt-4 text-center small">
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-success"></i> Disponível
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-secondary"></i> Utilizado
                                        </span>
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
    var elTankTotal = document.getElementById("tank-total");
    var elTankPorcent = document.getElementById("tank-porcent");
    var TankTotal = parseInt(elTankTotal.value);
    var TankPorcent = parseInt(elTankPorcent.value);
    var TankAvaliable = TankTotal - TankPorcent;

    var ctx = document.getElementById("myPieChartFuel");
    var myPieChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ["Utilizado", "Disponível"],
            datasets: [{
                data: [TankPorcent, TankAvaliable],
                backgroundColor: ['#858796', '#1cc88a'],
                hoverBackgroundColor: ['#5a5c69', '#17a673'],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
            }],
        },
        options: {
            maintainAspectRatio: false,
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
            },
            legend: {
                display: false
            },
            cutoutPercentage: 80,
        },
    });
</script>

<?php
if (isset($_SESSION['backup_success'])) {
?>
    <script>
        swalBackupSuccess();
    </script>
<?php
    unset($_SESSION['backup_success']);
}
?>

<?php
if (isset($_SESSION['backup_error'])) {
?>
    <script>
        swalBackupError();
    </script>
<?php
    unset($_SESSION['backup_error']);
}
?>

</html>