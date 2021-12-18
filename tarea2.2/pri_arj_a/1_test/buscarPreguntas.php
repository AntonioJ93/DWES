<?php

$sql="SELECT id_pregunta, texto, multiple FROM pregunta 
    WHERE id_test_pregunta= :idTest ";

$sth=$conexion->prepare($sql);

$sth->execute(array(":idTest"=>$idTest));

$listaPreguntas=$sth->fetchAll();
?>