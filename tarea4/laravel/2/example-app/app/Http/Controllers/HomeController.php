<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //crear controladores:  php artisan make:<nombre del controlador>

    public function index(){
        //ruta /app/index
        return view("app.index");
    }

    public function sobreNosotros(){
        return "sobrenosotros";
    }

    public function contacto(){
        return "contacto";
    }

    public function update($id,$nombre="nombre por defecto"){

        //paso de parametros a la vista
        //return view("app.prueba",["id"=>$id,"nombre"=>$nombre]);
        return view("app.prueba", compact("id","nombre"));
    }
}
