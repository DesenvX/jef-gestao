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

                    <span style="font-size: small;"> Áreas </span>
                    <h1 class="h3 mb-2 text-gray-800"> Produtos </h1>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <button type="button" class="btn btn-info btn-sm btn-icon-split" data-toggle="modal" data-target="#modalRegisterProduct">
                                <span class="icon text-white-50">
                                    <i class="fas fa-plus-circle"></i>
                                </span>
                                <span class="text"> Cadastrar </span>
                            </button>

                            <div name="RegisterProduct" class="modal fade" id="modalRegisterProduct" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-sm" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="text-center">
                                                <img src="../../img/contato.png" width="100" height="100" style="margin-bottom: 10px;">
                                            </div>
                                            <div class="text-center">
                                                <h1 class="h4 text-gray-900 mb-4"><b style="color: #566573;"> Cadastrar Contato </b></h1>
                                            </div>
                                            <form class="user" action="../controllers/ProductController.php" method="post">
                                                <input type="hidden" name="register">
                                                <div class="form-group row">
                                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                                        <input type="text" class="form-control  " name="nameProduct" placeholder="Nome">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                                        <input type="text" class="form-control  " name="quantityProduct" placeholder="Quantidade">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                                        <select class="form-control" name="category" placeholder="Categoria">
                                                            <option value="">Categorias</option>
                                                            <option value="1"> Alimentos </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                                        <input type="text" class="form-control  " name="maximum" placeholder="Capacidade máxima">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                                        <input type="tel" class="form-control  " name="minimum" placeholder="Capacidade mínimo">
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
                        </div>
                        <div class="card-body">

                            <div name="SearchAndFilter" class="row" style="justify-content: end; margin-bottom:20px;">
                                <div class="col-md-5">
                                    <div id="dataTable_filter" class="dataTables_filter">
                                        <input type="search" id="search" class="form-control form-control-sm" placeholder="Buscar" aria-controls="dataTable">
                                    </div>
                                </div>


                            </div>

                            <div class="table-responsive">

                                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Descrição</th>
                                            <th>Quantidade</th>
                                            <th>Categoria</th>
                                            <th>Capacidade Total</th>
                                            <th>Capacidade Minima</th>
                                            <th>Opções</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Descrição</th>
                                            <th>Quantidade</th>
                                            <th>Categoria</th>
                                            <th>Capacidade Total</th>
                                            <th>Capacidade Minima</th>
                                            <th>Opções</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        require_once '../services/Product.php';

                                        use services\Product;

                                        $produtos = new Product();
                                        $produtos_list = $produtos->getProduct();

                                        while ($produto = $produtos_list->fetch_assoc()) {
                                        ?>
                                            <tr>
                                                <th><?= $produto['id'] ?></th>
                                                <td><?= $produto['nome'] ?></td>
                                                <td><?= $produto['quantidade'] ?></td>
                                                <td><?= $produto['categorias'] ?></td>
                                                <td><?= $produto['maxima'] ?></td>
                                                <td><?= $produto['minima'] ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-warning btn-circle btn-sm" data-toggle="modal" data-target="#modalEditProduct_<?= $produto['id'] ?>">
                                                        <i class="fas fa-pen"></i>
                                                    </button>

                                                    <div name="EditProduct" class="modal fade" id="modalEditProduct_<?= $produto['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                        <div class="modal-dialog modal-sm" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-body">
                                                                    <div class="text-center">
                                                                        <img src="../../img/contato.png" width="100" height="100" style="margin-bottom: 10px;">
                                                                    </div>
                                                                    <div class="text-center">
                                                                        <h1 class="h4 text-gray-900 mb-4"><b style="color: #566573;"> Editar Contato </b></h1>
                                                                    </div>
                                                                    <form class="user" action="../controllers/ProductController.php" method="post">
                                                                        <input type="hidden" name="edit" value="true">
                                                                        <input type="hidden" name="id" value="<?= $produto['id'] ?>">
                                                                        <div class="form-group row">
                                                                            <div class="col-sm-12 mb-3 mb-sm-0">
                                                                                <input type="text" class="form-control  " name="nameProduct" value="<?= $produto['nome'] ?>" placeholder="Nome">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <div class="col-sm-12 mb-3 mb-sm-0">
                                                                                <input type="text" class="form-control " name="quantityProduct" value="<?= $produto['quantidade'] ?>" placeholder="Quantidade">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <div class="col-sm-12 mb-3 mb-sm-0">
                                                                                <select class="form-control  " name="category" placeholder="Categoria">
                                                                                    <option class="form-control  " value="1"> Alimentos </option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <div class="col-sm-12 mb-3 mb-sm-0">
                                                                                <input type="text" class="form-control  " name="maximum" value="<?= $produto['maxima'] ?>" placeholder="Capacidade máxima">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <div class="col-sm-12 mb-3 mb-sm-0">
                                                                                <input type="tel" class="form-control  " name="minimum" value="<?= $produto['minima'] ?>" placeholder="Capacidade mínimo">
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

                                                    <button class="btn btn-danger btn-circle btn-sm" data-toggle="modal" data-target="#modalDeleteProduct_<?= $produto['id'] ?>">
                                                        <i class="fas fa-trash"></i>
                                                    </button>

                                                    <div name="DeleteProduct" class="modal fade" id="modalDeleteProduct_<?= $produto['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                        <div class="modal-dialog modal-sm" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-body">
                                                                    <div class="text-center">
                                                                        <h1 class="h4 text-gray-900 mb-4"><b style="color: #566573;">Deseja excluir o produto
                                                                         <br><strong><?= $produto['nome'] ?></strong> ?</span></b></h1>
                                                                    </div>
                                                                    <form class="user" action="../controllers/ProductController.php" method="POST">
                                                                        <input type="hidden" name="delete" value="true">
                                                                        <input type="hidden" name="id" value="<?= $produto['id'] ?>">
                                                                        <hr>
                                                                        <button type="submit" class="btn btn-user btn-dark btn-block"> Sim, excluir! </button>
                                                                        <button type="button" class="btn btn-user btn-danger btn-block" data-dismiss="modal"> Cancelar </button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>

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