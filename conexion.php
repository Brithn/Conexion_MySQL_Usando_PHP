<!-- Conexión MySQLi (MySQL Improved) -->

<?php
$host = "localhost";
$usuario = "root";
$contrasena = "";
$base_datos = "crud";

$conexion = new mysqli($host, $usuario, $contrasena, $base_datos);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}else{
    echo "<h1>Bienvenido!</h1>";
}
?>