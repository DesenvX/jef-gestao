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
                    <h1 class="h3 mb-2 text-gray-800"> Colaboradores </h1>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">

                            <button type="button" class="btn btn-info btn-sm btn-icon-split" data-toggle="modal" data-target="#modalRegisterCollaborators">
                                <span class="icon text-white-50">
                                    <i class="fas fa-plus-circle"></i>
                                </span>
                                <span class="text"> Cadastrar </span>
                            </button>
                            <div name="RegisterCollaborators" class="modal fade" id="modalRegisterCollaborators" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-sm" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="text-center">
                                                <img src="../../img/colaboradores.png" width="100" height="100" style="margin-bottom: 10px;">
                                            </div>
                                            <div class="text-center">
                                                <h1 class="h4 text-gray-900 mb-4"><b style="color: #566573;">Cadastrar Colaboradores</b></h1>
                                            </div>
                                            <form class="user" action="../controllers/CollaboratorsController.php" method="POST">
                                                <input type="hidden" name="register">
                                                <div class="form-group row">
                                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                                        <input type="text" class="form-control" name="name" placeholder="Nome" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                                        <input type="tel" class="form-control" name="phone" placeholder="Celular" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                                        <input type="text" class="form-control" name="cpf" placeholder="CPF" required>
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
                                            <th>Nome</th>
                                            <th>Celular</th>
                                            <th>CPF</th>
                                            <th>Opções</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nome</th>
                                            <th>Celular</th>
                                            <th>CPF</th>
                                            <th>Opções</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                        <?php
                                        require_once '../services/Collaborators.php';

                                        use services\Collaborators;

                                        $colaboradores = new Collaborators();
                                        $colaborado_list = $colaboradores->getColaboradores();

                                        while ($colaborador = $colaborado_list->fetch_assoc()) {
                                        ?>
                                            <tr>
                                                <th><?= $colaborador['id'] ?></th>
                                                <td><?= $colaborador['nome'] ?></td>
                                                <td><?= $colaborador['telefone'] ?></td>
                                                <td><?= $colaborador['cpf'] ?></td>
                                                <td>
                                                    <button class="btn btn-warning btn-circle btn-sm" data-toggle="modal" data-target="#modalEditCollaborators">
                                                        <i class="fas fa-pen"></i>
                                                    </button>
                                                    <div name="EditCollaborators" class="modal fade" id="modalEditCollaborators" tabindex="-1" role="dialog" aria-hidden="true">
                                                        <div class="modal-dialog modal-sm" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-body">
                                                                    <div class="text-center">
                                                                        <img src="../../img/colaboradores.png" width="100" height="100" style="margin-bottom: 10px;">
                                                                    </div>
                                                                    <div class="text-center">
                                                                        <h1 class="h4 text-gray-900 mb-4"><b style="color: #566573;">Editar Colaborador</b></h1>
                                                                    </div>
                                                                    <form class="user" action="../controllers/CollaboratorsController.php" method="POST">
                                                                        <input type="hidden" name="edit" value="true">
                                                                        <input type="hidden" name="id" value="<?= $colaborador['id'] ?>">
                                                                        <div class="form-group row">
                                                                            <div class="col-sm-12 mb-3 mb-sm-0">
                                                                                <input type="text" name="name" class="form-control" value="<?= $colaborador['nome'] ?>" placeholder="Nome" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <div class="col-sm-12 mb-3 mb-sm-0">
                                                                                <input type="tel" name="phone" class="form-control" value="<?= $colaborador['telefone'] ?>" placeholder="Celular" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <div class="col-sm-12 mb-3 mb-sm-0">
                                                                                <input type="text" name="cpf" class="form-control" value="<?= $colaborador['cpf'] ?>" placeholder="CPF" required>
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

                                                    <button class="btn btn-danger btn-circle btn-sm" data-toggle="modal" data-target="#modalDeleteCollaborators">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                    <div name="DeleteCollaborators" class="modal fade" id="modalDeleteCollaborators" tabindex="-1" role="dialog" aria-hidden="true">
                                                        <div class="modal-dialog modal-sm" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-body">
                                                                    <div class="text-center">
                                                                        <h1 class="h4 text-gray-900 mb-4"><b style="color: #566573;">Deseja excluir o colaborador <br><strong> <?= $colaborador['nome'] ?> </strong> ?</span></b></h1>
                                                                    </div>
                                                                    <form class="user" action="../controllers/CollaboratorsController.php" method="POST">
                                                                        <input type="hidden" name="delete" value="true">
                                                                        <input type="hidden" name="id" value="<?= $colaborador['id'] ?>">
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
if (isset($_SESSION['register_collaborators_success'])) {
?>
    <script>
        swalRegisterSuccess();
    </script>
<?php
    unset($_SESSION['register_collaborators_success']);
}
?>

<?php
if (isset($_SESSION['register_collaborators_fail'])) {
?>
    <script>
        swalRegisterError();
    </script>
<?php
    unset($_SESSION['register_collaborators_fail']);
}
?>

<?php
if (isset($_SESSION['edit_collaborators_success'])) {
?>
    <script>
        swalEditSuccess();
    </script>
<?php
    unset($_SESSION['edit_collaborators_success']);
}
?>

<?php
if (isset($_SESSION['edit_collaborators_fail'])) {
?>
    <script>
        swalEditError();
    </script>
<?php
    unset($_SESSION['edit_collaborators_fail']);
}
?>

<?php
if (isset($_SESSION['delete_collaborators_success'])) {
?>
    <script>
        swalDeleteSuccess();
    </script>
<?php
    unset($_SESSION['delete_collaborators_success']);
}
?>

<?php
if (isset($_SESSION['delete_collaborators_fail'])) {
?>
    <script>
        swalDeleteError();
    </script>
<?php
    unset($_SESSION['delete_collaborators_fail']);
}
?>

<?php
if (isset($_SESSION['validate_cpf_failed'])) {
?>
    <script>
        swalValidateCpfError();
    </script>
<?php
    unset($_SESSION['validate_cpf_failed']);
}
?>

</html>