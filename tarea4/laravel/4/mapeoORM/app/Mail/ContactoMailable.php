<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactoMailable extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * php artisan make:mail ContactoMailable
     * Create a new message instance.
     *
     * @return void
     */

    // asunto del correo
    public $subject="Información de contacto";

    //propiedades para mapear el formulario e imprimirlas en la vista
    public $nombre;
    public $correo;
    public $mensaje;

    public function __construct($form)
    {
        $this->nombre=$form["nombre"];
        $this->correo=$form["correo"];
        $this->mensaje=$form["mensaje"];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {   // vista para el email los estilos hay que definirlos en el propio html para
        // que los pille al abrir el mail
        return $this->view('email.contacto');
    }
}
