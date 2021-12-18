<?php

$sql="SELECT usuario.nombre, test.descripcion, test_realizados.id_test, test_realizados.intento, test_realizados.calificacion,
pregunta.id_pregunta,pregunta.texto,pregunta.multiple
FROM test_realizados JOIN usuario ON usuario.id_usuario=test_realizados.id_usuario
JOIN test ON test.id_test=test_realizados.id_test
JOIN pregunta on test.id_test=pregunta.id_test_pregunta 
WHERE test_realizados.id_test_realizados= :idTestRealizado";


$sth=$conexion->prepare($sql);
    
    $sth->execute(array(":idTestRealizado"=>$idTest ));

$preguntas=$sth->fetchAll();


?>