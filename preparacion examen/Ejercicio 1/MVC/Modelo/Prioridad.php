<?php
declare(strict_types=1);
enum Prioridad
{
    case Alta;
    case Media;
    case Baja;

    public function getName(): string
    {
        return $this->name;
    }
}

?>