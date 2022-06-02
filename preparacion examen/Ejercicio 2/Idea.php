<?php
declare(strict_types=1);

class Idea
{

    private int $id;
    private array $puntos;
    private int $votos;

    public function __construct(array $puntos)
    {
        $this->puntos=$puntos;
        $this->votos=0;
    }

    public static function fullConstructor(int $id,array $puntos,int $votos){
        $idea= new Idea($puntos);
        $idea->id=$id;
        $idea->votos=$votos;
        return $idea;
    } 


    public function getId():int{
        return $this->id;
    }

    public function getPuntos():array{
        return $this->puntos;
    }

    public function getVotos():int{
        return $this->votos;
    }

    public function addPunto(String $punto):array{
        array_push($this->puntos,$punto);
        return $this->puntos;
    }

    public function addVoto():int{
        $this->puntos+=1;
        return $this->puntos;
    }

    public function toJson():string{
        $cadenaPuntos="";
        
        foreach ($this->puntos as $key => $value) {
           $cadenaPuntos.="{".$key.":".$value[$key]."}";
        }
        $jsonPuntos="{puntos:".$cadenaPuntos."}";
        return "{id:".$this->id."".$jsonPuntos."votos:".$this->votos."}";
    }
}

?>
