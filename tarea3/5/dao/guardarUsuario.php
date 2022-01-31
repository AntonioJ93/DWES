<?php


$sql2 = "INSERT INTO usuario 
(nombre,correo,pass,activo ) VALUES (? , ? , ? , ?)";

$sth=$conexion->prepare($sql2);
$sth->execute(array($nombre,$correo,$pass,true));

//guardar rol

$sql = 'SELECT usuario.id_usuario
        FROM usuario 
        WHERE usuario.correo= :correo';

        $sth = $conexion->prepare($sql);
        $sth->execute(array(":correo"=>$correo));
        $idUsuario = $sth->fetch();

$sql2 = "INSERT INTO usuario_rol
(id_usuario,id_rol) VALUES (? , ?)";

$sth=$conexion->prepare($sql2);
$sth->execute(array($idUsuario[0],$idRol));
