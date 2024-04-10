<?php

require 'conexiondb.php';

$db = new Database();
$con = $db->conectar();

$correcto = false;

if(isset($_POST['idcliente'])){

    $idcliente = $_POST['idcliente'];
    $nombrec = $_POST['nombrec'];
    $apellidoc = $_POST['apellidoc'];
    $telefonoc = $_POST['telefonoc'];
    $direccionc = $_POST['direccionc'];

    $query = $con->prepare("UPDATE clientes SET nombrec=?, apellidoc=?, telefonoc=?, direccionc=? 
    WHERE idcliente=?");
    $resultado = $query->execute(array($nombrec, $apellidoc, $telefonoc, $direccionc, $idcliente));

    if($resultado) {
        $correcto = true;
    }
} else {
    $nombrec = $_POST['nombrec'];
    $apellidoc = $_POST['apellidoc'];
    $telefonoc = $_POST['telefonoc'];
    $direccionc = $_POST['direccionc'];

    $query = $con->prepare("INSERT INTO clientes (nombrec, apellidoc, telefonoc, direccionc) 
    VALUES (:nomc, :apec, :telc, :dirc)");
    $resultado = $query->execute(array('nomc' => $nombrec, 'apec' => $apellidoc, 'telc' => $telefonoc, 'dirc' => $direccionc));

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
                <a class="btn btn-primary" href="menucliente.php">Regresar</a>
            </div>
        </div>
    </main>
</body>
</html>