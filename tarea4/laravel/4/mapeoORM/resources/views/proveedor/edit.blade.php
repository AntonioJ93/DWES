@extends('plantillas.plantilla')

@section('title')
Proveedor
@endsection

@section('contenido')
<h1 class="text-center display-2">Editar Proveedor</h1>


<div class="container-fluid d-flex flex-wrap justify-content-evenly h-100 align-items-center">



  <div class="card border-info mb-3 shadow mx-3 mb-5 bg-body rounded col-3" style="min-width: 16rem;">

    <div class="card-body">
      <form action="{{route('proveedor.update',$proveedor)}}" method="POST">
        <!-- token de laravel -->
        @csrf
        @method("put")
        <div class="mb-3">
          <label for="nombre" class="form-label">Nombre</label>
          <!-- old("nombre") recupera el valor anterior del campo -->
          <input type="text" value="{{old('nombre',$proveedor->nombre)}}" name="nombre"
            class="form-control  @error('nombre') is-invalid @enderror" id="nombre">
          <!-- muesta el error de validación-->
          @error('nombre')
          <div class="invalid-feedback">
            {{$message}}
          </div>
          @enderror

        </div>
        
        <div class="mb-3">
          <label for="descripcion" class="form-label">Descripción</label>
          <textarea class="form-control @error('descripcion') is-invalid @enderror" name="descripcion" id="descripcion"
            cols="30" rows="5">{{old('descripcion',$proveedor->descripcion)}}</textarea>
          @error('descripcion')
          <div class="invalid-feedback">
            {{$message}}
          </div>
          @enderror
        </div>
        <a href="{{route('proveedor.show',$proveedor)}}" class="btn btn-primary">Volver</a>
        <input type="submit" class="btn btn-success" value="Guardar"></input>
      </form>
    </div>


  </div>




</div>



@endsection