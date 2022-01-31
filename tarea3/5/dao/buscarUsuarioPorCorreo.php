<?php

$sql = 'SELECT usuario.id_usuario, usuario.correo,usuario.pass,usuario.nombre ,rol.nombre 
        FROM usuario JOIN usuario_rol
        ON usuario.id_usuario=usuario_rol.id_usuario
        JOIN rol 
        ON rol.id_rol=usuario_rol.id_rol 
        WHERE usuario.correo= :correo';

        $sth = $conexion->prepare($sql);
        $sth->execute(array(":correo"=>$correo));
        $usuario = $sth->fetch();

?>