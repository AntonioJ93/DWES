<?php


class Controlador
{
    private TareaService $tareaService;

    public function __construct()
    {
        $this->tareaService = new TareaServiceImpl();
    }
    public function mostrar_inicio()
    {
        $_REQUEST["tareas"] = $this->tareaService->findAll();
        require_once('Vistas/inicio.php');
    }

    public function mostrar_ver_tarea()
    {
        $prioridades =[];
        array_push($prioridades,Prioridad::Alta->getName(),Prioridad::Media->getName(),Prioridad::Baja->getName());
        $_REQUEST["prioridades"] = $prioridades;
        $titulo=isset($_REQUEST["tarea"])?"Editar Tarea":"Añadir Tarea";
        $_REQUEST["titulo"]=$titulo;
        require_once('Vistas/ver_tarea.php');
    }

    public function addTarea()
    {
        $queHacer = $_GET["queHacer"];
        $prioridad = $_GET["prioridad"];
        $fechaTope = $_GET["fechaTope"];
        switch ($prioridad) {
            case 'Alta':
                $prioridad = Prioridad::Alta;
                break;
            case 'Media':
                $prioridad = Prioridad::Media;
                break;
            case 'Baja':
                $prioridad = Prioridad::Baja;
                break;
        }
        $tarea = new Tarea($queHacer, $prioridad, new DateTime($fechaTope));
        $this->tareaService->addTarea($tarea);
        $_REQUEST["msg"]="Tarea Añadida";
        $this->mostrar_ver_tarea();
    }

    public function delTarea(){
        $indice=$_GET["indice"];
        $this->tareaService->delTarea($indice);
        $this->mostrar_inicio();
    }

    public function editForm(){
        $indice=$_GET["indice"];
        $tarea=$this->tareaService->findTarea($indice);
        $_REQUEST["tarea"]=$tarea;
        $_REQUEST["indice"]=$indice;
        $this->mostrar_ver_tarea();
    }

    public function editTarea(){
        $indice=$_GET["indice"];
        $queHacer = $_GET["queHacer"];
        $prioridad = $_GET["prioridad"];
        $fechaTope = $_GET["fechaTope"];
        switch ($prioridad) {
            case 'Alta':
                $prioridad = Prioridad::Alta;
                break;
            case 'Media':
                $prioridad = Prioridad::Media;
                break;
            case 'Baja':
                $prioridad = Prioridad::Baja;
                break;
        }
        $tarea = new Tarea($queHacer, $prioridad, new DateTime($fechaTope));
        $this->tareaService->updateTarea($indice,$tarea);
        $_REQUEST["msg"]="Tarea Actualizada";
        $this->mostrar_inicio();
    }
}
