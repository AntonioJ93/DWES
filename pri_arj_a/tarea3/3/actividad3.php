<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad 3</title>
    <?php include_once("../include/cdn.html") ?>
</head>
<body>

<header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container d-flex justify-content-between">
                <a class="navbar-brand fw-bold" href="../inicio.php">Inicio</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="actividad1" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Actividad 1
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="actividad1">
                                <li><a class="dropdown-item" href="../1/a/actividad1a.php">Actividad 1A</a></li>
                                <li><a class="dropdown-item" href="../1/b/actividad1b.php">Actividad 1B</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../2/actividad2.php">Actividad 2</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./actividad3.php">Actividad 3</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../4/actividad4.php">Actividad 4</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../5/actividad5.php">Actividad 5</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>


    
    <section class="jumbotron text-center">
            <div class="container">
                <h1 class="jumbotron-heading">Actividad 3</h1>
                <p class="lead text-muted">Tarea 3 Antonio Jesús Prieto Arjona</p>

            </div>
        </section>

        <div class="py-5 bg-light">
            <div class="container">

                <div class="row">

                    <article class="col-md-6">
                        <div class="card mb-4 box-shadow">

                            <div class="card-body">
                                <header>    
                                    <h2 class="card-title titulo-articulo">¿Qué es Composer y qué no es según ellos?</h2>
                                </header>
                                
                                <p class="card-text">Es un administrador de paquetes para los proyectos php, resuelve las dependencias de cada proyecto y las descarga

                                </p>
                                <p class="card-text">
                                    No es un administrador de paquetes como APT de linux, simplemente detecta las dependencias de cada proyecto y las descarga en su versión adecuada

                                </p>

                            </div>
                        </div>
                    </article>

                    <article class="col-md-6">
                        <div class="card mb-4 box-shadow">

                            <div class="card-body">
                                <header>   
                                    <h2 class="card-title titulo-articulo">¿Con qué archivo configuramos nuestro proyecto en Composer?
                                    </h2>
                                </header>
                                
                                <p class="card-text">Con un archivo en formato JSON, composer.json este archivo describe las dependencias de nuestro proyecto para que composer se encargue de ellas
                                </p>

                                <div class="bg-light p-2">
                        
<pre>{
    "require": {
         "monolog/monolog": "2.0.*"
        }
}</pre>
                                    
                                </div>
                            </div>
                        </div>
                    </article>

                    <article class="col-md-12">
                        <div class="card mb-4 box-shadow">

                            <div class="card-body">
                               <header>
                                <h2 class="card-title titulo-articulo">Completa el tutorial de JSON.
                                </h2>
                               </header>

                                <figure class="p-5">
                                <h4 class="card-text">Objetos javascript</h4>
                                <img src="./img/1.PNG" class="figure-img img-fluid rounded" alt="acceso a datos">
                                <figcaption class="figure-caption">Declaración y acceso a json</figcaption>
                                </figure>

                                <figure class="p-5">
                                <h4 class="card-text">Parseando texto</h4>
                                <img src="./img/2.PNG" class="figure-img img-fluid rounded" alt="parse">
                                <figcaption class="figure-caption">Parse con función</figcaption>
                                </figure>

                                <figure class="p-5">
                                <h4 class="card-text">Json a texto</h4>
                                <img src="./img/3.PNG" class="figure-img img-fluid rounded" alt="json a texto">
                                <figcaption class="figure-caption">Json a texto</figcaption>
                                </figure>

                                <figure class="p-5">
                                <h4 class="card-text">Local storage</h4>
                                <img src="./img/4.PNG" class="figure-img img-fluid rounded" alt="local storage">
                                <figcaption class="figure-caption">Local storage</figcaption>
                                </figure>

                                <figure class="p-5">
                                <h4 class="card-text">Recorriendo objetos</h4>
                                <img src="./img/5.PNG" class="figure-img img-fluid rounded" alt="Recorriendo objetos">
                                <figcaption class="figure-caption">Recorriendo objetos</figcaption>
                                </figure>

                                <figure class="p-5">
                                <h4 class="card-text">Json a array</h4>
                                <img src="./img/6.PNG" class="figure-img img-fluid rounded" alt="Json a array">
                                <figcaption class="figure-caption">Json a array</figcaption>
                                </figure>

                                <figure class="p-5">
                                <h4 class="card-text">Enviando Json</h4>
                                <img src="./img/7.PNG" class="figure-img img-fluid rounded" alt="Enviando Jso">
                                <figcaption class="figure-caption">Enviando Jso</figcaption>
                                </figure>

                                <figure class="p-5">
                                <h4 class="card-text">Json encode en PHP</h4>
                                <img src="./img/8.PNG" class="figure-img img-fluid rounded" alt="Json encode en PHP">
                                <figcaption class="figure-caption">Json encode en PHP</figcaption>
                                </figure>

                                <figure class="p-5">
                                <h4 class="card-text">Tabla desde Json</h4>
                                <img src="./img/9.PNG" class="figure-img img-fluid rounded" alt="Tabla desde Json">
                                <figcaption class="figure-caption">Tabla desde Json</figcaption>
                                </figure>

                            </div>
                        </div>
                    </article>


                    <article class="col-md-6">
                        <div class="card mb-4 box-shadow">

                            <div class="card-body">
                                <header>
                                    <h2 class="card-title titulo-articulo">¿Cómo instalamos nuestras dependencias en Composer y qué archivo se genera?
                                    </h2>
                                </header>
                                
                                <p class="card-text">Con el comendo update, este comenado lee el composer.json y general el composer.lock donde aparecen las versiones exactas de cada dpendencia.
                                <div class="bg-light p-2">
                        
                                    <pre>php composer.phar update</pre>
                                    
                                </div>

                                </p>
                                <p class="card-text">
                                   Después se ejecutará implicitamente el comando intall que descargará las dependencias en nuestra carpeta vendor
                                </p>

                            </div>
                        </div>
                    </article>

                    <article class="col-md-6">
                        <div class="card mb-4 box-shadow">

                            <div class="card-body">
                                <header>
                                    <h2 class="card-title titulo-articulo">¿Cómo actualizamos nuestras dependencias a sus últimas versiones? 
                                    </h2>
                                </header>
                                
                                <p class="card-text">El composer.lock bloquea las versiones de las dependencias de nuestro proyecto, para actualizar a la ultima versión debemos ejecutar el comando update, esto buscará las ultimas versiones coincidentes com su composer.json y actualizará el composer.lock
                                </p>

                            </div>
                        </div>
                    </article>

                    <article class="col-md-6">
                        <div class="card mb-4 box-shadow">

                            <div class="card-body">
                                <header>
                                    <h2 class="card-title titulo-articulo">¿Qué es Packagist y cómo se usa? 
                                    </h2>
                                </header>
                                
                                <p class="card-text">Es el repositorio principal de Composer, donde puede obtener paquetes automáticamente solo con la instrucción <b> require</b> cualquier paquete que esté disponible allí, sin especificar más
                                </p>
                                <p class="card-text">Lógicamente necesitas tener instalado previamente Composer
                                </p>

                            </div>
                        </div>
                    </article>

                    <article class="col-md-6">
                        <div class="card mb-4 box-shadow">

                            <div class="card-body">
                                <header>
                                    <h2 class="card-title titulo-articulo"> ¿Cómo cargamos (específicamente autoloading) nuestras dependencias en PHP?
                                    </h2>
                                </header>
                                
                                <p class="card-text">Añadiendo a nuestro código: 
                                </p>
                                <div class="bg-light p-2">
                        
                                    <pre>require 'vendor/autoload.php';</pre>
                                    
                                </div>
                                <p class="card-text">Esto añadirá las dependencias de forma automática
                                </p>

                            </div>
                        </div>
                    </article>


                </div>
            </div>
        </div>




</body>
</html>