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
                                <a class="btn btn-dark btn-sm" style="background: #06B8D4; margin-left:1px; margin-right:2px; border-color:#D5D8DC;" data-toggle="modal" data-target="#modalRegisterFuelIntake"> <i class="fas fa-plus-circle" data-toggle="tooltip" data-placement="top" title="Cadastrar"></i> </a>
                                </a>
                            </button>

                            <button style="margin: 5px;" type="button" class="btn btn-danger btn-sm btn-icon-split">
                                <span class="btn-sm"> Saidas </span>
                                <a class="btn btn-dark btn-sm" style="background: #FF5A4A; margin-left:2px; margin-right:1px; border-color:#D5D8DC;" role="button" data-toggle="collapse" data-target="#collapseOutput" aria-expanded="false" aria-controls="collapseOutput">
                                    <i class="fas fa-eye" data-toggle="tooltip" data-placement="top" title="Vusializar"></i>
                                </a>
                                <a class="btn btn-dark btn-sm" style="background: #FF5A4A; margin-left:2px; margin-right:1px; border-color:#D5D8DC;" data-toggle="modal" data-target="#modalRegisterFuelOutput"> <i class="fas fa-plus-circle" data-toggle="tooltip" data-placement="top" title="Cadastrar"></i> </a>
                                </a>
                            </button>
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
                                                    <tr class="table-danger">
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
                                                    <tr class="table-info">
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
                            </div>
                        </div>

                    </div>
                </div>

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