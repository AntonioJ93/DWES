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
$loginError = "Credenciales incorrectas";

session_start();
if (!isset($_SESSION["id_usuario"])) {
    $correo = trim($_POST["correo"]);
    $pass = trim($_POST["pass"]);


    function validarCampos($pass, $correo)
    {
        $contra = $cor =  false; //requeridos

        if (!empty($correo)) {
            $cor = preg_match($GLOBALS["patronCorreo"], $correo);
            $GLOBALS["correoError"] = $cor ? "" : $GLOBALS["correoError"];
        }
        if (!empty($pass)) {
            $contra = preg_match($GLOBALS["patronPass"], $pass);
            $GLOBALS["passError"] = $contra ? "" : $GLOBALS["passError"];
        }

        return $contra  && $cor;
    }


    $camposCorrectos = validarCampos($pass, $correo);

    if ($camposCorrectos) {

        //buscamos al usuario
        include "./dao/buscarUsuarioPorCorreo.php";

        if (password_verify($pass, $usuario["pass"])) {

            //credenciales correctas
            
            $_SESSION['id_usuario']  = $usuario["id_usuario"];
            $_SESSION['correo']  = $usuario["correo"];
            $_SESSION['nombre']  = $usuario[3];
            $_SESSION['rol']  = $usuario[4];

            if($usuario[4]=="cliente"){
                //rol suaurio
                header("Location: especialidades.php");
            }else if($usuario[4]=="admin"){
                //administrador
                header("Location: ./pedidos.php");
            }
 
        } else {
            $_SESSION["loginError"] = $loginError;
            header("Location: actividad5.php");
        }
    } else {
        $_SESSION["passError"] = $passError;
        $_SESSION["correoError"] = $correoError;
        header("Location: actividad5.php");
    }
} else {

    header("Location: especialidades.php");
}
