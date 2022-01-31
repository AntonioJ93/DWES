<?php

$sql = 'SELECT *  FROM usuario WHERE correo= :correo';

        $sth = $conexion->prepare($sql);
        $sth->execute(array(":correo"=>$correo));
        $usuario = $sth->fetch();

?>