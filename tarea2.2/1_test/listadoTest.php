<?php

include "conexion.php";


session_start();
if (!isset($_SESSION["id_usuario"])) {
    // si no hay usuario
    header("Location: login.php");
} else {

    //buscar todos los test
    include "buscarTodosTest.php";
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
                <a class="navbar-brand fw-bold" href="../index.html">Inicio</a>


                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <span class="nav-link px-2 text-white"><?= $_SESSION['nombre'] ?></span>
                        </li>
                        <?php if ($_SESSION["USER"]) { ?>
                            <li class="nav-item">
                                <a class="nav-link px-2 text-white" href="./misIntentos.php">Tests realizados</a>
                            </li>
                        <?php } ?>
                        <?php if ($_SESSION["ADMIN"]) { ?>
                            <li class="nav-item">
                                <a class="nav-link px-2 text-white" href="./estadisticas.php">Estadisticas de test</a>
                            </li>
                        <?php } ?>
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
                <?php if ($_SESSION["USER"]) { ?>
                    <h1 class="jumbotron-heading">Test Disponibles</h1>
                <?php  } ?>
                <?php if ($_SESSION["ADMIN"]) { ?>
                    <h1 class="jumbotron-heading">Alumnos</h1>
                <?php  } ?>
            </div>
        </section>

        <div class="py-5 bg-light">
            <div class="container">
                <?php {
                    if ($_SESSION["USER"]) {
                        foreach ($listaTest as &$test) {

                            //buscar intentos de cada test
                            include "buscarIntentos.php";
                ?>
                            <div class="row justify-content-md-center">
                                <div class="col-md-8">
                                    <div class="card mb-4 box-shadow p-4">

                                        <div class="card-body">
                                            <p class="card-title fw-bold"><?= $test["descripcion"] ?></p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <p>Intentos Restantes: <?= $testRealizado["intento"] ?></p>
                                                <?php
                                                if ($testRealizado["intento"] > 0) {
                                                ?>
                                                    <div class="btn-group">
                                                        <a href="./postRealizarTest.php?idTest=<?= $test["id_test"] ?>" class="btn btn-sm btn-outline-secondary">Realizar Test</a>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        <?php
                        }
                    }
                }
                if ($_SESSION["ADMIN"]) {?>




                    <div class="row justify-content-md-center">
                    <div class="col-md-8">
                        <div class="card mb-4 box-shadow p-4">

                            <div class="card-body">

                                <table class="table">

                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Test</th>
                                            <th>Intento 3</th>
                                            <th>Intento 2</th>
                                            <th>Intento 1</th>
                                            <th>Promedio</th>
                                        </tr>

                                    </thead>
                                    <tbody>
                                        <?php

                                        include "buscarTestPorUsuario.php";

                                        foreach ($tests as $test) {

                                            $idTest = $test["id_test"];


                                        ?>
                                            <tr>
                                            <a href="./verTest.php?idTest=<?= $idTest?>&idUsuario=<?= $test["id_usuario"]?>"></a>
                                                <td><?= $test["nombre"] ?></td>
                                                <td><?= $test["descripcion"] ?></td>

                                                <?php include "buscarNotas.php";
                                                ?>
                                                <td> <a href="./verTest.php?idTestRealizado= <?= isset($notas[0]["id_test_realizados"]) ? $notas[0]["id_test_realizados"] : "" ?>" >
                                                <?= isset($notas[0]["calificacion"]) ? $notas[0]["calificacion"] : "" ?></a>
                                                </td>

                                                <td> <a href="./verTest.php?idTestRealizado= <?= isset($notas[1]["id_test_realizados"]) ? $notas[1]["id_test_realizados"] : "" ?>" >
                                                <?= isset($notas[1]["calificacion"]) ? $notas[1]["calificacion"] : "" ?></a>
                                                </td>

                                                <td> <a href="./verTest.php?idTestRealizado= <?= isset($notas[2]["id_test_realizados"]) ? $notas[2]["id_test_realizados"] : "" ?>" >
                                                <?= isset($notas[2]["calificacion"]) ? $notas[2]["calificacion"] : "" ?></a>
                                                </td>
                                                <?php ?>
                                                <td><?= $media["Promedio"] ?></td>
                                                
                                                
                                            </tr>
                                        <?php }
                                        ?>
                                    </tbody>

                                </table>



                            </div>
                        </div>
                    </div>

                </div>

                <?php
                } ?>
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