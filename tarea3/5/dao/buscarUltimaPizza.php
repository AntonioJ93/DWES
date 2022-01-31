<?php

$sql="SELECT max(id_pizza)FROM pizza";
$sth=$conexion->prepare($sql);
$sth->execute();
$maxId=$sth->fetch();

$sql="SELECT id_pizza,precio FROM pizza WHERE id_pizza= ?";
$sth=$conexion->prepare($sql);
$sth->execute(array($maxId[0]));
$ultimaPizza=$sth->fetch();

?>