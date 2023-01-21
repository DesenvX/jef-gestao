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
                    <h1 class="h3 mb-2 text-gray-800"> Combustivel </h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">

                        <div class="card-body">

                            <div class="row">

                                <!-- Earnings (Monthly) Card Example -->
                                <div class="col-xl-3 col-md-6 mb-4">
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

                                <!-- Earnings (Monthly) Card Example -->
                                <div class="col-xl-3 col-md-6 mb-4">
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

                                <!-- Pending Requests Card Example -->
                                <div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card border-left-primary shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                        Ainda tem</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">300 Litros</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>

                    <div class="card shadow mb-4" style="display:flex;">
                        <div class="card-header py-3" style="display: flex; justify-content: center;" id="accordionExample">

                            <!-- button Histoy -->

                            <div class="btn-group">
                                <button type="button" style="margin: 5px;" class="btn btn-primary btn-sm collapse show" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-list-alt"></i>
                                    </span>
                                    <span class="collapse show"> Historico </span>
                                </button>
                            </div>

                            <!-- Start Button Intake -->

                            <button style="margin: 5px;" type="button" class="btn btn-info btn-sm btn-icon-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-parent="#accordionExample">
                                <span class="icon text-white-50">
                                    <i class="fas fa-plus-circle"></i>
                                </span>
                                <span class="btn-sm dropdown-toggle"> Entradas </span>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" data-toggle="modal" data-target="#modalRegisterFuelIntake">Cadastrar</a>
                                <a class="dropdown-item" data-toggle="collapse" href="#collapseIntake" role="button" aria-expanded="false" aria-controls="collapseIntake">Visualizar</a>
                            </div>

                            <!-- Start Button Output -->

                            <button style="margin: 5px;" type="button" class="btn btn-danger btn-sm btn-icon-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-parent="#accordionExample">
                                <span class="icon text-white-50">
                                    <i class="fas fa-minus-circle"></i>
                                </span>
                                <span class="btn-sm dropdown-toggle"> Saidas </span>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" data-toggle="modal" data-target="#modalRegisterFuelOutput">Cadastrar</a>
                                <a class="dropdown-item" data-toggle="collapse" href="#collapseOutout" role="button" aria-expanded="false" aria-controls="collapseOutout">Visualizar</a>
                            </div>

                        </div>
                        <div class="collapse" id="collapseOutout">
                            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                <!-- conteúdo da tabela 1 -->
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
                                            <button type="button" class="btn btn-warning btn-circle btn-sm" data-toggle="modal" data-target="#modalEditFuelIntake" data-date-intake="17/01/2023" data-provider="Inpiranga" data-liters="500" data-unitary-value="R$ 5.40" data-total="2.700">
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

                <!-- Stat Form Register FuelIntake -->

                <div name="RegisterFuelIntake" class="modal fade" id="modalRegisterFuelIntake" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-sm" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="text-center">
                                    <img src="../../img/combustivel.png" width="100" height="100" style="margin-bottom: 10px;">
                                </div>
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4"><b style="color: #566573;">Entrada de Combustivel</b></h1>
                                </div>
                                <form class="user" action="#" method="post">
                                    <div class="form-group row">
                                        <div class="col-sm-12 mb-3 mb-sm-0">
                                            <input type="text" class="form-control " id="date-intake" placeholder="Data de Entrada">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12 mb-3 mb-sm-0">
                                            <input type="text" class="form-control " id="provider" placeholder="Fornecedor">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12 mb-3 mb-sm-0">
                                            <input type="text" class="form-control " id="liters" placeholder="Litros">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12 mb-3 mb-sm-0">
                                            <input type="text" class="form-control " id="unitary-value" placeholder="Valor Unitario">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12 mb-3 mb-sm-0">
                                            <input type="text" class="form-control " id="total" placeholder="Total R$">
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

                <!-- End Form Register FuelIntake -->

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
                                            <input type="text" class="form-control " id="date-output" placeholder="Data de Saida">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12 mb-3 mb-sm-0">
                                            <input type="text" class="form-control " id="liters" placeholder="Litros">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12 mb-3 mb-sm-0">
                                            <input type="text" class="form-control " id="services" placeholder="Serviço">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12 mb-3 mb-sm-0">
                                            <input type="text" class="form-control " id="pastures" placeholder="Pasto">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12 mb-3 mb-sm-0">
                                            <input type="text" class="form-control " id="tractor" placeholder="Trator">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12 mb-3 mb-sm-0">
                                            <input type="text" class="form-control " id="collaborators" placeholder="Colaborador">
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

                <div name="EditFuelIntake" class="modal fade" id="modalEditFuelIntake" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-sm" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="text-center">
                                    <img src="../../img/fornecedores.png" width="100" height="100" style="margin-bottom: 10px;">
                                </div>
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4"><b style="color: #566573;">Editar Fornecedores</b></h1>
                                </div>
                                <form class="user" action="#" method="post">
                                    <div class="form-group row">
                                        <div class="col-sm-12 mb-3 mb-sm-0">
                                            <input type="text" class="form-control form-control-user" id="company" placeholder="Empresa">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12 mb-3 mb-sm-0">
                                            <input type="text" class="form-control form-control-user" id="cnpj" placeholder="CNPJ">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12 mb-3 mb-sm-0">
                                            <input type="text" class="form-control form-control-user" id="phone" placeholder="Contato">
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
        $('#modalEditFuelIntake').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var recipientcompany = button.data('company')
            var recipientcnpj = button.data('cnpj')
            var recipientphone = button.data('phone')
            var modal = $(this)
            modal.find('.modal-body #company').val(recipientcompany)
            modal.find('.modal-body #cnpj').val(recipientcnpj)
            modal.find('.modal-body #phone').val(recipientphone)
        })
    </script>

    <script src="../../js/alests-swal.js"></script>

</body>

</html>