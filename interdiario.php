<?php include("../php/db.php");?>
<?php require_once "vistas/vista_superior.php"?>
<!-- Inicio de contenido principal-->
<div class="container-fluid">
<main>
   
   <h1 class="h1 text-center display-4">INTERDIARIO</h1>
        <form action= "" method="post" autocomplete="off">
	  <label>Fecha Desde:</label>
      <input type="datetime-local" class="form-control" placeholder="Fecha 1"  name="date1" required>
      <label>Hasta</label>
      <input type="datetime-local" class="form-control" placeholder="Fecha 2"  name="date2" required>
	  <br>
	  <button type="submit" class="btn btn-primary btn-block">Generar</button>
       </form>
	   
        <br>
		
      <table class="table table-sm table-hover" id="myTable">
	
	  <br>
        <thead>
          <tr>
            <th>#</th>
            <th>CLIENTES</th>
            <th>PLAN MATRICULADO</th>
            <th>RANGO DE FECHAS</th>
            <th>FECHA DE ASISTENCIA</th>
          </tr>
        </thead>
        <tbody>
          <!--where DATE(fecha_asistencia )=CURDATE() and m.estado_matricula='activo'-->
          <?php
		  $date1=$_POST["date1"];
		  $date2=$_POST["date2"];
          $query = "select @rownum:=@rownum+1 AS rownum,
          CONCAT(c.nombres,' ', c.apellido_paterno,' ', c.apellido_materno) as 'NombresCliente',
          p.descripcion,CONCAT('Inicio ',DATE_FORMAT(m.fecha_inicio, '%d-%m-%y'),' Vence ',DATE_FORMAT(m.fecha_fin, '%d-%m-%y')) as 'RangoFechas',DATE_FORMAT(ca.fecha_asistencia, '%d-%m-%y' ' %h:%i:%s %p') as 'Asistencia'
          from (SELECT @rownum:=0)r,matricula m
          inner join clientes c
          on c.id_clientes = m.id_clientes
          inner join control_asistencias ca
          on ca.id_clientes = c.id_clientes
          inner join plan p
          on p.id_plan = m.id_plan
		  where ca.fecha_asistencia between '$date1' and '$date2' and m.estado_matricula='activo' and p.secuencia='interdiario';
             ";
          $result_tasks = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
            <td><?php echo $row['rownum']; ?></td>
            <td><?php echo $row['NombresCliente']; ?></td>
            <td><?php echo $row['descripcion']; ?></td>
            <td><?php echo $row['RangoFechas']; ?></td>
            <td><?php echo $row['Asistencia']; ?></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
     
</main>
</div>
<!-- Fin de contenido principal-->
<?php require_once "vistas/vista_inferior.php"?>

