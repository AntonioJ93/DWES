@extends('plantillas.plantilla')

@section('title')
Proveedores
@endsection

@section('contenido')
<h1 class="text-center display-2">Detalle Proveedor</h1>


<div class="container-fluid d-flex flex-wrap justify-content-evenly h-100 align-items-center">



    <div class="card border-info mb-3 shadow mx-3 mb-5 bg-body rounded col-3" style="width: 16rem;">
        <div class="card-header content-size ">Actualizado:
            <?=$proveedor->updated_at?>
        </div>
        <div class="card-body  h-100%">
            <h5 class="card-title">
                <?=$proveedor->nombre?>
            </h5>
            <p class="card-text content-size">Id:
                <?=$proveedor->id?>
            </p>
            <p class="card-text content-size">Nº de articulos:
                {{count($proveedor->articulos)}}
            </p>
            <p class="card-text content-size">
                <?=$proveedor->descripcion?>
            </p>

            <form class="d-flex justify-content-evenly" action="{{route('proveedor.destroy',$proveedor)}}" method="post">
                @csrf
                @method("delete")
                <a class="btn btn-warning  " href="{{route('proveedor.edit',$proveedor)}}">Editar</a>
                <input type="submit" class="btn btn-danger  " value="Eliminar"></input>
            </form>

        </div>


    </div>





</div>



@endsection