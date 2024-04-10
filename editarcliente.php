<?php

require 'conexiondb.php';

$db = new Database();
$con = $db->conectar();

$idcliente = $_GET['idcliente'];

$query = $con->prepare("SELECT nombrec, apellidoc, telefonoc, direccionc FROM clientes
                        WHERE idcliente = :idcliente");
$query->execute(['idcliente' => $idcliente]);
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
                EDITANDO REGISTROS DEL CLIENTE
            </div>
        </div>

        <div class="row">
            <div class="col">
                <form class="row g-3" method="POST" action="guardacliente.php" autocomplete="off">
                    <input type="hidden" id="idcliente" name="idcliente" value="<?php echo $idcliente ?>">
                    <div class="col-md-4">
                        <input type="text" id="nombrec" name="nombrec" placeholder="Ingrese el nombre" value="<?php echo $row['nombrec'] ?>" required>
                    </div><br>

                    <div class="col-md-4">
                        <input type="text" id="apellidoc" name="apellidoc" placeholder="Ingrese el apellido" value="<?php echo $row['apellidoc'] ?>" required>
                    </div><br>

                    <div class="col-md-4">
                        <input type="text" id="telefonoc" name="telefonoc" placeholder="Ingrese el telefono" value="<?php echo $row['telefonoc'] ?>" required>
                    </div><br>

                    <div class="col-md-4">
                        <input type="text" id="direccionc" name="direccionc" placeholder="Ingrese la direccion" value="<?php echo $row['direccionc'] ?>" required>
                    </div><br>

                    <div class="col-md-4">
                        <a href="menucliente.php">Regresar</a>
                        <button type="submit" class="btn btn-primary" name="registro">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>