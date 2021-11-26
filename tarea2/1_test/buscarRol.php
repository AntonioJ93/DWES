<?php

$_SESSION["USER"]=false;
$_SESSION["ADMIN"]=false;

$sql = 'SELECT nombre_rol  FROM usuario JOIN usuario_rol 
        ON usuario.id_usuario=usuario_rol.id_usuario JOIN rol 
        ON rol.id_rol=usuario_rol.id_rol
        WHERE usuario.id_usuario= :id_usuario';

$sth = $conexion->prepare($sql);

$sth->execute(array(':id_usuario' => $_SESSION["id_usuario"]));
$roles = $sth->fetchAll();
foreach($roles as &$r){
    
    if($r["nombre_rol"]=="USER"){
        $_SESSION["USER"]=true;
    }
    if($r["nombre_rol"]=="ADMIN"){
        $_SESSION["ADMIN"]=true;
    }
}

?>
