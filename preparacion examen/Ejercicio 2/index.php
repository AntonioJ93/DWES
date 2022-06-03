<?php
declare(strict_types=1);
require_once("./Conexion.php");
require_once("./Idea.php");
require_once("./IdeaService.php");
require_once("./IdeaController.php");

$controlador=new IdeaController();
/////////////////////////////////////////////////////
//      RUTAS
/////////////////////////////////////////////////////

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['punto'])&& !isset($_GET['punto'])) {    
    // Crear idea
    //  POST http://localhost/ideas/index.php 
    // Insertar en la BBDD
    echo $controlador->addIdea($_POST['punto']);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['delete']) && isset($_POST['id'])) {    
    // Eliminar idea
    //  POST http://localhost/ideas/index.php?delete
    // Borrar en la BBDD
    echo $controlador->delIdea($_POST['id']);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['punto'])&& isset($_POST['punto'])&&isset($_POST['id'])) {    
    // Añadir punto
    //  post http://localhost/ideas/index.php?punto
 
    echo $controlador->addPunto($_POST["id"],$_POST["punto"]);
}

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['listar'])) {    
    // Eliminar idea
    //  GET http://localhost/ideas/index.php?listar
 
    echo $controlador->listar();
}

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['ver'])) {    
    // Eliminar idea
    //  GET http://localhost/ideas/index.php?ver=22
 
    echo $controlador->findById($_GET['ver']);
}

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['votar'])) {    
    // Eliminar idea
    //  GET http://localhost/ideas/index.php?votar=22
 
    echo $controlador->addVoto($_GET["votar"]);
}

