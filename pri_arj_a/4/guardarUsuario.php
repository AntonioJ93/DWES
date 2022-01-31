<?php


$sql2 = "INSERT INTO usuario 
(nombre,correo,pass,activo ) VALUES (? , ? , ? , ?)";

$sth=$conexion->prepare($sql2);
$sth->execute(array($nombre,$correo,$pass,true));


