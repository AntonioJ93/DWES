<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use Illuminate\Http\Request;

class ArticuloController extends Controller
{
    public function index(){
        $articulos=Articulo::paginate(10);//los trae paginados con 10 de tamaño de página
        
        return view("articulo.articulos",compact("articulos"));
    }

    public function create(){
        return view("articulo.form-articulo");
    }

    public function detalle($id){
        $articulo=Articulo::find($id);
        return view("articulo.detalle",compact("articulo"));
    }

    public function store(Request $req){
        /**
         * faltaría validar los datos
         */
        $articulo=new Articulo();
        $articulo->nombre=$req->nombre;
        $articulo->descripcion=$req->descripcion;
        $articulo->precio=$req->precio;
        $articulo->save();                                      //si queremos podemos enviarle parametros al método
    return redirect()->action([ArticuloController::class, 'index']/*, ['id' => 1]*/)
    /*flash attribute*/->with('mensaje', 'Artículo creado con exito');
    }

    public function buscar(Request $req){
        $articulos=Articulo::where("nombre","like","%$req->texto%")
        ->orWhere("precio","<=","$req->texto")->paginate(10);
    
        return view("articulo.articulos",compact("articulos"));
    }
}
