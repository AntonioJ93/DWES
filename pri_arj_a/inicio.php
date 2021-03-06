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
        <p class="lead text-muted">Tarea 3 Antonio Jes??s Prieto Arjona</p>

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
                <p class="card-text">Crea una p??gina de ejemplo con autenticaci??n HTTP b??sica. A continuaci??n, en dicha p??gina, responde: ??por qu?? no es seguro esta autenticaci??n? ??C??mo podr??a mejorarse?</p>
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
                <p class="card-text">Crea una p??gina de ejemplo con autenticaci??n HTTP hash/digest con el algoritmo Blowfish/Bcrypt usando crypt(). A continuaci??n, en dicha p??gina, responde: ??qu?? es una funci??n hash? ??Por qu?? es tan importante en seguridad inform??tica? ??Cu??l ser??a la autenticaci??n HTTP m??s segura de todas finalmente?
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
                <p class="card-text">Crea una cesta de la compra de frutas y verduras y almac??nala durante una hora usando cookies. El usuario elegir?? una serie de frutas y verduras y mantendr?? dichos alimentos escogidos durante una hora aunque cierre el navegador. Mediante setcookie(), sin autenticaci??n ni sesiones, almacena dicha cesta y crea tambi??n opciones para modificar, eliminar y comprobar si existe dicha cookie
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
                  <p class="card-text">??Qu?? es Composer y qu?? no es seg??n ellos? ??Con qu?? archivo configuramos nuestro proyecto en Composer? ??Qu?? es JSON? Completa el tutorial de JSON. ??C??mo instalamos nuestras dependencias en Composer y qu?? archivo se genera? ??C??mo actualizamos nuestras dependencias a sus ??ltimas versiones? ??Qu?? es Packagist y c??mo se usa? ??C??mo cargamos (espec??ficamente autoloading) nuestras dependencias en PHP?
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
                  <p class="card-text">Crea un balance sencillo de ingresos y gastos. Para obtener el balance, habr?? que registrarse como usuario en una base de datos y despu??s iniciar sesi??n; las contrase??as estar??n almacenadas en hash mediante el algoritmo Bcrypt (usa password_hash y password_verify). Una vez iniciada la sesi??n correctamente, el usuario introducir??, mediante formularios, una serie de ingresos y gastos, pulsar?? en Generar y, a continuaci??n, ver?? un informe similar a ??ste en PDF. </p>
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
                  <p class="card-text">El usuario (cliente) iniciar?? sesi??n y realizar?? un pedido online de una o varias pizzas y podr?? elegir hasta 10 ingredientes o hasta 5 especialidades diferentes. El usuario podr?? a??adir/eliminar ingredientes/pizzas y vaciar la cesta de la compra para empezar de nuevo. El administrador (empresario) iniciar?? sesi??n y podr?? comprobar todos los pedidos de sus clientes y podr?? generar un informe. Dicho informe mostrar?? los pedidos de cada cliente y estad??sticas como precio medio del pedido, el ingrediente m??s y menos solicitado, la especialidad m??s y menos solicitada, etc.</p>
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

      <p>Antonio Jes??s Prieto Arjona &copy; </p>
      <p>pryet2@gmail.com </p>
    </div>
  </footer>


</body>

</html>