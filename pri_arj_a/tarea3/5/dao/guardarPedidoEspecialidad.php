<?php

$sql="SELECT max(id_pedido) FROM pedido";
$sth=$conexion->prepare($sql);
$sth->execute();
$maxId=$sth->fetch();


$sql2 = "INSERT INTO pedido_especialidad
(id_pedido,id_especialidad,cantidad,precio,fecha ) VALUES (? , ? , ? , ? , now())";

$sth=$conexion->prepare($sql2);
$sth->execute(array($maxId[0],$idEspecialidad,$cantidad,$precio));
