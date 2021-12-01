<?php



$sql="SELECT pregunta.id_pregunta , opcion.id_opcion , opcion.valor 
    FROM pregunta JOIN opcion ON pregunta.id_pregunta=opcion.id_pregunta_opcion
    JOIN test ON test.id_test=pregunta.id_test_pregunta 
    WHERE id_test_pregunta= :idTest AND id_pregunta= :idPregunta AND valor=1";

$sth=$conexion->prepare($sql);

$sth->execute(array(":idTest"=>$idTest,":idPregunta"=>$idPregunta));

$opcionesCorrectas=$sth->fetchAll();


?>