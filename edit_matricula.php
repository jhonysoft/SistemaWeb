<?php include("../php/db.php");?>
<?php require_once "vistas/vista_superior.php"?>
<!-- Inicio de contenido principal-->
<?php
if  (isset($_GET['id_matricula'])) {
  $id_matricula = $_GET['id_matricula'];
  $query = "SELECT * FROM matricula WHERE id_matricula=$id_matricula";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $fecha_inicio  = $row['fecha_inicio'];
    $fecha_fin = $row['fecha_fin'];
    $estado_matricula = $row['estado_matricula'];   
  }
}

if (isset($_POST['update'])) {
  $id_matricula = $_GET['id_matricula'];
  $fecha_inicio= $_POST['fecha_inicio'];
  $fecha_fin = $_POST['fecha_fin'];
  $estado_matricula= $_POST['estado_matricula'];

  $query = "UPDATE matricula set fecha_inicio = '$fecha_inicio', fecha_fin = '$fecha_fin', estado_matricula = '$estado_matricula' WHERE id_matricula=$id_matricula";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Matricula Actualizada Satisfactoriamente';
  $_SESSION['message_type'] = 'warning';
  echo "<script>alert('Actualizado');window.history.go(-2)</script>";
}
?>
<div class="container-fluid">
        <h2 class="display-4 text-center display-3">Editar Matricula</h2>
      <form action="edit_matricula.php?id_matricula=<?php echo $_GET['id_matricula']; ?>" method="POST">
        <div class="row">
        <div class="form-group col-6">
          <label for="fechaInicio">Fecha Inicio:</label>
          <input name="fecha_inicio" type="text" class="form-control form-control-sm" value="<?php echo $fecha_inicio; ?>" placeholder="Actualizar Fecha de inicio">
        </div>
        <div class="form-group col-6">
          <label for="fechaFinal">Fecha Final:</label>
        <input name="fecha_fin" type="text" class="form-control form-control-sm" value="<?php echo $fecha_fin; ?>" placeholder="Actualizar Fecha Inicial">
        </div>
      </div>
        <div class="form-group">
          <label for="estado">Estado:</label>
        <select name="estado_matricula" class="custom-select custom-select-sm">
         <option value="<?php echo $estado_matricula;?>"><?php echo $estado_matricula;?></option>
         <option value="activo">Activo</option>
         <option value="inactivo">Inactivo</option>
       </select> 
        </div>
       
        <button class="btn btn-primary  btn-block" name="update">
          Actualizar
        </button>
        <a class="btn btn-outline-secondary btn-block" href="matricula.php">Cancelar</a>
      </form>
      </div>
<!-- Fin de contenido principal-->
<?php require_once "vistas/vista_inferior.php"?> 
