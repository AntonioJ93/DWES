<?php 


$user="root";
$pass="1234";
$bd="ud3_balance";
$host="localhost:3306";

$con=new PDO("mysql:host=$host;dbname=$bd",$user,$pass);


$sql2="insert into gastos (cantidad,nombre,id_usuario_gasto,fecha)
    values(?,?,?,?)";
 $stm=$con->prepare($sql2);
$stm->execute(array(99,"gasto99",4,"2022-04-22"));

$ultimoId=$con->lastInsertId();




$sql="Select * from gastos where id_gasto=?";

$stm=$con->prepare($sql);
$id=3;
$stm->execute(array($ultimoId));
$resultado=$stm->fetch();
$numFilas=$stm->rowCount();


echo "resultado= ".json_encode($resultado)." <br>";

echo "nFilas= ".$numFilas."<br>";
echo "ultimoId= ".$ultimoId."<br>";



?>