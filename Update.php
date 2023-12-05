<?php
include 'conexion.php';

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $edad = $_POST['edad'];

    // Actualizar datos en la tabla usuarios
    $sql = "UPDATE usuarios SET nombre = '$nombre', edad = $edad WHERE id = $id";
    $conexion->query($sql);

    // También podrías actualizar el registro correspondiente en las tablas profesor o estudiante si es necesario

    header("Location: index.php"); // Redirigir a la página principal después de actualizar
} else {
    echo "Acceso no autorizado.";
}

$conexion->close();
?>
