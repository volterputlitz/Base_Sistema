<?php
// No iniciar sesión aquí, ya que se hace en `controler.php`

// Obtener nombre y apellido del usuario desde la sesión
$nombre = isset($_SESSION['nombre']) ? $_SESSION['nombre'] : "Usuario";
$apellido = isset($_SESSION['apellido']) ? $_SESSION['apellido'] : "";
?>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4 menu_lateral">

    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
        <span class="brand-text font-weight-light">Sistema Escolar</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <a href="#" class="d-block">
                <span>
                    <?php echo htmlspecialchars($nombre . ' ' . $apellido); ?>
                </span>
                </a>
            </div>
        </div>
    <
        <!-- Sidebar Menu -->
        <nav class="mt-2 ">
            
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
                
                <li class="nav-item">
                     <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                          alumno
                          <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a onclick="cargarContenido('content-wrapper','vistas/modulos/info.php')" class="nav-link" style="cursor: pointer;">
                                <i class="far fa-circle nav-icon"></i>
                                <p>informacion</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a onclick="cargarContenido('content-wrapper','vistas/modulos/notas.php')" class="nav-link" style="cursor: pointer;">
                                <i class="far fa-circle nav-icon"></i>
                                <p>notas</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a onclick="cargarContenido('content-wrapper','vistas/modulos/asistencia.php')" class="nav-link" style="cursor: pointer;">
                                <i class="far fa-circle nav-icon"></i>
                                <p>asistencia</p>
                            </a>
                        </li>

                    </ul>

                </li>
                
            </ul>

            
        </nav>
        <!-- /.sidebar-menu -->

    </div>
    <!-- /.sidebar -->
</aside>


