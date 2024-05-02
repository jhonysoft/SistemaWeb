<?php
include("../php/db.php");
$id = $_GET['id'];
$eliminar = "delete from clientes where id_clientes = '$id'";
$resultadoEliminar = mysqli_query($conn,$eliminar);
if ($resultadoEliminar){
    header("Location:clientes.php");
}else{
    echo"<script>alert('No se pudo eliminar');window.history.go(-1);</script>";
}

?>