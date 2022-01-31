<?php

$sql = 'SELECT *
        FROM especialidad WHERE id_especialidad = :idEspecialidad';

        $sth = $conexion->prepare($sql);
        $sth->execute(array(":idEspecialidad"=>$idEspecialidad));
        $especialidad = $sth->fetch();

?>