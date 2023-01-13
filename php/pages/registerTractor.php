<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Trator</title>
    <?php
    include('../../html/links_and_cdns.html');
    ?>
<link href="../../css/sb-admin-2.min.css" rel="stylesheet">
<style>
    body{
        background-color: #4C71DE;
    }
</style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4">
                <div class="card o-hidden border-0 shadow-lg" style="margin-top: 120px;">
                    <div class="card-body p-0">
                        <div class="row justify-content-center">
                            <div class="col-lg-12">
                                <div class="p-5">
                                <div class="text-center">
                                        <img src="../../img/trator.png" width="100" height="100" style="margin-bottom: 10px;">
                                    </div>
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4"><b style="color: #566573;">Cadastrar Trator</b></h1>
                                    </div>
                                    <form class="user">
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="text" class="form-control form-control-user" id="nameTractor" placeholder="Name">
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control form-control-user" id="modelTractor" placeholder="Modelo">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="number" class="form-control form-control-user" id="yearTractor" placeholder="Ano">
                                        </div>
                                        <a href="#" class="btn btn-primary btn-user btn-block">
                                            Registrar Trator
                                        </a>
                                        <a href="dashboard.php" class="btn btn-danger btn-user btn-block">
                                            Cancelar
                                        </a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>