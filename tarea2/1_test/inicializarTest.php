<?php
const MAX_INTENTOS=3;

$sql="Select * FROM test_realizados WHERE id_usuario= :idUsuario AND id_test= :idTest";

$sth=$conexion->prepare($sql);

$sql2="INSERT into test_realizados (id_test, id_usuario, intento)
            VALUES(?, ?, ?)";
$sth2=$conexion->prepare($sql2);

foreach ($listaTest as &$t) {
    $sth->execute(array(":idUsuario"=>$_SESSION['id_usuario'],":idTest"=>$t["id_test"]));
    $testHecho=$sth->fetch();


    if(!$testHecho){
        
        $sth2->execute(array($t["id_test"] ,$_SESSION['id_usuario'] ,MAX_INTENTOS ));
    }
}
