<?php
session_start(); // Iniciar la sesión al comienzo

if (isset($_POST['rut']) && isset($_POST['contrasena'])) {
    $rut = $_POST['rut'];
    $contrasena = $_POST['contrasena'];
    
    // Lógica para verificar las credenciales del usuario
    include '../modelos/conexion.php'; // La ruta según sea necesario
    include '../funciones/dbConsu.php';

    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE rut = :rut");
    $stmt->bindParam(':rut', $rut);
    $stmt->execute();
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario && $contrasena === $usuario['contrasena']) {
        // Guardar datos en la sesión
        $_SESSION['id_usuario'] = $usuario['id_usuario'];
        $_SESSION['rut'] = $usuario['rut'];
        $_SESSION['tipo_usuario'] = $usuario['tipo_usuario'];
        $_SESSION['nombre'] = $usuario['nombre'] ?? '';
        $_SESSION['apellido'] = $usuario['apellido'] ?? '';

        // Procede si el usuario es un alumno
        if ($usuario['tipo_usuario'] === 'alumno') {
            // Obtener el nombre, apellido y curso del alumno
            $datos_alumno = obtenerNAC($pdo, $rut);
            if ($datos_alumno) {
                // Guardar los datos en variables de sesión
                $_SESSION['nombre'] = $datos_alumno['nombre_alumno'];
                $_SESSION['apellido'] = $datos_alumno['apellido_alumno'];
                $_SESSION['curso'] = $datos_alumno['curso'];
            } else {
                echo "No se pudieron obtener los datos del alumno.";
                exit;
            }

            $anotaciones = obtenerAnotaciones($pdo, $rut);
            $_SESSION['anotaciones'] = $anotaciones;

            $semestre = 1; // Define el semestre (1 para el primer semestre, 2 para el segundo semestre)
            $notas_por_asignatura = obtenerNotasPorAsignatura($pdo, $rut, $semestre);

            $asistencia_alumno = obtenerAsistenciaAlumno($pdo, $rut);
            $_SESSION['asistencia_alumno'] = $asistencia_alumno;

            // Redirigir a la página principal de alumnos
            header("Location: ../index.php");
            exit;
        }

        // Redirige al usuario a su página correspondiente según su rol
        header("Location: ../index.php");
        exit;
    } else {
        echo "RUT o contraseña incorrectos.";
    }
} else {
    echo "Parámetro 'RUT' o 'contraseña' no recibido.";
}
?>