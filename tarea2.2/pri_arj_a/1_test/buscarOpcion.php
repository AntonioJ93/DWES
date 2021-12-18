<?php

$sql="SELECT id_opcion,id_pregunta_opcion, texto, valor FROM opcion 
    WHERE id_pregunta_opcion= :idPregunta ";

$sth2=$conexion->prepare($sql);

$sth2->execute(array(":idPregunta"=>$pregunta["id_pregunta"]));

$listaOpciones=$sth2->fetchAll();
?>