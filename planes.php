<?php include("../php/db.php");?>
<?php require_once "vistas/vista_superior.php"?>
<!-- Inicio de contenido principal-->
<div class="container-fluid">
<main>
  <br>
  <h1 class="h2 text-center display-4">REGISTRO DE PLANES Y PROMOCIONES</h1>
      <!-- Formuario -->
      <div>
        <form action="../php/guardar_dato.php" method="POST">

          <div class="form-group">
            <label for="inputSex">Nombre:</label>
            <input type="text" name="nombre_plan" placeholder="Ingrese el nombre..." class="form-control form-control-sm" required>
          </div>

           <div class="form-group">
             <label for="inputSex">Descripcion:</label>
            <textarea class="form-control form-control-sm" name="descripcion" id="exampleFormControlTextarea1" rows="2" placeholder="Ingrese descripción del plan..."></textarea>
          </div>

          <div class="form-group">
            <label for="inputSex">Precio:</label>
            <input type="number" name="precio" placeholder="Ingrese el precio del plan" class="form-control form-control-sm">
          </div>

          <div class="form-group">
            <label for="inputSex">Seleccione secuencia:</label>
          <select name="secuencia" class="custom-select custom-select-sm" aria-label="Default select example">
            <option selected>Seleccione secuencia:</option>
            <option value="diario">Diario</option>
            <option value="interdiario">Interdiario</option>

          </select>
          </div>

            <input type="submit" name="guardar_plan" class="btn btn-primary btn-block" value="Registrar">
        </form>
      </div>
     <hr>
      <table class="table table-sm table-hover" id="myTable">
        <thead>
          <tr>
            <th>Plan</th>
            <th>Descripcion</th>
            <th>Precio</th>
            <th>Secuencia</th>
            <th>Accion</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM plan";
          $result_tasks = mysqli_query($conn, $query);

          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>

            <td><?php echo $row['nombre_plan']; ?></td>
            <td><?php echo $row['descripcion']; ?></td>
            <td><?php echo $row['precio']; ?></td>
            <td><?php echo $row['secuencia']; ?></td>

            <td>
              <a href="edit_planes.php?id_plan=<?php echo $row['id_plan']?>">
                <i class="fas fa-edit"></i>
              </a>&nbsp;
              <a href="delete_planes.php?id_plan=<?php echo $row['id_plan']?>">
                <i class="fas fa-trash"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>

</main>
</div>
<!-- Fin de contenido principal-->
<?php require_once "vistas/vista_inferior.php"?>