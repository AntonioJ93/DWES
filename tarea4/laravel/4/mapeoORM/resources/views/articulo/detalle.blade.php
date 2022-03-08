@extends('plantillas.plantilla')

@section('title')
    Artículos
@endsection

@section('contenido')
    <h1 class="text-center display-2">Detalle Artículo</h1>

  
<div class="container-fluid d-flex flex-wrap justify-content-evenly h-100 align-items-center">


         
    <div class="card border-info mb-3 shadow mx-3 mb-5 bg-body rounded col-3" style="width: 16rem;">
        <div class="card-header content-size ">Actualizado: <?=$articulo->updated_at?></div>
            <div class="card-body  h-100%">
                <h5 class="card-title"><?=$articulo->nombre?></h5>
                <p class="card-text content-size">Id:<?=$articulo->id?></p>
                <p class="card-text content-size"><?=$articulo->descripcion?></p>
                <p class="card-text position-absolute bottom-0 pb-2"><em>Precio: </em><?=$articulo->precio?></p>
            </div>

        
    </div>
    




</div>  
    


@endsection