<?php
namespace App\Models;
class Alumno
{
    private string $nombre;
    private string $apellidos;
    private int $edad;
    private float $nota;

    public function __construct(string $nombre,string $apellidos, int $edad,float $nota){
        $this->nombre=$nombre;
        $this->apellidos=$apellidos;
        $this->edad=$edad;
        $this->nota=$nota;
    }

    public function getNombre():string{
        return $this->nombre;
    }

    public function getApellidos():string{
        return $this->apellidos;
    }

    public function getEdad():int{
        return $this->edad;
    }

    public function getNota():float{
        return $this->nota;
    }
}
