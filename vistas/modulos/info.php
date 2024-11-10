<?php
session_start(); // Iniciar la sesión

// Verificar si las variables de sesión existen antes de usarlas
if (isset($_SESSION['nombre']) && isset($_SESSION['apellido']) && isset($_SESSION['curso']) && isset($_SESSION['anotaciones'])) {
    // Obtener los datos de la sesión
    $nombre = htmlspecialchars($_SESSION['nombre']);
    $apellido = htmlspecialchars($_SESSION['apellido']);
    $curso = htmlspecialchars($_SESSION['curso']);
    $rut = htmlspecialchars($_SESSION['rut']);
    $anotaciones = $_SESSION['anotaciones'];
} else {
    echo "No se ha iniciado sesión o faltan datos de usuario.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información del Alumno</title>
    <style>

        body {
            
        }
        .informacion {
            width: 50%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: white;
        }

        h2, h3 {
            text-align: center;
            color: #444;
            margin-bottom: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th, td {
            border: 1px solid #333;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .Anotaciones{
            width: 50%;
            margin: 20px auto;
        }

    </style>
</head>
<body>

<h2 style="text-align: center;">Información del Alumno</h2>

<table class="informacion" style="border-collapse: separate; border-spacing: 5px;">
    <tr>
        <td>Nombre</td>
        <td><?php echo $nombre; ?></td>
    </tr>
    <tr>
        <td>Apellido</td>
        <td><?php echo $apellido; ?></td>
    </tr>
    <tr>
        <td>RUT</td>
        <td><?php echo $rut; ?></td>
    </tr>
    <tr>
        <td>Curso</td>
        <td><?php echo $curso; ?></td>
    </tr>
</table>

<h3>Anotaciones</h3>
<table class="anotaciones">
    <tr><th>Fecha</th><th>Tipo de Anotación</th><th>descripcion</th></tr>
    <?php foreach ($anotaciones as $anotacion): ?>
        <tr>
            <td><?php echo htmlspecialchars($anotacion['fecha']); ?></td>
            <td><?php echo htmlspecialchars($anotacion['tipo_anotacion']); ?></td>
            <td><?php echo htmlspecialchars($anotacion['descripcion']); ?></td>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
