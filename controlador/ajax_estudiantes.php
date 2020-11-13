<?php
require "../modelo/modelo_estudiante.php";
$opcion = $_REQUEST['accion'];
$ME = new modelo_estudiante();

if (ctype_digit($opcion)) {
    switch ($opcion) {
        case 1:
        {
            $consulta = $ME->listar_estudiantes();
            if($consulta){
                echo json_encode($consulta);
            }else {
                echo '{
                "sEcho":1,
                "iTotalRecords":"0",
                "iTotalDisplayRecords":"0",
                "aaData":[]
                }';
            }
            break;
        }
        case 2:{
            $nombre = $_POST['nombre'];
            $raza   = $_POST['raza'];
            $sexo   = $_POST['sexo'];
            $ci     =$_POST['ci'];
            $grupo  =$_POST['grupo'];
            $consulta = $ME-> registrar_estudiante($ci,$nombre,$sexo,$raza,$grupo);
            echo json_encode($consulta);

        break;
        }
        case 3:{
            $consulta = $ME->listar_combo_raza();
            echo json_encode($consulta);

            break;
        }
        case 4:{
            $consulta = $ME->listar_combo_sexo();
            echo json_encode($consulta);

            break;
        }
        case 5:{
            $consulta = $ME->listar_combo_grupo();
            echo json_encode($consulta);

            break;
        }
        case 6:{
            $nombre = $_POST['nombre'];
            $raza   = $_POST['raza'];
            $sexo   = $_POST['sexo'];
            $ci     =$_POST['ci'];
            $grupo  =$_POST['grupo'];
            $consulta = $ME-> actualizar_estudiante($ci,$nombre,$sexo,$raza,$grupo);
            break;
        }
        case 7:{
            $ci     =$_POST['ci'];
            $ME->eliminar_estudiante($ci);
            break;
        }

    }
}



