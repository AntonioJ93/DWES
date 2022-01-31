<?php session_start();

if(isset($_SESSION["id_usuario"])){
    header("Location:./balance.php");
}

?>



<!DOCTYPE html>
<html class="h-100" lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad 4</title>

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


                <div class="row py-5">
                    <div class="col-md-6 mx-auto">
                        <div class="py-5 bg-light">
                            <div class="container">

                                <div class="justify-content-md-center">
                                    <div class="form-signin bg-white p-5">
                                        <form action="./postLogin.php" method="post">
                                            <h1 class="h3 mb-3 fw-normal">Iniciar Sesión</h1>
                                            <div class=" bg-light px-2 ">
                                                <p>correo: usuario@gmail.com </p>
                                                <p>Contraseña: Usuario111111 </p>
                                            </div>

                                            <div class="form-floating">
                                                <input type="email" name="correo" class="form-control" id="floatingInput" placeholder="nombre@ejemplo.com" required>
                                                <label for="floatingInput">Correo</label>
                                            </div>
                                            <div class="form-floating pb-5">
                                                <input type="password" name="pass" class="form-control" id="floatingPassword" placeholder="Contraseña" required>
                                                <label for="floatingPassword">Contraseña</label>
                                            </div>
                                            <p>No tiene cuenta, <a href="./registro.php">Regístrese</a></p>
                                            <input value="Enviar" name="submit" class="w-100 btn btn-lg btn-primary" type="submit" />
                                            <?php
                                            if (isset($_SESSION["loginError"]) || isset($_SESSION["passError"]) || isset($_SESSION["correoError"])) {                                                  ?>
                                                <div class="alert alert-danger mt-3" role="alert">
                                                    <p><?= isset($_SESSION["loginError"]) ? $_SESSION["loginError"] : "" ?></p>
                                                    <p><?= isset($_SESSION["passError"]) ? $_SESSION["passError"] : "" ?></p>
                                                    <p><?= isset($_SESSION["correoError"]) ? $_SESSION["correoError"] : "" ?></p>
                                                </div>
                                            <?php }
                                            unset($_SESSION["loginError"]);
                                            unset($_SESSION["passError"]);
                                            unset($_SESSION["correoError"]); ?>
                                        </form>
                                    </div>

                                </div>
                            </div>
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