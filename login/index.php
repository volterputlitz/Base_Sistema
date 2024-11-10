<?php


include($_SERVER['DOCUMENT_ROOT'] . '/base_sistema/login/controler.php'); // Llama al controlador

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="login.css">
    <title>FORMULARIO DE REGISTRO E INICIO SESIÓN</title>
</head>
<body>
    <div class="container-form register">
        <div class="information">
            <div class="info-childs">
                <h2>Bienvenido</h2>
                <p>Para unirte a nuestra comunidad por favor Inicia Sesión con tus datos</p>
            </div>
        </div>
        <div class="form-information">
            <div class="form-information-childs">
                <img src="../public/dist/img" alt="Descripción de la imagen" class="login-image">
                <h2>Iniciar Sesión</h2>
                <?php if (isset($error)): ?>
                    <div class="error"><?php echo htmlspecialchars($error); ?></div>
                <?php endif; ?>
               
                <p>o Iniciar Sesión con una cuenta</p>
                <form class="form form-login"novalidate action="controler.php" method="POST">
                    <div>
                        <label >
                            <i class='bx bx-envelope' ></i>
                            <input type="rut" placeholder="RUT"  name="rut" id="rut" required>
                        </label>
                    </div>
                    <div>
                        <label>
                            <i class='bx bx-lock-alt' ></i>
                            <input type="password" placeholder="Contraseña"  name="contrasena" id="contrasena" required>
                        </label>
                    </div>
                    <input type="submit" value="Iniciar Sesión">
                    <div class="alerta-error">Todos los campos son obligatorios</div>
                    <div class="alerta-exito">Te registraste correctamente</div>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>