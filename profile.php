<?php
error_reporting(0);
include ('../php/conexion.php');
session_start();
if(!isset($_SESSION['datos_login'])){
  header("Location: ../login.php");
}
$arregloUsuario = $_SESSION['datos_login'];
$clave = $_SESSION['clave'];

?>
<?php require_once "vistas/vista_superior.php"?>
<!-- Inicio de contenido principal-->
<div class="container-fluid">
<h1>Perfil de Usuario</h1>
<label>Usuario:</label>
<input class="form-control" type="text" name="" value="<?php echo $arregloUsuario['nombre']; ?>" disabled><br>
<label>Email:</label>
<input class="form-control" type="text" name="" value="<?php echo $arregloUsuario['email']; ?>" disabled>
</div>
<!-- Fin de contenido principal-->
<?php require_once "vistas/vista_inferior.php"?>

