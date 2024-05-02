<?php require_once "vistas/vista_superior.php"?>
<?php include("../php/db.php");?>
<!-- Inicio de contenido principal-->
<div class="container-fluid">
<?php
$matricula="
SELECT  @rownum:=@rownum+1 AS rownum, clientes.id_clientes, CONCAT(clientes.nombres,' ' ,clientes.apellido_paterno,' ', clientes.apellido_materno) as nombreCompleto,
matricula.id_matricula, plan.nombre_plan as nombrePlan, fecha_inicio, fecha_fin, estado_matricula
             from (SELECT @rownum:=0)r, matricula
             inner join clientes on matricula.id_clientes = clientes.id_clientes
             inner join plan on matricula.id_plan = plan.id_plan
";
?>
<?php
//fetch data from database
$result = mysqli_query($conexion, $matricula) or die("Error " . mysqli_error($conexion));
?>
<main>
      <!-- Formulario para registrar -->
        <h1 class="h2 text-center display-4">REGISTRO DE MATRICULAS</h1>
        <form action="../php/guardar_dato.php" method="POST">
        <br>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputSex">Cliente</label>
          <select name="id_clientes" class="form-control form-control-sm buscar">
        <option value="0">Seleccionar plan...</option>
        <?php
          $query = $conn -> query ("select id_clientes,CONCAT(apellido_paterno,' ',apellido_materno,' ',nombres) 
  AS 'nombreCompleto' from clientes");
          while ($valores = mysqli_fetch_array($query)) {
            echo "<option value=$valores[id_clientes]>$valores[nombreCompleto]</option>";
    }
        ?>      
      </select>
    </div>
    <div class="form-group col-md-6">
      <label for="inputSex">Plan</label>
        <select name="id_plan" class="form-control form-control-sm buscar">
        <option value="0">Seleccionar plan...</option>
        <?php
          $query = $conn -> query ("SELECT * FROM plan");
          while ($valores = mysqli_fetch_array($query)) {
            echo "<option value=$valores[id_plan]>$valores[nombre_plan]&nbsp;S/.&nbsp;$valores[precio]</option>";
    }
        ?>      
      </select>
    </div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-6">
    <label for="inputDate">Fecha Inicio</label>
    <input type="date" class="form-control form-control-sm" id="inputDate" name="fecha_inicio" placeholder="Fecha">
  </div>
  <div class="form-group col-md-6">
    <label for="inputDate">Fecha Final</label>
    <input type="date" class="form-control form-control-sm" id="inputDate" name="fecha_fin" placeholder="Fecha">
  </div>
</div>
<br>
<input type="submit" name="Guardar_matricula" class="btn btn-primary btn-block" value="Registrar Matricula">
</form>
<div class="form-group pt-2">
       <!-- Button trigger modal -->
<button type="button" class="btn btn-outline-secondary btn-sm btn-block" data-toggle="modal" data-target="#exampleModal">
  Listado de Clientes Matriculados en Sistema
</button>
    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable" style="min-width: 90%;">
    <div class="modal-content">
      <div class="modal-header bg-light">
        <h5 class="modal-title" id="exampleModalLabel">LISTADO DE CLIENTES MATRICULADOS EN SISTEMA</h5>
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
        <th>CODIGO MATRICULA</th>
        <th>PLAN</th>
        <th>FECHA INICIO</th>
        <th>FECHA FIN</th>
        <th>ESTADO</th>
        <th>OPERACIONES</th>
    </tr> 
   </thead>
   <tbody>
   <?php 
    $resultado = mysqli_query($conn,$matricula); 
    while($row=mysqli_fetch_assoc($resultado)){?> 
    
    <tr>
        <td><?php echo($row["rownum"]); ?></td>
        <td><?php echo($row["nombreCompleto"]); ?></td>
        <td><?php echo($row["id_matricula"]); ?></td>
        <td><?php echo($row["nombrePlan"]); ?></td>
        <td><?php echo($row["fecha_inicio"]); ?></td>
        <td><?php echo($row["fecha_fin"]); ?></td>
        <td><?php echo($row["estado_matricula"]); ?></td>
        <td><a href="edit_matricula.php?id_matricula=<?php echo $row['id_matricula']; ?>"><i class="fas fa-edit"></i></a></td>
      <?php } mysqli_free_result($resultado); ?>
    </tr>
   </tbody> 
</table>
      </div>
      </div>
    </div>
    </div>
    </div>  
</main> 
</div>
<!-- Fin de contenido principal-->
<?php require_once "vistas/vista_inferior.php"?>
