<?php

require 'conexiondb.php';

$db = new Database();
$con = $db->conectar();

$correcto = false;

$idventa = $_GET['idventa'];

$query = $con->prepare("DELETE FROM ventas WHERE idventa=?");
if($query->execute([$idventa])){
    echo 'Registro eliminado';
    header("Location: menuventas.php");
} else{
    echo 'Error al eliminar';
}