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
        $prioridades = [];
        array_push($prioridades, Prioridad::Alta->getName(), Prioridad::Media->getName(), Prioridad::Baja->getName());
        $_REQUEST["prioridades"] = $prioridades;
        $titulo = isset($_REQUEST["tarea"]) ? "Editar Tarea" : "Añadir Tarea";
        $_REQUEST["titulo"] = $titulo;
        require_once('Vistas/ver_tarea.php');
    }

    public function addTarea()
    {
        try{
            $tarea =  $tarea = $this->recogerDatos();
        }catch(Exception){
            $this->mostrar_ver_tarea();
            return;
        }
       
        $this->tareaService->addTarea($tarea);
        $_REQUEST["msg"] = "Tarea Añadida";
        $this->mostrar_ver_tarea();
    }

    public function delTarea()
    {
        $indice = $_GET["indice"];
        $this->tareaService->delTarea($indice);
        $this->mostrar_inicio();
    }

    public function editForm()
    {
        $indice = $_GET["indice"];
        $tarea = $this->tareaService->findTarea($indice);
        $_REQUEST["tarea"] = $tarea;
        $_REQUEST["indice"] = $indice;
        $this->mostrar_ver_tarea();
    }

    public function editTarea()
    {
        $indice = $_GET["indice"];
        try{
            $tarea =  $tarea = $this->recogerDatos();
        }catch(Exception){
            $this->editForm();
            return;
        }
        $this->tareaService->updateTarea($indice, $tarea);
        $_REQUEST["msg"] = "Tarea Actualizada";
        $this->mostrar_inicio();
    }

    private function recogerDatos(): Tarea
    {
        $queHacer = trim($_GET["queHacer"]);
        $prioridad = trim($_GET["prioridad"]);
        $fechaTope = trim($_GET["fechaTope"]);
        if($fechaTope=="")
        $fechaTope="0000-01-01";
        if(!$this->validarDatos($queHacer,$prioridad))
        throw new Exception("Datos inválidos");
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
        return new Tarea($queHacer, $prioridad, new DateTime($fechaTope));
    }

    private function validarDatos($queHacer, $prioridad): bool
    {
        $prioridadValido = $queHacerValido = true;

        if (empty($queHacer)) {
            $queHacerValido = false;
            $_REQUEST["queHacerRequerido"] = "El campo Que Hacer es requerido";
        }
        if (empty($prioridad)) {
            $prioridadValido = false;
            $_REQUEST["prioridadRequerido"] = "El campo Prioridad es requerido";
        }
        return $prioridadValido && $queHacerValido;
    }
}
