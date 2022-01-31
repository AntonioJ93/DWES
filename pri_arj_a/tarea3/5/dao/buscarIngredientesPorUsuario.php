<?php

$sql=" SELECT ingrediente.id_ingrediente,ingrediente.nombre, count(ingrediente.id_ingrediente) as consumo FROM usuario 
JOIN pedido ON usuario.id_usuario=pedido.id_usuario_pedido
JOIN pedido_especialidad ON pedido_especialidad.id_pedido=pedido.id_pedido
JOIN especialidad ON especialidad.id_especialidad=pedido_especialidad.id_especialidad
JOIN especialidad_ingrediente ON especialidad_ingrediente.id_especialidad=especialidad.id_especialidad
JOIN ingrediente ON ingrediente.id_ingrediente=especialidad_ingrediente.id_ingrediente
JOIN ingrediente_pizza ON ingrediente.id_ingrediente=ingrediente_pizza.id_ingrediente
JOIN pizza ON pizza.id_pizza=ingrediente_pizza.id_pizza
WHERE usuario.id_usuario= ?
group by ingrediente.id_ingrediente
order by consumo desc;";

$sth=$conexion->prepare($sql);
$sth->execute(array($idUsuario));
$ingredientes=$sth->fetchAll();
?>