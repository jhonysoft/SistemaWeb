<?php require_once "vistas/vista_superior.php"?>
<?php require "conexion.php";?>
<!-- Inicio de contenido principal-->
   <div class="container-fluid">
    <h1 class="h1 text-center display-3">Generar reporte de Asistencia de clientes</h1>

    <form action="CAF.php" method="post" autocomplete="off">

        <label>Seleccione Fecha:</label>
      <input type="date" class="form-control" placeholder="Fecha"  name="date1" required>
      <br>
        <button type="submit" class="btn btn-primary btn-block">Generar</button>
    </form>
</div>
<!-- Fin de contenido principal-->
<?php require_once "vistas/vista_inferior.php"?>