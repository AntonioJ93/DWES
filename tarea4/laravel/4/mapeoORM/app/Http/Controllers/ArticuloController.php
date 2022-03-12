<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use Illuminate\Http\Request;

class ArticuloController extends Controller
{
    // protected $table="nombre de la table en BBDD"; //si es diferente el nombre a articulo
    // protected $primaryKey="nombre de la columna de la pk"; // si es diferente a id

    public function index(){
        $articulos=Articulo::paginate(10);//los trae paginados con 10 de tamaño de página
        
        return view("articulo.articulos",compact("articulos"));
    }

    public function create(){
        return view("articulo.form-articulo");
    }

    public function show(Articulo $articulo){
       // $articulo=Articulo::find($id);
        return view("articulo.detalle",compact("articulo"));
    }

    public function store(Request $req){
        /**
         *  validar los datos
         */
        $req->validate([
            
            "nombre"=>"required",
            "precio"=>"required",
            "descripcion"=>"required"
        ]);


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

    public function edit(Articulo $articulo){
        return view("articulo.editar",compact("articulo"));
    }

    public function update(Articulo $articulo,Request $req){
        $articulo->nombre=$req->nombre;
        $articulo->precio=$req->precio;
        $articulo->descripcion=$req->descripcion;
        $articulo->save();
        return redirect()->action([ArticuloController::class, 'index'])
    /*flash attribute*/->with('mensaje', 'Artículo actualizado correctamente');
    }
}
