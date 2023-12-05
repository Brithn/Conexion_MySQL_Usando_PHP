<?php
include 'conexion.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Eliminar usuario
    $sql = "DELETE FROM usuarios WHERE id = $id";
    $conexion->query($sql);

    // También podrías eliminar el registro correspondiente en las tablas profesor o estudiante

    header("Location: index.php"); // Redirigir a la página principal después de eliminar
} else {
    echo "ID de usuario no proporcionado.";
}

$conexion->close();
?>
