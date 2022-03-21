<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{route('index')}}">Inicio</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <li class="nav-item">
                    <a class="nav-link" href="{{route('articulo.home')}}">Artículos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('proveedor.home')}}">Proveedores</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('contacto')}}">Contacto</a>
                </li>

            </ul>
            @if (!request()->routeIs('index')&&!request()->routeIs('contacto'))
            <form class="d-flex flex-wrap justify-content-end" method="GET" action="
            @if (request()->routeIs('articulo.*'))
            {{route('articulo.buscar')}}
            @endif
            @if (request()->routeIs('proveedor.*'))
            {{route('proveedor.buscar')}}
            @endif
            ">
                @csrf

                @if (request()->routeIs('articulo.*')&&!request()->routeIs('articulo.create'))
                <a class="btn btn-success  me-2" href="{{route('articulo.create')}}">Añadir artículo</a>
                @endif
                @if (request()->routeIs('proveedor.*')&&!request()->routeIs('proveedor.create'))
                <a class="btn btn-success  me-2" href="{{route('proveedor.create')}}">Añadir proveedor</a>
                @endif
                <input class="form-control width-10" name="texto" type="search" placeholder=
                @if (request()->routeIs('articulo.*'))
                "Nombre/Precio"
                 @endif
                 @if (request()->routeIs('proveedor.*'))
            "Nombre"
            @endif
                aria-label="Search">
               
                <button class="btn btn-outline-success " type="submit">Buscar</button>
                
                
            </form>
            @endif
        </div>
    </div>
</nav>