<?php

/*
    conexión
*/

$cadena="mysql:dbname=world;host=localhost:3306";
try{
    $con= new PDO($cadena,"root","Fullstack.2021");

    /*
    update con transacción
    */
    $con->beginTransaction();
    $sql="UPDATE city SET name=?, district=? WHERE ID=?";
    $stm=$con->prepare($sql);
    $v1="a";
    $v2="b";
    $v3=1;
    $stm->bindValue(1,$v1);
    $stm->bindValue(2,$v2);
    $stm->bindValue(3,$v3);
    $stm->execute();
    //echo "resultado e exec: " . $con->exec($sql) . "<br>";
    echo "actualizado: " . $stm->rowCount() . "fila(s) actualizada(s) <br>";
    /*
    select
    */
    $sql2="Select * From city Where ID=?";
    $stm2=$con->prepare($sql2);
    $stm2->bindValue(1,1);
    $stm2->execute();
    $resultado=$stm2->fetch();
    echo "resultado: " . implode(',',$resultado) . "<br>";

    $v1="r";
    $v2="j";
    $stm->execute(array($v1,$v2,$v3));
    echo "actualizado: " . $stm->rowCount() . "fila(s) actualizada(s) <br>";
    $stm2->execute();
    $resultado=$stm2->fetch();
    echo "resultado: " . json_encode($resultado) . "<br>";
    echo "ultimob id: " . $con->lastInsertId() . "<br>";

    $con->commit();
}catch(PDOException $e){
    $con->rollBack();
    echo "Se ha producido un error: " . $e->getMessage();  
}finally{
    if (isset($con)) {
        unset($con);
    }
}

/*
mostrar resultado
*/
?>

<table>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Código de país</th>
        <th>Distrito</th>
        <th>Población</th>
    </tr>

    <tr>
        <th><?= $resultado["ID"]?></th>
        <th><?= $resultado["Name"]?></th>
        <th><?= $resultado["CountryCode"]?></th>
        <th><?= $resultado["District"]?></th>
        <th><?= $resultado["Population"]?></th>
    </tr>
    <h3>buscar todos</h3>

    <?php   ?>
    
</table>


