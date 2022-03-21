@extends('plantillas.plantilla-email')

@section('title')
Correo
@endsection

@section('contenido')
<h1 class="text-center display-4">Correo de la Web</h1>

<div class="container-fluid d-flex flex-wrap justify-content-evenly align-content-center"style="height: 20rem;">

    <div class="card border-info mb-3 shadow mx-3 mb-5 bg-body rounded col-3" style="width: 36rem;">
        <div class="card-header content-size ">Enviado: {{date('d-m-Y G:i:s')}}
            
        </div>
        
            <div class="card-body  h-100%">
                <h5 class="card-title">Nombre: {{$nombre}}
                </h5>
                <p class="card-text content-size">
                    <em>Correo: </em> {{$correo}}
                </p>
                <p class="card-text position-absolute bottom-0 pb-2">
                    <em>Mensaje: </em> {{$mensaje}}
                </p>
            </div>
     

    </div>


</div>



@endsection