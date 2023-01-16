<!DOCTYPE html>
<html lang="pt-br">

<head>

    <title> JEF Gestão </title>

    <!-- Links and Cdns -->
    <?php
    include('../../html/links_and_cdns.html');
    ?>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php
        include('../../html/sidebar.html');
        ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php
                include('../../html/topbar.html');
                ?>


                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <span style="font-size: small;"> Áreas </span>
                    <h1 class="h3 mb-2 text-gray-800"> Tabela de Saida </h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">

                            <a href="controlFuel.php" type="button" class="btn btn-danger btn-sm btn-icon-split" href="controlFuel.php">
                                <span class="icon text-white-50">
                                    <i class="fas fa-arrow-left"></i>
                                </span>
                                <span class="text"> Voltar </span>
                            </a>

                            <!-- button table -->
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Tabela
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="tableIntake.php">Entrada</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">

                            <div name="SearchAndFilter" class="row" style="justify-content: end; margin-bottom:20px;">
                                <div class="col-md-5">
                                    <div id="dataTable_filter" class="dataTables_filter">
                                        <input type="search" class="form-control form-control-sm" placeholder="Buscar" aria-controls="dataTable">
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

                                <!-- Start table Output -->

                                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Data da Saida</th>
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
                                            <th>Data da Saida</th>
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
                                            <th>1</th>
                                            <td>17/01/2023</td>
                                            <th>200</th>
                                            <td>Limpeza</td>
                                            <td>Pasto 01</td>
                                            <td>BM 135</td>
                                            <td>Pedro</td>
                                            <td>
                                                <button type="button" class="btn btn-warning btn-circle btn-sm" data-toggle="modal" data-target="#modalEditFuelOutput" data-date-output="17/01/2023" data-liters="200" data-services="Limpeza" data-pastures="Pasto 01" data-tractor="BM 135" data-collaborators="Pedro">
                                                    <i class="fas fa-pen"></i>
                                                </button>
                                                <button class="btn btn-danger btn-circle btn-sm" onclick="swalDelete()">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <!-- End table Output -->

                            </div>

                            <div name="pagination" class="row">
                                <div class="col-sm-12">
                                    <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                                        <ul class="pagination">
                                            <li class="paginate_button page-item previous disabled" id="dataTable_previous"><a href="#" aria-controls="dataTable" data-dt-idx="0" tabindex="0" class="page-link">Anterior</a></li>
                                            <li class="paginate_button page-item active"><a href="#" aria-controls="dataTable" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                                            <li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="2" tabindex="0" class="page-link">2</a></li>
                                            <li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="3" tabindex="0" class="page-link">3</a></li>
                                            <li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="4" tabindex="0" class="page-link">4</a></li>
                                            <li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="5" tabindex="0" class="page-link">5</a></li>
                                            <li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="6" tabindex="0" class="page-link">6</a></li>
                                            <li class="paginate_button page-item next" id="dataTable_next"><a href="#" aria-controls="dataTable" data-dt-idx="7" tabindex="0" class="page-link"> Próximo </a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Stat Form Register FuelOutput -->

                <div name="RegisterFuelOutput" class="modal fade" id="modalRegisterFuelOutput" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-sm" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="text-center">
                                    <img src="../../img/combustivel.png" width="100" height="100" style="margin-bottom: 10px;">
                                </div>
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4"><b style="color: #566573;">Saida de Combustivel</b></h1>
                                </div>
                                <form class="user" action="#" method="post">
                                    <div class="form-group row">
                                        <div class="col-sm-12 mb-3 mb-sm-0">
                                            <input type="text" class="form-control form-control-user" id="date-output" placeholder="Data de Saida">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12 mb-3 mb-sm-0">
                                            <input type="text" class="form-control form-control-user" id="liters" placeholder="Litros">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12 mb-3 mb-sm-0">
                                            <input type="text" class="form-control form-control-user" id="services" placeholder="Serviço">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12 mb-3 mb-sm-0">
                                            <input type="text" class="form-control form-control-user" id="pastures" placeholder="Pasto">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12 mb-3 mb-sm-0">
                                            <input type="text" class="form-control form-control-user" id="tractor" placeholder="Trator">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12 mb-3 mb-sm-0">
                                            <input type="text" class="form-control form-control-user" id="collaborators" placeholder="Colaborador">
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

                <!-- End Form Register FuelOutput -->

                <!-- Start modal FuelOutput -->

                <div name="EditFuelOutput" class="modal fade" id="modalEditFuelOutput" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-sm" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="text-center">
                                    <img src="../../img/combustivel.png" width="100" height="100" style="margin-bottom: 10px;">
                                </div>
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4"><b style="color: #566573;">Editar saida de combustivel</b></h1>
                                </div>
                                <form class="user" action="#" method="post">
                                    <div class="form-group row">
                                        <div class="col-sm-12 mb-3 mb-sm-0">
                                            <input type="text" class="form-control form-control-user" id="date-output" placeholder="Data">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12 mb-3 mb-sm-0">
                                            <input type="text" class="form-control form-control-user" id="liters" placeholder="Litro">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12 mb-3 mb-sm-0">
                                            <input type="text" class="form-control form-control-user" id="services" placeholder="Serviço">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12 mb-3 mb-sm-0">
                                            <input type="text" class="form-control form-control-user" id="pastures" placeholder="Pasto">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12 mb-3 mb-sm-0">
                                            <input type="text" class="form-control form-control-user" id="tractor" placeholder="Trator">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12 mb-3 mb-sm-0">
                                            <input type="text" class="form-control form-control-user" id="collaborators" placeholder="Colaborador">
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

                <!-- End modal FuelOutput -->



            </div>
            <!-- End of Main Content -->

            <?php
            include('../../html/footer.html');
            ?>

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <?php include('../../html/scripts.html'); ?>

    <script>
        $('#modalEditFuelOutput').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var recipientDateOutput = button.data('date-output')
            var recipientLiters = button.data('liters')
            var recipientService = button.data('service')
            var recipientPastures = button.data('pastures')
            var recipientTractor = button.data('tractor')
            var recipientCollaborators = button.data('collaborators')
            var modal = $(this)
            modal.find('.modal-body #date-output').val(recipientDateOutput)
            modal.find('.modal-body #liters').val(recipientLiters)
            modal.find('.modal-body #service').val(recipientService)
            modal.find('.modal-body #pastures').val(recipientPastures)
            modal.find('.modal-body #tractor').val(recipientTractor)
            modal.find('.modal-body #collaborators').val(recipientCollaborators)
        })
    </script>

    <script src="../../js/alests-swal.js"></script>

</body>

</html>