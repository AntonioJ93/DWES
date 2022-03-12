<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{route('index')}}">Inicio</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
               
                <li class="nav-item">
                    <a class="nav-link" href="{{route('articulo.create')}}">Añadir artículo</a>
                </li>

            </ul>
            <form class="d-flex" method="GET" action="{{route('articulo.buscar')}}">
                @csrf
                <input class="form-control me-2" name="texto" type="search" placeholder="Nombre/Precio" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Buscar</button>
            </form>
        </div>
    </div>
</nav>