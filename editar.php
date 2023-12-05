<?php
include 'conexion.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Obtener datos del usuario
    $sql = "SELECT * FROM usuarios WHERE id = $id";
    $result = $conexion->query($sql);

    if ($result->num_rows > 0) {
        $usuario = $result->fetch_assoc();
        ?>
        <!DOCTYPE html>
        <html lang="es">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
                integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
            <link rel="stylesheet" href="style.css">
        </head>

        <body class="container">
            <h2>
                <center>Editar Usuario</center>
            </h2>
            <form method="post" action="Update.php">
                <div>
                    <input type="hidden" name="id" value="<?php echo $usuario['id']; ?>">
                    <label>Nombre:</label>
                    <input type="text" name="nombre" value="<?php echo $usuario['nombre']; ?>" required>
                    <br>
                </div>
                <div>
                    <label>Edad:</label>
                    <input type="number" name="edad" value="<?php echo $usuario['edad']; ?>" required>
                </div>
                <div class="boton">
                    <input type="submit" name="submit" value="Actualizar">
                </div>

            </form>
        </body>

        </html>
        <?php
    } else {
        echo "Usuario no encontrada.";
    }
} else {
    echo "ID de usuario no proporcionado.";
}

$conexion->close();
?>