<?php

require 'conexiondb.php';

$db = new Database();
$con = $db->conectar();

$correcto = false;

if(isset($_POST['idmaterial'])){

    $idmaterial = $_POST['idmaterial'];
    $nombre = $_POST['nombre'];
    $color = $_POST['color'];
    $existencia = $_POST['existencia'];
    $stockmin = $_POST['stockmin'];
    $stockmax = $_POST['stockmax'];
    $peso = $_POST['peso'];
    $preciocom = $_POST['preciocom'];
    $precioven = $_POST['precioven'];

    $query = $con->prepare("UPDATE material SET nombre=?, color=?, existencia=?, stockmin=?, stockmax=?, peso=?, preciocom=?, precioven=? 
    WHERE idmaterial=?");
    $resultado = $query->execute(array($nombre, $color, $existencia, $stockmin, $stockmax, $peso, $preciocom, $precioven, $idmaterial));

    if($resultado) {
        $correcto = true;
    }
} else {
    $nombre = $_POST['nombre'];
    $color = $_POST['color'];
    $existencia = $_POST['existencia'];
    $stockmin = $_POST['stockmin'];
    $stockmax = $_POST['stockmax'];
    $peso = $_POST['peso'];
    $preciocom = $_POST['preciocom'];
    $precioven = $_POST['precioven'];

    $query = $con->prepare("INSERT INTO material (nombre, color, existencia, stockmin, stockmax, peso, preciocom, precioven) 
    VALUES (:nom, :col, :exi, :stmi, :stma, :pes, :prec, :prev)");
    $resultado = $query->execute(array('nom' => $nombre, 'col' => $color, 'exi' => $existencia, 'stmi' => 
    $stockmin, 'stma' => $stockmax, 'pes' => $peso, 'prec' => $preciocom, 'prev' => $precioven));

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
                <a class="btn btn-primary" href="menuProducto.php">Regresar</a>
            </div>
        </div>
    </main>
</body>
</html>