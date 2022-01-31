<?php 

$sql="SELECT id_usuario,nombre, correo,fecha_alta FROM usuario WHERE id_usuario= ? ";

$sth=$conexion->prepare($sql);
$sth->execute(array($idUsuario));
$usuario=$sth->fetch();


?>