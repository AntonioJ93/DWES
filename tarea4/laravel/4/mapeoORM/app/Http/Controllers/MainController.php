<?php

namespace App\Http\Controllers;

use App\Mail\ContactoMailable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MainController extends Controller
{
    public function index()
    {
        return view("home.home");
    }

    public function contacto()
    {
        return view("home.contacto");
    }

    public function enviar(Request $req)
    {
        $req->validate([
            "nombre"=>"required",
            "correo"=>["required","email"],
            "mensaje"=>"required"
        ]);

        /*
        * enviar correo
        */
        $correo=new ContactoMailable($req->all());
        Mail::to("pryet2@gmail.com")->send($correo);
        return redirect()->route("contacto")->with("mensaje","Correo enviado con exito");
    }
}
