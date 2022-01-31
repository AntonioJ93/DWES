<?php 

$sql="SELECT usuario.id_usuario, usuario.nombre, pedido.id_pedido, 
    pedido.precio, pedido.fecha FROM usuario JOIN pedido
    ON usuario.id_usuario=pedido.id_usuario_pedido
    ORDER BY pedido.fecha DESC";

$sth=$conexion->prepare($sql);
$sth->execute();
$pedidos=$sth->fetchAll();


?>