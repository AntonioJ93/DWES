<?php

$sql = "SELECT n_aciertos,n_fallos FROM pregunta
WHERE id_pregunta= :idPregunta";

$sql2 = "UPDATE pregunta SET n_fallos= ?
        WHERE id_pregunta= ?";

$sth=$conexion->prepare($sql);
$sth->execute(array(":idPregunta"=>$idPregunta));

$pregunta=$sth->fetch();

$sth=$conexion->prepare($sql2);
$sth->execute(array($pregunta["n_fallos"]+1,$idPregunta));


