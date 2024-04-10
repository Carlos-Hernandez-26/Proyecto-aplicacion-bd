<?php

require 'conexiondb.php';

$db = new Database();
$con = $db->conectar();

$idmaterial = $_GET['idmaterial'];

$query = $con->prepare("SELECT nombre, color, existencia, stockmin, stockmax, peso, preciocom, precioven FROM material
                        WHERE idmaterial = :idmaterial");
$query->execute(['idmaterial' => $idmaterial]);
$row = $query->fetch(PDO::FETCH_ASSOC);

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
            <div class="w3-panel w3-cyan w3-padding-16 w3-headding-8">
                NUEVO MATERIAL
            </div>
        </div>

        <div class="row">
            <div class="col">
                <form class="row g-3" method="POST" action="guardaproducto.php" autocomplete="off">
                    <input type="hidden" id="idmaterial" name="idmaterial" value="<?php echo $idmaterial ?>">
                    <div class="col-md-4">
                        <input type="text" id="nombre" name="nombre" placeholder="Ingrese el nombre" value="<?php echo $row['nombre'] ?>" required>
                    </div><br>

                    <div class="col-md-4">
                        <input type="text" id="color" name="color" placeholder="Ingrese el color" value="<?php echo $row['color'] ?>" required>
                    </div><br>

                    <div class="col-md-4">
                        <input type="text" id="existencia" name="existencia" placeholder="Ingrese la cantidad existente" value="<?php echo $row['existencia'] ?>" required>
                    </div><br>

                    <div class="col-md-4">
                        <input type="text" id="stockmin" name="stockmin" placeholder="Ingrese el stock minimo" value="<?php echo $row['stockmin'] ?>" required>
                    </div><br>

                    <div class="col-md-4">
                        <input type="text" id="stockmax" name="stockmax" placeholder="Ingrese el stock maximo" value="<?php echo $row['stockmax'] ?>" required>
                    </div><br>

                    <div class="col-md-4">
                        <input type="text" id="peso" name="peso" placeholder="Ingrese el kilogramo del producto" value="<?php echo $row['peso'] ?>" required>
                    </div><br>

                    <div class="col-md-4">
                        <input type="text" id="preciocom" name="preciocom" placeholder="Ingrese el precio de compra" value="<?php echo $row['preciocom'] ?>" required>
                    </div><br>

                    <div class="col-md-4">
                        <input type="text" id="precioven" name="precioven" placeholder="Ingrese el precio de venta" value="<?php echo $row['precioven'] ?>" required>
                    </div><br>

                    <div class="col-md-4">
                        <a href="menuproducto.php">Regresar</a>
                        <button type="submit" class="btn btn-primary" name="registro">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>