<?php

include "conexion.php";


session_start();
if (!isset($_SESSION["id_usuario"])) {
    // si no hay usuario
    header("Location: actividad4.php");
} else {

    //buscar ingresos
    $totalIngresos = 0;
    include "buscarIngresosPorId.php";
    foreach ($ingresos as $ingreso) {
        $totalIngresos += $ingreso["cantidad"];
    }

    //buscar gastos
    $totalGastos = 0;
    include "buscarGastosPorId.php";
    foreach ($gastos as $gasto) {
        $totalGastos += $gasto["cantidad"];
    }


    //balance

    $balance = $totalIngresos - $totalGastos;
}

require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();

$css = file_get_contents("./css/pdf.css");

$mpdf->WriteHTML($css, \Mpdf\HTMLParserMode::HEADER_CSS);

$html = '


<body class="d-flex flex-column h-100 ">

    <main class="flex-shrink-0">

        <section class="jumbotron  bg-white py-3">
            <div class="container">
               
                <div class="row grid">

                    <table class="tabla-balance">
                    
                        <tr>
                            <th class="titulo" colspan="2">Balance</th>
                        </tr>
                        <tr>
                            <th class="ingresos" >
                            <div class="col-md-6 ingresos">
                                <div class="row div-tabla">
    
                                <table class="table">
    
                                    <thead class="thead-dark">
                                    <tr class="text-center cabecera2">
                                        <th colspan="3">Ingresos</th>
                                        
                                    </tr>
                                        <tr class="text-center cabecera3">
                                            <th>Nombre Ingreso</th>
                                            <th>Cantidad</th>
                                            <th>Fecha</th>
                                        </tr>
    
                                    </thead>
                                    <tbody>';

if (isset($ingresos)) {
    foreach ($ingresos as $ingreso) {


        $html .= '<tr>
    
                                                    <td>' . $ingreso["nombre"] . '</td>
                                                    <td>' . $ingreso["cantidad"] . '</td>
                                                    <td>' . $ingreso["fecha"] . '</td>
                                                </tr>
                                                ';
    }
}

$html .= '
                                    </tbody>
    
                                </table>
                            </div>
                            <div class="row py-3">
                                <div class="col">
                                    <p><b>Total: ' . $totalIngresos . '</b></p>
                                </div>
    
                            </div>
    
                            <div class="row py-5">
                                
                                <p class="fw-bold">Balance: ' . $balance . '</p>
                            </div>
                        </div>
                        </th>
                        <th>
                        <div class="col-md-6 gastos">
                        <div class="row div-tabla">
                            
                            <table class="table">

                                <thead class="thead-dark">
                                <tr class="text-center cabecera2">
                                    <th colspan="3">Gastos</th>
                                    
                                </tr>
                                    <tr class="text-center cabecera3">
                                        <th>Nombre Gasto</th>
                                        <th>Cantidad</th>
                                        <th>Fecha</th>
                                    </tr>

                                </thead>
                                <tbody>';

if (isset($gastos)) {


    foreach ($gastos as $gasto) {


        $html .= '   <tr>

                                                <td>' . $gasto["nombre"] . '</td>
                                                <td>' . $gasto["cantidad"] . '</td>
                                                <td>' . $gasto["fecha"] . '</td>
                                            </tr>';
    }
}

$html .= '
                                </tbody>

                            </table>
                        </div>

                        <div class="row py-3">
                            <div class="col">
                                <p><b>Total: ' . $totalGastos . '</b></p>
                            </div>

                        </div>

                    </div>
                        </th>
                    </tr>
                    
                    </table>
                    
                    
                </div>
        </section>

    </main>

    <footer class="text-muted mt-auto bg-white py-3">
        <div class="container text-center">

            <p>Antonio Jesús Prieto Arjona &copy; </p>
            <p>pryet2@gmail.com </p>
        </div>
    </footer>


</body>';












$mpdf->WriteHTML($html, \Mpdf\HTMLParserMode::HTML_BODY);


$mpdf->Output();

































?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Balance</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="./css/pdf.css" rel="stylesheet">
</head>

<body>

    <main>
        <h1 class="cabecera1 titulo">Balance</h1>
        <table class="ingresos">
            <thead>

                <tr class="cabecera2">
                    <th colspan="3">INGRESOS</th>
                </tr>
                <tr class="cabecera3">
                    <th>Fecha</th>
                    <th>Descripción</th>
                    <th>Cantidad</th>

                </tr>
            </thead>
            <tbody>

                <?php
                if (isset($ingresos)) {
                    foreach ($ingresos as $ingreso) {

                ?>

                        <tr>
                            <td class="right"><?= $ingreso["fecha"] ?></td>
                            <td><?= $ingreso["nombre"] ?></td>
                            <td class="right"><?= $ingreso["cantidad"] ?></td>

                        </tr>

                <?php }
                }
                ?>


                <tr>
                    <td colspan="2" class="right title">Total ingresos</td>
                    <td class="right">a</td>

                </tr>

            </tbody>
        </table>
        <table class="gastos">
            <thead>

                <tr class="cabecera2">
                    <th colspan="3">GASTOS</th>
                </tr>
                <tr class="cabecera3">
                    <th>Fecha</th>
                    <th>Descripción</th>
                    <th>Cantidad</th>
                </tr>
            </thead>
            <tbody>

                <?php
                if (isset($gastos)) {
                    foreach ($gastos as $gasto) {

                ?>

                        <tr>

                            <td class="right"><?= $gasto["fecha"] ?></td>
                            <td><?= $gasto["nombre"] ?></td>
                            <td class="right"><?= $gasto["cantidad"] ?></td>

                        </tr>

                <?php }
                }
                ?>


                <tr>
                    <td colspan="2" class="right title">Total gastos</td>
                    <td class="right">a</td>

                </tr>
            </tbody>
        </table>

        <table class="balance">
            <tr>
                <th colspan="2" class="right title">Balance:</th>
                <th class="right"><?= $balance ?></th>
            </tr>
        </table>

    </main>


</body>

</html>