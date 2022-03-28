@extends('plantillas.plantilla')

@section('title')
Home
@endsection

@section('contenido')
<h1 class="text-center display-2">Home</h1>
<div class="container-fluid d-flex flex-wrap justify-content-evenly h-100 align-items-center">



    <div class="card border-info mb-3 shadow mx-3 mb-5 bg-body rounded col-3" style="width: 30rem;">
       
        <div class="card-body  h-100%">
            
            <p class="card-text content-size">
                Nacho al final me he liado un poco con el ejercicio 4 mirando cosas y he acabado haciendo un crud de dos tablas articulos y proveedores
            </p>
            <p class="card-text content-size">Ademas en la parte de contacto puedes enviar correos a  mi direccion de correo pryet2@gmail.com</p>
            <p class="card-text content-size">Por eso este ejercicio y el ejercicio 5 es el mismo</p>
            <p class="card-text content-size">Recuerda ejecutar php artisan migrate:fresh --seed para poblar la bbdd</p>
        
        </div>


    </div>





</div>
@endsection