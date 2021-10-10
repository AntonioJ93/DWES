<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link href="form-validation.css" rel="stylesheet">
    <title>Actividad 3</title>
</head>

<body class="bg-light">

    <?php
    $composCorrectos = true;
    //variables de errores
    $nomError = "Introduce un nombre de entre 5-40 caracteres";
    $correoError = "Introduce un correo válido";
    $experienciaError = "No ha introducido Los datos de su experiencia";
    $formacionError = "No ha introducido los datos de su formación";
    $idiomaError="No ha seleccionado ningun idioma";

    //patrones
    $patronCorreo = "#^(([^<>()\[\]\\.,;:\s@”]+(\.[^<>()\[\]\\.,;:\s@”]+)*)|(“.+”))@((\[[0–9]{1,3}\.[0–9]{1,3}\.[0–9]{1,3}\.[0–9]{1,3}])|(([a-zA-Z\-0–9]+\.)+[a-zA-Z]{2,3}))$#";
    $patronNombre = "#^[ A-Za-zäÄëËïÏöÖüÜáéíóúáéíóúÁÉÍÓÚÂÊÎÔÛâêîôûàèìòùÀÈÌÒÙñÑ]{5,40}+$#";
    $patronConsulta = "#^.{1,250}+$#";

    
    $nombre = trim($_POST["nombre"]);
    $correo = trim($_POST["correo"]);
    $telefono = trim($_POST["telefono"]);
    $web = trim($_POST["web"]);
    $consulta = trim($_POST["comentario"]);

    $valorPorDefectoSelect = "0";

    $empresa = trim($_POST["empresa"]);
    $puesto = trim($_POST["puesto"]);
    $experiencia = trim($_POST["experiencia"]); //0

    $tipoFormacion = trim($_POST["formacion"]); //0
    $nombreFormacion = trim($_POST["nombreFormacion"]);

    $idioma = trim($_POST["idioma"]); //0
    $nivelIdioma = trim($_POST["nivelIdioma"]);



    // Validacion campos no estan vacios

    function validarCampos($nombre, $correo, $experiencia,$empresa,$puesto, $tipoFormacion,$nombreFormacion,$idioma, $valorPorDefectoSelect)
    {
        $nom = $cor = $emp = $form = $idi = false;
        if (!empty($nombre)) {
            $nom = preg_match($GLOBALS["patronNombre"], $nombre);
            $GLOBALS["nomError"] = $nom ? "" : $GLOBALS["nomError"];
        }
        if (!empty($correo)) {
            $cor = preg_match($GLOBALS["patronCorreo"], $correo);
            $GLOBALS["correoError"] = $cor ? "" : $GLOBALS["correoError"];
        }
        if (validarSelect($experiencia, $valorPorDefectoSelect)&&!empty($empresa)&&!empty($puesto)) {
            $GLOBALS["experienciaError"] = "";
            $emp=true;
        }
        if (validarSelect($tipoFormacion, $valorPorDefectoSelect)&&!empty($nombreFormacion)) {
            $GLOBALS["formacionError"] = "";
                $form = true;    
        }
        if (validarSelect($idioma, $valorPorDefectoSelect)) {
            $GLOBALS["idiomaError"] = "";
                $idi = true;
            
        }
        return $nom && $cor && $emp && $form && $idi;
    }

    function validarSelect($campo, $valorPorDefecto)
    {
        return $campo == $valorPorDefecto ? false : true;
    }
    

    $composCorrectos = validarCampos($nombre, $correo, $experiencia,$empresa,$puesto, $tipoFormacion,$nombreFormacion,$idioma, $valorPorDefectoSelect);

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
                <h1 class="jumbotron-heading">Actividad 3</h1>
                <p class="lead text-muted">Tarea 1 Antonio Jesús Prieto Arjona</p>

            </div>
        </section>

        <div class="album py-5 bg-light">
            <div class="container">

                <div class="row">
                    <div class="col-md-6 muestra-datos">
                        <div class="card mb-12 borde">

                            <div class="card-body grid">
                                <h2>Sus datos</h2>
                                <?php if ($composCorrectos) { ?>

                                    <ul>
                                        <li>Nombre y apellidos: <?= $nombre ?></li>
                                        <li>Correo: <?= $correo ?></li>
                                        <li>Teléfono: <?= $telefono ?></li>
                                        <li>Web<?= $web ?></li>

                                    </ul>

                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Empresa</th>
                                                <th>Puesto</th>
                                                <th>Experiencia (años)</th>
                                            </tr>

                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><?= $empresa ?></td>
                                                <td><?= $puesto ?></td>
                                                <td><?= $experiencia ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Tipo de formación</th>
                                                <th>Nombre de formación</th>
                                            </tr>

                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><?= $tipoFormacion ?></td>
                                                <td><?= $nombreFormacion ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Idioma</th>
                                                <th>Nivel</th>
                                            </tr>

                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><?= $idioma ?></td>
                                                <td><?= $nivelIdioma ?></td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <textarea class="form-control" name="resultadoConsulta" id="resultadoConsulta" cols="45" rows="6" readonly><?= $consulta ?>
                                        </textarea>
                                <?php     } else { ?>

                                    <span class=" text-danger "><?= $nomError ?></span>
                                    <span class=" text-danger "><?= $correoError ?></span>
                                    <span class=" text-danger "><?= $experienciaError ?></span>
                                    <span class=" text-danger "><?= $formacionError ?></span>
                                    <span class=" text-danger "><?= $idiomaError ?></span>
                                <?php     } ?>
                                <a href="./actividad3b.html" class="btn btn-success mt-3">Volver</a>
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