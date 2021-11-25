<?php

$camposCorrectos = true;

$correo = trim($_POST["correo"]);
$pass = trim($_POST["pass"]);

//patrones
$patronCorreo = "#^(([^<>()\[\]\\.,;:\s@”]+(\.[^<>()\[\]\\.,;:\s@”]+)*)|(“.+”))@((\[[0–9]{1,3}\.[0–9]{1,3}\.[0–9]{1,3}\.[0–9]{1,3}])|(([a-zA-Z\-0–9]+\.)+[a-zA-Z]{2,3}))$#";
$patronPass = "#^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$#"; //no puede contener espacios


//variables de errores
$passError = "La contraseña no debe tener espacios, estar entre 8 y 16 caracteres mayúsculas, minusculas y números";
$correoError = "Introduce un correo válido";

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
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link px-2 text-white" aria-current="page" href="#">estas logueado</a>
                        </li>
                    </ul>
                </div>

                <div class="text-end">
                    <a type="button" class="btn btn-outline-warning me-2">xxx</a>
                </div>
            </div>
        </nav>


    </header>

    <main class="flex-shrink-0">

        <section class="jumbotron text-center bg-white py-3">
            <div class="container">
                <h1 class="jumbotron-heading">DWES</h1>
                <p class="lead text-muted">Tarea 2 Antonio Jesús Prieto Arjona</p>
            </div>
        </section>

        <div class="py-5 bg-light">
            <div class="container">
                <?php if ($camposCorrectos) { ?>


                    <div class="row justify-content-md-center">
                        <div class="col-md-8">
                            <div class="card mb-4 box-shadow p-4">

                                <img class="card-img-top w-25 m-auto" src="img/test.jpg" alt="test">
                                <div class="card-body">
                                    <p class="card-title fw-bold">1. Sistema de test online</p>
                                    <p class="card-text">El usuario iniciará sesión y realizará una prueba online tipo test sobre PHP (mínimo 10 preguntas). El test tendrá un máximo de 3 intentos. Tiene que haber preguntas con respuestas únicas (radio) o múltiples (checkbox). El profesor, con rol administrador, iniciará sesión y podrá comprobar las respuestas y la nota de cada alumno y podrá generar un informe. Dicho informe mostrará las notas de cada alumno y estadísticas como nota media, moda, varianza, desviación típica, pregunta con más aciertos, pregunta con más fallos, etc.</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <a href="./1_test/login.php" class="btn btn-sm btn-outline-secondary">Ver</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                <?php } else { ?>
                    <p class=" text-danger txtError"><?= $correoError ?></p>
                    <p class=" text-danger txtError"><?= $passError ?></p>
                    <a href="./login.php" class="btn btn-sm btn-outline-secondary me-2">Volver</a>
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