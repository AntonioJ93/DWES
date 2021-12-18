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
        $respuesta = $_POST[$idPregunta];
        //comprobar si es multiple
        if ($preg["multiple"] == 0) {
            //no es multiple
            if ($respuesta == $opcionesCorrectas[0]["id_opcion"]) {
                array_push($preguntasCorrectas, $idPregunta);
                array_push($respuestasCorrectas, $respuesta);
                // guardar aciertos y fallos
                include "insertarAciertos.php";
            } else {
                array_push($preguntasIncorrectas, $idPregunta);
                array_push($respuestasIncorrectas, $respuesta);
                // guardar aciertos y fallos
                include "insertarFallos.php";
            }
            include "guardarRespuesta.php";
            include "guardarOpcion.php";
        } else {
            include "guardarRespuesta.php";
            
            for ($i=0; $i < count($opcionesCorrectas); $i++) { 
                $arrayId[$i]=$opcionesCorrectas[$i]["id_opcion"];
            }

            if($arrayId==$respuesta){
                //pregunta correcta
                array_push($preguntasCorrectas, $idPregunta);
                array_push($respuestasCorrectas, $respuesta);

                 //guardar aciertos y fallos
                include "insertarAciertos.php";
            }else{
                //pregunta incorrecta
                array_push($preguntasIncorrectas, $idPregunta);
                array_push($respuestasIncorrectas, $respuesta);
                // guardar aciertos y fallos
                include "insertarFallos.php";
            }
  
            unset($arrayId);
            foreach ($respuesta as $resp) {
            
                include "guardarOpcion.php";
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
if ($nota < 0) {
    $nota = 0;
}

echo "nota= " . $nota;


//guardar calificación
include "buscarIntentos.php";
include "insertarCaificacion.php";

//terminar intento
$idTest = $_SESSION["idTest"];
unset($_SESSION["idTest"]);



$_SESSION["preguntasCorrectas"] = $preguntasCorrectas;
$_SESSION["preguntasInorrectas"] = $preguntasIncorrectas;
$_SESSION["respuestasCorrectas"] = $respuestasCorrectas;
$_SESSION["respuestasIncorrectas"] = $respuestasIncorrectas;
$_SESSION["nota"] = $nota;

header("Location: testRealizado.php?idTest=" . $idTest);
