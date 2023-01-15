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
                    <h1 class="h3 mb-2 text-gray-800"> Pastos </h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <button type="button" class="btn btn-info btn-sm btn-icon-split" data-toggle="modal" data-target="#modalRegisterServices">
                                <span class="icon text-white-50">
                                    <i class="fas fa-plus-circle"></i>
                                </span>
                                <span class="text"> Cadastrar </span>
                            </button>
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
                                            <th>Retiro</th>
                                            <th>Fazenda</th>
                                            <th>Opções</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Retiro</th>
                                            <th>Fazenda</th>
                                            <th>Opções</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <tr>
                                            <th>1</th>
                                            <td>10</td>
                                            <td>Santa Tereza</td>
                                            <td>
                                                <button type="button" class="btn btn-warning btn-circle btn-sm" data-toggle="modal" data-target="#modalEditPastures" data-retreat="10" data-farm="Santa Tereza">
                                                    <i class="fas fa-pen"></i>
                                                </button>
                                                <button class="btn btn-danger btn-circle btn-sm" onclick="swalDeleteCategories()">
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

                <div name="RegisterServices" class="modal fade" id="modalRegisterServices" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-sm" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="text-center">
                                    <img src="../../img/pasto.png" width="100" height="100" style="margin-bottom: 10px;">
                                </div>
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4"><b style="color: #566573;">Cadastrar Pasto</b></h1>
                                </div>
                                <form class="user" action="#" method="post">
                                    <div class="form-group row">
                                        <div class="col-sm-12 mb-3 mb-sm-0">
                                            <input type="text" class="form-control form-control-user" id="retreat" placeholder="Retiro">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12 mb-3 mb-sm-0">
                                            <input type="text" class="form-control form-control-user" id="farm" placeholder="Fazenda">
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

                <div name="EditServices" class="modal fade" id="modalEditPastures" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-sm" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="text-center">
                                    <img src="../../img/pasto.png" width="100" height="100" style="margin-bottom: 10px;">
                                </div>
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4"><b style="color: #566573;">Editar Pasto</b></h1>
                                </div>
                                <form class="user" action="#" method="post">
                                    <div class="form-group row">
                                        <div class="col-sm-12 mb-3 mb-sm-0">
                                            <input type="text" class="form-control form-control-user" id="retreat" placeholder="Retiro">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12 mb-3 mb-sm-0">
                                            <input type="text" class="form-control form-control-user" id="farm" placeholder="Fazenda">
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
        $('#modalEditServices').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var recipientRetreat = button.data('retreat')
            var recipientfarm = button.data('farm')
            var modal = $(this)
            modal.find('.modal-body #retreat').val(recipientRetreat)
            modal.find('.modal-body #farm').val(recipientfarm)
        })
    </script>

    <script src="../../js/alests-swal.js"></script>

</body>

</html>