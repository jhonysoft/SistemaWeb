<?php include("../php/db.php");?>
<?php require_once "vistas/vista_superior.php"?>
<!-- Inicio de contenido principal-->
<div class="container-fluid">
<main>
      <!-- Formulario para registrar -->
        <h1 class="h2 text-center display-4">REGISTRO DE USUARIOS</h1>
        <form action="../php/guardar_dato.php" method="POST">
        <div class="form-group">
        <label for="">Nombre de Usuario:</label>
        <input type="text" name="nombre" class="form-control form-control-sm" placeholder="Ingrese su nombre de usuario..." required>
        </div>
        <div class="form-group">
        <label for="">Email:</label>
        <input type="text" name="email" class="form-control form-control-sm" placeholder="Ingrese su email..." required>
        </div>
        <div class="form-group">
        <label for="">Clave:</label>
        <input type="password" name="clave" class="form-control form-control-sm" placeholder="Ingrese su clave..." required>
        </div>
        <div class="form-group">
        <label for="">Perfil de Usuario:</label>
        <select name="id_perfil" class="form-control form-control-sm">
        <option value="0">Seleccionar perfil</option>
        <?php
          $query = $conn -> query ("SELECT * FROM perfil");
          while ($valores = mysqli_fetch_array($query)) {
            echo "<option value=$valores[id_perfil]>$valores[nombre]</option>";
          }
        ?>
      </select>
        </div>   
<input type="submit" name="Guardar_usuario" class="btn btn-primary btn-block" value="Registrar Usuario">
</form> 
<table class="table table-sm table-hover" id="myTable">
        
        <thead>
          <tr>
            <th>#</th>
            <th>Usuario</th>
            <th>email</th>
            <th>Peril</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = " select u.id_usuario, u.nombre, u.email, p.nombre as 'nombrePerfil'
          from usuarios u
          inner join perfil p
          on u.id_perfil = p.id_perfil";
          $result_tasks = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
            <td><?php echo $row['id_usuario']; ?></td>
            <td><?php echo $row['nombre']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['nombrePerfil']; ?></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
</main> 
</div>
<!-- Fin de contenido principal-->
<?php require_once "vistas/vista_inferior.php"?>
