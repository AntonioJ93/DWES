<?php


class Controlador
{
    private TareaServiceImpl $tareaService;

    public function __construct()
    {
        $this->tareaService=new TareaServiceImpl();
    }
    public function mostrar_inicio()
    {   $_REQUEST["tareas"]=$this->tareaService->findAll();
        require_once('Vistas/inicio.php');
    }

    public function mostrar_ver_tarea()
    {
        require_once('Vistas/ver_tarea.php');
    }

    public function addTarea()
    {   $queHacer=$_POST["queHacer"];
        $prioridad=$_POST["prioridad"];
        $fechaCreacion=$_POST["fechaCreacion"];
        $fechaTope=$_POST["fechaTope"];

        //seguir aqui
        require_once('Vistas/ver_tarea.php');
    }


}

?>
