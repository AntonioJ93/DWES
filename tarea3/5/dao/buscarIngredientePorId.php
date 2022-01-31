<?php

$sql = 'SELECT *
        FROM ingrediente 
        WHERE id_ingrediente= :idIngrediente';

        $sth = $conexion->prepare($sql);
        $sth->execute(array(":idIngrediente"=>$idIngrediente));
        $ingrediente = $sth->fetch();

?>