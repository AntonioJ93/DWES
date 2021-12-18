<?php

$sql = 'SELECT *  FROM test';
        $sth = $conexion->prepare($sql);

        $sth->execute();
        $listaTest = $sth->fetchAll();

?>