<?php
/*VARIABLES GLOBALES*/
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'siscolegio');
/*para servidor*/
define('APP_NAME', 'siscolegio');
define('APP_URL', 'http://localhost/siscolegio');
/*se cvambia a elegir algun hosting o servidor*/


define('KEY_API_MAPE', '');

/*conexion*/
$servidor = "mysql:dbname=".DB_NAME.";host=".DB_HOST;

try {
    $pdo = new PDO($servidor, DB_USER, DB_PASS, array(
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
    ));
    //echo 'Conexión exitosa';
} catch (PDOException $e) {
    print_r($e);
    echo 'Error al conectarse a la base de datos: ' . $e->getMessage();
}
date_default_timezone_set('America/Santiago');
$fechahora = date('Y-m-d h:i:s');
$fecha_actual = date('Y-m-d h:i:s');
$dia_actual = date('Y-m-d');
$ano_actual = date('Y');  