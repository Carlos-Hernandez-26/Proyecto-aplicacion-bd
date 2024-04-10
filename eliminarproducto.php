<?php

require 'conexiondb.php';

$db = new Database();
$con = $db->conectar();

$correcto = false;

$idmaterial = $_GET['idmaterial'];

$query = $con->prepare("DELETE FROM material WHERE idmaterial=?");
if($query->execute([$idmaterial])){
    echo 'Registro eliminado';
    header("Location: menuProducto.php");
} else{
    echo 'Error al eliminar';
}