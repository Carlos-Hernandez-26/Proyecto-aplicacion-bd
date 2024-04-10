<?php

require 'conexiondb.php';

$db = new Database();
$con = $db->conectar();

$response = $con->prepare("SELECT * FROM clientes");
$response->execute();

$response1 = $con->prepare("SELECT * FROM material");
$response1->execute();

$idventa = $_GET['idventa'];

$query = $con->prepare("SELECT idcliente, idmaterial, fechacompra FROM ventas
                        WHERE idventa = :idventa");
$query->execute(['idventa' => $idventa]);
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
                EDITANDO VENTA
            </div>
        </div>

        <div class="row">
            <div class="col">
                <form class="row g-3" method="POST" action="guardaventa.php" autocomplete="off">
                    <select name="idcliente" id="idcliente" value="<?php echo $row['idcliente'] ?>">
                        <?php foreach ($response as $r){
                            echo "<option value=".$r['0'].">".$r['0']."</option>";
                        } ?>
                    </select><br><br>
                    <select name="idmaterial" id="idmaterial" value="<?php echo $row['idmaterial'] ?>">
                        <?php foreach ($response1 as $r){
                            echo "<option value=".$r[0].">".$r[0]."</option>";
                        } ?>
                    </select><br><br>
                    <div class="col-md-4">
                        <input type="date" id="fechacompra" name="fechacompra" placeholder="Ingrese la fecha" value="<?php echo $row['fechacompra'] ?>" required>
                    </div><br>

                    <div class="col-md-4">
                        <a href="menuventas.php">Regresar</a>
                        <button type="submit" class="btn btn-primary" name="registro">Modificar</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>