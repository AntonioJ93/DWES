<?php


$sql2 = "INSERT INTO pizza 
(precio,fecha ) VALUES (? , now())";

$sth=$conexion->prepare($sql2);
$sth->execute(array($precio));

