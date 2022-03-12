<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-100">

@include('plantillas.componentes.head')

<body class="d-flex flex-column h-100">
    @include('plantillas.componentes.nav')

    <main class="flex-shrink-0  ">
        @yield('contenido')
    </main>

    <footer class="footer mt-auto py-3 bg-light text-center bg-dark text-light" style="font-size: .9rem">
        <p>Antonio J. Prieto &copy;</p>
        <span>pryet2@gmail.com</span>
    </footer>

</body>

</html>