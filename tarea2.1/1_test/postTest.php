<?php

include "conexion.php";


session_start();


//test seleccionado
$idTest = $_SESSION["idTest"];

//buscar preguntas del test
include "buscarPreguntas.php";

//recuperamos las opciones marcadas
$respuestasCorrectas = array();
$respuestasIncorrectas = array();
$preguntasCorrectas = array();
$preguntasIncorrectas = array();
foreach ($listaPreguntas as &$preg) {
    if (isset($_POST[$preg["id_pregunta"]])) { //comprobar si ha contestado esa pregunta

        $idPregunta = $preg["id_pregunta"];
        include "buscarOpcionesCorrectas.php";
        $respuesta = $_POST[$preg["id_pregunta"]];
        //comprobar si es multiple
        if ($preg["multiple"] == 0) {
            //no es multiple
            if ($respuesta == $opcionesCorrectas[0]["id_opcion"]) {
                array_push($preguntasCorrectas, $idPregunta);
                array_push($respuestasCorrectas, $respuesta);
            } else {
                array_push($preguntasIncorrectas, $idPregunta);
                array_push($respuestasIncorrectas, $respuesta);
            }
        } else {

            foreach ($respuesta as $resp) {
                $preguntaCorrecta = true;
                foreach ($opcionesCorrectas as $oc) {
                    $aux = false;
                    $oc["id_opcion"];
                    if ($resp== $oc["id_opcion"]) {
                        $aux = true;
                     
                    }
                    $preguntaCorrecta = $preguntaCorrecta && $aux;
                }

                
            }

            if ($preguntaCorrecta) {
                array_push($preguntasCorrectas, $idPregunta);
                array_push($respuestasCorrectas, $respuesta);
            } else {
                array_push($preguntasIncorrectas, $idPregunta);
                array_push($respuestasIncorrectas, $respuesta);
            }
        }
    }
}



////////////////////////////////////////////
// Cáculo de calificación
////////////////////////////////////////////

// se resta 0.3 por pregunta errónea
const RESTA_ERROR = 0.3;

$nota = count($respuestasCorrectas) - (count($respuestasIncorrectas) * RESTA_ERROR);
if($nota<0){
    $nota=0;
}

echo "nota= " . $nota;


//guardar calificación
include "buscarIntentos.php";
include "insertarCaificacion.php";

//terminar intento
$idTest = $_SESSION["idTest"];
unset($_SESSION["idTest"]);

//ver informacion del intento
//pasar idTest
$_SESSION["preguntasCorrectas"] = $preguntasCorrectas;
$_SESSION["preguntasInorrectas"] = $preguntasIncorrectas;
$_SESSION["respuestasCorrectas"] = $respuestasCorrectas;
$_SESSION["respuestasIncorrectas"] = $respuestasIncorrectas;
$_SESSION["nota"] = $nota;

header("Location: testRealizado.php?idTest=" . $idTest);
