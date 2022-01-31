<?php

$sql="SELECT max(id_pizza) FROM pizza";
$sth=$conexion->prepare($sql);
$sth->execute();
$maxId=$sth->fetch();

$sql2 = "INSERT INTO ingrediente_pizza 
(id_pizza, id_ingrediente ) VALUES (? , ?)";

$sth=$conexion->prepare($sql2);
$sth->execute(array($maxId[0],$idIngrediente));