<!-- Este archivo no puede modificarse -->

<?php
$modelo = glob( __DIR__ . '/Modelo/*.php');
$controladores = glob( __DIR__ . '/Controladores/*.php');
$servicios = glob(__DIR__ . '/Servicios/*.php');
foreach ($modelo as $entidad) {
    require_once($entidad);
}
session_start();//hay que cargar los modelos antes de iniciar la sesión
foreach ($servicios as $servicio) {
    require_once($servicio);
}

foreach ($controladores as $controlador) {
    require_once($controlador);
}

?>

<!-- Este archivo no puede modificarse -->
