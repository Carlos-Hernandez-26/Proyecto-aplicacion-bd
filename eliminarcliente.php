<?php

require 'conexiondb.php';

$db = new Database();
$con = $db->conectar();

$correcto = false;

$idcliente = $_GET['idcliente'];

$query = $con->prepare("DELETE FROM clientes WHERE idcliente=?");
if($query->execute([$idcliente])){
    echo 'Registro eliminado';
    header("Location: menucliente.php");
} else{
    echo 'Error al eliminar';
}