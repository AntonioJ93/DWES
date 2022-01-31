<?php

$sql = "INSERT INTO ingresos (cantidad,id_usuario_ingreso,nombre,fecha)
VALUES(?,?,?,?)";

$sth=$conexion->prepare($sql);
$sth->execute($ingreso);


