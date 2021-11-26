<?php

include "conexion.php";

$login = false;
$camposCorrectos = true;

$correo = trim($_POST["correo"]);
$pass = trim($_POST["pass"]);

//patrones
$patronCorreo = "#^(([^<>()\[\]\\.,;:\s@”]+(\.[^<>()\[\]\\.,;:\s@”]+)*)|(“.+”))@((\[[0–9]{1,3}\.[0–9]{1,3}\.[0–9]{1,3}\.[0–9]{1,3}])|(([a-zA-Z\-0–9]+\.)+[a-zA-Z]{2,3}))$#";
$patronPass = "#^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$#"; //no puede contener espacios


//variables de errores
$passError = "La contraseña no debe tener espacios, estar entre 8 y 16 caracteres mayúsculas, minusculas y números";
$correoError = "Introduce un correo válido";
$loginError = "Credenciales incorrectas";

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
    include "buscarPorCorreoYPass.php";

    if ($res) { //devuelve false si no trae resultados
        //credenciales correctas
        session_start();
        $_SESSION['id_usuario']  = $res["id_usuario"];
        $_SESSION['correo']  = $res["correo"];
        $_SESSION['nombre']  = $res["nombre"];
        $login = true;

        // buscar rol
        include "buscarRol.php";

        //buscar todos los test
        include "buscarTodosTest.php";
    }
}

?>


<!doctype html>
<html lang="es" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Trabajo DWES unidad 2">
    <meta name="author" content="Antonio J. Prieto">

    <title>Tarea 2 DWES</title>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

</head>

<body class="d-flex flex-column h-100 bg-light">

    <header>

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container d-flex justify-content-between">
                <a class="navbar-brand fw-bold" href="../inicio.html">Inicio</a>

                <?php if ($login) {      ?>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link px-2 text-white" aria-current="page" href="#"><?= $_SESSION['nombre'] ?></a>
                            </li>
                        </ul>
                    </div>


                    <div class="text-end">
                        <a href="./cerrarSesion.php" class="btn btn-outline-warning me-2">Cerrar Sesión</a>
                    </div>

                <?php    }   ?>
            </div>
        </nav>


    </header>

    <main class="flex-shrink-0">

        <section class="jumbotron text-center bg-white py-3">
            <div class="container">
                <?php if ($login) { ?>
                    <h1 class="jumbotron-heading">Test Disponibles</h1>
                <?php } ?>
            </div>
        </section>

        <div class="py-5 bg-light">
            <div class="container">
                <?php if ($login && $_SESSION["USER"]) {

                    foreach ($listaTest as &$test) {
                ?>
                        <div class="row justify-content-md-center">
                            <div class="col-md-8">
                                <div class="card mb-4 box-shadow p-4">

                                    <div class="card-body">
                                        <p class="card-title fw-bold"><?= $test["descripcion"] ?></p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group">
                                                <a href="./test.php?idTest=<?= $test["id_test"] ?>" class="btn btn-sm btn-outline-secondary">Realizar Test</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    <?php
                    }
                } elseif (!$camposCorrectos) { ?>
                    <p class=" text-danger txtError"><?= $correoError ?></p>
                    <p class=" text-danger txtError"><?= $passError ?></p>
                    <a href="./login.html" class="btn btn-sm btn-outline-secondary me-2">Volver</a>
                <?php } else { ?>
                    <p class=" text-danger txtError"><?= $loginError ?></p>
                    <a href="./login.html" class="btn btn-sm btn-outline-secondary me-2">Volver</a>
                <?php } ?>
            </div>
        </div>

    </main>

    <footer class="text-muted mt-auto bg-white py-3">
        <div class="container text-center">

            <p>Antonio Jesús Prieto Arjona &copy; </p>
            <p>pryet2@gmail.com </p>
        </div>
    </footer>


</body>

</html>