<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticulo;
use App\Models\Articulo;
use App\Models\Proveedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
        $proveedores=Proveedor::all();
        return view("articulo.form-articulo",compact("proveedores"));
    }

    public function show(Articulo $articulo)
    {
        if($articulo->proveedor==null){
            //proveedor borrado con soft deleteing
            $articulo->proveedor=Proveedor::withTrashed()//buscar en todos incluidos los eliminados
            ->where("id",$articulo->proveedor_id)->first();
            $borrado=true;
            return view("articulo.detalle", compact("articulo","borrado"));
        }
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
        $imagen = $req->file("img");
        if(isset($imagen)){
            $ruta= $imagen->store("img");
            $atributos["ruta"] = $ruta;
        }
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
    {   $proveedores=Proveedor::all();
    return view("articulo.editar", compact("articulo","proveedores"));
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
        $slug = Str::slug($req->nombre, "-");
        $atributos=$req->all();
        $atributos["slug"]=$slug;

        $imagen = $req->file("img");
        if(isset($imagen)){
            $ruta= $imagen->store("img");
            $atributos["ruta"] = $ruta;

            //comprobamos si tiene imagen diferente a la por defecto
            if($articulo->ruta!=null){
                Storage::delete($articulo->ruta);
            }
            
        }
        //asignación masiva
        $articulo->update($atributos);
        return redirect()->action([ArticuloController::class, 'index'])
            /*flash attribute*/->with('mensaje', 'Artículo actualizado correctamente');
    }

    public function destroy(Articulo $articulo){
        $articulo->delete();//soft delete
        if($articulo->ruta!=null){//borramos la imagen, se deberia borrar la imagen en el force delete
            
               Storage::delete($articulo->ruta);
            //como borramos la imagen en el soft delete actualizamos la ruta
            $articulo->ruta=null;
            $articulo->update();
           }
           
        return redirect()->action([ArticuloController::class, 'index'])
            /*flash attribute*/->with('mensaje', 'Artículo eliminado correctamente');
    }
}
