<!-- Conexion PDO -->
<?php
$host = "localhost";
$usuario = "root";
$contrasena = "";
$base_datos = "crud";
try {
    // Crear conexión PDO
    $conexion = new PDO("mysql:host=$host;dbname=$base_datos", $usuario, $contrasena);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Conexión Exitosa";

} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
} finally {
    $conexion = null;
    
}
?>