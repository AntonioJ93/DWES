<?php

$sql="Select * FROM test_realizados WHERE id_usuario= :idUsuario AND id_test= :idTest";

$sth=$conexion->prepare($sql);
$sth->execute(array(":idUsuario"=>$_SESSION['id_usuario'],":idTest"=>$test["id_test"]));

$testRealizado=$sth->fetch();

?>