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
    <link href="../../css/form-validation.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/retoqueNav.css">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

</head>

<body>

    <!-- Si le has dado a submit -->
    <?php

    if (isset($_POST["submit"])) {
        $edad = trim($_POST["edad"]);
        $sexo = trim($_POST["sexo"]);
        $altura = trim($_POST["altura"]);
        $peso = trim($_POST["peso"]);
        if (is_numeric($edad) && is_numeric($peso) && is_numeric($altura) && ($sexo == "h" || $sexo == "m")) {

            $imc = calcularIMC($peso, $altura / 100);
            switch ($imc) {
                case $imc < 18.5:
                    $clasificacion = "Bajo Peso";
                    break;
                case 18.5 < $imc && $imc < 24.99:
                    $clasificacion = "Peso Normal";
                    break;
                case 25 <= $imc && $imc < 30:
                    $clasificacion = "SobrePeso";
                    break;
                default:
                    $clasificacion = "Obesidad";
                    break;
            }
            $mBasal = calculaMBasal($edad, $peso, $altura, $sexo);
        } else {
            $errorDato = "El datos introducidos incorrectos";
        }
    }


    function calcularIMC($peso, $altura)
    {
        return $peso / pow($altura, 2);
    }
    function calculaMBasal($edad, $peso, $altura, $sexo)
    {
        if ($sexo == "h") {
            return 10 * $peso + 6.25 * $altura - 5 * $edad + 5;
        } else {
            return 10 * $peso + 6.25 * $altura - 5 * $edad - 161;
        }
    }
    ?>
    <header>

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container d-flex justify-content-between">
                <a class="navbar-brand fw-bold" href="../../inicio.html">Inicio</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="../../1/actividad1.html">Actividad 1</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../../2/actividad2.html">Actividad 2</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="actividad3" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Actividad 3
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="actividad3">
                                <li><a class="dropdown-item" href="../../3/a/actividad3a.html">Actividad 3A</a></li>
                                <li><a class="dropdown-item" href="../../3/b/actividad3b.html">Actividad 3B</a></li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="actividad4" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Actividad 4
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="actividad4">
                                <li><a class="dropdown-item" href="../../4/a/actividad4a.php">Actividad 4A</a></li>
                                <li><a class="dropdown-item" href="../../4/b/actividad4b.php">Actividad 4B</a></li>
                                <li><a class="dropdown-item" href="../../4/c/actividad4c.php">Actividad 4C</a></li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="../../5/actividad5.html">Actividad 5</a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>


    </header>

    <main>

        <section class="jumbotron text-center">
            <div class="container">
                <h1 class="jumbotron-heading">Actividad 4C</h1>
                <p class="lead text-muted">Tarea 1 Antonio Jes??s Prieto Arjona</p>

            </div>
        </section>

        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card mb-4 borde">

                            <div class="card-body">
                                <h2>C??culo del IMC y Metabolismo Basal</h2>

                                <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="container">
                                    <div class="row">
                                        <div class="col-sm">
                                            <p>Sexo</p>
                                            <div class="form-check">

                                                <input type="radio" name="sexo" id="h" value="h" class="form-check-input" checked />
                                                <label class="form-check-label" for="h">H</label>
                                            </div>
                                            <div class="form-check">

                                                <input type="radio" name="sexo" id="m" value="m" class="form-check-input" />
                                                <label class="form-check-label" for="m">M</label>
                                            </div>

                                            <div class="col-sm form-group">
                                                <label for="edad">Edad</label>
                                                <input class="form-control" id="edad" type="number" name="edad" placeholder="Edad (a??os)">
                                            </div>
                                            <div class="col-sm form-group">
                                                <label for="peso">Peso</label>
                                                <input class="form-control" id="peso" type="text" name="peso" placeholder="Peso (kg)">
                                            </div>
                                            <div class="col-sm form-group">
                                                <label for="altura">Altura</label>
                                                <input class="form-control" id="altura" type="text" name="altura" placeholder="Altura (cm)">
                                            </div>

                                        </div>
                                        <div class="col-sm">
                                            <?php if (isset($_POST["submit"]) && !isset($errorDato)) { ?>
                                                <p class="titulo-formulario">Resultado</p>
                                                <p>Sexo: <?= $sexo ?></p>
                                                <p>Altura: <?= $altura ?></p>
                                                <p>Peso: <?= $peso ?></p>
                                                <p>Edad: <?= $edad ?></p>
                                                <p>Metabolismo Basal: <?= number_format($mBasal, 3) ?> kcal/dia</p>
                                                <p>IMC: <?= number_format($imc, 3) ?> kg/m^2</p>
                                                <p>Clasificaci??n segun IMC: <?= $clasificacion ?> </p>

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
        </div>
    </main>

    <footer class="text-muted">
        <div class="container text-center">

            <p>Antonio Jes??s Prieto Arjona &copy; </p>
            <p>pryet2@gmail.com </p>
        </div>
    </footer>

</body>

</html>