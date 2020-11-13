<?php
require '../modelo/modelo_usuario.php';
$opcion = $_REQUEST['accion'];

if (ctype_digit($opcion)) {
    switch ($opcion) {
        case 1:
        {
            $usuario = htmlspecialchars($_POST['usuario'], ENT_QUOTES, 'UTF-8');
            $contrasena = htmlspecialchars($_POST['contrasena'], ENT_QUOTES, 'UTF-8');

            $MU = new Modelo_Usuario();
            $consulta = $MU->verificar_usuario($usuario, $contrasena);
            $data = json_encode($consulta);

            if (count($consulta) > 0) {
                echo $data;
            } else echo 0;
            break;
        }
        case 2:{
            $id_usario = $_POST['id_usuario'];
            $usario = $_POST['usuario'];
            $id_rol = $_POST['rol'];
            session_start();
            $_SESSION['S_IDUSUARIO'] = $id_usario;
            $_SESSION['S_USUARIO'] = $usario;
            $_SESSION['S_IDROL'] = $id_rol;
            break;
        }
        case 3:{
            session_start();
            session_destroy();
            header('location: ../vista/login.php');
            break;
        }

    }
}
