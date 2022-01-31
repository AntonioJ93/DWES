<?php


$sql2 = "INSERT INTO pedido 
(id_usuario_pedido,precio,fecha ) VALUES (? , ? , now())";

$sth=$conexion->prepare($sql2);
$sth->execute(array($idUsuario,$total));

