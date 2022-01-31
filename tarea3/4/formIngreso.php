<?php




session_start();
if (!isset($_SESSION["id_usuario"])) {
    // si no hay usuario
    header("Location: actividad4.php");
} 
include "conexion.php";

$patronNombre = "#^[ A-Za-zäÄëËïÏöÖüÜáéíóúáéíóúÁÉÍÓÚÂÊÎÔÛâêîôûàèìòùÀÈÌÒÙñÑ]{5,40}+$#";
$cantidadError = "La cantidad es incorrecta";
$nombreError = "El nombre es incorrecto";

$camposCorrectos = true;


if (isset($_POST["submit"])) {



    $nombre = trim($_POST["nombre"]);
    $cantidad = trim($_POST["cantidad"]);
    $fecha = trim($_POST["fecha"]);



    $camposCorrectos = datosCorrectos($cantidad, $nombre);

    if ($camposCorrectos) {
        $ingreso=array($cantidad,$_SESSION["id_usuario"],$nombre,$fecha);
        include "agregarIngreso.php";
        header("Location:./balance.php");
    }
}


//validaciones y mensajes
function datosCorrectos( $cantidad, $nombre)
{
   $cant = $nom = false;

    if (is_numeric($cantidad)) {
        $cant = true;
        $GLOBALS["cantidadError"] = $cant ? "" : $GLOBALS["cantidadError"];
    }
    if (!empty($nombre)) {
        $nom = preg_match($GLOBALS["patronNombre"], $nombre);

        $GLOBALS["nombreError"] = $nom ? "" : $GLOBALS["nombreError"];
    } else {
        $nom = true;
    }
    return $cant && $nom;
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
            </div>
        </nav>
    </header>
    <main class="flex-shrink-0">

        <section class="jumbotron  bg-white py-3">
            <div class="container">
                <h1 class="jumbotron-heading text-center">Actividad 4</h1>
                <div class="row ">
                    <div class="col-md-6 m-auto">
                        <div class="row div-tabla">
                            <h2 class="text-center">Añadir Ingreso</h2>
                            <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="container">
                                <div class="row">
                                    <div class="col-sm">
                                        <input type="hidden" name="editar" value="<?= isset($_GET["editar"]) ? $_GET["editar"] : "" ?>">
                                        <div class="col-sm form-group">
                                            <label for="nombre">Nombre del Ingreso</label>
                                            <input class="form-control" id="nombre" type="text" name="nombre" placeholder="Nombre " required value="<?= $camposCorrectos ? "" : $nombre ?>">
                                        </div>
                                        <div class="col-sm form-group">
                                            <label for="cantidad">Cantidad</label>
                                            <input class="form-control" id="cantidad" type="text" name="cantidad" placeholder="Cantidad " required value="<?= $camposCorrectos ? "" : $cantidad ?>">
                                        </div>
                                        <div class="col-sm form-group">
                                            <label for="fecha">Fecha</label>
                                            <input class="form-control" id="fecha" type="date" name="fecha"  required value="<?= $camposCorrectos ? "" : $fecha ?>">
                                        </div>
                                        <?php
                                        if (!$camposCorrectos) { ?>
                                            <p class=" text-danger "><?= $nombreError ?></p>
                                            <p class=" text-danger "><?= $cantidadError ?></p>
                                        <?php  }
                                        ?>
                                    </div>

                                </div>

                                <input type="submit" name="submit" value="Guardar" class="btn btn-primary" />
                            </form>
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