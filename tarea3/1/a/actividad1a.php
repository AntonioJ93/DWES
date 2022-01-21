<?php

$usuario = "usuario";
$pass = "1234";
$mensaje = "";
function autorizar($usuario, $pass)
{
    if (!isset($_SERVER['PHP_AUTH_USER'])) {
        header("WWW-Authenticate: Basic realm=\"DWES/tarea3/1/a\"");
        header("HTTP\ 1.0 401 Unauthorized");
        return "Error las credenciales incorrectas";
        exit;
    } else {
        if ($_SERVER['PHP_AUTH_USER'] !== $usuario || $_SERVER['PHP_AUTH_PW'] !== $pass) {
            header("WWW-Authenticate: Basic realm=\"DWES/tarea3/1/a\"");
            header("HTTP\ 1.0 401 Unauthorized");
            return "Error las credenciales incorrectas";
            exit;
        } else {
            return "Autorizado correctamente con Auth Basic";
        }
    }
}


$mensaje = autorizar($usuario, $pass);
?>


<!doctype html>
<html lang="es" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Trabajo DWES unidad 3">
    <meta name="author" content="Antonio J. Prieto">

    <title>Tarea 3 DWES</title>
<?php 
    include_once("/xampp/htdocs/DWES/tarea3/include/cdn.html")
?>

</head>

<body class="d-flex flex-column h-100 bg-light">

    <header>

        <?php
        include_once "/xampp/htdocs/DWES/tarea3/include/menu.html";
        ?>


    </header>

    <main class="flex-shrink-0">

        <section class="jumbotron  bg-white py-3">
            <div class="container">
                <h1 class="jumbotron-heading text-center">Actividad 1A</h1>
                <p class="text-center">Usuario: <?= $usuario ?></p>
                <p class="text-center">Contraseña: <?= $pass ?></p>
                <php $mensaje=autorizar($usuario,$pass); ?>
                    <h2 class="jumbotron-heading text-center"><?= $mensaje ?></h2>


                    <div class="row py-5">
                        <div class="col-md-6 m-auto">
                            <div class="card mb-4 box-shadow">
                                <div class="card-header">
                                <p class="card-title fw-bold"> ¿Por qué no es seguro esta autenticación? ¿Cómo podría mejorarse?</p>
                                </div>
                                
                                <div class="card-body">
                                   
                                    <p class="card-text">Auth Basic es el sistema mecanismo de 
                                        identificación mas usado pero tiene prblemas de seguridad.</p>
                                        <p class="card-text">El problema de Auth Basic es que la información viaja sin encriptar, simplemente va codificada en Base64, y se puede decodificar facilmente</p>
                                        <p class="card-text">Por este motivo solo es recomendable usar Auth Basic en servidores con certificado SSL que garantiza que los datos que viajan entre el cliente y el servidor estan cifrados</p>
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