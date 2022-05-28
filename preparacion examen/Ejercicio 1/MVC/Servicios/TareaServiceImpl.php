<?php
declare(strict_types=1);

class TareaServiceImpl implements TareaService
{
    public function addTarea(Tarea $tarea):array{
        if(!SessionUtils::tareasSessionExist())
            SessionUtils::initSessionTareas();
            $listaTareas=SessionUtils::getSessionTareas();
            array_push($listaTareas, $tarea);
        return SessionUtils::setSessionTareas($listaTareas);
    }

    public function delTarea(String $indice):Tarea{
        if(SessionUtils::tareaSessionExist($indice)){
            $listaTareas=SessionUtils::getSessionTareas();
            $tareaABorrar=$listaTareas[$indice];
            unset($listaTareas[$indice]);
            SessionUtils::setSessionTareas($listaTareas);
            return $tareaABorrar;
        }
        throw new Exception('La tarea con indice '. $indice . ' no existe');       
    }

    public function findTarea(String $indice):Tarea{
        if(!SessionUtils::tareaSessionExist($indice))
            throw new Exception('La tarea con indice '. $indice . ' no existe');
        
        $listaTareas=SessionUtils::getSessionTareas();
        return $listaTareas[$indice];
    }

    public function findAll():array{
        if(!SessionUtils::tareasSessionExist())
            SessionUtils::initSessionTareas();
        return SessionUtils::getSessionTareas();
    }

    public function updateTarea(String $indice,Tarea $tarea):Tarea{
        if(!SessionUtils::tareaSessionExist($indice))
            throw new Exception('La tarea con indice '. $indice . ' no existe');
        $listaTareas=SessionUtils::getSessionTareas();
        $listaTareas[$indice]=$tarea;
        SessionUtils::setSessionTareas($listaTareas);
        return $listaTareas[$indice];
    }
}

?>