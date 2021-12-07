<?php

$sql="SELECT pregunta.id_pregunta, sum(pregunta.n_aciertos) as Total_Aciertos,sum(pregunta.n_fallos) as Total_Fallos, 
AVG(pregunta.n_aciertos) as Media_Aciertos, AVG(pregunta.n_fallos) as Media_Fallos,
pregunta.texto
FROM
pregunta JOIN test_realizados ON pregunta.id_test_pregunta=test_realizados.id_test

GROUP BY pregunta.id_pregunta
ORDER BY pregunta.id_pregunta";


$sth=$conexion->prepare($sql);


$sth->execute();


$estadisticas=$sth->fetchAll();


?>