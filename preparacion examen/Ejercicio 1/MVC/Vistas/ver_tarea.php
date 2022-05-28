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
    <a class='nav-link' href='index.php?acción=mostrar_inicio'>Inicio</a>
    <a class='nav-link active' href='index.php?acción=mostrar_ver_tarea'>Añadir tarea</a>
  </nav>
  <?php if (isset($_REQUEST["msg"])) { ?>
    <div class="alert alert-success text-center" role="alert">
      <?= $_REQUEST["msg"] ?>
    </div>
  <?php } ?>
  <h2 class='display-5 mt-4 mb-3 text-center'><?= $_REQUEST["titulo"] ?></h2>
  <?php
  $editar = isset($_REQUEST["tarea"]);
  ?>
  <form class=" container col-6" action="index.php" method="get">
    <input name="acción" type="hidden" value="<?= $editar ? 'editTarea' : 'addTarea' ?>">
    <input name="indice" type="hidden" value="<?= $editar ? $_REQUEST["indice"] : '' ?>">
    <div class="mb-3">
      <label for="queHacer" class="form-label">Que Hacer</label>
      <input name="queHacer" value="<?= $editar ? $_REQUEST["tarea"]->getQueHacer() : '' ?>" type="text" class="form-control" id="queHacer">
    </div>
    <div class="row  mb-3">
      <div class=" col-6">
        <label for="prioridad" class="form-label">Prioridad</label>
        <select name="prioridad" class="form-control" id="prioridad">
          <?php foreach ($_REQUEST["prioridades"] as $key => $prioridad) { ?>
            <option <?php if ($editar) {
                      if ($_REQUEST["tarea"]->getPrioridad()->getName() == $prioridad) { ?> selected <?php }
                           } ?>><?= $prioridad ?></option>
          <?php } ?>
        </select>
      </div>
      <div class="col-6">
        <label for="fechaTope" class="form-label">Fecha Tope</label>
        <input name="fechaTope" value="<?= $editar ? $_REQUEST["tarea"]->getfechaTope() : '' ?>" type="date" class="form-control" id="fechaTope">
      </div>
    </div>

    <input type="submit" class="btn btn-primary" value="<?= $editar ? 'Actualizar' : 'Guardar' ?>">

  </form>

</body>

</html>