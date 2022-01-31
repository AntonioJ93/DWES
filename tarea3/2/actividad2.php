<?php

$patronNombre = "#^[ A-Za-zäÄëËïÏöÖüÜáéíóúáéíóúÁÉÍÓÚÂÊÎÔÛâêîôûàèìòùÀÈÌÒÙñÑ]{5,40}+$#";
$precioError = "El precio es incorrecto";
$cantidadError = "La cantidad es incorrecta";
$nombreError = "El nombre es incorrecto";

$camposCorrectos = true;
//  setcookie("cesta",json_encode(array()),time()+60*60);//1 hora



//guardar/editar
if (isset($_POST["submit"])) {



    $nombre = trim($_POST["nombre"]);
    $cantidad = trim($_POST["cantidad"]);
    $precio = trim($_POST["precio"]);



    $camposCorrectos = datosCorrectos($precio, $cantidad, $nombre);

    if ($camposCorrectos) {

        if (isset($_COOKIE["cesta"])) {
            $cesta = json_decode($_COOKIE['cesta'], true);

            if ($_POST["editar"] != "") {
                $indice = $_POST["editar"];
            } else {
                $longitud = count($cesta);
                end($cesta);
                $ultimoElemento = current($cesta);
                $indice = $ultimoElemento["indice"] + 1; //averiguamos la posición de inserción
            }

         
            $articulo = array("indice" => $indice, "nombre" => $nombre, "precio" => $precio, "cantidad" => $cantidad, "subtotal" => $precio * $cantidad);
            $cesta[$indice] = $articulo;
      
            setcookie("cesta", json_encode($cesta), time() + 60 * 60); //1 hora
        } else {
            //se crea la cesta y se guarda el articulo
            $cesta[0] = $articulo = array("indice" => 0, "nombre" => $nombre, "precio" => $precio, "cantidad" => $cantidad, "subtotal" => $precio * $cantidad);
            setcookie("cesta", json_encode($cesta), time() + 60 * 60); //1 hora
        }


        header("Refresh:0");
    }
}

//eliminar articulo
if (isset($_GET["eliminar"])) {
    $indice = $_GET["eliminar"];
    $cesta = json_decode($_COOKIE['cesta'], true);
    unset($cesta[$indice]);
    setcookie("cesta", json_encode($cesta));
    unset($_GET["eliminar"]);
    header("Location:./actividad2.php");
}

//vaciar cesta
if (isset($_GET["vaciar"])) {

    if (isset($_COOKIE["cesta"])) {
       setcookie("cesta","",time() + 60 * 60);
       header("Location:./actividad2.php");
    }
}

//sumar precios
$total=0;
if (isset($_COOKIE["cesta"])) {  
    foreach (json_decode($_COOKIE["cesta"], true) as $articulo) {
        $total+=$articulo["subtotal"];
    }
}


//validaciones y mensajes
function datosCorrectos($precio, $cantidad, $nombre)
{
    $pre = $cant = $nom = false;
    if (is_numeric($precio)) {

        $pre = true;
        $GLOBALS["precioError"] = $pre ? "" : $GLOBALS["precioError"];
    }

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
    return $pre && $cant && $nom;
}


?>





<!DOCTYPE html>
<html class="h-100" lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad 2</title>

    <?php include_once("../include/cdn.html") ?>
    <link rel="stylesheet" type="text/css" href="./css/actividad2.css">
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
                            <a class="nav-link" href="./actividad2.php">Actividad 2</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../3/actividad3.php">Actividad 3</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../4/actividad4.php">Actividad 4</a>
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
                <h1 class="jumbotron-heading text-center">Actividad 2</h1>


                <div class="row py-5">
                    <div class="col-md-4 mx-auto">
                        <div class="card mb-4 box-shadow">
                            <h2 class="text-center">Añadir/editar artículo</h2>
                            <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="container">
                                <div class="row">
                                    <div class="col-sm">
                                        <input type="hidden" name="editar" value="<?= isset($_GET["editar"]) ? $_GET["editar"] : "" ?>">
                                        <div class="col-sm form-group">
                                            <label for="nombre">Nombre del Artículo</label>
                                            <input class="form-control" id="nombre" type="text" name="nombre" placeholder="Nombre " required value="<?= $camposCorrectos ? "" : $nombre ?><?= isset($_GET["editar"]) ? $cesta = json_decode($_COOKIE['cesta'], true)[$_GET["editar"]]["nombre"] : "" ?>">
                                        </div>
                                        <div class="col-sm form-group">
                                            <label for="cantidad">Cantidad</label>
                                            <input class="form-control" id="cantidad" type="number" name="cantidad" placeholder="Cantidad " min="1" required value="<?= $camposCorrectos ? "" : $cantidad ?><?= isset($_GET["editar"]) ? $cesta = json_decode($_COOKIE['cesta'], true)[$_GET["editar"]]["cantidad"] : "" ?>">
                                        </div>
                                        <div class="col-sm form-group">
                                            <label for="precio">Precio</label>
                                            <input class="form-control" id="precio" type="text" name="precio" placeholder="Precio (€)" required value="<?= $camposCorrectos ? "" : $precio ?><?= isset($_GET["editar"]) ? $cesta = json_decode($_COOKIE['cesta'], true)[$_GET["editar"]]["precio"] : "" ?>">
                                        </div>
                                        <?php
                                        if (!$camposCorrectos) { ?>
                                            <p class=" text-danger "><?= $nombreError ?></p>
                                            <p class=" text-danger "><?= $precioError ?></p>
                                            <p class=" text-danger "><?= $cantidadError ?></p>
                                        <?php  }
                                        ?>
                                    </div>

                                </div>

                                <input type="submit" name="submit" value="Guardar" class="btn btn-primary" />
                            </form>
                        </div>
                    </div>
                    <div class="col-md-8 m-auto ">
                    <div class="row div-tabla">
                        <h2 class="text-center">Su cesta</h2>
                        <table class="table">

                            <thead class="thead-dark">
                                <tr class="text-center">
                                    <th>Nombre Artículo</th>
                                    <th>Precio</th>
                                    <th>Cantidad</th>
                                    <th>Total</th>
                                    <th>Opcines</th>
                                </tr>

                            </thead>
                            <tbody>
                                <?php
                                if (isset($_COOKIE["cesta"])) {


                                    foreach (json_decode($_COOKIE["cesta"], true) as $articulo) {

                                ?>
                                        <tr>

                                            <td><?= $articulo["nombre"] ?></td>
                                            <td><?= $articulo["precio"] ?></td>
                                            <td><?= $articulo["cantidad"] ?></td>
                                            <td><?= $articulo["subtotal"] ?></td>
                                            <td class="text-center">
                                                <a href="./actividad2.php?editar=<?= $articulo["indice"] ?>" class="btn btn-warning mx-2">Editar</a>
                                                <a href="./actividad2.php?eliminar=<?= $articulo["indice"] ?>" class="btn btn-danger">Eliminar</a>
                                            </td>
                                        </tr>
                                <?php }
                                }
                                ?>

                                <tr>

                                    <td class="fw-bold">Total</td>
                                    <td><?= "" ?></td>
                                    <td><?= "" ?></td>
                                    <td class="fw-bold"><?= $total ?></td>
                                </tr>
                            </tbody>

                        </table>
                        </div>
                        <div class="row py-3">
                            <div class="col">
                            <a href="./actividad2.php?vaciar=true" class="btn btn-danger w-10">Vaciar Cesta</a>
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