<?php

include('db.php');

if (isset($_POST['Guardar_cliente'])) {
  $nombres = $_POST['nombres'];
  $apellido_paterno = $_POST['apellido_paterno'];
  $apellido_materno = $_POST['apellido_materno'];
  $dni = $_POST['dni'];
  $fecha_nacimiento = $_POST['fecha_nacimiento'];
  $direccion = $_POST['direccion'];
  $celular = $_POST['celular'];
  $email = $_POST['email'];
  $sexo = $_POST['sexo'];
  $facebook = $_POST['facebook'];
  $contacto = $_POST['contacto'];
  $check=mysqli_query($conn,"select * from clientes where nombres='$nombres' and apellido_paterno='$apellido_paterno' and apellido_materno='$apellido_materno'");
  $checkfila=mysqli_num_rows($check);

   if($checkfila>0) {
      echo "<script>alert('El Cliente ya existe');window.history.back();</script>";
   } else {
  $query = "INSERT INTO clientes(nombres, apellido_paterno,apellido_materno,dni,fecha_nacimiento,direccion,celular,email,sexo,facebook,contacto) VALUES ('$nombres','$apellido_paterno','$apellido_materno','$dni','$fecha_nacimiento','$direccion','$celular','$email','$sexo','$facebook','$contacto')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Error de consulta.");
  }
  $_SESSION['message'] = 'Cliente Registrado Satisfactoriamente';
  $_SESSION['message_type'] = 'success';
  header('Location: ../admin/clientes.php');
}
}else if (isset($_POST['Guardar_matricula'])) {
  $id_clientes = $_POST['id_clientes'];
  $id_plan = $_POST['id_plan'];
  $fecha_inicio = $_POST['fecha_inicio'];
  $fecha_fin = $_POST['fecha_fin'];
  $query = "INSERT INTO matricula(id_clientes,id_plan,fecha_inicio,fecha_fin,estado_matricula) VALUES ('$id_clientes','$id_plan','$fecha_inicio','$fecha_fin','activo')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Error de consulta.");
  }

  $_SESSION['message'] = 'Matricula Registrado Satisfactoriamente';
  $_SESSION['message_type'] = 'success';
  header('Location: ../admin/matricula.php');

}
else if(isset($_POST['guardar_asistencia'])) {
  $id_clientes = $_POST['id_clientes'];
  $estado = $_POST['estado'];
  $query = "INSERT INTO control_asistencias(id_clientes,estado) VALUES ('$id_clientes','$estado')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Error de consulta.");
  }

  $_SESSION['message'] = 'Asistencia Registrada Satisfactoriamente';
  $_SESSION['message_type'] = 'success';
  header('Location: ../admin/asistencia.php');

}

else if (isset($_POST['guardar_pago'])) {
  $id_clientes = $_POST['id_clientes'];
  $abono = $_POST['abono'];
  $observacion = $_POST['observacion'];
  #$fecha_pago = $_POST['fecha_pago'];
  $n_boleta = $_POST['n_boleta'];
  $query = "INSERT INTO pago(id_clientes, abono, observacion, n_boleta) VALUES ('$id_clientes','$abono','$observacion','$n_boleta')";
  #$query = "INSERT INTO pago(id_clientes, abono, observacion, fecha_pago, n_boleta) VALUES ('$id_clientes','$abono','$observacion','$fecha_pago', '$n_boleta')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Error de consulta.");
  }

  $_SESSION['message'] = 'Pago Registrado Satisfactoriamente';
  $_SESSION['message_type'] = 'success';
  header('Location: ../admin/pagos.php');

}
else if (isset($_POST['guardar_plan'])) {
  $nombre_plan = $_POST['nombre_plan'];
  $descripcion = $_POST['descripcion'];
  $precio = $_POST['precio'];
  $secuencia = $_POST['secuencia'];
  $check=mysqli_query($conn,"select * from plan where nombre_plan='$nombre_plan'");
  $checkfila=mysqli_num_rows($check);

   if($checkfila>0) {
      echo "<script>alert('El nombre de Plan existe, intente con otro');window.history.back();</script>";
   } else {
  $query = "INSERT INTO plan(nombre_plan,descripcion,precio,secuencia) VALUES ('$nombre_plan','$descripcion','$precio','$secuencia')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Plan Registrado Satisfactoriamente';
  $_SESSION['message_type'] = 'success';
  header('Location: ../admin/planes.php');
}
}

else if (isset($_POST['guardar_libre'])) {
  #$fecha_pago = $_POST['fecha_pago'];
  $nombres = $_POST['nombres'];
  $abono = $_POST['abono'];
  #$query = "INSERT INTO libre(fecha_pago, nombres, abono) VALUES ('$fecha_pago','$nombres','$abono')";
  $query = "INSERT INTO libre(nombres, abono) VALUES ('$nombres','$abono')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Pago Registrado Satisfactoriamente';
  $_SESSION['message_type'] = 'success';
  header('Location: ../admin/libre.php');

}
   else if (isset($_POST['guardar_venta'])) {
  #$fecha_pago = $_POST['fecha_pago'];
  $productos = $_POST['productos'];
  $precio = $_POST['precio'];
  #$query = "INSERT INTO libre(fecha_pago, nombres, abono) VALUES ('$fecha_pago','$nombres','$abono')";
  $query = "INSERT INTO ventas(productos, precio) VALUES ('$productos','$precio')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Pago Registrado Satisfactoriamente';
  $_SESSION['message_type'] = 'success';
  header('Location: ../admin/ventas.php');

}
else if (isset($_POST['Guardar_usuario'])) {
  $nombre = $_POST['nombre'];
  $email = $_POST['email'];
  $clave = $_POST['clave'];
  $id_perfil = $_POST['id_perfil'];
  $check=mysqli_query($conn,"select * from usuarios where nombre='$nombre' or email='$email'");
    $checkfila=mysqli_num_rows($check);

   if($checkfila>0) {
      echo "<script>alert('El nombre de usuario y/o email ya esta en uso, intente con otro');window.history.back();</script>";
   } else {  
  $query = "INSERT INTO usuarios(nombre, email,clave,id_perfil) VALUES ('$nombre','$email','$clave','$id_perfil')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Usuario Registrado Satisfactoriamente';
  $_SESSION['message_type'] = 'success';
  header('Location: ../admin/usuarios.php');
}
}
else if (isset($_POST['guardar_perfil'])) {
  $nombre = $_POST['nombre'];
  $descripcion = $_POST['descripcion'];
  $check=mysqli_query($conn,"select * from perfil where nombre='$nombre'");
    $checkfila=mysqli_num_rows($check);

   if($checkfila>0) {
      echo "<script>alert('El nombre de perfil existe, intente con otro');window.history.back();</script>";
   } else {
  $query = "INSERT INTO perfil(nombre, descripcion) VALUES ('$nombre','$descripcion')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Perfil Registrado Satisfactoriamente';
  $_SESSION['message_type'] = 'success';
  header('Location: ../admin/perfiles.php');
}
}
?>
