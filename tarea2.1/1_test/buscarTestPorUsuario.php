<?php

$sql="SELECT usuario.id_usuario, usuario.nombre, test.descripcion, test_realizados.id_test
FROM `test_realizados`JOIN usuario ON usuario.id_usuario=test_realizados.id_usuario
JOIN test ON test.id_test=test_realizados.id_test
GROUP BY test_realizados.id_test";

$sth=$conexion->prepare($sql);

$sth->execute();

$tests=$sth->fetchAll();

?>