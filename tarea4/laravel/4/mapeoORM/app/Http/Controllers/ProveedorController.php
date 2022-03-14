<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proveedores = Proveedor::paginate();
        return view("proveedor.home", compact("proveedores"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("proveedor.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /**
         * validar
         */
        $request->validate([
            "nombre" => "required",
            "descripcion" => "required"
        ]);
        $atributos = $request->all();

        $slug = Str::slug($request->nombre, "-");
        //añadimos el slug
        $atributos["slug"] = $slug;

        Proveedor::create($atributos);
        return redirect()->action([ProveedorController::class, "index"])
            ->with("mensaje", "Proveedor añadido con exito");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Proveedor $proveedor)
    { ;
        return view("proveedor.detalle", compact("proveedor"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Proveedor $proveedor)
    {
        return view("proveedor.edit",compact("proveedor"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proveedor $proveedor)
    {
        /**
         * validar
         */
        $request->validate([
            "nombre"=>"required",
            "descripcion"=>"required"
        ]);
        if($proveedor->update($request->all())){
            return redirect()->action([ProveedorController::class,"index"])
            ->with("mensaje","Proveedor actualizado con exito")
            ->with("error",false);
        }
        return redirect()->action([ProveedorController::class,"index"])
        ->with("mensaje","Se ha producido un error al actualizar")
        ->with("error",true);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proveedor $proveedor)
    {
        
        if ($proveedor->delete()) {
            return redirect()->action([ProveedorController::class,"index"])
            ->with("mensaje","Proveedor eliminado con exito")
            ->with("error",false);
        }
        return redirect()->action([ProveedorController::class,"index"])
        ->with("mensaje","Se ha producido un error al eliminar")
        ->with("error",true);
    }

    public function buscar(Request $req){

        $proveedores = Proveedor::where("nombre", "like", "%$req->texto%")->paginate(10);

        return view("proveedor.home", compact("proveedores"));

    }
}
