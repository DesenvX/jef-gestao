<!DOCTYPE html>
<html lang="pt-br">

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
                                    <h4 class="small font-weight-bold"> Arroz <span class="float-right"> R$9990,00 (30)</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 100%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="30"></div>
                                    </div>
                                    <h4 class="small font-weight-bold"> Feijão <span class="float-right"> R$9990,00 (30) </span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 100%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="30"></div>
                                    </div>
                                    <h4 class="small font-weight-bold"> Óleo <span class="float-right"> R$9000,00 (30) </span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 100%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="30"></div>
                                    </div>
                                    <h4 class="small font-weight-bold"> Flamen <span class="float-right"> R$300,00 (30) </span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 100%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="30"></div>
                                    </div>
                                    <h4 class="small font-weight-bold"> Bota <span class="float-right"> R$300,00 (30) </span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 100%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="30"></div>
                                    </div>
                                    <h4 class="small font-weight-bold"> Correia <span class="float-right"> R$300,00 (30) </span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-secondary" role="progressbar" style="width: 100%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="30"></div>
                                    </div>
                                    <h4 class="small font-weight-bold"> Parafuso <span class="float-right"> R$600,00 (30)</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-secondary" role="progressbar" style="width: 100%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="30"></div>
                                    </div>
                                    <h4 class="small font-weight-bold"> Caia de Freio <span class="float-right"> R$1500,00 (5) </span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-secondary" role="progressbar" style="width: 16%" aria-valuenow="5" aria-valuemin="0" aria-valuemax="30"></div>
                                    </div>
                                    <h4 class="small font-weight-bold"> Pastilha de Freio <span class="float-right"> R$20,00 (2) </span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-secondary" role="progressbar" style="width: 6%" aria-valuenow="2" aria-valuemin="0" aria-valuemax="30"></div>
                                    </div>
                                    <h4 class="small font-weight-bold"> Disco de moto <span class="float-right"> R$640,00 (20) </span></h4>
                                    <div class="progress">
                                        <div class="progress-bar bg-secondary" role="progressbar" style="width: 66%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="30"></div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary"> Combustível </h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="chart-pie pt-4 pb-2">
                                        <canvas id="myPieChart"></canvas>
                                    </div>
                                    <div class="mt-4 text-center small">
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-primary"></i> Direct
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-success"></i> Social
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-info"></i> Referral
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

</html>