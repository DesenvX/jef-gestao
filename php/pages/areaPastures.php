<!DOCTYPE html>
<html lang="pt-br">

<?php
session_start();
?>


<head>

    <title>  Gestão de Logística </title>

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
                    <h1 class="h3 mb-2 text-gray-800"> Pastos </h1>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <button type="button" class="btn btn-info btn-sm btn-icon-split" data-toggle="modal" data-target="#modalRegisterServices">
                                <span class="icon text-white-50">
                                    <i class="fas fa-plus-circle"></i>
                                </span>
                                <span class="text"> Cadastrar </span>
                            </button>
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
                                            <form class="user" action="../controllers/PasturesController.php" method="POST">
                                                <input type="hidden" name="register" value="true">
                                                <div class="form-group row">
                                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                                        <input type="text" class="form-control" name="name" placeholder="Nome" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                                        <select class="form-control" name="retreat" required>
                                                            <option value="" selected> Retiro </option>
                                                            <?php
                                                            require_once '../services/Retreats.php';

                                                            use services\Retreats;

                                                            $retreats = new Retreats();
                                                            $retreats_list = $retreats->getRetreats();

                                                            while ($retiros = $retreats_list->fetch_assoc()) { ?>
                                                                <option value="<?= $retiros['id'] ?>"> <?= $retiros['nome'] ?> </option>
                                                            <?php } ?>

                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                                        <input type="text" class="form-control" name="farm" placeholder="Fazenda" required>
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
                                            <th>Retiro</th>
                                            <th>Fazenda</th>
                                            <th>Opções</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nome</th>
                                            <th>Retiro</th>
                                            <th>Fazenda</th>
                                            <th>Opções</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        require_once '../services/Pastures.php';

                                        use services\Pastures;

                                        $pastures = new Pastures();
                                        $pastures_list = $pastures->getPastures();

                                        while ($pasto = $pastures_list->fetch_assoc()) {
                                        ?>
                                            <tr>
                                                <th><?= $pasto['id'] ?></th>
                                                <td><?= $pasto['nome'] ?></td>
                                                <td><?= $pasto['retiro'] ?></td>
                                                <td><?= $pasto['fazenda'] ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-warning btn-circle btn-sm" data-toggle="modal" data-target="#modalEditPastures_<?= $pasto['id'] ?>">
                                                        <i class="fas fa-pen"></i>
                                                    </button>
                                                    <div name="EditServices" class="modal fade" id="modalEditPastures_<?= $pasto['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                        <div class="modal-dialog modal-sm" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-body">
                                                                    <div class="text-center">
                                                                        <img src="../../img/pasto.png" width="100" height="100" style="margin-bottom: 10px;">
                                                                    </div>
                                                                    <div class="text-center">
                                                                        <h1 class="h4 text-gray-900 mb-4"><b style="color: #566573;">Editar Pasto</b></h1>
                                                                    </div>
                                                                    <form class="user" action="../controllers/PasturesController.php" method="POST">
                                                                        <input type="hidden" name="edit" value="true">
                                                                        <input type="hidden" name="id" value="<?= $pasto['id'] ?>">
                                                                        <div class="form-group row">
                                                                            <div class="col-sm-12 mb-3 mb-sm-0">
                                                                                <input type="text" class="form-control" name="name" value="<?= $pasto['nome'] ?>" placeholder="Nome" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <div class="col-sm-12 mb-3 mb-sm-0">
                                                                                <select class="form-control" name="retreat" required>
                                                                                    <?php
                                                                                    $retreats = new Retreats();
                                                                                    $retreats_list = $retreats->getRetreats();
                                                                                    while ($retiros = $retreats_list->fetch_assoc()) { ?>
                                                                                        <option value="<?= $retiros['id'] ?>" <?php if($pasto['id_retiro'] == $retiros['id'] ){?> selected <?php } ?>><?= $retiros['nome'] ?></option>
                                                                                    <?php } ?>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <div class="col-sm-12 mb-3 mb-sm-0">
                                                                                <input type="text" class="form-control" name="farm" value="<?= $pasto['fazenda'] ?>" placeholder="Fazenda" required>
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

                                                    <button class="btn btn-danger btn-circle btn-sm" data-toggle="modal" data-target="#modalDeletePastures_<?= $pasto['id'] ?>">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                    <div name="DeletePastures" class="modal fade" id="modalDeletePastures_<?= $pasto['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                        <div class="modal-dialog modal-sm" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-body">
                                                                    <div class="text-center">
                                                                        <h1 class="h4 text-gray-900 mb-4"><b style="color: #566573;">Deseja excluir o pasto <br><strong><?= $pasto['nome'] ?></strong> ?</span></b></h1>
                                                                    </div>
                                                                    <form class="user" action="../controllers/PasturesController.php" method="POST">
                                                                        <input type="hidden" name="delete" value="true">
                                                                        <input type="hidden" name="id" value="<?= $pasto['id'] ?>">
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
if (isset($_SESSION['register_pastures_success'])) {
?>
    <script>
        swalRegisterSuccess();
    </script>
<?php
    unset($_SESSION['register_pastures_success']);
}
?>

<?php
if (isset($_SESSION['register_pastures_fail'])) {
?>
    <script>
        swalRegisterError();
    </script>
<?php
    unset($_SESSION['register_pastures_fail']);
}
?>

<?php
if (isset($_SESSION['edit_pastures_success'])) {
?>
    <script>
        swalEditSuccess();
    </script>
<?php
    unset($_SESSION['edit_pastures_success']);
}
?>

<?php
if (isset($_SESSION['edit_pastures_fail'])) {
?>
    <script>
        swalEditError();
    </script>
<?php
    unset($_SESSION['edit_pastures_fail']);
}
?>

<?php
if (isset($_SESSION['delete_pastures_success'])) {
?>
    <script>
        swalDeleteSuccess();
    </script>
<?php
    unset($_SESSION['delete_pastures_success']);
}
?>

<?php
if (isset($_SESSION['delete_pastures_fail'])) {
?>
    <script>
        swalDeleteError();
    </script>
<?php
    unset($_SESSION['delete_pastures_fail']);
}
?>

</html>