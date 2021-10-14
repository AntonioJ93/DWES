<!doctype html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Trabajo DWES unidad 1">
  <meta name="author" content="Antonio J. Prieto">

  <title>Tarea 1 DWES</title>

  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  <link href="css/form-validation.css" rel="stylesheet">
  <link rel="stylesheet" href="css/retoqueNav.css">
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

</head>

<body>

  <!-- Si le has dado a submit -->
  <?php

  if (isset($_POST["submit"])) {
    $radio = trim($_POST["radio"]);
    if (is_numeric($radio)) {
      $area = calculaArea($radio);
      $circunferencia = calculaCircunferencia($radio);
    } else {
      $errorDato = "El dato introducido es incorrecto";
    }
  }


  function calculaArea($radio)
  {
    return pi() * pow($radio, 2);
  }
  function calculaCircunferencia($radio)
  {
    return 2 * pi() * $radio;
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
        <h1 class="jumbotron-heading">Actividad 4B</h1>
        <p class="lead text-muted">Tarea 1 Antonio Jesús Prieto Arjona</p>

      </div>
    </section>

    <section class="py-5 bg-light">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="card mb-4 borde">

              <div class="card-body">
                <h2>Cáculo del área y circunferencia</h2>
                
                <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="container">
                  <div class="row">

                    <div class="col-sm form-group">
                      <label for="radio">Radio</label>
                      <input class="form-control" type="text" name="radio" id="radio" placeholder="radio">
                    </div>

                    <div class="col-sm">
                      <?php if (isset($_POST["submit"]) && !isset($errorDato)) { ?>
                        <p class="titulo-formulario">Resultado</p>
                        <p>Radio: <?= $radio ?></p>
                        <p>Area: <?= number_format($area, 3) ?> </p>
                        <p>Circunferencia: <?= number_format($circunferencia, 3) ?> </p>

                      <?php }
                      if (isset($errorDato)) { ?>
                        <span class="text-danger"><?= $errorDato ?></span>
                      <?php } ?>
                    </div>
                  </div>

                  <input type="submit" name="submit" value="Calcular" class="btn-success" />
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

  <footer class="text-muted">
    <div class="container text-center">

      <p>Antonio Jesús Prieto Arjona &copy; </p>
      <p>pryet2@gmail.com </p>
    </div>
  </footer>

</body>

</html>