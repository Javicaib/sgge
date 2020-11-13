<?php
class conexion
{

    public $conexion;

    /**
     * @var mysqli
     */
    private $conn;

    private $host;
    private $user;
    private $password;
    private $baseName;
    private $port;

    function __construct()
    {
        $this->conn = false;
        $this->host = "127.0.0.1";
        $this->user = "root";
        $this->password = "";
        $this->baseName = "trabajo";
        $this->port = 3306;
        $this->conectar();
    }

    function conectar()
    {
        if (!$this->conn) {

            $this->conn = mysqli_connect($this->host, $this->user, $this->password);
            mysqli_select_db($this->conn, $this->baseName);

            if (!$this->conn) {
                $this->status_fatal = true;
                echo 'Connection BD failed';
                die();
            } else {
                $this->status_fatal = false;
            }


        }
    }

    function ejecutarConsulta($sql)
    {

        $r = mysqli_query($this->conn, $sql);

        return $r;
    }

    function devolverResultados($sql)
    {
        $r = $this->ejecutarConsulta($sql);
        $output = array();

        while ($r != false && $record = mysqli_fetch_assoc($r)) {
            $output[] = $record;
        }

        return $output;
    }


    function cerrarConexion()
    {

        mysqli_close($this->conn);
    }

}
