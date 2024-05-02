<?php require_once "vistas/vista_superior.php"?>
<?php include("../php/db.php");?>
<?php require "conexion.php";?>
<!-- Inicio de contenido principal-->
<div class="container-fluid">
<?php
$interdiario="select @rownum:=@rownum+1 AS rownum,CONCAT(c.nombres,' ', c.apellido_paterno,' ', c.apellido_materno) as 'NOMBRES',
          p.descripcion as 'DESCRIPCION',CONCAT('Inicio ',m.fecha_inicio,' Vence ',m.fecha_fin) as 'RANGO DE FECHAS',ca.fecha_asistencia as 'FECHA ASISTENCIA',p.secuencia as 'FRECUENCIA'
          from (SELECT @rownum:=0) r, gym.matricula m
          inner join clientes c
          on c.id_clientes = m.id_clientes
          inner join gym.control_asistencias ca
          on ca.id_clientes = c.id_clientes
          inner join gym.plan p
          on p.id_plan = m.id_plan
          where p.secuencia = 'interdiario';" ;
?>
     <?php
//fetch data from database
$result = mysqli_query($conexion, $ReporteInterdiarios) or die("Error " . mysqli_error($conexion));
?>
<div>
    <h1 class="h1 text-center display-4">REPORTE DE INTERDIARIOS</h1>

    <form action="PDI.php" method="post" autocomplete="off">

        <label>Fecha Desde:</label>
      <input type="datetime-local" class="form-control" placeholder="Fecha 1"  name="date1" required>
      <label>Hasta</label>
      <input type="datetime-local" class="form-control" placeholder="Fecha 2"  name="date2" required>
      <br>
        <button type="submit" class="btn btn-primary btn-block">Generar</button>

    </form>
    <div class="form-group pt-2">
    <button type="button" class="btn btn-outline-secondary btn-sm btn-block" data-toggle="modal" data-target="#exampleModal">
  Listado de interdiarios
</button>
    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable" style="min-width: 90%;">
    <div class="modal-content">
      <div class="modal-header bg-light">
        <h5 class="modal-title" id="exampleModalLabel">LISTADO DE CLIENTES INTERDIARIOS</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<table class="table table-sm table-hover" id="myTable">
 <thead class="bg-light">
    <tr>
       <th>#</th>
        <th>CLIENTE</th>
        <th>DETALLE</th>
        <th>FECHA</th>
        <th>ASISTENCIA</th>
        <th>FRECUENCIA</th>

        <!--<th>OPERACIONES</th>-->
    </tr>
   </thead>
   <tbody>
   <?php
    $resultado = mysqli_query($conn,$ReporteInterdiarios);
    while($row=mysqli_fetch_assoc($resultado)){?>

    <tr>
        <td><?php echo($row["rownum"]); ?></td>
        <td><?php echo($row["nombres"]); ?></td>
        <td><?php echo($row["descripcion"]); ?></td>
        <td><?php echo($row["rango de fechas"]); ?></td>
        <td><?php echo($row["fecha asistencia"]); ?></td>
        <td><?php echo($row["frecuencia"]); ?></td>


        <?php echo $row['m.id_matricula']; ?>"><i class="fas fa-edit"></i></a></td>
      <?php } mysqli_free_result($resultado); ?>
    </tr>
    
    
    
    
    
    
    
    
</div>
</div>
<!-- Fin de contenido principal-->
<?php require_once "vistas/vista_inferior.php"?>
