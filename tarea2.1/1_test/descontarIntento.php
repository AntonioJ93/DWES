<?php

const MAX_INTENTOS = 2;


$sql2 = "INSERT into test_realizados (id_test, id_usuario, intento)
            VALUES(?, ?, ?)";
$sth2 = $conexion->prepare($sql2);

$sth2->execute(array($idTest, $_SESSION['id_usuario'], $testRealizado["intento"]-1));
