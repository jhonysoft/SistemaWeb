<?php require_once "vistas/vista_superior.php"?>
<?php require "conexion.php";?>
<!-- Inicio de contenido principal-->
   <div class="container-fluid">
   <div>
    <h1 class="h1 text-center display-4">GENERAR REPORTE DE PAGOS - CLIENTES MENSUALES</h1>
    <form action="PDD.php" method="post" autocomplete="off">

          <label>Fecha Desde:</label>
      <input type="datetime-local" class="form-control" placeholder="Fecha 1"  name="date1" required>
      <label>Hasta</label>
      <input type="datetime-local" class="form-control" placeholder="Fecha 2"  name="date2" required>
      <br>
        <button type="submit" class="btn btn-primary btn-block">Generar</button>
    </form>

        <!--<label>Seleccione Fecha:</label>
      <input type="date" class="form-control" placeholder="Fecha"  name="date1" required>
      <br>
        <button type="submit" class="btn btn-primary btn-block">Generar</button>
    </form>-->
</div>
</div>
<!-- Fin de contenido principal-->
<?php require_once "vistas/vista_inferior.php"?>
