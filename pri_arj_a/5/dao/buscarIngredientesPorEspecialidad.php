<?php

$sql = 'SELECT ingrediente.nombre
        FROM ingrediente JOIN especialidad_ingrediente
        ON ingrediente.id_ingrediente=especialidad_ingrediente.id_ingrediente
        JOIN especialidad
        ON especialidad.id_especialidad=especialidad_ingrediente.id_especialidad
        WHERE especialidad.id_especialidad= :idEspecialidad'
        ;

        $sth = $conexion->prepare($sql);
        $sth->execute(array(":idEspecialidad"=>$idEspecialidad));
        $ingredientes = $sth->fetchAll();

?>