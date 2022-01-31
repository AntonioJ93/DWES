<!doctype html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Trabajo DWES unidad 1">
  <meta name="author" content="Antonio J. Prieto">

  <title>Tarea 3 DWES</title>

  <?php include_once("./include/cdn.html") ?>

</head>

<body>

  <header>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container d-flex justify-content-between">
        <a class="navbar-brand fw-bold" href="./inicio.php">Inicio</a>
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
                <li><a class="dropdown-item" href="./1/a/actividad1a.php">Actividad 1A</a></li>
                <li><a class="dropdown-item" href="./1/b/actividad1b.php">Actividad 1B</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./2/actividad2.php">Actividad 2</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./3/actividad3.php">Actividad 3</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./4/actividad4.php">Actividad 4</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>


  </header>

  <main>

    <section class="jumbotron text-center">
      <div class="container">
        <h1 class="jumbotron-heading">DWES</h1>
        <p class="lead text-muted">Tarea 3 Antonio Jesús Prieto Arjona</p>

      </div>
    </section>

    <div class="py-5 bg-light">
      <div class="container">

        <div class="row">
          <div class="col-md-4">
            <div class="card mb-4 box-shadow">

              <img class="card-img-top" src="img/actividad1.PNG" alt="Card image cap">
              <div class="card-body">
                <p class="card-title">Actividad 1A</p>
                <p class="card-text">Crea una página de ejemplo con autenticación HTTP básica. A continuación, en dicha página, responde: ¿por qué no es seguro esta autenticación? ¿Cómo podría mejorarse?</p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <a href="./1/a/actividad1a.php" class="btn btn-sm btn-outline-secondary">Ver</a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="card mb-4 box-shadow">
              <img class="card-img-top" src="img/actividad1.PNG" alt="Card image cap">
              <div class="card-body">
                <p class="card-title">Actividad 1B</p>
                <p class="card-text">Crea una página de ejemplo con autenticación HTTP hash/digest con el algoritmo Blowfish/Bcrypt usando crypt(). A continuación, en dicha página, responde: ¿qué es una función hash? ¿Por qué es tan importante en seguridad informática? ¿Cuál sería la autenticación HTTP más segura de todas finalmente?
                </p>

                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <a href="./1/a/actividad1a.php" class="btn btn-sm btn-outline-secondary">Ver</a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="card mb-4 box-shadow">
              <img class="card-img-top" src="img/actividad2.PNG" alt="Card image cap">
              <div class="card-body">
                <p class="card-text">Crea una cesta de la compra de frutas y verduras y almacénala durante una hora usando cookies. El usuario elegirá una serie de frutas y verduras y mantendrá dichos alimentos escogidos durante una hora aunque cierre el navegador. Mediante setcookie(), sin autenticación ni sesiones, almacena dicha cesta y crea también opciones para modificar, eliminar y comprobar si existe dicha cookie
                </p>

                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <a href="./2/actividad2.php" class="btn btn-sm btn-outline-secondary">Ver</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" src="img/actividad3.PNG" alt="Card image cap">
                <div class="card-body">
                  <p class="card-title">Actividad 3</p>
                  <p class="card-text">¿Qué es Composer y qué no es según ellos? ¿Con qué archivo configuramos nuestro proyecto en Composer? ¿Qué es JSON? Completa el tutorial de JSON. ¿Cómo instalamos nuestras dependencias en Composer y qué archivo se genera? ¿Cómo actualizamos nuestras dependencias a sus últimas versiones? ¿Qué es Packagist y cómo se usa? ¿Cómo cargamos (específicamente autoloading) nuestras dependencias en PHP?
                  </p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <a href="./3/actividad3.php" class="btn btn-sm btn-outline-secondary">Ver</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" src="img/actividad4.PNG" alt="Card image cap">
                <div class="card-body">
                  <p class="card-text">Crea un balance sencillo de ingresos y gastos. Para obtener el balance, habrá que registrarse como usuario en una base de datos y después iniciar sesión; las contraseñas estarán almacenadas en hash mediante el algoritmo Bcrypt (usa password_hash y password_verify). Una vez iniciada la sesión correctamente, el usuario introducirá, mediante formularios, una serie de ingresos y gastos, pulsará en Generar y, a continuación, verá un informe similar a éste en PDF. </p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <a href="./4/actividad4.php" class="btn btn-sm btn-outline-secondary">Ver</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" src="img/actividad5.PNG" alt="Card image cap">
                <div class="card-body">
                  <p class="card-text">El usuario (cliente) iniciará sesión y realizará un pedido online de una o varias pizzas y podrá elegir hasta 10 ingredientes o hasta 5 especialidades diferentes. El usuario podrá añadir/eliminar ingredientes/pizzas y vaciar la cesta de la compra para empezar de nuevo. El administrador (empresario) iniciará sesión y podrá comprobar todos los pedidos de sus clientes y podrá generar un informe. Dicho informe mostrará los pedidos de cada cliente y estadísticas como precio medio del pedido, el ingrediente más y menos solicitado, la especialidad más y menos solicitada, etc.</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <a href="./5/actividad5.php" class="btn btn-sm btn-outline-secondary">Ver</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>


        </div>
      </div>
    </div>
    </div>

  </main>

  <footer class="text-muted">
    <div class="container text-center">

      <p>Antonio Jesús Prieto Arjona &copy; </p>
      <p>pryet2@gmail.com </p>
    </div>
  </footer>


</body>

</html>