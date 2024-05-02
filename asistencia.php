<?php include("../php/db.php");?>
<?php require_once "vistas/vista_superior.php"?>
<!-- Inicio de contenido principal-->
<div class="container-fluid">
<main>
      <!-- Formulario para registrar -->
        <h1 class="h2 text-center display-4">CONTROL DE ASISTENCIA - MENSUALES</h1>
        <form action="../php/guardar_dato.php" method="POST">
          <div class="form-group">
            <select name="id_clientes" class="form-control form-control-sm buscar" required>
            <option value="0">Ingrese nombre o apellido</option>
            <?php
            $query = $conn -> query ("
              select clientes.id_clientes as codigo, CONCAT(clientes.nombres,' ' ,clientes.apellido_paterno,' ', clientes.apellido_materno) as nombreCompleto,
 matricula.estado_matricula as estadoMatriculado
 from matricula
 inner join clientes 
 on matricula.id_clientes = clientes.id_clientes
 where matricula.estado_matricula='activo';
              ");
                            while ($valores = mysqli_fetch_array($query)) {
                              echo "<option value=$valores[codigo]>$valores[nombreCompleto]</option>";
                            }
                          ?>
                        </select>
                      </div>
                      <div class="form-group">
        <input name="fecha_asistencia" type="hidden" class="form-control" >
        </div>
         <div class="form-group">
        <input name="estado" type="hidden" class="form-control" value="ASISTIO" placeholder="Actualizar estado">
        </div>
          <input type="submit" name="guardar_asistencia" class="btn btn-primary btn-block" value="Registrar Asistencia">
        </form>
        <br>
       <table class="table table-sm table-hover" id="myTable">
        
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

          <?php
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
          where DATE(fecha_asistencia )=CURDATE() and m.estado_matricula='activo';
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
