<?php



$sql="SELECT pregunta.id_pregunta, opcion.id_opcion, opcion.valor 
    FROM pregunta JOIN opcion ON pregunta.id_pregunta=opcion.id_pregunta_opcion
    WHERE id_pregunta= :idPregunta AND valor=1";

$sth=$conexion->prepare($sql);

$sth->execute(array(":idPregunta"=>$$preg["id_pregunta"]));

$opcionesCorrectas=$sth->fetchAll();


?>