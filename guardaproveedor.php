<?php

require 'conexiondb.php';

$db = new Database();
$con = $db->conectar();

$correcto = false;

if(isset($_POST['idproveedor'])){

    $idproveedor = $_POST['idproveedor'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $direccion = $_POST['direccion'];

    $query = $con->prepare("UPDATE proveedores SET nombre=?, apellido=?, telefono=?, correo=?, direccion=? 
    WHERE idproveedor=?");
    $resultado = $query->execute(array($nombre, $apellido, $telefono, $correo, $direccion, $idproveedor));

    if($resultado) {
        $correcto = true;
    }
} else {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $direccion = $_POST['direccion'];

    $query = $con->prepare("INSERT INTO proveedores (nombre, apellido, telefono, correo, direccion) 
    VALUES (:nom, :ape, :tel, :cor, :dir)");
    $resultado = $query->execute(array('nom' => $nombre, 'ape' => $apellido, 'tel' => $telefono, 'cor' => 
    $correo, 'dir' => $direccion));

    if($resultado){
        $correcto = true;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col">
                <?php if($correcto){ ?>
                    <h3>Registro guardado</h3>
                   <?php } else { ?>
                    <h3>Error al guardar</h3>
                    <?php } ?>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <a class="btn btn-primary" href="menuproveedor.php">Regresar</a>
            </div>
        </div>
    </main>
</body>
</html>