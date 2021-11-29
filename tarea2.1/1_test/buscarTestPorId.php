<?php

$sql="SELECT id_test, descripcion FROM test 
    WHERE id_test= :idTest ";

$sth2=$conexion->prepare($sql);

$sth2->execute(array(":idTest"=>$idTest));

$test=$sth2->fetch();

?>