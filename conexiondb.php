<?php 

class Database {
    private $hostname = "localhost";
    private $dbname = "almacen";
    private $user = "root";
    private $pass = "";
    private $charset = "utf8";

    function conectar(){
        try {
            $conexion = "mysql:host=" . $this->hostname . ";dbname=" . $this->dbname . ";
            charset=" . $this->charset;
            $opcion = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];

            $pdo = new PDO($conexion, $this->user, $this->pass, $opcion);
            return $pdo;

        } catch (PDOException $e) {
            echo 'Error al conectarse: ' . $e->getMessage();
            exit;
        }
    }
}