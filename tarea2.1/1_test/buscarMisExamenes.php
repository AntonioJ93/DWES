<?php

$sql="Select test.descripcion,test_realizados.calificacion,test_realizados.intento 
FROM test_realizados JOIN test
ON test_realizados.id_test=test.id_test
WHERE test_realizados.id_usuario= :idUsuario ";

$sth=$conexion->prepare($sql);

$sth->execute(array(":idUsuario"=>$_SESSION['id_usuario']));

$tests=$sth->fetchAll();

?>