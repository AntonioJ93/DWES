<?php
session_start();
$dominio = 'Area restringida';

$usuario="usuario";
$pass="1234";

// usuario => contraseña
$usuarios = array($usuario => $pass);


if (empty($_SERVER['PHP_AUTH_DIGEST'])) {
    header('HTTP/1.1 401 Unauthorized');
    header('WWW-Authenticate: Digest realm="'.$dominio.
           '",qop="auth",nonce="'.uniqid().'",opaque="'.md5($dominio).'"');
    session_unset();
    session_destroy();
    die('Usuario: usuario <br> Contraseña: 1234');
}


// Analizar la variable PHP_AUTH_DIGEST
if (!($datos = analizar_http_digest($_SERVER['PHP_AUTH_DIGEST'])) ||
    !isset($usuarios[$datos['username']])){
    session_unset();
    session_destroy();
    die('Credenciales incorrectas <br> Usuario: usuario <br> Contraseña: 1234');
    }

// Generar una respuesta válida
$A1 = md5($datos['username'] . ':' . $dominio . ':' . $usuarios[$datos['username']]);
$A2 = md5($_SERVER['REQUEST_METHOD'].':'.$datos['uri']);
$respuesta_válida = md5($A1.':'.$datos['nonce'].':'.$datos['nc'].':'.$datos['cnonce'].':'.$datos['qop'].':'.$A2);

if ($datos['response'] != $respuesta_válida){
    session_unset();
    session_destroy();
    die('Credenciales incorrectas <br> Usuario: usuario <br> Contraseña: 1234');
}

// Todo bien, usuario y contraseña válidos



// Función para analizar la cabecera de autenticación HTTP
function analizar_http_digest($txt)
{
    // Protección contra datos ausentes
    $partes_necesarias = array('nonce'=>1, 'nc'=>1, 'cnonce'=>1, 'qop'=>1, 'username'=>1, 'uri'=>1, 'response'=>1);
    $datos = array();
    $claves = implode('|', array_keys($partes_necesarias));

    preg_match_all('@(' . $claves . ')=(?:([\'"])([^\2]+?)\2|([^\s,]+))@', $txt, $coincidencias, PREG_SET_ORDER);

    foreach ($coincidencias as $c) {
        $datos[$c[1]] = $c[3] ? $c[3] : $c[4];
        unset($partes_necesarias[$c[1]]);
    }

    return $partes_necesarias ? false : $datos;
}
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
              <li><a class="dropdown-item" href="../a/actividad1a.php">Actividad 1A</a></li>
              <li><a class="dropdown-item" href="./actividad1b.php">Actividad 1B</a></li>
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
                <h1 class="jumbotron-heading text-center">Actividad 1B</h1>
                <p class="text-center">Usuario: <?= $usuario ?></p>
                <p class="text-center">Contraseña: <?= $pass ?></p>
                      <div class="row py-5">
                        <div class="col-md-6 m-auto">
                            <div class="card mb-4 box-shadow">
                                <div class="card-header">
                                <p class="card-title fw-bold"> ¿qué es una función hash? 
                                      ¿Por qué es tan importante en seguridad informática? 
                                      ¿Cuál sería la autenticación HTTP más segura de todas finalmente?</p>
                                </div>
                                
                                <div class="card-body">
                                   
                                    <p class="card-text">Una funcion hash es una funcion que convierte el valor de entrada en un valor de salida de longitud fija, ademas no es posible con el valor de salida obtener el valor de entrada</p>
                                    <p class="card-text">La seguridad informática es inprescindible actualmente, ya que enviamos por internet datos sensibles como datos bancarios, contraseñas... Si internet no fuera seguro todas las actividades que realizamos hoy dia no sería posibles</p>
                                    <p class="card-text">La autentificación  HTTP mas segura es Digest , aunque la autentificación mas segura seria mediante SSL ya que los datos viajan encriptados del cliente al servidor y Bcrypt para encri`tar las contraseñas</p>
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