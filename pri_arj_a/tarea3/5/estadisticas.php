<?php session_start();

include "./dao/conexion.php";

if (!isset($_SESSION["id_usuario"])) {
    // si no hay usuario
    header("Location: actividad5.php");
} else {

    if($_SESSION["rol"]=="cliente"){
        header("Location:./especialidades.php");
    }

    //obtener usuario
    if(isset($_GET["idUsuario"])){

        $idUsuario=$_GET["idUsuario"];
        include "./dao/buscarUsuarioPorId.php";

        //buscar top especialidades por usuario
        include "./dao/buscarEspecialidadesPorUsuario.php";

        //buscar ingredientes consumidos
        include "./dao/buscarIngredientesPorUsuario.php";
    }else{

        //peticion mala
        header("Location: actividad5.php");
    }

}

?>

<!doctype html>
<html lang="es" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Trabajo DWES unidad 3">
    <meta name="author" content="Antonio J. Prieto">

    <title>Actividad 5</title>

    <?php include_once("../include/cdn.html") ?>

</head>

<body class="d-flex flex-column h-100 bg-light">

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
                            <a class="nav-link" href="../4/actividad4.php">Actividad 4</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./actividad5.php">Actividad 5</a>
                        </li>
                    </ul>
                </div>
                <div class="text-end">
                    <a href="./pedidos.php" class="btn btn-outline-warning me-2">Pedidos</a>
                </div>
                <div class="text-end">
                    <a href="./cerrarSesion.php" class="btn btn-outline-warning me-2">Cerrar Sesión</a>
                </div>
            </div>
        </nav>


    </header>

    <main>

        <section class="jumbotron text-center">
            <div class="container">
                <h1 class="jumbotron-heading">Usuario: <?=$usuario["nombre"]?></h1>
            </div>
        </section>

        <div class="py-5 bg-light">
            <div class="container">
                <div class="row">
                    <table class="table">

                        <thead class="thead-dark">
                            <tr class="text-center">
                                <th>Cliente</th>
                                <th>correo</th>
                                <th>Fecha de alta</th>
                            </tr>

                        </thead>
                        <tbody class="text-center">

                                <tr>

                                    <td><?= $usuario["nombre"] ?></td>
                                    <td><?= $usuario["correo"] ?></td>
                                    <td><?= $usuario["fecha_alta"] ?></td>

                                </tr>


                        </tbody>

                    </table>

                </div>
                <div class="row">
                    <div class="col-md-4">




                    <table class="table table-hover">
                        <caption>Top especialidades</caption>
                        <thead class="thead-dark">
                            <tr class="text-center">
                                <th>Especialidad</th>
                                <th>Consumido</th>
                            </tr>

                        </thead>
                        <tbody class="text-center">
                            <?php


                            foreach ($especialidades as $especialidad) {

                            ?>
                                <tr>

                       
                                    <td><?= $especialidad["nombre"] ?></td>
                                    <td><?= $especialidad["cantidad"] ?></td>

                                </tr>

                            <?php }

                            ?>


                        </tbody>

                    </table>






                    </div>
                    <div class="col-md-4">
                    <table class="table table-hover">
                        <caption>Top Ingredientes</caption>
                        <thead class="thead-dark">
                            <tr class="text-center">
                                <th>Ingrediente</th>
                                <th>Consumido</th>
                            </tr>

                        </thead>
                        <tbody class="text-center">
                            <?php


                            foreach ($ingredientes as $ingrediente) {

                            ?>
                                <tr>

                       
                                    <td><?= $ingrediente["nombre"] ?></td>
                                    <td><?= $ingrediente["consumo"] ?></td>

                                </tr>

                            <?php }

                            ?>


                        </tbody>

                    </table>
                    </div>
                </div>

            </div>
        </div>
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