@extends('plantillas.plantilla')

@section('title')
Contacto
@endsection

@section('contenido')
<h1 class="text-center display-2">Formulario de Contacto</h1>

@if (session('mensaje'))
<!--flash attribute-->
<div class="container-fluid alert alert-success text-center" role="alert">
    {{session('mensaje')}}
</div>
@endif

<div class="container-fluid d-flex flex-wrap justify-content-evenly h-100 align-items-center">

  <div class="card border-info mb-3 shadow mx-3 mb-5 bg-body rounded col-3" style="min-width: 16rem;">

    <div class="card-body">
      <form action="{{route('enviar')}}" method="POST">
        <!-- token de laravel -->
        @csrf
        <div class="mb-3">
          <label for="nombre" class="form-label">Nombre</label>
         
          <input type="text" value="{{old('nombre')}}" name="nombre"
            class="form-control  @error('nombre') is-invalid @enderror" id="nombre">
          <!-- muesta el error de validación-->
          @error('nombre')
          <div class="invalid-feedback">
            {{$message}}
          </div>
          @enderror

        </div>

        <div class="mb-3">
          <label for="correo" class="form-label">Correo</label>
         
          <input type="email" value="{{old('correo')}}" name="correo"
            class="form-control  @error('correo') is-invalid @enderror" id="correo">
          <!-- muesta el error de validación-->
          @error('correo')
          <div class="invalid-feedback">
            {{$message}}
          </div>
          @enderror

        </div>
        
        <div class="mb-3">
          <label for="mensaje" class="form-label">Mensaje</label>
          <textarea class="form-control @error('mensaje') is-invalid @enderror" name="mensaje" id="mensaje"
            cols="30" rows="5">{{old('mensaje')}}</textarea>
          @error('mensaje')
          <div class="invalid-feedback">
            {{$message}}
          </div>
          @enderror
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
      </form>
    </div>


  </div>




</div>



@endsection