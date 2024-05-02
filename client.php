<?php
include "../php/db.php";
$listado = "select * from clientes";
?>
<?php require_once "vistas/vista_superior.php"?>
<!-- Inicio de contenido principal-->
<main class="container-fluid">
      <!-- FORMULARIO -->
      <h1 class="h2 text-center display-4">REGISTRO DE CLIENTES</h1>
	<form action="add.php" method="post">
 
		<input type="text" name="nombres" placeholder="nombre" class="form-control"><br>
		<input type="text" name="apellido_paterno" placeholder="apellido Paterno" class="form-control"><br>
		<input type="text" name="apellido_materno" placeholder="apellido Materno" class="form-control"><br>
		<input type="text" name="dni" placeholder="dni" class="form-control"><br>
		<input type="text" name="fecha_nacimiento" placeholder="Fecha Nacimiento" class="form-control"><br>
		<input type="text" name="direccion" placeholder="Dirreccion" class="form-control"><br>
		<input type="text" name="celular" placeholder="Celular" class="form-control"> <br>
		<input type="text" name="email" placeholder="Email" class="form-control"><br>
		<input type="text" name="sexo" placeholder="Sexo" class="form-control"><br>
		<input type="text" name="facebook" placeholder="Facebook" class="form-control"><br>
		<input type="text" name="contacto" placeholder="Contacto" class="form-control"><br>

    <div class="form-row">
		<input type="submit" value="Registrar" class="btn btn-primary btn-block btn-sm">
    </div>
	</form>
<table class="table table-sm table-hover" id="myTable">
    <thead>
<tr>
	<th>Nombre</th>
	<th>Apellido Paterno</th>
	<th>Apellido Materno</th>
	<th>DNI</th>
	<th>Fecha de Nacimiento</th>
	<th>Dirreccion</th>
	<th>Celular</th>
	<th>Email</th>
	<th>Sexo</th>
	<th>Facebook</th>
	<th>Contacto</th>
</tr>
</thead>
<tbody>
	<?php
	$resultado = mysqli_query($conn, $listado);
	while ($fila=mysqli_fetch_assoc($resultado)) {
	?>
<tr>

	<td><?php echo $fila['nombres'];?></td>
	<td><?php echo $fila['apellido_paterno'];?></td>
	<td><?php echo $fila['apellido_materno'];?></td>
	<td><?php echo $fila['dni'];?></td>
	<td><?php echo $fila['fecha_nacimiento'];?></td>
	<td><?php echo $fila['direccion'];?></td>
	<td><?php echo $fila['celular'];?></td>
	<td><?php echo $fila['email'];?></td>
	<td><?php echo $fila['sexo'];?></td>
	<td><?php echo $fila['facebook'];?></td>
	<td><?php echo $fila['contacto'];?></td>
<?php
}
	?>
</tr>
</tbody>
</table>
</div>
<!-- Fin de contenido principal-->
<?php require_once "vistas/vista_inferior.php"?>