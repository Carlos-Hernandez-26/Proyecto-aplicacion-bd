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
                NUEVO PROVEEDOR
            </div>
        </div>

        <div class="row">
            <div class="col">
                <form class="row g-3" method="POST" action="guardaproveedor.php" autocomplete="off">
                    <div class="col-md-4">
                        <input type="text" id="nombre" name="nombre" placeholder="Ingrese el nombre" required>
                    </div><br>

                    <div class="col-md-4">
                        <input type="text" id="apellido" name="apellido" placeholder="Ingrese el apellido" required>
                    </div><br>

                    <div class="col-md-4">
                        <input type="text" id="telefono" name="telefono" placeholder="Ingrese el telefono" required>
                    </div><br>

                    <div class="col-md-4">
                        <input type="text" id="correo" name="correo" placeholder="Ingrese el correo" required>
                    </div><br>

                    <div class="col-md-4">
                        <input type="text" id="direccion" name="direccion" placeholder="Ingrese la direccion" required>
                    </div><br>

                    <div class="col-md-4">
                        <a href="menuproveedor.php">Regresar</a>
                        <button type="submit" class="btn btn-primary" name="registro">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>