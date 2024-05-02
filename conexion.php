<?php 
	$servidor="localhost";
	$nombreBd="sistema";
	$usuario="root";
	$pass="";
	$conexion= new mysqli($servidor,$usuario,$pass,$nombreBd);
	if ($conexion -> connect_error) {
		# code...
		die("No se pudo conectar");
	}

 ?>
