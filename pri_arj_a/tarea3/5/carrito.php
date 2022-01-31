<?php session_start();

include "./dao/conexion.php";

if (!isset($_SESSION["id_usuario"])) {
    // si no hay usuario
    header("Location: actividad5.php");
} else {
    if($_SESSION["rol"]=="admin"){
        header("Location:./pedidos.php");
    }
    //obtener carrito
    if (isset($_SESSION["carrito"])) {
        $carrito = $_SESSION["carrito"];
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
                    <a href="./especialidades.php" class="btn btn-outline-warning me-2">Seguir Añadiendo</a>
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
                <h1 class="jumbotron-heading">Carrito</h1>
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
                    <table class="table">

                        <thead class="thead-dark">
                            <tr class="text-center">
                                <th>Nombre</th>
                                <th>Cantidad</th>
                                <th>Precio</th>
                                <th>Subtotal</th>
                                <th></th>
                            </tr>

                        </thead>
                        <tbody class="text-center">
                            <?php
                            $total = 0;
                            if (isset($carrito)) {
                                foreach ($carrito as $articulo) {
                                    $total += $articulo["subtotal"]
                            ?>
                                    <tr>

                                        <td><?= $articulo["nombre"] ?></td>
                                        <td><?= $articulo["cantidad"] ?></td>
                                        <td><?= $articulo["precio"] ?></td>
                                        <td><?= $articulo["subtotal"] ?></td>
                                        <td>

                                            <a href="./eliminarCarrito.php?idEspecialidad=<?= $articulo["id_especialidad"]?>&especialidad=<?= $articulo["especialidad"]?>" class="btn btn-outline-danger material-icons">remove_shopping_cart</a>
                                        </td>
                                    </tr>

                            <?php }
                            }
                            ?>


                        </tbody>
                        <tfoot class="text-center">
                            <tr>

                                <th >Total:</th>
                                <th ></th>
                                <th ></th>
                                <th><?= $total ?></th>
                                <th>
                                    <?php if(isset($_SESSION["carrito"])){
                                        if(count($_SESSION["carrito"])>0){ ?>
                                    <a href="./pedido.php" class="btn btn-primary">Realizar Pedido</a>
                                    <?php }} ?>
                            </th>
                            </tr>
                            </tfoot>

                    </table>

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