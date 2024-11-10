<?php
session_start();

// Verificar si el usuario ha iniciado sesión como alumno y tiene datos de asistencia disponibles
if (!isset($_SESSION['asistencia_alumno'])) {
    echo "No se encontraron datos para mostrar. Por favor, inicia sesión como alumno.";
    exit;
}

// Título de la página
echo "<h2>Asistencia del Alumno</h2>";

// Crear la tabla HTML para mostrar la información de la asistencia y la fecha
echo "<table border='1' cellpadding='10' cellspacing='0' style='width: 100%; border-collapse: collapse;'>";
echo "<thead>";
echo "<tr>";
echo "<th>Fecha</th>";
echo "<th>Asistencia</th>";
echo "</tr>";
echo "</thead>";
echo "<tbody>";

// Iterar a través de los datos de asistencia del alumno y mostrar cada fila en la tabla

foreach ($_SESSION['asistencia_alumno'] as $asistencia) {
    $presente = isset($asistencia['presente']) ? $asistencia['presente'] : null;

    echo "<tr>";
    echo "<td>" . htmlspecialchars($asistencia['fecha']) . "</td>";
    echo "<td>" . ($presente ? 'Presente' : 'Ausente') . "</td>";
    echo "</tr>";
}

echo "</tbody>";
echo "</table>";
?>