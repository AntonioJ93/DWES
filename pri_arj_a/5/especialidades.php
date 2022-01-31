<?php session_start();

include "./dao/conexion.php";

if (!isset($_SESSION["id_usuario"])) {
    // si no hay usuario
    header("Location: actividad5.php");
} else {

    if($_SESSION["rol"]=="admin"){
        header("Location:./pedidos.php");
    }

    //buscar especialidades
    include "./dao/buscarEspecialidades.php";
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
                    <a href="./crearPizza.php" class="btn btn-outline-warning me-2"><span>Crear Pizza</span></a>
                </div>
                <div class="text-end">
                    <a href="./carrito.php" class="btn btn-outline-warning me-2"
                    style="max-height: 38px;">

                        <span class=" material-icons"> shopping_cart</span>
                     <?php if (isset($_SESSION["carrito"])) { ?>
                        <span class="badge bg-secondary "><?= count($_SESSION["carrito"]) ?></span>
                    <?php       } ?>


                    </a>

                </div>
                <div class="text-end">
                    <a href="./cerrarSesion.php" class="btn btn-outline-warning me-2"><span>Cerrar Sesión</span></a>
                </div>
            </div>
        </nav>


    </header>

    <main>

        <section class="jumbotron text-center">
            <div class="container">
                <h1 class="jumbotron-heading">Especialidades</h1>
                <?php
                if (isset($_SESSION["msj"])) {    ?>

                    <div class=" text-success">
                        <h3><?= $_SESSION["msj"] ?></h3>
                    </div>

                <?php unset($_SESSION["msj"]);
                }  ?>
            </div>
        </section>

        <div class="py-5 bg-light">
            <div class="container">
                <div class="row">
                    <?php
                    foreach ($especialidades as $especialidad) {
                    ?>
                        <div class="col-md-4">
                            <div class="card mb-4 box-shadow">

                                <img class="card-img-top p-3" src="./img/pizza.png" alt="pizza">
                                <div class="card-body">
                                    <p class="card-title fw-bold text-center"><?= $especialidad["nombre"] ?></p>
                                    <p class="card-title fw-bold">Ingredientes:</p>
                                    <ul class="list-group-flush">
                                        <?php
                                        $idEspecialidad = $especialidad["id_especialidad"];
                                        include "./dao/buscarIngredientesPorEspecialidad.php";

                                        foreach ($ingredientes as $ingrediente) {
                                        ?>
                                            <li class="card-text list-group-item"><?= $ingrediente["nombre"] ?></li>

                                        <?php } ?>
                                    </ul>
                                    <p class="card-title fw-bold">Precio: <?= $especialidad["precio"] ?>€</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <a href="./addCarrito.php?idEspecialidad=<?= $especialidad["id_especialidad"] ?>" class="btn  btn-primary material-icons">add_shopping_cart</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    <?php } ?>

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