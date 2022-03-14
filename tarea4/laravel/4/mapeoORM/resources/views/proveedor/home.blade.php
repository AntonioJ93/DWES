@extends('plantillas.plantilla')

@section('title')
Proveedores
@endsection

@section('contenido')
<h1 class="text-center display-2">Proveedores</h1>

@if (session('mensaje'))
<!--flash attribute-->
<div class="container-fluid alert 
@if (!session('error'))
alert-success
@else
alert-danger
@endif
text-center" role="alert">
    {{session('mensaje')}}
</div>
@endif

<!-- cards proveedores -->
<div class="container-fluid d-flex flex-wrap justify-content-evenly">



    @foreach ($proveedores as $proveedor)
    <div class="card border-info mb-3 shadow mx-3 mb-5 bg-body rounded col-3" style="width: 16rem;">
        <div class="card-header content-size ">Actualizado:
            <?=$proveedor->updated_at?>
        </div>
        <a href="{{route('proveedor.show',$proveedor)}}" class="link-secondary text-decoration-none">
            <div class="card-body  h-100%">
                <h5 class="card-title">
                    <?=$proveedor->nombre?>
                </h5>
                <p class="card-text content-size">
                    <?=$proveedor->descripcion?>
                </p>
                <p class="card-text position-absolute bottom-0 pb-2"><em>Nº articulos: </em>
                    {{count($proveedor->articulos)}}
                </p>
            </div>
        </a>

    </div>
    @endforeach

    <!-- paginación -->
    {{$proveedores->links()}}

</div>



@endsection