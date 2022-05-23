<?php
declare(strict_types=1);

interface TareaService
{
   public function addTarea(Tarea $tarea):array;
   public function delTarea(String $indice):Tarea;
   public function findTarea(String $indice):Tarea;
   public function findAll():array;
   public function updateTarea(String $indice,Tarea $tarea):Tarea;
}

?>