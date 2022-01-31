<?php

$sql = 'SELECT *
        FROM especialidad ';

        $sth = $conexion->prepare($sql);
        $sth->execute();
        $especialidades = $sth->fetchAll();

?>