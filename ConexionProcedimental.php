<!-- Conexion Procedimental -->
<?php
$host = "localhost";
$usuario = "root";
$contrasena = "";
$base_datos = "crud";

// Establecer conexión
$conexion = mysqli_connect($host, $usuario, $contrasena, $base_datos);

// Verificar la conexión
if (!$conexion) {
    die("Conexión fallida: " . mysqli_connect_error());
}

echo "<h1>Conexión exitosa! ^^</h1>";

mysqli_close($conexion);
?>
