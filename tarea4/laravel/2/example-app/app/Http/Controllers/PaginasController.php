<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaginasController extends Controller
{
    public function inicio(){
        return view("paginas.inicio");
    }

    public function quienesSomos(){
        return view("paginas.quienesSomos");
    }

    public function dondeEstamos(){
        return view("paginas.dondeEstamos");
    }

    public function foro(){
        return view("paginas.foro");
    }
}
