<?php

$sql="Select test_realizados.calificacion, test_realizados.intento,test_realizados.id_test_realizados
FROM test_realizados
WHERE id_test= :idTest AND id_usuario= :idUsuario";

$sql2="Select AVG(test_realizados.calificacion) as Promedio
FROM test_realizados JOIN usuario
ON usuario.id_usuario=test_realizados.id_usuario
WHERE id_test= :idTest AND test_realizados.id_usuario= :idUsuario";

$sth=$conexion->prepare($sql);
$sth2=$conexion->prepare($sql2);

$sth->execute(array(":idTest"=>$idTest,"idUsuario"=> $test["id_usuario"]));
$sth2->execute(array(":idTest"=>$idTest,"idUsuario"=> $test["id_usuario"]));

$notas=$sth->fetchAll();
$media=$sth2->fetch();

?>