@extends('plantillas.plantilla')

@section('title')
    Artículos
@endsection

@section('contenido')
    <h1 class="text-center display-2">Añadir Artículo</h1>

  
<div class="container-fluid d-flex flex-wrap justify-content-evenly h-100 align-items-center">


 
  <div class="card border-info mb-3 shadow mx-3 mb-5 bg-body rounded col-3" style="min-width: 16rem;">
        
            <div class="card-body">
                <form action="{{route('articulo.store')}}" method="POST">
                    <!-- token de laravel -->
                    @csrf
                    <div class="mb-3">
                      <label for="nombre" class="form-label">Nombre</label>
                      <input type="text" name="nombre" class="form-control" id="nombre">
                    </div>
                    <div class="mb-3">
                        <label for="precio" class="form-label">Precio</label>
                        <input type="number" name="precio" class="form-control" id="precio">
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <textarea class="form-control" name="descripcion" id="descripcion" cols="30" rows="5"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
            </div>
      

    </div>




</div>  
    


@endsection