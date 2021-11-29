<?php

include "conexion.php";

$intentosAgotados = "No tienes más intentos";

session_start();
if (!isset($_SESSION["id_usuario"])) {
    // si no hay usuario
    header("Location: login.php");
} else {

    //test seleccionado
    $idTest = trim($_GET["idTest"]);

    //buscar intetos del test
    include "buscarIntentos.php";

    if ($testRealizado > 0) {
        if (isset($_SESSION["idTest"])) {
            if ($_SESSION["idTest"] != $idTest) {
                //descontamos un intento
                include "descontarIntento.php.php";
            }
        } else {
            //descontamos un intento
            include "descontarIntento.php.php";
        }
    } else {
        header("Location: login.php");
    }
    $_SESSION["idTest"] = $idTest;
    header("Location: test.php");
}
