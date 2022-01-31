<?php
/* Conectar a una base de datos de MySQL invocando al controlador */
$dsn = 'mysql:dbname=ud3_app_web;host=localhost:3306';
$usuario = 'root';
$contraseña = '';

try {
    $conexion = new PDO($dsn, $usuario, $contraseña);
} catch (PDOException $e) {
    echo 'Falló la conexión: ' . $e->getMessage();
}

?>