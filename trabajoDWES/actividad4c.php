<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Actividad 4C</title>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link href="form-validation.css" rel="stylesheet">
</head>

<body class="bg-light">

    <!-- Si le has dado a submit -->
    <?php

    if (isset($_POST["submit"])) {
        $edad = trim($_POST["edad"]);
        $sexo = trim($_POST["sexo"]);
        $altura = trim($_POST["altura"]);
        $peso = trim($_POST["peso"]);
        if (is_numeric($edad) && is_numeric($peso) && is_numeric($altura) && ($sexo == "h" || $sexo == "m")) {

            $imc = calcularIMC($peso, $altura/100);
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
            return 10*$peso+6.25*$altura-5*$edad+5;
        } else {
            return 10*$peso+6.25*$altura-5*$edad-161;
        }
      
    }
    ?>




    <header>

        <div class="navbar navbar-dark bg-dark box-shadow">
            <div class="container d-flex justify-content-between">
                <a href="./index.html" class="navbar-brand d-flex align-items-center">

                    <strong>Inicio</strong>
                </a>

            </div>
        </div>
    </header>

    <main>

        <section class="jumbotron text-center">
            <div class="container">
                <h1 class="jumbotron-heading">Actividad 4C</h1>
                <p class="lead text-muted">Tarea 1 Antonio Jesús Prieto Arjona</p>

            </div>
        </section>

        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card mb-4 borde">

                            <div class="card-body">
                                <h2>Cáculo del área y circunferencia</h2>
                                <p>Intrudzca el radio</p>
                                <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="container">
                                    <div class="row">
                                        <div class="col-sm">
                                            <p>Sexo</p>
                                            <div class="form-check">
                                                <label class="form-check-label" for="h">H</label>
                                                <input type="radio" name="sexo" id="h" value="h" class="form-check-input" checked />
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label" for="m">M</label>
                                                <input type="radio" name="sexo" id="m" value="m" class="form-check-input" />
                                            </div>
                                            <input type="number" name="edad" id="edad" placeholder="Edad (años)">
                                            <input type="text" name="peso" id="peso" placeholder="Peso (kg)">
                                            <input type="text" name="altura" id="altura" placeholder="Altura (cm)">
                                        </div>
                                        <div class="col-sm">
                                            <?php if (isset($_POST["submit"]) && !isset($errorDato)) { ?>
                                                <h4>Resultado</h4>
                                                <p>Sexo: <?= $sexo ?></p>
                                                <p>Altura: <?= $altura ?></p>
                                                <p>Peso: <?= $peso ?></p>
                                                <p>Edad: <?= $edad ?></p>
                                                <p>Metabolismo Basal: <?= number_format($mBasal, 3) ?> kcal/dia</p>
                                                <p>IMC: <?= number_format($imc, 3) ?> kg/m^2</p>
                                                <p>Clasificación segun IMC: <?= $clasificacion ?> </p>

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

            <p>Antonio Jesús Prieto Arjona &copy; </p>
            <p>pryet2@gmail.com </p>
        </div>
    </footer>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

</body>

</html>