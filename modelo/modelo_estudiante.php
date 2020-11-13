<?php
class Modelo_Estudiante{


    function __construct()
    {
        require_once 'conexion.php';
        $this->conexion = new conexion();
        $this->conexion->conectar();
    }
    function listar_estudiantes(){
        $sql = "CALL listar_estudiante";
        $consulta = $this->conexion->devolverResultados($sql);
        $arreglo = array();
        $arreglo["data"]=$consulta;
        return $arreglo;
        $this->conexion->cerrarConexion();
    }

    function listar_combo_raza(){
        $sql = "CALL listar_combo_raza";
        $consulta = $this->conexion->devolverResultados($sql);
        $arreglo = array();
        $arreglo=$consulta;
        return $arreglo;
        $this->conexion->cerrarConexion();

    }
    function listar_combo_sexo(){
        $sql = "CALL listar_combo_sexo";
        $consulta = $this->conexion->devolverResultados($sql);
        $arreglo = array();
        $arreglo=$consulta;
        return $arreglo;
        $this->conexion->cerrarConexion();
    }
    function listar_combo_grupo(){
        $sql = "CALL listar_combo_grupo";
        $consulta = $this->conexion->devolverResultados($sql);
        $arreglo = array();
        $arreglo=$consulta;
        return $arreglo;
        $this->conexion->cerrarConexion();
    }
    function registrar_estudiante($ci,$nombre,$raza,$sexo,$grupo){
        $sql = "CALL registrar_estudiante('$ci','$nombre','$raza','$sexo','$grupo')";
         return $datos = $this->conexion->devolverResultados($sql);
        $this->conexion->cerrarConexion();

    }
    function actualizar_estudiante($ci,$nombre,$raza,$sexo,$grupo){
    $sql = "CALL actualizar_estudiante('$ci','$nombre','$raza','$sexo','$grupo')";
    $this->conexion->ejecutarConsulta($sql);
    $this->conexion->cerrarConexion();
    }
    function eliminar_estudiante($ci){
        $sql = "CALL eliminar_estudiante('$ci') ";
        $this->conexion->ejecutarConsulta($sql);
    }
}