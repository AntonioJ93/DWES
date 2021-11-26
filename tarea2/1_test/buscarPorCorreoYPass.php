<?php

$sql = 'SELECT *  FROM usuario WHERE correo= :correo AND pass= :pass';

    $sth = $conexion->prepare($sql);

    $sth->execute(array(':correo' => $correo, ':pass' => $pass));
    $res = $sth->fetch();
?>