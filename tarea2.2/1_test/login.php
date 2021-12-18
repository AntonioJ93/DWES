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
                <a class="navbar-brand fw-bold" href="../index.php">Inicio</a>
            </div>
        </nav>


    </header>

    <main class="flex-shrink-0">


        <div class="py-5 bg-light">
            <div class="container">

                <div class="row justify-content-md-center">
                    <div class="col-md-4 form-signin bg-white p-5">
                        <form action="./postLogin.php" method="post">
                            <h1 class="h3 mb-3 fw-normal">Iniciar Sesión</h1>
                            <div class=" bg-light px-2 "> 
                                <p>Profesor: </p>
                                <p>correo: admin@admin.com </p>
                                <p>Contraseña: Admin111 </p>
                                <p>Alumno: </p>
                                <p>correo: juan@gmail.com </p>
                                <p>Contraseña: Juan111111 </p>
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
                            <?php  session_start(); 
                                if(isset($_SESSION["loginError"])||isset($_SESSION["passError"])||isset($_SESSION["correoError"])){                                                  ?>
                                <div class="alert alert-danger mt-3" role="alert">
                                    <p><?= isset($_SESSION["loginError"])?$_SESSION["loginError"]:"" ?></p>
                                    <p><?= isset($_SESSION["passError"])?$_SESSION["passError"]:"" ?></p>
                                    <p><?= isset($_SESSION["correoError"])?$_SESSION["correoError"]:"" ?></p>
                                </div>
                            <?php } session_unset(); ?>
                        </form>
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