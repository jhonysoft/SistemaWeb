<?php include("../php/db.php");?>
<?php require_once "vistas/vista_superior.php"?>
<!-- Inicio de contenido principal-->
<?php
$pagos = "select @rownum:=@rownum+1 AS rownum, concat(c.nombres,' ',c.apellido_paterno,' ' ,c.apellido_materno) as nombreCompleto,
p.abono as abonoPago, m.fecha_fin as fechaFin, p.observacion as detalle, pl.precio as precioPromocion,
p.fecha_pago as fechaPago, p.n_boleta as boleta
from (SELECT @rownum:=0) r, clientes c
inner join pago p
on c.id_clientes = p.id_clientes
inner join matricula m
on c.id_clientes = m.id_clientes
inner join plan pl
on m.id_plan = pl.id_plan
where m.estado_matricula='activo' "
;
?>
<div class="container-fluid">
<main>
      <!-- Formulario de Pagos -->
        <h1 class="h2 text-center display-4">REGISTRO DE PAGOS</h1>
        <form action="../php/guardar_dato.php" method="POST">
        <div class="form-group">
          <label for="inputMienbro">Miembro:</label>
        <select name="id_clientes" class="form-control form-control-sm buscar">
        <option value="0">Buscar por nombre o apellido</option>
        <?php
          $query = $conn -> query ("SELECT * FROM clientes ORDER BY id_clientes DESC");
          while ($valores = mysqli_fetch_array($query)) {
            echo "<option value=$valores[id_clientes]>$valores[nombres]&nbsp;$valores[apellido_paterno]&nbsp;$valores[apellido_materno]</option>";
          }
        ?>
      </select>
  </div>
<div class="form-row">
  <div class="form-group col-md-2">
            <label for="inputAbono">Abono:</label>
            <input type="number" name="abono" placeholder="S/. " class="form-control form-control-sm" required>
          </div>
  <div class="form-group col-md-10">
            <label for="inputAbono">Observación:</label>
           <input type="text" name="observacion" class="form-control form-control-sm">
          </div>
  <div class="form-group">
        <input name="fecha_pago" type="hidden" class="form-control" >
    </div>

  <div class="form-group col-md-12">
    <label for="inputBoleta">Numero de Boleta:</label>
            <input type="text" name="n_boleta" placeholder="Ingrese el n° boleta" class="form-control form-control-sm"  maxlength="11" value="1000-">
            <small id="passwordHelpBlock" class="form-text text-muted">Numero de Boleta - Ejem. N°1000-000</small>
  </div>
  </div>


<input type="submit" name="guardar_pago" class="btn btn-primary btn-block" value="Registrar">
    </form>
<div class="form-group pt-2">
 <!-- Button trigger modal -->
   <button type="button" class="btn btn-outline-secondary btn-block" data-toggle="modal" data-target="#exampleModal">
  Listado de pagos
</button>
    </div>
      
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable" style="min-width: 90%;">
    <div class="modal-content">
      <div class="modal-header bg-light">
        <h5 class="modal-title" id="exampleModalLabel">Pagos registrados en el sistema</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <table class="table table-sm table-hover" id="myTable">
           <thead class="bg-light">
           <tr>
               <th>#</th>
               <th>NOMBRES</th>
               <th>ABONO</th>
               <th>FECHA PAGO</th>
               <th>OBSERVACION</th>
               <th>P.PROMOCION</th>
               <th>FECHA FIN</th>
               <th>BOLETA</th>
           </tr>
           </thead>
           <tbody>
           <?php
           $resultado = mysqli_query($conn,$pagos);
           while($row=mysqli_fetch_assoc($resultado)){ ?>
           <tr>
               <td><?php echo $row["rownum"];?></td>
               <td><?php echo $row["nombreCompleto"];?></td>
               <td><?php echo $row["abonoPago"];?></td>
               <td><?php echo $row["fechaPago"];?></td>
               <td><?php echo $row["detalle"];?></td>
               <td><?php echo $row["precioPromocion"];?></td>
               <td><?php echo $row["fechaFin"];?></td>
               <td><?php echo $row["boleta"];?></td>
           <?php } mysqli_free_result($resultado);?>
           </tr>
           </tbody>
       </table>
      </div>
      </div>
    </div>
    </div>
</main>
</div>
<!-- Fin de contenido principal-->
<?php require_once "vistas/vista_inferior.php"?>
