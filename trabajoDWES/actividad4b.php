<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Actividad 4B</title>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link href="form-validation.css" rel="stylesheet">
</head>

<body class="bg-light">

    <!-- Si le has dado a submit -->
    <?php
   
    if (isset($_POST["submit"])) {
        $radio = trim($_POST["radio"]);
        if(is_numeric($radio)){
            $area=calculaArea($radio);
            $circunferencia=calculaCircunferencia($radio);
        }else{
            $errorDato="El dato introducido es incorrecto";
        }
       
    }


    function calculaArea($radio){
        return pi()*pow($radio,2);
    }
    function calculaCircunferencia($radio){
        return 2*pi()*$radio;
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

    <main role="main">

        <section class="jumbotron text-center">
            <div class="container">
                <h1 class="jumbotron-heading">Actividad 4B</h1>
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
                                            <input type="text" name="radio" id="radio" placeholder="radio">
                                        </div>
                                        <div class="col-sm">
                                            <?php if (isset($_POST["submit"])&&!isset($errorDato)) { ?>
                                                <h4>Resultado</h4>
                                                <p>Radio: <?= $radio ?></p>
                                                <p>Area: <?= number_format($area,3) ?> </p>
                                                <p>Circunferencia: <?= number_format($circunferencia,3) ?> </p>
                                                
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