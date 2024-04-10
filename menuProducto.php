<?php
require 'conexiondb.php';

$db = new Database();
$con = $db->conectar();

$comando = $con->query("SELECT idmaterial, nombre, color, existencia, stockmin, stockmax,peso, preciocom, precioven FROM material");
$comando->execute();
$resultado = $comando->fetchAll(PDO::FETCH_ASSOC);

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
                MATERIALES
            </div>
            <div class="col">
                <a href="agregarproducto.php" class="btn btn-primary">Agregar Producto</a> <br><br>
            </div>
            <div class="col">
                <a href="index.html" class="btn btn-primary">Volver</a> <br><br>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <table class="w3-table w3-striped w3-bordered w3-blue">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>NOMBRE</th>
                            <th>COLOR</th>
                            <th>EXISTENCIAS</th>
                            <th>STOCK MINIMO</th>
                            <th>STOCK MAXIMO</th>
                            <th>PESO</th>
                            <th>PRECIO COMPRA</th>
                            <th>PRECIO VENTA</th>
                            <th>#</th>
                            <th>#</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        foreach($resultado AS $row){
                        ?>
                        <tr>
                            <td><?php echo $row['idmaterial']; ?></td>
                            <td><?php echo $row['nombre']; ?></td>
                            <td><?php echo $row['color']; ?></td>
                            <td><?php echo $row['existencia']; ?></td>
                            <td><?php echo $row['stockmin']; ?></td>
                            <td><?php echo $row['stockmax']; ?></td>
                            <td><?php echo $row['peso']; ?></td>
                            <td><?php echo $row['preciocom']; ?></td>
                            <td><?php echo $row['precioven']; ?></td>
                            <td><a href="editarproducto.php?idmaterial=<?php echo $row['idmaterial']; ?>">Editar</a></td>
                            <td><a href="eliminarproducto.php?idmaterial=<?php echo $row['idmaterial']; ?>">Eliminar</a></td>
                        </tr>
                        <?php } ?>
                    </tbody>

                </table>
            </div>
        </div>

    </main>

</body>
</html>