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
                    <h1 class="h3 mb-2 text-gray-800"> Movimentos </h1>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <a href="operationMovimentsHistoric.php" role="button" class="btn btn-info btn-sm btn-icon-split">

                                <span class="icon text-white-50">
                                    <i class="fas fa-list-alt"></i>
                                </span>
                                <span class="text"> Historico </span>
                            </a>
                            <button type="button" class="btn btn-primary btn-sm btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-download fa-sm text-white-50"></i>
                                </span>
                                <span class="text"> Gerar Relatório </span>
                            </button>
                        </div>
                        <div class="card-body">
                            <form class="user" action="#" method="post">
                                <div class="form-group row">
                                    <div class="col-sm-2 mb-3 mb-sm-0">
                                        <label for="start-time">Hora Inicial</label>
                                        <input type="time" class="form-control  " id="start-time" placeholder="Hora Inicial">
                                    </div>
                                    <div class="col-sm-2 mb-3 mb-sm-0">
                                        <label for="lunch">Almoço</label>
                                        <input type="time" class="form-control  " id="lunch" placeholder="Almoço">
                                    </div>
                                    <div class="col-sm-2 mb-3 mb-sm-0">
                                        <label for="return">Retorno</label>
                                        <input type="time" class="form-control  " id="return" placeholder="Retorno">
                                    </div>
                                    <div class="col-sm-2 mb-3 mb-sm-0">
                                        <label for="end-time">Hora Final</label>
                                        <input type="time" class="form-control  " id="end-time" placeholder="Hora Final">
                                    </div>
                                    <div class="col-sm-3 mb-3 mb-sm-0">
                                        <label for="date">Data</label>
                                        <input type="date" class="form-control  " id="date" placeholder="Data">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-3 mb-3 mb-sm-0">
                                        <label for="operator">Operador</label>
                                        <select class="form-control" id="category" placeholder="Operador">
                                            <option value=""> Operador </option>
                                            <option value="1"> João </option>
                                            <option value="2"> Pedro </option>
                                        </select>
                                    </div>
                                    <div class="col-sm-3 mb-3 mb-sm-0">
                                        <label for="machine">Maquina</label>
                                        <select class="form-control" id="machine" placeholder="Maquina">
                                            <option value=""> Maquina </option>
                                            <option value="1"> Bm - 125 </option>
                                            <option value="2"> Bm - 135 </option>
                                        </select>
                                    </div>
                                    <div class="col-sm-3 mb-3 mb-sm-0">
                                        <label for="retreats">Retiro</label>
                                        <select class="form-control" id="retreats" placeholder="Retiro">
                                            <option value=""> Retiro </option>
                                            <option value="1"> Nazare </option>
                                            <option value="2"> Vale da Serra </option>
                                        </select>
                                    </div>
                                    <div class="col-sm-3 mb-3 mb-sm-0">
                                        <label for="pasture">Pasto</label>
                                        <select class="form-control" id="pasture" placeholder="Pasto">
                                            <option value=""> Pasto </option>
                                            <option value="1"> B12 </option>
                                            <option value="2"> B13 </option>
                                        </select>
                                    </div>
                                </div>
                                <hr>
                                <div style="display: flex; justify-content: center;">
                                    <button style="margin: 5px;" type="button" class="btn btn-info">
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

     

</body>

</html>