<?php

$sql="Select test_realizados.calificacion, test_realizados.intento 
FROM test_realizados
WHERE id_test= :idTest";

$sql2="Select AVG(test_realizados.calificacion) as Promedio
FROM test_realizados JOIN usuario
ON usuario.id_usuario=test_realizados.id_usuario
WHERE id_test= :idTest;";

$sth=$conexion->prepare($sql);
$sth2=$conexion->prepare($sql2);

$sth->execute(array(":idTest"=>$idTest));
$sth2->execute(array(":idTest"=>$idTest));

$notas=$sth->fetchAll();
$media=$sth2->fetch();

?>