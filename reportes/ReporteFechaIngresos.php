<?php require_once "../vistas/vista_superior.php"?>
<?php require "conexion.php";?>
<!-- Inicio de contenido principal-->
<div class="container-fluid">
<div>
    <h1 class="h1 text-center display-4">Genera reporte de Asistencia</h1>

    <form action="RIF.php" method="post" autocomplete="off">

        <label>Fecha Desde:</label>
      <input type="date" class="form-control" placeholder="Fecha 1"  name="date1" required>
      <label>Hasta</label>
      <input type="date" class="form-control" placeholder="Fecha 2"  name="date2" required>
      <br>
        <button type="submit" class="btn btn-outline-warning btn-sm btn-block">Generar</button>
        <a class="btn btn-secondary btn-sm btn-block" href="javascript:history.back()">Volver</a>
    </form>
</div>
</div>
<!-- Fin de contenido principal-->
<?php require_once "../vistas/vista_inferior.php"?>