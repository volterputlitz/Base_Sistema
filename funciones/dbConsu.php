<?php
// Asegúrate de que esta ruta es correcta
include_once '../modelos/conexion.php'; // Subir un nivel para ir a "app"

// Aquí va el resto de tu código
function obtenerDatosAlumnos($pdo, $rut_alumno) {
    // Consulta SQL para obtener los datos del alumno
    $sql = "
        SELECT 
            asig.nombre_asignatura AS materia,
            p.nombre AS nombre_profesor,
            n.nota,
            n.fecha
        FROM 
            notas n
        JOIN 
            alumnos a ON n.rut_alumno = a.rut
        JOIN 
            asignaturas asig ON n.id_asignatura = asig.id_asignatura
        JOIN 
            profesor_asignatura pa ON pa.id_asignatura = asig.id_asignatura
        JOIN 
            profesores p ON pa.rut_profesor = p.rut
        WHERE 
            a.rut = :rut_alumno
        ORDER BY 
            asig.nombre_asignatura;
    ";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':rut_alumno', $rut_alumno);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function obtenerNAC($pdo, $rut_alumno) {
    // Consulta SQL para obtener el nombre, apellido y curso del alumno en mayúsculas
    $sql = "
        SELECT 
            UPPER(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombre, 'á', 'a'), 'é', 'e'), 'í', 'i'), 'ó', 'o'), 'ú', 'u')) AS nombre_alumno,
            UPPER(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.apellido, 'á', 'a'), 'é', 'e'), 'í', 'i'), 'ó', 'o'), 'ú', 'u')) AS apellido_alumno,
            UPPER(a.curso) AS curso
        FROM 
            alumnos a
        WHERE 
            a.rut = :rut_alumno;
    ";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':rut_alumno', $rut_alumno);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

///ASISTENCIA


//ANOTACIONES
function obtenerAnotaciones($pdo, $rut_alumno) {
    $sql = "
      SELECT 
            a.fecha,
            a.descripcion,
            a.tipo_anotacion,
            asig.nombre_asignatura AS materia,
            p.nombre AS nombre_profesor
        FROM 
            anotaciones a
        JOIN 
            asignaturas asig ON a.id_asignatura = asig.id_asignatura
        JOIN 
            profesor_asignatura pa ON pa.id_asignatura = asig.id_asignatura
        JOIN 
            profesores p ON pa.rut_profesor = p.rut
        WHERE 
            a.rut_alumno =:rut_alumno  
        ORDER BY 
            a.fecha DESC 
        LIMIT 0, 25;


    ";
    
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':rut_alumno', $rut_alumno);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function obtenerNotasPorAsignatura($pdo, $rut_alumno, $semestre) {
    // Definir el rango de meses basado en el semestre
    $meses = ($semestre == 1) ? "3 AND 6" : "8 AND 12";

    // Consulta SQL para obtener el promedio de notas de cada asignatura según el semestre
    $sql = "
        SELECT 
            asig.nombre_asignatura AS asignatura,
            p.nombre AS nombre_profesor,
            n.nota
        FROM 
            notas n
        JOIN 
            asignaturas asig ON n.id_asignatura = asig.id_asignatura
        JOIN 
            profesor_asignatura pa ON pa.id_asignatura = asig.id_asignatura
        JOIN 
            profesores p ON pa.rut_profesor = p.rut
        WHERE 
            n.rut_alumno = :rut_alumno;
    ";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':rut_alumno', $rut_alumno);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function obtenerAsistenciaAlumno($pdo, $rut_alumno) {
    $sql = "
        SELECT 
            a.fecha,
            a.presente
        FROM 
            asistencia a
        WHERE 
            a.rut_alumno = :rut_alumno;
    ";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':rut_alumno', $rut_alumno);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>



