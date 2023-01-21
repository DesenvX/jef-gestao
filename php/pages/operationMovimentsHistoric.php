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

                    <span style="font-size: small;"> Áreas </span>
                    <h1 class="h3 mb-2 text-gray-800"> Historico </h1>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <a href="operationMoviments.php" type="button" class="btn btn-danger btn-sm btn-icon-split" href="controlFuel.php">
                                <span class="icon text-white-50">
                                    <i class="fas fa-arrow-left"></i>
                                </span>
                                <span class="text"> Voltar </span>
                            </a>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive">

                                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Data</th>
                                            <th>Hora Inicial</th>
                                            <th>Almoço</th>
                                            <th>Retorno</th>
                                            <th>Hora Final</th>
                                            <th>Operador</th>
                                            <th>Maquina</th>
                                            <th>Retiro</th>
                                            <th>Pasto</th>
                                            <th>Opções</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Data</th>
                                            <th>Hora Inicial</th>
                                            <th>Almoço</th>
                                            <th>Retorno</th>
                                            <th>Hora Final</th>
                                            <th>Operador</th>
                                            <th>Maquina</th>
                                            <th>Retiro</th>
                                            <th>Pasto</th>
                                            <th>Opções</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <tr>
                                            <th>1</th>
                                            <td style="text-align: center;">21/01/2023</td>
                                            <td style="text-align: center;">08:00</td>
                                            <td style="text-align: center;">12:00</td>
                                            <td style="text-align: center;">14:00</td>
                                            <td style="text-align: center;">18:00</td>
                                            <td style="text-align: center;">Pedro Henrique</td>
                                            <td style="text-align: center;">Bm - 135</td>
                                            <td style="text-align: center;">Nazaré</td>
                                            <td style="text-align: center;">F12</td>
                                            <td style="text-align: center;">
                                                <button type="button" class="btn btn-warning btn-circle btn-sm" data-toggle="modal" data-target="#modalEditHistoric" data-date="21/01/2023" data-start-time="08:00" data-lunch="12:00" data-retorn="14:00" data-end-time="18:00" data-operator="Pedro Henrique" data-machine="Bm - 135" data-retreat="Nazaré" data-pasture="F12">
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

                <div name="EditHistoric" class="modal fade" id="modalEditHistoric" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-sm" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="text-center">
                                    <img src="../../img/trator.png" width="100" height="100" style="margin-bottom: 10px;">
                                </div>
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4"><b style="color: #566573;">Editar Historico</b></h1>
                                </div>
                                <form class="user" action="#" method="post">
                                    <div class="form-group row">
                                        <div class="col-sm-12 mb-3 mb-sm-0">
                                            <input type="text" class="form-control  " id="date" placeholder="Data Atual">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12 mb-3 mb-sm-0">
                                            <input type="text" class="form-control  " id="start-time" placeholder="Hora Inicial">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12 mb-3 mb-sm-0">
                                            <input type="text" class="form-control  " id="lunch" placeholder="Almoço">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12 mb-3 mb-sm-0">
                                            <input type="text" class="form-control  " id="retorn" placeholder="Retorno">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12 mb-3 mb-sm-0">
                                            <input type="text" class="form-control  " id="end-time" placeholder="Hora Final ">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12 mb-3 mb-sm-0">
                                            <input type="text" class="form-control  " id="operator" placeholder="Operador">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12 mb-3 mb-sm-0">
                                            <input type="text" class="form-control  " id="machine" placeholder="Maquina">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12 mb-3 mb-sm-0">
                                            <input type="text" class="form-control  " id="retreat" placeholder="Retiro">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12 mb-3 mb-sm-0">
                                            <input type="text" class="form-control  " id="pasture" placeholder="Pasto">
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
        $('#modalEditHistoric').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var recipientDate = button.data('date')
            var recipientStartTime = button.data('start-time')
            var recipientLunch = button.data('lunch')
            var recipientRetorn = button.data('retorn')
            var recipientEndTime = button.data('end-time')
            var recipientOperator = button.data('operator')
            var recipientMachine = button.data('machine')
            var recipientRetreat = button.data('retreat')
            var recipientPasture = button.data('pasture')
            var modal = $(this)
            modal.find('.modal-body #date').val(recipientDate)
            modal.find('.modal-body #start-time').val(recipientStartTime)
            modal.find('.modal-body #lunch').val(recipientLunch)
            modal.find('.modal-body #retorn').val(recipientRetorn)
            modal.find('.modal-body #end-time').val(recipientEndTime)
            modal.find('.modal-body #operator').val(recipientOperator)
            modal.find('.modal-body #machine').val(recipientMachine)
            modal.find('.modal-body #retreat').val(recipientRetreat)
            modal.find('.modal-body #pasture').val(recipientPasture)
        })
    </script>

    <script src="../../js/alests-swal.js"></script>

</body>

</html>