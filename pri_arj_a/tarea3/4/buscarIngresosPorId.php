<?php

$sql = 'SELECT cantidad,ingresos.nombre,fecha FROM ingresos JOIN usuario 
ON usuario.id_usuario=ingresos.id_usuario_ingreso
WHERE usuario.id_usuario=:idUsuario';

        $sth = $conexion->prepare($sql);
        $sth->execute(array(":idUsuario"=>$_SESSION["id_usuario"]));
        $ingresos = $sth->fetchAll();

?>