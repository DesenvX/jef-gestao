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

                    <h1 class="h3 mb-2 text-gray-800"> Movimentos </h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <button type="button" class="btn btn-info btn-sm btn-icon-split" data-toggle="modal" data-target="#modalRegisterProduct">
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

                                <!-- Start Form -->




                                <form class="user" action="#" method="post">
                                    <div class="form-group row">
                                        <div class="col-sm-2 mb-3 mb-sm-0">
                                            <input type="time" class="form-control  " id="entry-time" placeholder="Horário de Entradal">
                                        </div>
                                        <div class="col-sm-2 mb-3 mb-sm-0">
                                            <input type="time" class="form-control  " id="gone" placeholder="Saida para Almoço">
                                        </div>
                                        <div class="col-sm-2 mb-3 mb-sm-0">
                                            <input type="time" class="form-control  " id="return" placeholder="Retorno do Almoço">
                                        </div>
                                        <div class="col-sm-2 mb-3 mb-sm-0">
                                            <input type="time" class="form-control  " id="departure time" placeholder="Horário de Saída">
                                        </div>
                                        <div class="col-sm-3 mb-3 mb-sm-0">
                                            <input type="date" class="form-control  " id="departure-time" placeholder="Data">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-3 mb-3 mb-sm-0">
                                            <select class="form-control" id="category" placeholder="Categoria">
                                                <option value=""> Operador </option>
                                                <option value="1"> João </option>
                                                <option value="2"> Pedro </option>
                                            </select>
                                        </div>
                                        <div class="col-sm-3 mb-3 mb-sm-0">
                                            <select class="form-control" id="category" placeholder="Categoria">
                                                <option value=""> Maquina </option>
                                                <option value="1"> Bm - 125 </option>
                                                <option value="2"> Bm - 135 </option>
                                            </select>
                                        </div>
                                        <div class="col-sm-3 mb-3 mb-sm-0">
                                            <select class="form-control" id="category" placeholder="Categoria">
                                                <option value=""> Retiro </option>
                                                <option value="1"> Nazare </option>
                                                <option value="2"> Vale da Serra </option>
                                            </select>
                                        </div>
                                        <div class="col-sm-3 mb-3 mb-sm-0">
                                            <select class="form-control" id="category" placeholder="Categoria">
                                                <option value=""> Pasto </option>
                                                <option value="1"> B12 </option>
                                                <option value="2"> B13 </option>
                                            </select>
                                        </div>
                                    </div>


                                    <hr>
                                    <div>
                                        <center>
                                            <button type="button" class="btn btn-info">                                                
                                                <span class="text"> Cadastrar </span>
                                            </button>
                                            <button type="button" class="btn btn-danger">                                                
                                                <span class="text"> Cancelar </span>
                                            </button>
                                        </center>
                                    </div>
                                </form>




                                <!-- End Form -->

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
        $('#modalEditProduct').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var recipientName = button.data('name-product')
            var recipientQuantity = button.data('quantity-product')
            var recipientMaximum = button.data('maximum')
            var recipientMinimum = button.data('minimum')
            var modal = $(this)
            modal.find('.modal-body #name-product').val(recipientName)
            modal.find('.modal-body #quantity-product').val(recipientQuantity)
            modal.find('.modal-body #maximum').val(recipientMaximum)
            modal.find('.modal-body #minimum').val(recipientMinimum)
        })
    </script>

    <script src="../../js/alests-swal.js"></script>

</body>

</html>