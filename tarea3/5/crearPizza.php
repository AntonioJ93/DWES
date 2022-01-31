<?php
session_start();

include "./dao/conexion.php";
if (!isset($_SESSION["id_usuario"])) {
    // si no hay usuario
    header("Location: actividad5.php");
}

if($_SESSION["rol"]=="admin"){
    header("Location:./pedidos.php");
}

$precioError = "El precio es incorrecto";
$cantidadError = "La cantidad es incorrecta";
$camposCorrectos = true;
$errorIngrediente = "";



//guardar
if (isset($_POST["submit"])) {



    $idIgrediente = $_POST["idIngrediente"];



    if (isset($_SESSION["pizza"])) {
        $pizza = $_SESSION["pizza"];
        if (count($pizza) < 7) {
            # code...

            if (!in_array($idIgrediente, $pizza)) {
                array_push($pizza, $idIgrediente);
                $_SESSION["pizza"] = $pizza;
            } else {
                $errorIngrediente = "El ingrediente ya esta en la pizza";
            }
        } else {
            $errorIngrediente = "Maximo de ingrediente alcanzado";
        }
    } else {
        $pizza = array();
        array_push($pizza, $idIgrediente);
        $_SESSION["pizza"] = $pizza;
    }
}




//eliminar articulo
if (isset($_GET["eliminar"])) {
    $id = $_GET["eliminar"];
    $pizza = $_SESSION["pizza"];
    foreach ($pizza as $key => $value) {
        if ($value == $id) {
            unset($pizza[$key]);
            $_SESSION["pizza"] = $pizza;
            break;
        }
    }
}

//vaciar pizza
if (isset($_GET["vaciar"])) {

    if (isset( $_SESSION["pizza"])) {
        unset($_SESSION["pizza"]);
      
    }
}

//total
if(isset($_SESSION["pizza"])){
    $total = 0.5 * count($_SESSION["pizza"]) + 7;
}else{
    $total=0;
}
?>





<!DOCTYPE html>
<html class="h-100" lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad 5</title>

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
    <main class="flex-shrink-0">

        <section class="jumbotron  bg-white py-3">
            <div class="container">
                <h1 class="jumbotron-heading text-center">Cree su de Pizza</h1>


                <div class="row py-5">
                    <div class="col-md-4 mx-auto">
                        <div class="card mb-4 box-shadow">
                            <h2 class="text-center">Añadir ingrediente</h2>
                            <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="container">
                                <div class="row">
                                    <div class="col-sm">

                                        <div class="col-sm form-group">
                                            <label for="nombre">Ingrediente</label>

                                            <select name="idIngrediente">
                                                <?php
                                                //buscar ingredientes
                                                include "./dao/buscarTodosIngredientes.php";
                                                //iterar
                                                foreach ($ingredientes as $key => $ingrediente) {
                                                    # code...

                                                ?>
                                                    <option value="<?= $ingrediente["id_ingrediente"] ?>"><?= $ingrediente["nombre"] ?></option>
                                                <?php
                                                } //fin iterar
                                                ?>
                                            </select>
                                            <p class="text-danger"><?= $errorIngrediente ?></p>
                                        </div>

                                    </div>

                                </div>

                                <input type="submit" name="submit" value="Guardar" class="btn btn-primary" />
                            </form>
                        </div>
                    </div>
                    <div class="col-md-8 m-auto ">
                        <div class="row div-tabla">
                            <h2 class="text-center">Su Pizza</h2>
                            <table class="table">

                                <thead class="thead-dark">
                                    <tr class="text-center">
                                        <th>Ingrediente</th>
                                        <th></th>
                                    </tr>

                                </thead>
                                <tbody>
                                    <?php
                                    if (isset($_SESSION["pizza"])) {


                                        foreach ($_SESSION["pizza"] as $item) {
                                            $idIngrediente = $item;
                                            include "./dao/buscarIngredientePorId.php"
                                    ?>
                                            <tr>

                                                <td><?= $ingrediente["nombre"] ?></td>

                                                <td class="text-center">
                                                    <a href="./crearPizza.php?eliminar=<?= $idIngrediente ?>" class="btn btn-sm btn-danger material-icons">clear</a>
                                                </td>
                                            </tr>
                                    <?php }
                                    }
                                    ?>

                                    <tr>

                                        <td class="fw-bold">Total</td>
                                        <td class="fw-bold"><?= $total ?>€</td>
                                    </tr>
                                </tbody>

                            </table>
                        </div>
                        <div class="row py-3">
                            <div class="col">
                                <a href="./crearPizza.php?vaciar=true" class="btn btn-danger w-10">Eliminar Pizza</a>
                            </div>
                            <div class="col">
                                <a href="./procesarPizza.php" class="btn btn-primary w-10">Confirmar</a>
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