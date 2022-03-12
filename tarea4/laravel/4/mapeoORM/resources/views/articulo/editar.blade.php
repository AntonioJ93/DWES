@extends('plantillas.plantilla')

@section('title')
    Artículos
@endsection

@section('contenido')
    <h1 class="text-center display-2">Editar Artículo</h1>

  
<div class="container-fluid d-flex flex-wrap justify-content-evenly h-100 align-items-center">


         
    <div class="card border-info mb-3 shadow mx-3 mb-5 bg-body rounded col-3" style="min-width: 16rem;">
        
        <div class="card-body">
            <form action="{{route('articulo.update',$articulo)}}" method="post">
                <!-- token de laravel -->
                @csrf
                @method("put")
                <input type="hidden" value="<?=$articulo->id?>" name="id" class="form-control" id="id">
                <div class="mb-3">
                  <label for="nombre" class="form-label">Nombre</label>
                  <input type="text" value="<?=$articulo->nombre?>" name="nombre" class="form-control" id="nombre">
                </div>
                <div class="mb-3">
                    <label for="precio" class="form-label">Precio</label>
                    <input type="number" value="<?=$articulo->precio?>" name="precio" class="form-control" id="precio">
                </div>
                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <textarea class="form-control" name="descripcion" id="descripcion" cols="30" rows="5"><?=$articulo->descripcion?>
                    </textarea>
                </div>
                <a href="{{route('articulo.show',$articulo->id)}}" class="btn btn-primary">Volver</a>
                <input type="submit" class="btn btn-success" value="Guardar"></input>
              </form>
        </div>
  

</div>
    




</div>  
    


@endsection