<?php
declare(strict_types=1);

include_once __DIR__ ."/Prioridad.php";
class Tarea 
{
    private String $queHacer;
    private Prioridad $prioridad;
    private DateTime  $fechaCreacion;
    private DateTime  $fechaTope;

    public function __construct(String $queHacer, Prioridad $prioridad,
                                DateTime  $fechaTope){                          
        $this->queHacer=$queHacer;
        $this->prioridad=$prioridad;
        $this->fechaTope=$fechaTope;
        $this->fechaCreacion=new DateTime();
    }

    public function getQueHacer():String{
        return $this->queHacer;
    }

    public function getPrioridad():Prioridad{
        return $this->prioridad;
    }

    public function getFechaCreacion():String{
        return $this->fechaCreacion->format("Y-m-d");
    }

    public function getfechaTope():String{
        return $this->fechaTope->format("Y-m-d");
    }

    public function setQueHacer(String $queHacer):void{
        $this->queHacer=$queHacer;
    }

    public function setPrioridad(Prioridad $prioridad):void{
        $this->prioridad=$prioridad;
    }

    public function setFechaCreacion(DateTime $fechaCreacion):void{
        $this->fechaCreacion=$fechaCreacion;
    }

    public function setfechaTope(DateTime $fechaTope):void{
        $this->fechaTope->$fechaTope;
    }

}

?>
