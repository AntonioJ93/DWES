<?php

include "./dao/conexion.php";

$login = false;
$camposCorrectos = true;


//patrones
$patronCorreo = "#^(([^<>()\[\]\\.,;:\s@”]+(\.[^<>()\[\]\\.,;:\s@”]+)*)|(“.+”))@((\[[0–9]{1,3}\.[0–9]{1,3}\.[0–9]{1,3}\.[0–9]{1,3}])|(([a-zA-Z\-0–9]+\.)+[a-zA-Z]{2,3}))$#";
$patronPass = "#^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$#"; //no puede contener espacios


//variables de errores
$passError = "La contraseña no debe tener espacios, estar entre 8 y 16 caracteres mayúsculas, minusculas y números";
$correoError = "Introduce un correo válido";
$confCorreoError = "El campo correo y confirmar correo no coincide";
$confPassError = "El campo contraseña y confirmar contraseña no coincide";
$registroError = "Correo en uso";

session_start();
if (!isset($_SESSION["id_usuario"])) {
    $correo = trim($_POST["correo"]);
    $confCorreo = trim($_POST["confCorreo"]);
    $pass = trim($_POST["pass"]);
    $confPass = trim($_POST["confPass"]);
    $nombre = trim($_POST["nombre"]);


    function validarCampos($pass, $correo, $nombre)
    {
        $contra = $cor = $nom =  false; //requeridos

        if (!empty($correo)) {
            $cor = preg_match($GLOBALS["patronCorreo"], $correo);
            $GLOBALS["correoError"] = $cor ? "" : $GLOBALS["correoError"];
        }
        if (!empty($pass)) {
            $contra = preg_match($GLOBALS["patronPass"], $pass);
            $GLOBALS["passError"] = $contra ? "" : $GLOBALS["passError"];
        }
        if (!empty($nombre)) {
            $nom = true;
        }

        return $contra  && $cor && $nom;
    }

    $camposCorrectos = validarCampos($pass, $correo, $nombre);

    if ($camposCorrectos) {
        $confirmarCorreo = false;
        if ($correo == $confCorreo) {
            $GLOBALS["confCorreoError"] = "";
            $confirmarCorreo = true;
        }
        $confirmarPass = false;
        if ($pass == $confPass) {
            $GLOBALS["confPassError"] = "";
            $confirmarPass = true;
        }
    }

    if ($camposCorrectos && $confirmarCorreo && $confirmarPass) {
        echo "Dentro";
        // buscamos al usuario por correo
        include "./dao/buscarUsuarioPorCorreo.php";

        if (!$usuario) { //lo crea
            $idRol=2;//cliente
            //$idRol=1;//admin
            //codificar pass
            $pass=password_hash($pass, PASSWORD_BCRYPT);
            // guardar usuario
            include "./dao/guardarUsuario.php";

            //logueamos al usuario
            //buscamos al usuario
            include "buscarPorCorreoYPass.php";
            $_SESSION['id_usuario']  = $res["id_usuario"];
            $_SESSION['correo']  = $res["correo"];
            $_SESSION['nombre']  = $res["nombre"];
            $login = true;

            header("Location: especialidades.php");
        } else {
            $_SESSION["registroError"] = $registroError;
            header("Location: registro.php");
        }
    } else {
        $_SESSION["passError"] = $passError;
        $_SESSION["correoError"] = $correoError;
        $_SESSION["confCorreoError"] = $confCorreoError;
        $_SESSION["confPassError"] = $confPassError;
        header("Location: registro.php");
    }
} else {

    header("Location: especialidades.php");
}
