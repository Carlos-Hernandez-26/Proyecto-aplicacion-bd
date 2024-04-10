<?php

require 'conexiondb.php';

$db = new Database();
$con = $db->conectar();

$correcto = false;

$idproveedor = $_GET['idproveedor'];

$query = $con->prepare("DELETE FROM proveedores WHERE idproveedor=?");
if($query->execute([$idproveedor])){
    echo 'Registro eliminado';
    header("Location: menuproveedor.php");
} else{
    echo 'Error al eliminar';
}