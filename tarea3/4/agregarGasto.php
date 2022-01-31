<?php

$sql = "INSERT INTO gastos (cantidad,id_usuario_gasto,nombre,fecha)
VALUES(?,?,?,?)";

$sth=$conexion->prepare($sql);
$sth->execute($gasto);

