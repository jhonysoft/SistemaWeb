<?php error_reporting(0);?>
<?php include("../php/db.php"); ?>
<?php require_once "vistas/vista_superior.php"?>
<!-- Inicio de contenido principal-->
<?php
if  (isset($_GET['id_plan'])) {
  $id_plan = $_GET['id_plan'];
  $query = "SELECT * FROM plan WHERE id_plan=$id_plan";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $nombre_plan = $row['nombre_plan'];
    $descripcion = $row['descripcion'];
    $precio = $row['precio'];
    $secuencia = $row['secuencia'];
    
  }
}

if (isset($_POST['update'])) {
  $id_plan = $_GET['id_plan'];
  $nombre_plan= $_POST['nombre_plan'];
  $descripcion = $_POST['descripcion'];
  $precio= $_POST['precio'];
  $secuencia = $_POST['secuencia'];
    

  $query = "UPDATE plan set nombre_plan = '$nombre_plan', descripcion = '$descripcion', precio = '$precio', secuencia = '$secuencia' WHERE id_plan=$id_plan";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Usuario Actualizado Satisfactoriamente';
  $_SESSION['message_type'] = 'warning';
  echo "<script>alert('Actualizado');window.history.go(-2)</script>";
}

?>

<div class="container-fluid">

        <h2 class="display-4 text-center display-3">Editar Planes y Promociones</h2>
      <form action="edit_planes.php?id_plan=<?php echo $_GET['id_plan']; ?>" method="POST">
        <div class="form-group">
          <label for="">Nombre de Plan:</label>
          <input name="nombre_plan" type="text" class="form-control form-control-sm" value="<?php echo $nombre_plan; ?>" placeholder="Actualizar nombres de plan">
        </div>
        <div class="form-group">
        <label for="">Descripción de Plan:</label>
        <input name="descripcion" type="text" class="form-control form-control-sm" value="<?php echo $descripcion; ?>" placeholder="Actualizar descripción">
        </div>
            <div class="form-group">
            <label for="">Precio de Plan:</label>
        <input name="precio" type="text" class="form-control form-control-sm" value="<?php echo $precio; ?>" placeholder="Actualizar precio">
        </div>
       
            <div class="form-group">
            <label for="">Nombre de Plan:</label>
        <input name="secuencia" type="text" class="form-control form-control-sm" value="<?php echo $secuencia; ?>" placeholder="Actualizar secuencia">
        </div>
       

        <button class="btn btn-primary btn-block" name="update">
          Actualizar
        </button>
      <a class="btn btn-outline-secondary btn-block" href="planes.php">Cancelar</a>
      </form>
   
    </div>
<!-- Fin de contenido principal-->
<?php require_once "vistas/vista_inferior.php"?>

