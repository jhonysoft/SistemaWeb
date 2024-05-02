<?php include("../php/db.php");?>
<?php require_once "vistas/vista_superior.php"?>
<!-- Inicio de contenido principal-->
<div class="container-fluid">
<main>
  <br>
  <h1 class="h2 text-center display-4">CONTROL DE ASISTENCIA - LIBRE</h1>
      <!-- Registro DE FORMULARIO -->
        <form action="../php/guardar_dato.php" method="POST">  
        <input name="fecha_pago" type="hidden" class="form-control" >
        <div class="row">
            <div class="col-9">
            <label for="inputDate">Nombres:</label>
            <input type="text" name="nombres" placeholder="Ingrese nombres... " class="form-control form-control-sm">
            </div>
            <div class="col-3">
            <label for="inputDate">Abono</label>
            <input type="number" name="abono" placeholder="Ingrese pago a realizar S/." class="form-control form-control-sm">
          </div>
        </div>
        <br>
            <input type="submit" name="guardar_libre" class="btn btn-primary btn-block" value="Registrar">
        </form>
      <br>
      <table class="table table-sm table-hover " id="myTable">
        <thead>
         <tr>
            <th>#</th>
            <th>FECHA DE INGRESO</th>
            <th>NOMBRES</th>
            <th>PRECIO</th>
          </tr>
        </thead>
        <tbody>
          <?php
          #$libre = "SELECT * FROM libre where DATE(fecha_pago)=CURDATE();";
          #$libre = "SELECT * FROM libre where DATE(fecha_pago)=CURDATE();";
          $libre="SELECT @rownum:=@rownum+1 AS rownum, fecha_pago, nombres, abono  FROM (SELECT @rownum:=0) r, libre where DATE(fecha_pago)=CURDATE()";
          $resultado = mysqli_query($conn, $libre);

          while($row = mysqli_fetch_assoc($resultado)) { ?>
          <tr>
            <td><?php echo $row['rownum'] ?></td>
            <td><?php echo $row['fecha_pago']; ?></td>
            <td><?php echo $row['nombres']; ?></td>
            <td><?php echo $row['abono']; ?></td>
           <?php } mysqli_free_result($resultado);?>
          </tr>
        </tbody>
      </table>

</main>
</div>
<!-- Fin de contenido principal-->
<?php require_once "vistas/vista_inferior.php"?>
