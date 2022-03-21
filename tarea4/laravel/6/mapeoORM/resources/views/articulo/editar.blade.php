@extends('plantillas.plantilla')

@section('title')
Artículos
@endsection

@section('contenido')
<h1 class="text-center display-2">Editar Artículo</h1>


<div class="container-fluid d-flex flex-wrap justify-content-evenly h-100 align-items-center">



  <div class="card border-info mb-3 shadow mx-3 mb-5 bg-body rounded col-3" style="min-width: 16rem;">

    <div class="card-body">
      <form action="{{route('articulo.update',$articulo)}}" method="post" enctype='multipart/form-data'>
        <!-- token de laravel -->
        @csrf
        @method("put")
        <input type="hidden" value="<?=$articulo->id?>" name="id" class="form-control" id="id">
        <div class="mb-3">
          <label for="nombre" class="form-label">Nombre</label>
          <input type="text" value="{{old('nombre',$articulo->nombre)}}" name="nombre"
            class="form-control  @error('nombre') is-invalid @enderror" id="nombre">
          <!-- muesta el error de validación-->
          @error('nombre')
          <div class="invalid-feedback">
            {{$message}}
          </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="precio" class="form-label">Precio</label>
          <input type="number" step="0.01" value="{{old('precio',$articulo->precio)}}" name="precio"
            class="form-control  @error('precio') is-invalid @enderror" id="precio">
          <!-- muesta el error de validación-->
          @error('precio')
          <div class="invalid-feedback">
            {{$message}}
          </div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="proveedor" class="form-label">Proveedor</label>

          <select class="form-control @error('proveedor') is-invalid @enderror" name="proveedor_id" id="proveedor">
            @foreach ($proveedores as $proveedor)
            <option value="{{$proveedor->id}}"
            
              @if ($proveedor->id==old('proveedor_id',$articulo->proveedor->id))
                  selected
              @endif
              >{{$proveedor->nombre}}</option>
            @endforeach
          </select>
          @error('proveedor')
          <div class="invalid-feedback">
            {{$message}}
          </div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="img" class="form-label">Cambiar Imagen (Opcional)</label>
          <input class="form-control form-control-sm @error('img') is-invalid @enderror" 
          name="img" id="img" type="file"
          accept="image/png, image/jpeg, image.svg, image.jpg">
          @error('img')
          <div class="invalid-feedback">
            {{$message}}
          </div>
          @enderror
        </div>


        <div class="mb-3">
          <label for="descripcion" class="form-label">Descripción</label>
          <textarea class="form-control  @error('descripcion') is-invalid @enderror" name="descripcion" id="descripcion"
            cols="30" rows="5">{{old('descripcion',$articulo->descripcion)}}
                    </textarea>
          <!-- muesta el error de validación-->
          @error('descripcion')
          <div class="invalid-feedback">
            {{$message}}
          </div>
          @enderror
        </div>
        <a href="{{route('articulo.show',$articulo->slug)}}" class="btn btn-primary">Volver</a>
        <input type="submit" class="btn btn-success" value="Guardar"></input>
      </form>
    </div>


  </div>





</div>



@endsection