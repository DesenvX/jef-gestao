<!DOCTYPE html>
<html lang="en">

<head>


    <title> JEF Gestão </title>

    <!-- Links and Cdns -->
    <?php
    include('../../html/links_and_cdns.html');
    ?>


</head>

<body class="bg-gradient-primary">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4">
                <div class="card o-hidden border-0 shadow-lg" style="margin-top: 120px;">
                    <div class="card-body p-0">
                        <div class="row justify-content-center">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <img src="../../img/logo.png" width="100" height="100" style="margin-bottom: 10px;">
                                        <h1 class="h4 text-gray-900 mb-4"> <b style="color: #566573;"> JEF Gestão </b> </h1>
                                    </div>
                                    <form class="user">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="user" placeholder="Usuário">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="password" placeholder="Senha">
                                        </div>
                                        <hr>
                                        <a href="dashboard.php" class="btn btn-primary btn-user btn-block">
                                            Entrar
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

    <!-- Scripts -->
    <?php include('../../html/scripts.html'); ?>

</body>

</html>