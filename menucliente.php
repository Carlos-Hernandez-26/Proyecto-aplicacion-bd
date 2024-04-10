<?php
require 'conexiondb.php';

$db = new Database();
$con = $db->conectar();

$comando = $con->query("SELECT idcliente, nombrec, apellidoc, telefonoc, direccionc FROM clientes");
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
                CLIENTES
            </div>
            <div class="col">
                <a href="agregarcliente.php" class="btn btn-primary">Agregar Cliente</a> <br><br>
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
                            <th>APELLIDO</th>
                            <th>TELEFONO</th>
                            <th>DIRECCION</th>
                            <th>#</th>
                            <th>#</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        foreach($resultado AS $row){
                        ?>
                        <tr>
                            <td><?php echo $row['idcliente']; ?></td>
                            <td><?php echo $row['nombrec']; ?></td>
                            <td><?php echo $row['apellidoc']; ?></td>
                            <td><?php echo $row['telefonoc']; ?></td>
                            <td><?php echo $row['direccionc']; ?></td>
                            <td><a href="editarcliente.php?idcliente=<?php echo $row['idcliente']; ?>">Editar</a></td>
                            <td><a href="eliminarcliente.php?idcliente=<?php echo $row['idcliente']; ?>">Eliminar</a></td>
                        </tr>
                        <?php } ?>
                    </tbody>

                </table>
            </div>
        </div>

    </main>

</body>
</html>