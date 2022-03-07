<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\AssignOp\Concat;

class MiControlador extends Controller
{
 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("welcome");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("crear");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return view("articulos");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view("mostrar");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view("editar");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return view("actualizar");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return view("destroy");
    }

    public function plantilla1()
    {
        return view("usoPlantilla");
    }

    public function plantilla2()
    {
        return view("usoPlantilla2");
    }

    public function plantilla3()
    {
        return view("usoPlantilla3");
    }

    public function alumnos()
    {
        $maria=new Alumno("Maria","López",22,7.5);
        $paco=new Alumno("Paco","López",20,6.5);
        $carlos=new Alumno("Carlos","Pérez",22,9);
        $lucia=new Alumno("Lucía","García",23,6);

        $alumnos=array($maria,$paco,$carlos,$lucia);
        return view("alumnos",compact("alumnos"));
    }
}
