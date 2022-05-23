<!-- Este archivo no puede modificarse -->

<?php
session_start();
$modelo = glob( __DIR__ . '/Modelo/*.php');
$controladores = glob( __DIR__ . '/Controladores/*.php');
$servicios = glob(__DIR__ . '/Servicios/*.php');
foreach ($modelo as $entidad) {
    require_once($entidad);
}

foreach ($controladores as $controlador) {
    require_once($controlador);
}

foreach ($servicios as $servicio) {
    require_once($servicio);
}

?>

<!-- Este archivo no puede modificarse -->
