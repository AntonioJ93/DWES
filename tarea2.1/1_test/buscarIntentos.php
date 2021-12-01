<?php

$sql="Select min(intento) as intento FROM test_realizados WHERE id_usuario= :idUsuario AND id_test= :idTest";

$sth=$conexion->prepare($sql);
if(!isset($idTest)){
    $id=$test["id_test"];
}else{
    $id=$idTest;
}
$sth->execute(array(":idUsuario"=>$_SESSION['id_usuario'],":idTest"=>$id));

$testRealizado=$sth->fetch();

if($testRealizado["intento"]==null){
    $testRealizado["intento"]=3;
}

?>