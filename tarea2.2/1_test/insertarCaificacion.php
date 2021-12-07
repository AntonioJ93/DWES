<?php


$sql2 = "UPDATE test_realizados SET calificacion= ?
        WHERE id_test= ? AND id_usuario= ? AND intento= ?";

$sth2 = $conexion->prepare($sql2);

$sth2->execute(array($nota, $_SESSION["idTest"] ,$_SESSION['id_usuario'], $testRealizado["intento"]));