<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticulo;
use App\Models\Articulo;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArticuloController extends Controller
{

    public function index()
    {
        $articulos = Articulo::paginate(10); //los trae paginados con 10 de tamaño de página

        return view("articulo.articulos", compact("articulos"));
    }

    public function create()
    {
        return view("articulo.form-articulo");
    }

    public function show(Articulo $articulo)
    {
        // $articulo=Articulo::find($id);
        return view("articulo.detalle", compact("articulo"));
    }

    public function store(StoreArticulo $req)
    {
        /**
         *  validar los datos en el StoreArticulo
         */

         //asignación manual
       /* $articulo = new Articulo();
        $articulo->nombre = $req->nombre;
        $articulo->descripcion = $req->descripcion;
        $articulo->precio = $req->precio;
        $articulo->save();      */    
        

        
        $atributos=$req->all();
        $slug=Str::slug($req->nombre,"-");
        //añadimos el slug
        $atributos["slug"]=$slug;
        //asignación masiva
        Articulo::create($atributos);
        
                                                //si queremos podemos enviarle parametros al método
        return redirect()->action([ArticuloController::class, 'index']/*, ['id' => 1]*/)
            /*flash attribute*/->with('mensaje', 'Artículo creado con exito');
    }

    public function buscar(Request $req)
    {
        $articulos = Articulo::where("nombre", "like", "%$req->texto%")
            ->orWhere("precio", "<=", "$req->texto")->paginate(10);

        return view("articulo.articulos", compact("articulos"));
    }

    public function edit(Articulo $articulo)
    {
        return view("articulo.editar", compact("articulo"));
    }

    public function update(Articulo $articulo, Request $req)
    {
         /**
         *  validar los datos
         */
        $req->validate([
            "nombre" => "required",
            "precio" => ["required", "gt:0", "lte:99999999"],
            "descripcion" => "required"
        ]);

        //asignación manual
       /* $articulo->nombre = $req->nombre;
        $articulo->precio = $req->precio;
        $articulo->descripcion = $req->descripcion;
        $articulo->save();*/

        //asignación masiva
        $articulo->update($req->all());
        return redirect()->action([ArticuloController::class, 'index'])
            /*flash attribute*/->with('mensaje', 'Artículo actualizado correctamente');
    }

    public function destroy(Articulo $articulo){
        $articulo->delete();
        return redirect()->action([ArticuloController::class, 'index'])
            /*flash attribute*/->with('mensaje', 'Artículo eliminado correctamente');
    }
}
