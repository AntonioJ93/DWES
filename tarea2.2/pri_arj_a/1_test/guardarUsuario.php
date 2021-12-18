<?php


$sql2 = "INSERT INTO usuario 
(nombre,correo,pass ) VALUES (? , ? , ?)";

$sth=$conexion->prepare($sql2);
$sth->execute(array($nombre,$correo,$pass));

include "buscarUsuarioPorCorreo.php";

$sql2 = "INSERT INTO usuario_rol 
(id_usuario,id_rol) VALUES ( ? , ?)";

$sth=$conexion->prepare($sql2);
$sth->execute(array($usuario["id_usuario"],3));