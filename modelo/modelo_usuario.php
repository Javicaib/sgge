<?php


 class Modelo_Usuario
 {
     private $usuario;
     private $contrasena;
     private $id_usuario;
     private $id_rol;
     private $conexion;

     function __construct()
     {
         require_once 'conexion.php';
         $this->conexion = new conexion();
         $this->conexion->conectar();
     }

     function verificar_usuario($usuario, $contrasena)
     {     $arreglo = array();
         $sql = "CALL verificar_usuario('$usuario')";
         $consulta = $this->conexion->devolverResultados($sql);
         if($consulta!= null){
             if (password_verify($contrasena, $consulta[0]['contrasena'])) {
                 $arreglo = $consulta;
             }
             return $arreglo;
             $this->conexion->cerrarConexion();
         }else return $arreglo;

     }




     }


