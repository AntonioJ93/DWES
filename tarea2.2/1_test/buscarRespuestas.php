<?php
$sql="SELECT opcion_respondida.id_pregunta_respondida_opcion_respondida, opcion_respondida.opcion_opcion_respondida, opcion.valor
, pregunta_respondida.pregunta_pregunta_respondida
FROM opcion_respondida JOIN opcion ON opcion_opcion_respondida=opcion.id_opcion
JOIN pregunta_respondida ON pregunta_respondida.id_pregunta_respondida=opcion_respondida.id_pregunta_respondida_opcion_respondida
WHERE opcion_respondida.id_pregunta_respondida_opcion_respondida in
(SELECT pregunta_respondida.id_pregunta_respondida
FROM pregunta_respondida 
JOIN test_realizados ON pregunta_respondida.id_test_realizados_pregunta_respondida=test_realizados.id_test_realizados
WHERE test_realizados.id_test_realizados= :testRealizado)";

$sth2=$conexion->prepare($sql);

$sth2->execute(array(":testRealizado"=>$idTest));

$respuestas=$sth2->fetchAll();



?>