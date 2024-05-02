<?php
$mysqli = new mysqli("localhost", "root", "", "sistema");
?>
<?php
include ('../php/conexion.php');
session_start();
if(!isset($_SESSION['datos_login'])){
  header("Location: ../index.php");
}
$arregloUsuario = $_SESSION['datos_login'];

?>
<?php require_once "vistas/vista_superior.php"?>
<!-- Inicio de contenido principal-->
<div class="container-fluid text-center">
<h1>VENTANA PRINCIPAL</h1>
    <!-- #cards -->
    <div class="card-deck">
  <div class="card p-4 bg-primary">
    <img class="card-img-top" src="images/ClientesRegistrados.svg" height="50%" alt="Card image cap">
    <div class="card-body">
      <h1 class="card-title text-center text-white"><?php
$sql = "SELECT COUNT(*) total FROM clientes";
$result = mysqli_query($mysqli, $sql);
$fila = mysqli_fetch_assoc($result);
echo '' . $fila['total'];
?></h1>
      <p class="card-text text-center text-white">Clientes Registrados.</p>
    </div>
  </div>
  <div class="card p-4 bg-warning">
    <img class="card-img-top" src="images/ClientesMatriculados.svg" height="50%" alt="Card image cap">
    <div class="card-body">
      <h1 class="card-title text-center text-white"><?php
$sql = "SELECT COUNT(*) total FROM clientes";
$result = mysqli_query($mysqli, $sql);
$fila = mysqli_fetch_assoc($result);
echo '' . $fila['total'];
?></h1>
      <p class="card-title text-center text-white">Clientes Matriculados</p>
    </div>
  </div>
  <div class="card p-4 bg-success">
    <img class="card-img-top" src="images/AsistenciaMiembros.svg" height="50%" alt="Card image cap">
    <div class="card-body">
      <h1 class="card-title text-center text-white"><?php
$sql = "SELECT COUNT(*) total FROM control_asistencias";
$result = mysqli_query($mysqli, $sql);
$fila = mysqli_fetch_assoc($result);
echo '' . $fila['total'];
?></h1>
      <p class="card-text text-center text-white">Total de Asistencias miembros.</p>
    </div>
  </div>
    <div class="card p-4 bg-danger">
    <img class="card-img-top" src="images/AsistenciaLibres.svg" height="50%" alt="Card image cap">
    <div class="card-body">
      <h1 class="card-title text-center text-white"><?php
$sql = "SELECT COUNT(*) total FROM libre";
$result = mysqli_query($mysqli, $sql);
$fila = mysqli_fetch_assoc($result);
echo '' . $fila['total'];
?></h1>
      <p class="card-text text-center text-white">Total de Asistencias libres</p>
      
    </div>
  </div>
</div>
<br>
<div id="relojnumerico" class="reloj container-fluid" onload="cargarReloj()"></div>

</div>
<!-- Fin de contenido principal-->
<?php require_once "vistas/vista_inferior.php"?>