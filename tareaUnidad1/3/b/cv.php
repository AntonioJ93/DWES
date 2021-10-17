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

    <?php

    $composCorrectos = true;
    //variables de errores
    $nomError = "Introduce un nombre de entre 5-40 caracteres";
    $correoError = "Introduce un correo válido";
    $consultaError = "Introduce un texto menor de 250 caracteres";
    $telefonoError = "El telefono introducido no es válido";
    $webError = "La web introducida no es válida";
    $empresaError = "El nombre de la empresa no es correcto";
    $puestoError = "El nombre del puesto no es correcto";
    $experienciaError = "No ha introducido Los datos de su experiencia";
    $formacionError = "No ha introducido los datos de su formación";
    $nombreFormacionError = "El nombre de la formación no es correcto";
    $idiomaError = "No ha seleccionado ningun idioma";

    //patrones
    $patronCorreo = "#^(([^<>()\[\]\\.,;:\s@”]+(\.[^<>()\[\]\\.,;:\s@”]+)*)|(“.+”))@((\[[0–9]{1,3}\.[0–9]{1,3}\.[0–9]{1,3}\.[0–9]{1,3}])|(([a-zA-Z\-0–9]+\.)+[a-zA-Z]{2,3}))$#";
    $patronNombre = "#^[ A-Za-zäÄëËïÏöÖüÜáéíóúáéíóúÁÉÍÓÚÂÊÎÔÛâêîôûàèìòùÀÈÌÒÙñÑ]{5,40}+$#";
    $patronConsulta = "#^.{1,250}+$#";
    $patronTelefono = "#^[0-9]{9}+$#";
    $patronWeb = "`\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|](\.)[a-z]{2}`i";
    $patronGenerico = "#^[ A-Za-zäÄëËïÏöÖüÜáéíóúáéíóúÁÉÍÓÚÂÊÎÔÛâêîôûàèìòùÀÈÌÒÙñÑ0-9]{1,60}+$#";


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



    // Validacion campos
    function validarCampos($nombre, $correo, $consulta, $telefono, $web, $experiencia, $empresa, $puesto, $tipoFormacion, $nombreFormacion, $idioma, $valorPorDefectoSelect)
    {
        $nom = $cor = $emp = $form = $idi = $exp = $nform = false; //requeridos
        $tlf = $url = $con = true; //no requeridos
        if (!empty($nombre)) {
            $nom = preg_match($GLOBALS["patronNombre"], $nombre);
            $GLOBALS["nomError"] = $nom ? "" : $GLOBALS["nomError"];
        }
        if (!empty($correo)) {
            $cor = preg_match($GLOBALS["patronCorreo"], $correo);
            $GLOBALS["correoError"] = $cor ? "" : $GLOBALS["correoError"];
        }
        if (!empty($consulta)) {
            $con = preg_match($GLOBALS["patronConsulta"], $consulta);
            $GLOBALS["consultaError"] = $con ? "" : $GLOBALS["consultaError"];
        } else {
            $GLOBALS["consultaError"] = "";
        }
        if (!empty($telefono)) {
            $tlf = preg_match($GLOBALS["patronTelefono"], $telefono);
            $GLOBALS["telefonoError"] = $tlf ? "" : $GLOBALS["telefonoError"];
        } else {
            $GLOBALS["telefonoError"] = "";
        }
        if (!empty($web)) {
            $url = preg_match($GLOBALS["patronWeb"], $web);
            $GLOBALS["webError"] = $url ? "" : $GLOBALS["webError"];
        } else {
            $GLOBALS["webError"] = "";
        }
        if (validarSelect($experiencia, $valorPorDefectoSelect)) {
            $GLOBALS["experienciaError"] = "";
            $exp = true;
        }
        if (validarGenerico($empresa)) {
            $GLOBALS["empresaError"] = "";
            $emp = true;
        }
        if (validarGenerico($puesto)) {
            $GLOBALS["puestoError"] = "";
            $puest = true;
        }
        if (validarSelect($tipoFormacion, $valorPorDefectoSelect)) {
            $GLOBALS["formacionError"] = "";
            $form = true;
        }
        if (validarGenerico($nombreFormacion)) {
            $GLOBALS["nombreFormacionError"] = "";
            $nForm = true;
        }
        if (validarSelect($idioma, $valorPorDefectoSelect)) {
            $GLOBALS["idiomaError"] = "";
            $idi = true;
        }
        return $nom && $cor && $emp && $form && $idi && $tlf && $con && $url && $puest && $exp && $nForm;
    }

    function validarGenerico($campo)
    {
        if (!empty($campo)) {
            return preg_match($GLOBALS["patronGenerico"], $campo);
        }
        return false;
    }

    function validarSelect($campo, $valorPorDefecto)
    {
        return $campo == $valorPorDefecto ? false : true;
    }

    $composCorrectos = validarCampos($nombre, $correo, $consulta, $telefono, $web, $experiencia, $empresa, $puesto, $tipoFormacion, $nombreFormacion, $idioma, $valorPorDefectoSelect);

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
                                        <li>Web: <?= $web ?></li>

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
                                    <span class=" text-danger "><?= $consultaError ?></span>
                                    <span class=" text-danger "><?= $telefonoError ?></span>
                                    <span class=" text-danger "><?= $webError ?></span>
                                    <span class=" text-danger "><?= $experienciaError ?></span>
                                    <span class=" text-danger "><?= $formacionError ?></span>
                                    <span class=" text-danger "><?= $idiomaError ?></span>
                                    <span class=" text-danger "><?= $puestoError ?></span>
                                    <span class=" text-danger "><?= $empresaError ?></span>
                                    <span class=" text-danger "><?= $nombreFormacionError ?></span>
                                <?php     } ?>
                                <a href="../../3/b/actividad3b.html" class="btn btn-success mt-3">Volver</a>
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