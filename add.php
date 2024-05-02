<?php
include "../php/db.php";
error_reporting(0);
$nombres = $_POST['nombres'];
$apellido_paterno = $_POST['apellido_paterno'];
$apellido_materno=$_POST['apellido_materno'];
$dni = $_POST['dni'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$direccion=$_POST['direccion'];
$celular=$_POST['celular'];
$sexo=$_POST['sexo'];
$facebook=$_POST['facebook'];
$contacto=$_POST['contacto'];
$insertar = "insert into clientes (nombres, apellido_paterno, apellido_materno, dni, fecha_nacimiento, direccion, celular, email, sexo, facebook, contacto) values ('$nombres', '$apellido_paterno', '$apellido_materno', '$dni', '$fecha_nacimiento', '$direccion', '$celular', '$email', '$sexo', '$facebook', '$contacto')";
$resultado = mysqli_query($conn,$insertar);
if ($resultado) {
	echo "<script>alert('Registrado correcto');window.location='client.php';</script>";
}
mysqli_close($conexion);
?>
