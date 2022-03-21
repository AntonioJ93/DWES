<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-100">

@include('plantillas.componentes.head')

<body class="d-flex flex-column h-100">
   

    <main class="flex-shrink-0  ">
        @yield('contenido')
    </main>



</body>

</html>