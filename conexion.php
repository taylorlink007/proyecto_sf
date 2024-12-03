<?php

class conexion
{

    private $servidor = "localhost";
    private $usuario = "root";
    private $contrasenia = "3168627779";
    private $conexion;


    public function __construct()
    {
        try {
            $this->conexion = new PDO("mysql:host=$this->servidor;dbname=album", $this->usuario, $this->contrasenia);
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $error) {

            echo " Conexion erronea" . $error;
        }
    }

    public function ejecutar($sql) //Insertar, Eliminar y Actualizar
    {
        $this->conexion->exec($sql);
        return $this->conexion->lastInsertId();
    }

    public function consultar($sql)
    { //Retornamos todos los registros de la base de datos 

        $sentencia = $this->conexion->prepare($sql);
        $sentencia->execute();
        return $sentencia->fetchAll();
    }
}
