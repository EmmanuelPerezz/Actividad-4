<?php

class Database
{
    public $host = 'localhost'; // servidor
    public $user = 'root'; // usuario de phpMyAdmin
    public $pass = '123456'; // contraseña de phpMyAdmin
    public $db = 'servicios_psicologicos'; // nombre de la base de datos
    public $conexion;

    function connectToDataBase()
    {
        $this->conexion = mysqli_connect($this->host, $this->user, $this->pass, $this->db);

        if (mysqli_connect_error()) {
            echo "Error al conectar con la base de datos: " . mysqli_connect_error();
        }

        return $this->conexion;

    }
}

?>