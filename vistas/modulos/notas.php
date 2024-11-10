<?php
session_start();

// Verificar si el usuario ha iniciado sesión como alumno y tiene datos de notas disponibles
if (!isset($_SESSION['notas_por_asignatura'])) {
    echo "No se encontraron datos para mostrar. Por favor, inicia sesión como alumno.";
    exit;
}

// Título de la página
echo "<h2>Notas del Alumno</h2>";

// Crear la tabla HTML para mostrar la información de las asignaturas, profesores y notas
echo "<table border='1' cellpadding='10' cellspacing='0' style='width: 100%; border-collapse: collapse;'>";
echo "<thead>";
echo "<tr>";
echo "<th>Asignatura</th>";
echo "<th>Profesor</th>";
echo "<th>Nota</th>";
echo "</tr>";
echo "</thead>";
echo "<tbody>";

// Iterar a través de los datos de las notas del alumno y mostrar cada fila en la tabla
foreach ($_SESSION['notas_por_asignatura'] as $nota) {
    echo "<tr>";
    echo "<td>" . htmlspecialchars($nota['asignatura']) . "</td>";
    echo "<td>" . htmlspecialchars($nota['nombre_profesor']) . "</td>";
    echo "<td>" . htmlspecialchars($nota['nota']) . "</td>";
    echo "</tr>";
}

echo "</tbody>";
echo "</table>";
?>