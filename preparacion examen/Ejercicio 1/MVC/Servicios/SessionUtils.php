<?php
declare(strict_types=1);
class SessionUtils
{
    private static String $SESION_VAR_NAME="tareas";
    public static function tareasSessionExist():bool{
        return isset($_SESSION[SessionUtils::$SESION_VAR_NAME]);
    }
    public static function initSessionTareas():array{
        return $_SESSION[SessionUtils::$SESION_VAR_NAME]=[];
    }
    public static function getSessionTareas():array{
        return $_SESSION[SessionUtils::$SESION_VAR_NAME];
    }
    public static function setSessionTareas(array $tareas):array{
        return $_SESSION[SessionUtils::$SESION_VAR_NAME]=$tareas;
    }
    public static function tareaSessionExist(String $indice):bool{
        if(!isset($_SESSION[SessionUtils::$SESION_VAR_NAME]))
            return false;
        if($indice<count(SessionUtils::getSessionTareas()))
            return true;
    }
}