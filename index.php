<?php
include 'conexion.php';

// CREATE
if (isset($_POST['submit'])) {
    $nombre = $_POST['nombre'];
    $edad = $_POST['edad'];
    $materia = $_POST['materia'];
    $grado = $_POST['grado'];

    // Insertar en la tabla usuarios
    $sql = "INSERT INTO usuarios (nombre, edad) VALUES ('$nombre', $edad)";
    $conexion->query($sql);

    // Obtener el ID del usuario recién insertada
    $usuario_id = $conexion->insert_id;

    // Insertar en la tabla profesor o estudiante según la selección del usuario
    if ($_POST['tipo'] == 'profesor') {
        $sql = "INSERT INTO profesor (id, materia) VALUES ($usuario_id, '$materia')";
    } else {
        $sql = "INSERT INTO estudiante (id, grado) VALUES ($usuario_id, '$grado')";
    }

    $conexion->query($sql);
}

// READ
$sql = "SELECT u.id, u.nombre, u.edad, pr.materia, e.grado
        FROM usuarios u
        LEFT JOIN profesor pr ON u.id = pr.id
        LEFT JOIN estudiante e ON u.id = e.id";
$result = $conexion->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body class="container">
    <div class="row">
        <div class="col uno">
            <h1><center>Agregar Usuarios</center></h1>
            <form method="post" action="index.php">
                <div>
                    <label>Nombre:</label>
                    <input type="text" name="nombre" required>
                </div>
                <div>
                    <label>Edad:</label>
                    <input type="number" name="edad" required>
                </div>
                <div>
                    <label>Tipo:</label>
                    <select name="tipo" required>
                        <option value="profesor">Profesor</option>
                        <option value="estudiante">Estudiante</option>
                    </select>
                </div>
                <div>
                    <label>Materia (solo para profesor):</label>
                    <input type="text" name="materia">
                </div>
                <div>
                    <label>Grado (solo para estudiante):</label>
                    <input type="text" name="grado">
                </div>
                <div class="boton">
                    <input type="submit" name="submit" value="Agregar">
                </div>
            </form>
        </div>
        <div class="col">
            <h1><center>Tabla de Usuarios</center></h1>
            <table border="1">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Edad</th>
                    <th>Tipo</th>
                    <th>Materia</th>
                    <th>Grado</th>
                    <th>Acciones</th>
                </tr>
                <?php
                while ($fila = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>{$fila['id']}</td>";
                    echo "<td>{$fila['nombre']}</td>";
                    echo "<td>{$fila['edad']}</td>";
                    echo "<td>";
                    if (!empty($fila['materia'])) {
                        echo "Profesor";
                    } elseif (!empty($fila['grado'])) {
                        echo "Estudiante";
                    } else {
                        echo "Desconocido";
                    }
                    echo "</td>";
                    echo "<td>{$fila['materia']}</td>";
                    echo "<td>{$fila['grado']}</td>";
                    echo "<td><a href='editar.php?id={$fila['id']}'>Editar</a> | <a href='eliminar.php?id={$fila['id']}'>Eliminar</a></td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
    </div>
</html>

<?php
$conexion->close();
?>
