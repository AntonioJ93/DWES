<?php
//buscar el test realizado
$sql="SELECT MAX(id_pregunta_respondida) FROM pregunta_respondida";
$sth=$conexion->prepare($sql);
$sth->execute();
$idPreguntaRespondida=$sth->fetch();

$sql2 = "INSERT INTO opcion_respondida 
(id_pregunta_respondida_opcion_respondida,opcion_opcion_respondida ) VALUES (? , ?)";
$opcion;
if(is_array($respuesta)){
    $opcion=$resp;
}else{
    $opcion=$respuesta;
}
$sth=$conexion->prepare($sql2);
$sth->execute(array($idPreguntaRespondida[0],$opcion));