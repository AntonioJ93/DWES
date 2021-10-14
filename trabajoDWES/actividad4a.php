<!doctype html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Trabajo DWES unidad 1">
  <meta name="author" content="Antonio J. Prieto">
 
  <title>Tarea 1 DWES</title>

  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="css/retoqueNav.css">
    <link href="css/form-validation.css" rel="stylesheet">
    
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
    crossorigin="anonymous"></script>

</head>

<body>

    <!-- Si le has dado a submit -->
    <?php
    const OPCIONES = array("piedra", "papel", "tijera", "lagarto", "spock");

    //mantener la opcion
    $checkPiedra="checked";
    $checkPapel="";
    $checkTijera="";
    $checkLagarto="";
    $checkSpock="";
    function elegirOpcion($opciones)
    {
        return $opciones[random_int(0, count($opciones) - 1)];
    }
    function resetCheck(){
    $GLOBALS["checkPiedra"]=$GLOBALS["checkPapel"]=$GLOBALS["checkTijera"]=$GLOBALS["checkLagarto"]=$GLOBALS["checkSpock"]="";
    }


    if (isset($_POST["submit"])) {
        $opcion = $_POST["opcion"];

        switch ($opcion) {
            case 'piedra':
                $opcionMaquina = elegirOpcion(OPCIONES);
                switch ($opcionMaquina) {
                    case 'piedra':
                        $resultado = "Ha empatado";
                        break;
                    case 'papel':
                        $resultado = "Ha perdido";
                        break;
                    case 'tijera':
                        $resultado = "Ha ganado";
                        break;
                    case 'lagarto':
                        $resultado = "Ha ganado";
                        break;
                    case 'spock':
                        $resultado = "Ha perdido";
                        break;
                }
                resetCheck();
                $GLOBALS["checkPiedra"]="checked";
                break;
            case 'papel':
                $opcionMaquina = elegirOpcion(OPCIONES);
                switch ($opcionMaquina) {
                    case 'piedra':
                        $resultado = "Ha ganado";
                        break;
                    case 'papel':
                        $resultado = "Ha empatado";
                        break;
                    case 'tijera':
                        $resultado = "Ha perdido";
                        break;
                    case 'lagarto':
                        $resultado = "Ha perdido";
                        break;
                    case 'spock':
                        $resultado = "Ha ganado";
                        break;
                }
                resetCheck();
                $GLOBALS["checkPapel"]="checked";
                break;

            case 'tijera':
                $opcionMaquina = elegirOpcion(OPCIONES);
                switch ($opcionMaquina) {
                    case 'piedra':
                        $resultado = "Ha perdido";
                        break;
                    case 'papel':
                        $resultado = "Ha ganado";
                        break;
                    case 'tijera':
                        $resultado = "Ha empatado";
                        break;
                    case 'lagarto':
                        $resultado = "Ha ganado";
                        break;
                    case 'spock':
                        $resultado = "Ha perdido";
                        break;
                }
                resetCheck();
                $GLOBALS["checkTijera"]="checked";
                break;

            case 'lagarto':
                $opcionMaquina = elegirOpcion(OPCIONES);
                switch ($opcionMaquina) {
                    case 'piedra':
                        $resultado = "Ha perdido";
                        break;
                    case 'papel':
                        $resultado = "Ha ganado";
                        break;
                    case 'tijera':
                        $resultado = "Ha perdido";
                        break;
                    case 'lagarto':
                        $resultado = "Ha empatado";
                        break;
                    case 'spock':
                        $resultado = "Ha ganado";
                        break;
                }
                resetCheck();
                $GLOBALS["checkLagarto"]="checked";
                break;

            case 'spock':
                $opcionMaquina = elegirOpcion(OPCIONES);
                switch ($opcionMaquina) {
                    case 'piedra':
                        $resultado = "Ha ganado";
                        break;
                    case 'papel':
                        $resultado = "Ha perdido";
                        break;
                    case 'tijera':
                        $resultado = "Ha ganado";
                        break;
                    case 'lagarto':
                        $resultado = "Ha perdido";
                        break;
                    case 'spock':
                        $resultado = "Ha empatado";
                        break;
                }
                resetCheck();
                $GLOBALS["checkSpock"]="checked";
                break;
            default:
                $opcion = "";
                $opcionMaquina = "";
                $resultado = "";
                $errorDato = "Ha ocurrido un error intentelo de nuevo";
                break;
        }
    }
    ?>
<header>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container d-flex justify-content-between">
    <a class="navbar-brand fw-bold" href="./index.html">Inicio</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="./actividad1.html">Actividad 1</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./actividad2.html">Actividad 2</a>
        </li>
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="actividad3" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Actividad 3
          </a>
          <ul class="dropdown-menu" aria-labelledby="actividad3">
            <li><a class="dropdown-item" href="./actividad3a.html">Actividad 3A</a></li>
            <li><a class="dropdown-item" href="./actividad3b.html">Actividad 3B</a></li>  
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="actividad4" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Actividad 4
          </a>
          <ul class="dropdown-menu" aria-labelledby="actividad4">
            <li><a class="dropdown-item" href="./actividad4a.php">Actividad 4A</a></li>
            <li><a class="dropdown-item" href="./actividad4b.php">Actividad 4B</a></li>  
            <li><a class="dropdown-item" href="./actividad4c.php">Actividad 4C</a></li>  
          </ul>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="./actividad5.html">Actividad 5</a>
        </li>
        
      </ul>
    </div>
  </div>
</nav>


</header>

    <main>

        <section class="jumbotron text-center">
            <div class="container">
                <h1 class="jumbotron-heading">Actividad 4A</h1>
                <p class="lead text-muted">Tarea 1 Antonio Jesús Prieto Arjona</p>

            </div>
        </section>

        <div class="py-5 bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card mb-4 borde">

                            <div class="card-body">
                                <h2>Piedra papel tijeras lagarto spock</h2>
                                <p>Seleccione una opción y juegue</p>
                                <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="container">
                                    <div class="row">
                                        <div class="col-sm">
                                            <div class="form-check">
                                                <label class="form-check-label" for="piedra">Piedra</label>
                                                <input type="radio" name="opcion" id="piedra" value="piedra" class="form-check-input" <?=$checkPiedra?> />
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label" for="papel">Papel</label>
                                                <input type="radio" name="opcion" id="papel" value="papel" class="form-check-input" <?=$checkPapel?>/>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label" for="tijera">Tijera</label>
                                                <input type="radio" name="opcion" id="tijera" value="tijera" class="form-check-input" <?=$checkTijera?>/>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label" for="lagarto">Lagarto</label>
                                                <input type="radio" name="opcion" id="lagarto" value="lagarto" class="form-check-input" <?=$checkLagarto?>/>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label" for="spock">Spock</label>
                                                <input type="radio" name="opcion" id="spock" value="spock" class="form-check-input" <?=$checkSpock?>/>
                                            </div>

                                        </div>
                                        <div class="col-sm">
                                            <?php if (isset($_POST["submit"])) { ?>
                                                <h4>Resultado</h4>
                                                <p>Su eleccion: <?= $opcion ?></p>
                                                <p>La maquina ha sacado: <?= $opcionMaquina ?> </p>
                                                <p><?= $resultado ?></p>
                                            <?php }
                                            if (isset($errorDato)) { ?>
                                                <span class="text-danger"><?= $errorDato ?></span>
                                            <?php } ?>
                                        </div>
                                    </div>

                                    <input type="submit" name="submit" value="Jugar" class="btn-success" />
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="text-muted">
        <div class="container text-center">

            <p>Antonio Jesús Prieto Arjona &copy; </p>
            <p>pryet2@gmail.com </p>
        </div>
    </footer>

</body>

</html>