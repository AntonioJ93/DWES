<?php

include "conexion.php";


session_start();


//test seleccionado
$idTest = $_SESSION["idTest"];

//buscar preguntas del test
include "buscarPreguntas.php";

//recuperamos las opciones marcadas
$respuestas = array();
foreach ($listaPreguntas as &$preg) {
    if (isset($_POST[$preg["id_pregunta"]])) {
        array_push($respuestas, $_POST[$preg["id_pregunta"]]);
    }
}



////////////////////////////////////////////
// mostrar calificación
////////////////////////////////////////////

include "buscarOpcionesCorrectas.php";

// Calcular calificación
$preguntasCorrectas = array();
$preguntasIncorrectas = array();




for ($i = 0; $i < count($opcionesCorrectas); $i++) {
// hay que buscar pregunta a pregunta en la bbdd las correctas y las incorrectas
   if (in_array($opcionesCorrectas[$i]["id_opcion"], $respuestas)) {
        array_push($preguntasCorrectas, $opcionesCorrectas[$i]["id_pregunta"]);
    }else{
        array_push($preguntasIncorrectas, $opcionesCorrectas[$i]["id_pregunta"]);
    }
    
    //var_dump($preguntasNoContestadas);

}


var_dump($preguntasCorrectas);
echo "================";
var_dump($preguntasIncorrectas);





//foreach ($opcionesCorrectas as $op) {
    //foreach ($respuestas as $resp) {


        /*        if(is_array($respuesta)){
                foreach ($respuesta as $key ) {
                    if($key==$opcion["id_opcion"]){
                        $respuestaCheck=$opcion["id_opcion"];
                    }
                }
            
        }*/
        //var_dump($op);
        //var_dump(in_array($op["id_opcion"],$respuestas));
     /*   if ($op["id_opcion"] == null) {
            array_push($preguntasNoContestadas, $op["id_pregunta"]);
        } elseif ( in_array($op["id_opcion"],$respuestas)) {
            var_dump($respuestas[$op["id_pregunta"]]);
            array_push($preguntasCorrectas, $op["id_pregunta"]);
        } else {
            array_push($preguntasIncorrectas, $op["id_pregunta"]);
        }
    }*/
//}
//var_dump($preguntasNoContestadas);
//var_dump($preguntasCorrectas);
//var_dump($preguntasIncorrectas);
//var_dump($preguntasCorrectas);
//var_dump($preguntasNoContestadas);
