<!DOCTYPE html>
<html lang='es'>

<head>
  <meta charset='utf-8'>
  <title>MVC básico</title>
  <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet' />
</head>

<body class='container'>

  <h1 class='display-3 mt-1 mb-4'>MVC básico</h1>

  <nav class='nav nav-pills'>
    <a class='nav-link active' href='index.php?acción=mostrar_inicio'>Inicio</a>
    <a class='nav-link' href='index.php?acción=mostrar_ver_tarea'>Añadir tarea</a>
  </nav>

  <h2 class='display-5 mt-4 mb-3'>Inicio</h2>

  <p>Página de inicio.</p>
  <table class="table">
    <thead>
      <tr>
        <th>Que Hacer</th>
        <th>Prioridad</th>
        <th>Fecha de creación</th>
        <th>Fecha tope</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php if(isset($_REQUEST["tareas"])){
        foreach ($_REQUEST["tareas"] as $key => $tarea) { ?>
        <tr>
          <td><?= $tarea->getQueHacer() ?></td>
          <td><?= $tarea->getPrioridad()->getName() ?></td>
          <td><?= $tarea->getFechaCreacion() ?></td>
          <td><?= $tarea->getfechaTope()=="0000-01-01"?"-":$tarea->getfechaTope() ?></td>
          <td><a class="btn btn-danger" href="index.php?acción=delTarea&&indice=<?=$key?>">Borrar</a>
          <a class="btn btn-warning" href="index.php?acción=editForm&&indice=<?=$key?>">Editar</a>
          </td>
        </tr>
      <?php } 
        }?>
    </tbody>
  </table>
  <?php if (!isset($_REQUEST["tareas"])||count($_REQUEST["tareas"])==0) { ?>
    <p>No hay tareas que mostrar</p>
  <?php } ?>
</body>

</html>