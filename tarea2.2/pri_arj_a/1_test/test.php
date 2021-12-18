<?php

include "conexion.php";


session_start();
if (!isset($_SESSION["id_usuario"])) {
    // si no hay usuario
    header("Location: login.php");
} else {
    if (!isset($_SESSION["idTest"])) {
        // si no hay test
        header("Location: listadoTest.php");
    }
    //test seleccionado
    $idTest = $_SESSION["idTest"];

    //buscar test
    include "buscarTestPorId.php";

    //buscar preguntas del test
    include "buscarPreguntas.php";
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
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <span class="nav-link px-2 text-white" ><?= $_SESSION['nombre'] ?></span>
                        </li>
                    </ul>
                </div>
                <div class="text-end">
                    <a href="./cerrarSesion.php" class="btn btn-outline-warning me-2">Cerrar Sesión</a>
                </div>
            </div>
        </nav>

    </header>

    <main class="flex-shrink-0">

        <section class="jumbotron text-center bg-white py-3">
            <div class="container">
                <h1 class="jumbotron-heading"><?= $test["descripcion"] ?></h1>
                <h4 class="jumbotron-heading">Cada pregunta errónea resta 0.3 puntos</h4>
            </div>
        </section>

        <div class="py-5 bg-light">
            <div class="container">
                <form action="./postTest.php" method="post">
                    <?php if (isset($_SESSION["USER"])) {

                        //iterar preguntas
                        foreach ($listaPreguntas as &$pregunta) {

                    ?>
                            <div class="row justify-content-md-center">
                                <div class="col-md-8">
                                    <div class="card mb-4 box-shadow p-4">

                                        <div class="card-body">
                                            <p class="card-title fw-bold"><?= $pregunta["texto"] ?></p>
                                            <?php
                                            //buscar opciones de la pregunta
                                            include "buscarOpcion.php";
                                            foreach ($listaOpciones as &$opcion) {
                                            ?>
                                                <ul class="list-group">
                                                    <li class="list-group-item">
                                                        <div class="form-check">

                                                            <?php
                                                            //name del elemento
                                                            if ($pregunta['multiple'] == 0) {
                                                                $name = $opcion['id_pregunta_opcion'];
                                                            } else {
                                                                $name = $opcion['id_pregunta_opcion'] . "[]";
                                                            }
                                                            //name = idPregunta
                                                            //value = idOpcion
                                                            ?>
                                                            <input class="form-check-input" type="<?= $pregunta['multiple'] == 0 ? 'radio' : 'checkbox' ?>" name="<?= $name ?>" id="<?= $opcion['id_opcion'] ?>" value="<?= $opcion['id_opcion'] ?>">
                                                            <label class="form-check-label" for="<?= $opcion['id_opcion'] ?>">
                                                                <?= $opcion["texto"] ?>
                                                            </label>
                                                        </div>
                                                    </li>

                                                </ul>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        <?php
                        } ?>
                        <div class="text-center">
                            <input value="Finalizar Intento" name="submit" class="btn btn-primary" type="submit" />
                        </div>

                    <?php } ?>

                </form>
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