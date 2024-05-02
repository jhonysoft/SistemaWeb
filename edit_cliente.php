<?php error_reporting(0);?>
<?php include("../php/db.php"); ?>
<?php require_once "vistas/vista_superior.php"?>
<!-- Inicio de contenido principal-->
<?php
if  (isset($_GET['id_clientes'])) {
  $id_clientes = $_GET['id_clientes'];
  $query = "SELECT * FROM clientes WHERE id_clientes=$id_clientes";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $nombres = $row['nombres'];
    $apellido_paterno = $row['apellido_paterno'];
    $apellido_materno = $row['apellido_materno'];
    $dni = $row['dni'];
    $fecha_nacimiento = $row['fecha_nacimiento'];
    $direccion = $row['direccion'];
    $celular = $row['celular'];
    $email = $row['email'];
    $sexo = $row['sexo'];
    $facebook = $row['facebook'];
    $contacto = $row['contacto'];  
    
  }
}

if (isset($_POST['update'])) {
  $id_clientes = $_GET['id_clientes'];
  $nombres= $_POST['nombres'];
  $apellido_paterno = $_POST['apellido_paterno'];
  $apellido_materno= $_POST['apellido_materno'];
  $dni = $_POST['dni'];
  $fecha_nacimiento= $_POST['fecha_nacimiento'];
  $direccion = $_POST['direccion'];
  $celular= $_POST['celular'];
  $email = $_POST['email'];
  $sexo= $_POST['sexo'];
  $facebook = $_POST['facebook'];
  $contacto= $_POST['contacto'];

  $query = "UPDATE clientes set nombres = '$nombres', apellido_paterno = '$apellido_paterno', apellido_materno = '$apellido_materno', dni = '$dni', fecha_nacimiento = '$fecha_nacimiento', direccion = '$direccion', celular = '$celular', email = '$email', sexo = '$sexo', facebook = '$facebook', contacto = '$contacto' WHERE id_clientes=$id_clientes";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Cliente Actualizado Satisfactoriamente';
  $_SESSION['message_type'] = 'warning';
  echo "<script>alert('Actualizado');window.history.go(-2)</script>";
}

?>

<div class="container-fluid">
        <h2 class="display-4 text-center display-3">Editar Cliente</h2>
      <form action="edit_cliente.php?id_clientes=<?php echo $_GET['id_clientes']; ?>" method="POST">
        <div class="form-group">
          <label for="">Nombre:</label>
          <input name="nombres" type="text" class="form-control form-control-sm" value="<?php echo $nombres; ?>" placeholder="Actualizar nombres de plan">
        </div>
        <div class="form-group">
          <label for="">Apellido Paterno:</label>
        <input name="apellido_paterno" type="text" class="form-control form-control-sm" value="<?php echo $apellido_paterno; ?>" placeholder="Actualizar descripción">
        </div>
            <div class="form-group">
            <label for="">Apellido Materno:</label>      
        <input name="apellido_materno" type="text" class="form-control form-control-sm" value="<?php echo $apellido_materno; ?>" placeholder="Actualizar precio">
        </div>
       
            <div class="form-group">
            <label for="">DNI:</label>
        <input name="dni" type="text" class="form-control form-control-sm" value="<?php echo $dni; ?>" placeholder="Actualizar dni">
        </div>
        
              <div class="form-group">
              <label for="">Fecha de Nacimiento:</label>
        <input name="fecha_nacimiento" type="text" class="form-control form-control-sm" value="<?php echo $fecha_nacimiento; ?>" placeholder="Actualizar fecha de nacimiento">
        </div>
             <div class="form-group">
             <label for="">Direccion:</label>
        <input name="direccion" type="text" class="form-control form-control-sm" value="<?php echo $direccion; ?>" placeholder="Actualizar dirección">
        </div>
      <div class="form-group">
      <label for="">Celular:</label>
        <input name="celular" type="text" class="form-control form-control-sm" value="<?php echo $celular; ?>" placeholder="Actualizar celular">
        </div>
              <div class="form-group">
              <label for="">Email:</label>
        <input name="email" type="text" class="form-control form-control-sm" value="<?php echo $email; ?>" placeholder="Actualizar email">
        </div>
              <div class="form-group">
              <label for="">Sexo:</label>
        <input name="sexo" type="text" class="form-control form-control-sm" value="<?php echo $sexo; ?>" placeholder="Actualizar sexo">
        </div>
              <div class="form-group">
              <label for="">Facebook:</label>
        <input name="facebook" type="text" class="form-control form-control-sm" value="<?php echo $facebook; ?>" placeholder="Actualizar facebook">
        </div>
              <div class="form-group">
              <label for="">Contacto:</label>
        <input name="contacto" type="text" class="form-control form-control-sm" value="<?php echo $contacto; ?>" placeholder="Actualizar como nos contacto">
        </div>
        <button class="btn btn-primary btn-block" name="update">
          Actualizar
        </button>
        <a class="btn btn-secondary btn-block" href="clientes.php">Cancelar</a>
      </form>
     
    </div>
  </div>
</div>
<!-- Fin de contenido principal-->
<?php require_once "vistas/vista_inferior.php"?>
