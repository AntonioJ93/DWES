<?php
/* Conectar a una base de datos de MySQL invocando al controlador */
$dsn = 'mysql:dbname=ud2_test;host=34.79.37.9:3306';
$usuario = 'root';
$contraseña = 'Fullstack.2021';

try {
    $conexion = new PDO($dsn, $usuario, $contraseña);
} catch (PDOException $e) {
    echo 'Falló la conexión: ' . $e->getMessage();
}

?>