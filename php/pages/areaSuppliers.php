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
                    <h1 class="h3 mb-2 text-gray-800"> Fornecedores </h1>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <button type="button" class="btn btn-info btn-sm btn-icon-split" data-toggle="modal" data-target="#modalRegisterSuppliers">
                                <span class="icon text-white-50">
                                    <i class="fas fa-plus-circle"></i>
                                </span>
                                <span class="text"> Cadastrar </span>
                            </button>
                            <div name="RegisterSuppliers" class="modal fade" id="modalRegisterSuppliers" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-sm" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="text-center">
                                                <img src="../../img/fornecedores.png" width="100" height="100" style="margin-bottom: 10px;">
                                            </div>
                                            <div class="text-center">
                                                <h1 class="h4 text-gray-900 mb-4"><b style="color: #566573;"> Cadastrar Fornecedores </b></h1>
                                            </div>
                                            <form class="user" action="../controllers/SuppliersController.php" method="POST">
                                                <input type="hidden" name="register" value="true">
                                                <div class="form-group row">
                                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                                        <select class="form-control" name="type_persona" placeholder="Tipo de Pessoa">
                                                            <option value="Pessoa Fisica" selected> Pessoa Fisica </option>
                                                            <option value="Pessoa Juridica">Pessoa Juridica</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                                        <input type="text" class="form-control" name="name_or_corporate" placeholder="Nome / Razão Sozial" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                                        <input type="tel" class="form-control" name="cpf_or_cnpj" placeholder="CPF / CNPJ" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                                        <input type="text" class="form-control" name="phone" placeholder="Telefone" required>
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
                                            <th>Tipo de Pessoa</th>
                                            <th>Nome/Razão Social</th>
                                            <th>CPF/CNPJ</th>
                                            <th>Telefone</th>
                                            <th>Opções</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Tipo de Pessoa</th>
                                            <th>Nome/Razão Social</th>
                                            <th>CPF/CNPJ</th>
                                            <th>Telefone</th>
                                            <th>Opções</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        require_once '../services/Suppliers.php';

                                        use services\Suppliers;

                                        $supliers = new Suppliers();
                                        $supliers_list = $supliers->getSuppliers();

                                        while ($fornecedor = $supliers_list->fetch_assoc()) {
                                        ?>
                                            <tr>
                                                <th><?= $fornecedor['id'] ?></th>
                                                <td><?= $fornecedor['tipo_pessoa'] ?></td>
                                                <td><?= $fornecedor['nome_razao'] ?></td>
                                                <td><?= $fornecedor['cpf_cnpj'] ?></td>
                                                <td><?= $fornecedor['telefone'] ?></td>
                                                <td>
                                                    <button class="btn btn-warning btn-circle btn-sm" data-toggle="modal" data-target="#modalEditSuppliers_<?= $fornecedor['id'] ?>">
                                                        <i class="fas fa-pen"></i>
                                                    </button>

                                                    <div name="EditSuppliers" class="modal fade" id="modalEditSuppliers_<?= $fornecedor['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                        <div class="modal-dialog modal-sm" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-body">
                                                                    <div class="text-center">
                                                                        <img src="../../img/fornecedores.png" width="100" height="100" style="margin-bottom: 10px;">
                                                                    </div>
                                                                    <div class="text-center">
                                                                        <h1 class="h4 text-gray-900 mb-4"><b style="color: #566573;"> Editar Fornecedor </b></h1>
                                                                    </div>
                                                                    <form class="user" action="../controllers/SuppliersController.php" method="POST">
                                                                        <input type="hidden" name="edit" value="true">
                                                                        <input type="hidden" name="id" value="<?= $fornecedor['id'] ?>">
                                                                        <div class="form-group row">
                                                                            <div class="col-sm-12 mb-3 mb-sm-0">
                                                                                <select class="form-control" name="type_persona" required>
                                                                                    <option value="Pessoa Fisica" <?php if($fornecedor['tipo_pessoa'] == 'Pessoa Fisica') { ?> selected <?php } ?>> Pessoa Física </option>
                                                                                    <option value="Pessoa Juridica" <?php if($fornecedor['tipo_pessoa'] == 'Pessoa Juridica') { ?> selected <?php } ?>> Pessoa Jurídica </option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <div class="col-sm-12 mb-3 mb-sm-0">
                                                                                <input type="text" class="form-control" name="name_or_corporate" value="<?= $fornecedor['nome_razao'] ?>" placeholder="Nome / Razão Social" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <div class="col-sm-12 mb-3 mb-sm-0">
                                                                                <input type="text" class="form-control" name="cpf_or_cnpj" value="<?= $fornecedor['cpf_cnpj'] ?>" placeholder="CPF / CNPJ" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <div class="col-sm-12 mb-3 mb-sm-0">
                                                                                <input type="text" class="form-control" name="phone" value="<?= $fornecedor['telefone'] ?>" placeholder="phone" required>
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

                                                    <button class="btn btn-danger btn-circle btn-sm" data-toggle="modal" data-target="#modalDeleteCategories_<?= $fornecedor['id'] ?>">
                                                        <i class="fas fa-trash"></i>
                                                    </button>

                                                    <div name="DeleteCategories" class="modal fade" id="modalDeleteCategories_<?= $fornecedor['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                        <div class="modal-dialog modal-sm" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-body">
                                                                    <div class="text-center">
                                                                        <h1 class="h4 text-gray-900 mb-4"><b style="color: #566573;">Deseja excluir o fornecedor <br><strong> <?= $fornecedor['nome_razao'] ?> </strong> ?</span></b></h1>
                                                                    </div>
                                                                    <form class="user" action="../controllers/SuppliersController.php" method="POST">
                                                                        <input type="hidden" name="delete" value="true">
                                                                        <input type="hidden" name="id" value="<?= $fornecedor['id'] ?>">
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

</body>

<?php
if (isset($_SESSION['register_suppliers_success'])) {
?>
    <script>
        swalRegisterSuccess();
    </script>
<?php
    unset($_SESSION['register_suppliers_success']);
}
?>

<?php
if (isset($_SESSION['register_suppliers_fail'])) {
?>
    <script>
        swalRegisterError();
    </script>
<?php
    unset($_SESSION['register_suppliers_fail']);
}
?>

<?php
if (isset($_SESSION['edit_suppliers_success'])) {
?>
    <script>
        swalEditSuccess();
    </script>
<?php
    unset($_SESSION['edit_suppliers_success']);
}
?>

<?php
if (isset($_SESSION['edit_suppliers_fail'])) {
?>
    <script>
        swalEditError();
    </script>
<?php
    unset($_SESSION['edit_suppliers_fail']);
}
?>

<?php
if (isset($_SESSION['delete_suppliers_success'])) {
?>
    <script>
        swalDeleteSuccess();
    </script>
<?php
    unset($_SESSION['delete_suppliers_success']);
}
?>

<?php
if (isset($_SESSION['delete_suppliers_fail'])) {
?>
    <script>
        swalDeleteError();
    </script>
<?php
    unset($_SESSION['delete_suppliers_fail']);
}
?>

</html>