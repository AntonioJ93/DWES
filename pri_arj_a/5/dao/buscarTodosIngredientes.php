<?php

$sql = 'SELECT *
        FROM ingrediente ';

        $sth = $conexion->prepare($sql);
        $sth->execute();
        $ingredientes = $sth->fetchAll();

?>