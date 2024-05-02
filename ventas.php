<?php include("../php/db.php");?>
<?php require_once "vistas/vista_superior.php"?>
<!-- Inicio de contenido principal-->
<div class="container-fluid">
<main>
  <br>
  <h1 class="h2 text-center display-4">VENTAS DE PRODUCTOS</h1>
      <!-- Registro DE FORMULARIO -->
        <form action="../php/guardar_dato.php" method="POST">  
        <input name="fecha_venta" type="hidden" class="form-control" >
        <div class="row">
            <div class="col-9">
            <label for="inputDate">Productos:</label>
            <input type="text" name="productos" placeholder="Ingrese producto vendido... " class="form-control form-control-sm">
            </div>
            <div class="col-3">
            <label for="inputDate">Precio</label>
            <input type="float" name="precio" placeholder="Ingrese costo del producto S/." class="form-control form-control-sm">
          </div>
        </div>
        <br>
            <input type="submit" name="guardar_venta" class="btn btn-primary btn-block" value="Registrar">
        </form>
      <br>
      <table class="table table-sm table-hover " id="myTable">
        <thead>
         <tr>
            <th>#</th>
            <th>FECHA DE VENTA</th>
            <th>PRODUCTOS</th>
            <th>PRECIO</th>
          </tr>
        </thead>
        <tbody>
          <?php
         #$ventas = "SELECT * FROM ventas where DATE(fecha_venta)=CURDATE();";
          $ventas = "SELECT @rownum:=@rownum+1 AS rownum, fecha_venta, productos, precio  FROM (SELECT @rownum:=0) r, ventas where DATE(fecha_venta)=CURDATE()";
          $resultado = mysqli_query($conn, $ventas);

          while($row = mysqli_fetch_assoc($resultado)) { ?>
          <tr>
            <td><?php echo $row['rownum'] ?></td>
            <td><?php echo $row['fecha_venta']; ?></td>
            <td><?php echo $row['productos']; ?></td>
            <td><?php echo $row['precio']; ?></td>
           <?php } mysqli_free_result($resultado);?>
          </tr>
        </tbody>
      </table>

</main>
</div>
<!-- Fin de contenido principal-->
<?php require_once "vistas/vista_inferior.php"?>
