<?php include("../php/db.php");?>
<?php require_once "vistas/vista_superior.php"?>
<!-- Inicio de contenido principal-->
<div class="container-fluid">
<main>
      <!-- Formulario para registrar -->
        <h1 class="h2 text-center display-3">REGISTRO DE PERFILES</h1>
        <form action="../php/guardar_dato.php" method="POST">
        	<label for="">Nombre de Perfil</label>
        <input type="text" name="nombre" class="form-control form-control-sm">
        <label for="">Descripción</label>
        <textarea class="form-control form-control-sm" name="descripcion" rows="3"></textarea>
    <br>    
<input type="submit" name="guardar_perfil" class="btn btn-primary btn-block" value="Registrar Perfil">
</form> 
<table class="table table-sm table-hover" id="myTable">
        
        <thead>
          <tr>
            <th>#</th>
            <th>Perfil</th>
            <th>Descripción</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "select * from perfil";
          $result_tasks = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
            <td><?php echo $row['id_perfil']; ?></td>
            <td><?php echo $row['nombre']; ?></td>
            <td><?php echo $row['descripcion']; ?></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
</main> 
</div>
<!-- Fin de contenido principal-->
<?php require_once "vistas/vista_inferior.php"?>