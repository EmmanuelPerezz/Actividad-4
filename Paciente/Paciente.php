<?php
include_once('../config/config.php');
include('../config/Database.php');

class Paciente
{

    public $conexion;

    function __construct()
    {
        $db = new Database();
        $this->conexion = $db->connectToDataBase();
    }

    function save($params)
    {
        $primer_nombre = $params['primer_nombre'];
        $segundo_nombre = $params['segundo_nombre'];
        $primer_apellido = $params['primer_apellido'];
        $segundo_apellido = $params['segundo_apellido'];
        $email = $params['email'];
        $celular = $params['celular'];
        $descripcion = $params['descripcion'];
        $fecha_sesion = $params['fecha_sesion'];
        $duracion_sesion = $params['duracion_sesion'];
        $imagen = $params['imagen'];

        $insert = "INSERT INTO pacientes VALUES (NULL, '$primer_nombre', '$segundo_nombre', '$primer_apellido', '$segundo_apellido', '$email', '$celular', '$descripcion', '$fecha_sesion', '$duracion_sesion', '$imagen')";

        return mysqli_query($this->conexion, $insert);

    }
    
    function getAll(){
        $sql = "SELECT * FROM pacientes ORDER BY fecha_sesion ASC";
        return mysqli_query($this->conexion, $sql);
    }
    
    function getOne($id){
        $sql = "SELECT * FROM pacientes WHERE id = $id";
        return mysqli_query($this->conexion, $sql);
    }
    function update($params){
        $primer_nombre = $params['primer_nombre'];
        $segundo_nombre = $params['segundo_nombre'];
        $primer_apellido = $params['primer_apellido'];
        $segundo_apellido = $params['segundo_apellido'];
        $email = $params['email'];
        $celular = $params['celular'];
        $descripcion = $params['descripcion'];
        $fecha_sesion = $params['fecha_sesion'];
        $duracion_sesion = $params['duracion_sesion'];
        $imagen = $params['imagen'];
        $id = $params['id'];
        
        $update = "UPDATE pacientes SET primer_nombre='$primer_nombre', segundo_nombre='$segundo_nombre', primer_apellido='$primer_apellido', segundo_apellido='$segundo_apellido', email='$email', celular='$celular', descripcion='$descripcion', fecha_sesion='$fecha_sesion', duracion_sesion='$duracion_sesion', imagen='$imagen' WHERE id = $id";
    
        return mysqli_query($this->conexion, $update);
    }
    
    function delete($id){
        $delete = " DELETE FROM pacientes WHERE id = $id";
        return mysqli_query($this->conexion, $delete);
    
    }

}


?>