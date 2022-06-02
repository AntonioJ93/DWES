<?php

require_once("./Conexion.php");
require_once("./Idea.php");
require_once("./IdeaService.php");
require_once("./IdeaController.php");

$controlador=new IdeaController();
/////////////////////////////////////////////////////
//      RUTAS
/////////////////////////////////////////////////////

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['punto'])) {    
    // Crear idea
    //  POST http://localhost/ideas/index.php 
    // Insertar en la BBDD
    $controlador->addIdea($_POST['punto']);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['delete']) && isset($_POST['id'])) {    
    // Eliminar idea
    //  POST http://localhost/ideas/index.php?delete=22
    // Borrar en la BBDD
    echo "id= " . $_POST["id"];
}

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['listar'])) {    
    // Eliminar idea
    //  GET http://localhost/ideas/index.php?listar
 
    echo "listar ";
}

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['ver'])) {    
    // Eliminar idea
    //  GET http://localhost/ideas/index.php?ver=22
 
    echo "ver= " . $_GET["ver"];
}

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['votar'])) {    
    // Eliminar idea
    //  GET http://localhost/ideas/index.php?votar=22
 
    echo "votar= " . $_GET["votar"];
}

