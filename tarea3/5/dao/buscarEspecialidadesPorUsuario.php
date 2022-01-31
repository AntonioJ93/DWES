<?php

$sql=" SELECT especialidad.id_especialidad,especialidad.nombre,sum(pedido_especialidad.cantidad) as cantidad
FROM usuario JOIN pedido
ON usuario.id_usuario=pedido.id_usuario_pedido
JOIN pedido_especialidad ON pedido_especialidad.id_pedido=pedido.id_pedido
JOIN especialidad ON especialidad.id_especialidad=pedido_especialidad.id_especialidad
where  usuario.id_usuario=?
group by id_especialidad
order by pedido_especialidad.cantidad desc ";

$sth=$conexion->prepare($sql);
$sth->execute(array($idUsuario));
$especialidades=$sth->fetchAll();
?>