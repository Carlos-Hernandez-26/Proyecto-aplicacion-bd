<?php

require 'conexiondb.php';

$db = new Database();
$con = $db->conectar();

$correcto = false;

if(isset($_POST['idventa'])){

    $idventa = $_POST['idventa'];
    $idcliente = $_POST['idcliente'];
    $idmaterial = $_POST['idmaterial'];
    $fechacompra = $_POST['fechacompra'];

    $query = $con->prepare("UPDATE ventas SET idcliente=?, idmaterial=?, fechacompra=? 
    WHERE idventa=?");
    $resultado = $query->execute(array($idcliente, $idmaterial, $fechacompra, $idventa));

    if($resultado) {
        $correcto = true;
    }
} else {
    $idcliente = $_POST['idcliente'];
    $idmaterial = $_POST['idmaterial'];
    $fechacompra = $_POST['fechacompra'];

    $query = $con->prepare("INSERT INTO ventas (idcliente, idmaterial, fechacompra) 
    VALUES (:ic, :im, :fc)");
    $resultado = $query->execute(array('ic' => $idcliente, 'im' => $idmaterial, 'fc' => $fechacompra));

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
                <a class="btn btn-primary" href="menuventas.php">Regresar</a>
            </div>
        </div>
    </main>
</body>
</html>