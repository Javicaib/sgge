<?php
session_start();
if(!isset($_SESSION['S_IDUSUARIO'])){
    header('location: ../vista/login.php ');
}
?>
<!doctype html>
<html lang="es">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <!-- Fonts Awesome -->
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <!-- Data Tables CSS -->
    <link rel="stylesheet" href="assets/vendor/datatables/datatables.min.css">
    <!-- My CCS -->
    <link rel="stylesheet" href="assets/css/tabla.css">
    <!-- Select2 CSS -->
    <link rel="stylesheet" href="assets/vendor/select2/select2.min.css">
    <title>SGGU</title>
</head>
<body id="page-top">

<div class="wrapper">
    <div id="content">
        <nav class="navbar navbar-light navbar-expand bg-light shadow mb-4 topbar static-top">
            <a class="navbar-brand">SGGE</a>
            <div class="dropdown">
                <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Gestión de Estudiantes
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="?page=listar">Listar</a>
                </div>
            </div>
            <ul class="nav navbar-nav flex-nowrap ml-auto">
                <div class="d-none d-sm-block topbar-divider"></div>
                <li class="nav-item dropdown no-arrow" role="presentation">
                    <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><span class="d-none d-lg-inline mr-2 text-gray-600 small text-uppercase" ><?php echo $_SESSION['S_USUARIO']?></span><img class="border  img-profile" src="assets/images/avatars/avatar1.jpeg"></a>
                        <div
                                class="dropdown-menu shadow dropdown-menu-right animated--grow-in" role="menu"><a class="dropdown-item" role="presentation" href="#"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Profile</a><a class="dropdown-item" role="presentation" href="#"><i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Settings</a>
                            <a
                                    class="dropdown-item" role="presentation" href="#"><i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Activity log</a>
                            <div class="dropdown-divider"></div>
                            <form action="../controlador/ajax_usuario.php?accion=3" method="post">
                                <button class="dropdown-item" role="presentation"  type="submit"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Cerrar Sesi&oacute;n</button></div>
                            </form>

                    </div>
                </li>
            </ul>
        </nav>
        <div class="container">
           <?php
           $page = "layouts/bienvenido.php";
           if(isset($_GET['page'])){
               if(file_exists("layouts/".$_GET['page'].".php")){
                $page = "layouts/".$_GET['page'].".php";}
                else $page = 'layouts/404.php';
           }
           require "$page";
           ?>
        </div>
    </div>
    <?php
    require 'layouts/footer.php';
    ?>
</div>

<script src="assets/vendor/jquery/jquery-3.2.1.min.js" ></script>
<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/vendor/datatables/datatables.min.js"></script>
<script src="assets/vendor/sweetalert/sweetalert2.js"></script>
<script src="assets/vendor/select2/select2.min.js"></script>
<script src="assets/js/plantilla.js"></script>


</body>
</html>