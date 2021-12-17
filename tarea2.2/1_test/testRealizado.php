<?php

include "conexion.php";


session_start();
if (!isset($_SESSION["id_usuario"])) {
    // si no hay usuario
    header("Location: login.php");
} else {
    if (!isset($_GET["idTest"])) {
        // si no hay test
        header("Location: listadoTest.php");
    }
    //test seleccionado
    $idTest = $_GET["idTest"];
    $preguntasCorrectas = $_SESSION["preguntasCorrectas"];
    $preguntasInorrectas = $_SESSION["preguntasInorrectas"];

    $respuestasCorrectas = $_SESSION["respuestasCorrectas"];
    $respuestasIncorrectas = $_SESSION["respuestasIncorrectas"];
    $nota = $_SESSION["nota"];

    $respuestas = array_merge($respuestasCorrectas, $respuestasIncorrectas);
 
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
                <a class="navbar-brand fw-bold" href="../index.html">Inicio</a>

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
                <h2 class="text-center">Calificación <?= $nota ?></h2>
            </div>
        </section>

        <div class="py-5 bg-light">
            <div class="container">

                <?php if ($_SESSION["USER"]) {

                    //iterar preguntas

                    for ($i = 0; $i < count($listaPreguntas); $i++) {
                        $bgPregunta="";
                        $pregunta = $listaPreguntas[$i];
                        if(array_search($pregunta["id_pregunta"],$preguntasCorrectas)!==false){
                            $bgPregunta="bg-success";
                        }

                ?>
                        <div class="row justify-content-md-center">
                            <div class="col-md-8">
                                <div class="card mb-4 box-shadow p-4">

                                    <div class="card-body">
                                    <span class="fw-bold text-success">
                                        <?= $bgPregunta=="bg-success"?"Pregunta Correcta":""?>
                                    </span>
                                        <p class="card-title fw-bold "><?= $pregunta["texto"] ?> </p>
                                    
                                        <ul class="list-group">
                                            <?php
                                            //buscar opciones de la pregunta
                                            include "buscarOpcion.php";

                                            for ($j = 0; $j < count($listaOpciones); $j++) {
                                                $respuestaCheck = false;
                                     
                                                $opcion = $listaOpciones[$j];
                                                foreach ($respuestas as $r) {


                                                    if ($opcion["id_opcion"] == $r) {
                                                        $respuestaCheck = true;
                                                      
                                                        break;
                                                    }
                                                    if (is_array($r)) {
                                                  
                                                       if( array_search($opcion["id_opcion"],$r)!==false){
                                                        $respuestaCheck = true;
                                                       
                                                        break;
                                                       }

                                                    }

                                                    
                                                }    ?>
                                                <li class="list-group-item">
                                                    <div class="form-check">
                                                        <input disabled class="form-check-input" type="<?= $pregunta['multiple'] == 0 ? 'radio' : 'checkbox' ?>" <?= $respuestaCheck ? "checked" : "" ?>>
                                                        <label class="form-check-label" for="<?= $opcion['id_opcion'] ?>">
                                                            <?= $opcion["texto"] ?>
                                                        </label>

                                                    </div>
                                                </li>

                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>
                    <?php

                    } ?>
                    <div class="text-center">
                        <a href="./listadoTest.php" class="btn btn-primary">Finalizar</a>
                    </div>

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