<?php
//buscar el test realizado
$sql="SELECT MAX(id_test_realizados) FROM test_realizados WHERE
                 id_usuario= :idUsuario AND id_test= :idTest";
$sth=$conexion->prepare($sql);
$sth->execute(array(":idUsuario"=>$_SESSION["id_usuario"],":idTest"=>$_SESSION["idTest"]));
$idTestRealizado=$sth->fetch();

$sql2 = "INSERT INTO pregunta_respondida 
(id_test_realizados_pregunta_respondida,pregunta_pregunta_respondida ) VALUES (? , ?)";

$sth=$conexion->prepare($sql2);
$sth->execute(array($idTestRealizado[0],$idPregunta));