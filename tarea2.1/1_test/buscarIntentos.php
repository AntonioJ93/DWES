<?php

$sql="Select * FROM test_realizados WHERE id_usuario= :idUsuario AND id_test= :idTest";

$sth=$conexion->prepare($sql);
if(!isset($idTest)){
    $id=$test["id_test"];
}else{
    $id=$idTest;
}
$sth->execute(array(":idUsuario"=>$_SESSION['id_usuario'],":idTest"=>$id));

$testRealizado=$sth->fetch();
if(!$testRealizado){
    $testRealizado["intento"]=3;
}
?>