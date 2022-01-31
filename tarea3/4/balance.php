<?php

include "conexion.php";


session_start();
if (!isset($_SESSION["id_usuario"])) {
    // si no hay usuario
    header("Location: actividad4.php");
} else {

    //buscar ingresos
    $totalIngresos=0;
    include "buscarIngresosPorId.php";
    foreach ($ingresos as $ingreso ) {
        $totalIngresos+=$ingreso["cantidad"];
    }
    
    //buscar gastos
    $totalGastos=0;
    include "buscarGastosPorId.php";
    foreach ($gastos as $gasto ) {
        $totalGastos+=$gasto["cantidad"];
    }


    //balance

    $balance=$totalIngresos-$totalGastos;
}

?>

<!DOCTYPE html>
<html lang="es" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad 4</title>
    <?php include_once("../include/cdn.html") ?>
    <link rel="stylesheet" href="./css/actividad4.css">
</head>

<body class="d-flex flex-column h-100 ">
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container d-flex justify-content-between">
                <a class="navbar-brand fw-bold" href="../inicio.php">Inicio</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="actividad1" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Actividad 1
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="actividad1">
                                <li><a class="dropdown-item" href="../1/a/actividad1a.php">Actividad 1A</a></li>
                                <li><a class="dropdown-item" href="../1/b/actividad1b.php">Actividad 1B</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../2/actividad2.php">Actividad 2</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../3/actividad3.php">Actividad 3</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./actividad4.php">Actividad 4</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../5/actividad5.php">Actividad 5</a>
                        </li>
                    </ul>
                </div>
                <div class="text-end">
                    <a href="./generarPdf.php" target="_blank" class="btn btn-outline-warning me-2">Generar PDF</a>
                </div>
                <div class="text-end">
                    <a href="./cerrarSesion.php" class="btn btn-outline-warning me-2">Cerrar Sesión</a>
                </div>
            </div>
        </nav>
    </header>
    <main class="flex-shrink-0">

        <section class="jumbotron  bg-white py-3">
            <div class="container">
                <h1 class="jumbotron-heading text-center">Actividad 4</h1>
                <div class="row ">
                    <div class="col-md-6">
                        <div class="row div-tabla">
                            <h2 class="text-center">Sus Ingresos</h2>
                            <table class="table">

                                <thead class="thead-dark">
                                    <tr class="text-center">
                                        <th>Nombre Ingreso</th>
                                        <th>Cantidad</th>
                                        <th>Fecha</th>
                                    </tr>

                                </thead>
                                <tbody>
                                    <?php
                                    if (isset($ingresos)) {
                                        foreach ($ingresos as $ingreso) {

                                    ?>
                                            <tr>

                                                <td><?= $ingreso["nombre"] ?></td>
                                                <td><?= $ingreso["cantidad"] ?></td>
                                                <td><?= $ingreso["fecha"] ?></td>
                                            </tr>
                                            
                                    <?php }
                                    }
                                    ?>

                                </tbody>

                            </table>
                        </div>
                        <div class="row py-3">
                            <div class="col">
                                <p><b>Total: <?= $totalIngresos ?></b></p>
                            </div>

                        </div>
                        <div class="row py-3">
                            <div class="col">
                                <a href="./formIngreso.php" class="btn btn-primary w-10">Añadir Ingreso</a>
                            </div>
                            
                        </div>
                        <div class="row py-5">
                            
                            <p class="fw-bold">Balance: <?= $balance?></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row div-tabla">
                            <h2 class="text-center">Sus Gastos</h2>
                            <table class="table">

                                <thead class="thead-dark">
                                    <tr class="text-center">
                                        <th>Nombre Gasto</th>
                                        <th>Cantidad</th>
                                        <th>Fecha</th>
                                    </tr>

                                </thead>
                                <tbody>
                                    <?php
                                    if (isset($gastos)) {


                                        foreach ($gastos as $gasto) {

                                    ?>
                                            <tr>

                                                <td><?= $gasto["nombre"] ?></td>
                                                <td><?= $gasto["cantidad"] ?></td>
                                                <td><?= $gasto["fecha"] ?></td>
                                            </tr>
                                    <?php }
                                    }
                                    ?>
                                </tbody>

                            </table>
                        </div>

                        <div class="row py-3">
                            <div class="col">
                                <p><b>Total: <?= $totalGastos ?></b></p>
                            </div>

                        </div>

                        <div class="row py-3">
                            <div class="col">
                                <a href="./formGasto.php" class="btn btn-primary w-10">Añadir Gasto</a>
                            </div>

                        </div>
                    </div>
                </div>
        </section>

    </main>

    <footer class="text-muted mt-auto bg-white py-3">
        <div class="container text-center">

            <p>Antonio Jesús Prieto Arjona &copy; </p>
            <p>pryet2@gmail.com </p>
        </div>
    </footer>


</body>

</html>