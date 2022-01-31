<?php

$sql = 'SELECT cantidad,gastos.nombre,fecha FROM gastos JOIN usuario 
ON usuario.id_usuario=gastos.id_usuario_gasto
WHERE usuario.id_usuario=:idUsuario';

        $sth = $conexion->prepare($sql);
        $sth->execute(array(":idUsuario"=>$_SESSION["id_usuario"]));
        $gastos = $sth->fetchAll();

?>