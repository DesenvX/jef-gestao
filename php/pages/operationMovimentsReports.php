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
                                <div class="form-group row" style="align-items:center;">
                                    <div class="col-sm-4">
                                        <select class="form-control" name="colaborators">
                                            <option value="operador">Operador</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <input class="form-control" type="date" name="date-init">
                                    </div>
                                    <div class="col-sm-2">
                                        <input class="form-control" type="date" name="date-finish">
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
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Data</th>
                                            <th>Operador</th>
                                            <th>Hora Inicial</th>
                                            <th>Hora Final</th>
                                            <th>Horas Trabalhadas</th>
                                            <th>Diária</th>
                                            <th>Maquina</th>
                                            <th>Pasto</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Data</th>
                                            <th>Operador</th>
                                            <th>Hora Inicial</th>
                                            <th>Hora Final</th>
                                            <th>Horas Trabalhadas</th>
                                            <th>Diária</th>
                                            <th>Maquina</th>
                                            <th>Pasto</th>
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
                                        </tr>
                                    </tbody>
                                </table>
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