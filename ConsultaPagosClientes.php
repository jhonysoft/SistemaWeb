<?php require_once "vistas/vista_superior.php"?>
<?php require "conexion.php";?>
<!-- Inicio de contenido principal-->
    <div class="container-fluid">
    <h1 class="h1 text-center display-3">Generar reporte de Pagos por Clientes</h1>

    <form action="CPC.php" method="post" autocomplete="off">

        <label>Ingrese Usuario:</label>
      <input type="text" class="form-control" placeholder="Ingrese Nombre de Cliente"  name="nombreCompleto" required>
      <br>
        <button type="submit" class="btn btn-primary btn-block">Generar</button>
    </form>
</div>
<!-- Fin de contenido principal-->
<?php require_once "vistas/vista_inferior.php"?>