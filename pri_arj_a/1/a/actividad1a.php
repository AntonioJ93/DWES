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

     <?php include_once("../../include/cdn.html") ?>


</head>

<body class="d-flex flex-column h-100 bg-light">

    <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container d-flex justify-content-between">
      <a class="navbar-brand fw-bold" href="../../inicio.php">Inicio</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="actividad1" role="button" data-bs-toggle="dropdown"
              aria-expanded="false">
              Actividad 1
            </a>
            <ul class="dropdown-menu" aria-labelledby="actividad1">
              <li><a class="dropdown-item" href="./actividad1a.php">Actividad 1A</a></li>
              <li><a class="dropdown-item" href="../b/actividad1b.php">Actividad 1B</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../../2/actividad2.php">Actividad 2</a>
          </li>
          <li class="nav-item">
                            <a class="nav-link" href="../../3/actividad3.php">Actividad 3</a>
            </li>
            <li class="nav-item">
                            <a class="nav-link" href="../../4/actividad4.php">Actividad 4</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../../5/actividad5.php">Actividad 5</a>
                        </li>
        </ul>
      </div>
    </div>
  </nav>

    </header>

    <main class="flex-shrink-0">

        <section class="jumbotron  bg-white py-3">
            <div class="container">
                <h1 class="jumbotron-heading text-center">Actividad 1A</h1>
                <p class="text-center">Usuario: <?= $usuario ?></p>
                <p class="text-center">Contrase??a: <?= $pass ?></p>
                <php $mensaje=autorizar($usuario,$pass); ?>
                    <h2 class="jumbotron-heading text-center"><?= $mensaje ?></h2>


                    <div class="row py-5">
                        <div class="col-md-6 m-auto">
                            <div class="card mb-4 box-shadow">
                                <div class="card-header">
                                <p class="card-title fw-bold"> ??Por qu?? no es seguro esta autenticaci??n? ??C??mo podr??a mejorarse?</p>
                                </div>
                                
                                <div class="card-body">
                                   
                                    <p class="card-text">Auth Basic es el sistema mecanismo de 
                                        identificaci??n mas usado pero tiene prblemas de seguridad.</p>
                                        <p class="card-text">El problema de Auth Basic es que la informaci??n viaja sin encriptar, simplemente va codificada en Base64, y se puede decodificar facilmente</p>
                                        <p class="card-text">Por este motivo solo es recomendable usar Auth Basic en servidores con certificado SSL que garantiza que los datos que viajan entre el cliente y el servidor estan cifrados</p>
                                </div>
                            </div>
                        </div>
                    </div>







        </section>



    </main>

    <footer class="text-muted mt-auto bg-white py-3">
        <div class="container text-center">

            <p>Antonio Jes??s Prieto Arjona &copy; </p>
            <p>pryet2@gmail.com </p>
        </div>
    </footer>


</body>

</html>