<?php 
session_start();
include "conexion.php";

if(  isset($_POST['nombre'])  && isset($_POST['clave'])   ){
    
   
    $resultado = $conexion->query("select * from usuarios where 
        nombre='".$_POST['nombre']."' and clave='".$_POST['clave']."' limit 1")or die($conexion->error);
    if(mysqli_num_rows($resultado)>0){
        $datos_usuario = mysqli_fetch_row($resultado); 
        $nombre = $datos_usuario[1];
        $id_usuario = $datos_usuario[0];
        $email = $datos_usuario[2];
        $nivel = $datos_usuario[4];
        $_SESSION['datos_login']= array(
            'nombre'=>$nombre,
            'id_usuario'=>$id_usuario,
            'email'=>$email,
            'id_perfil'=>$nivel

        );

        header("Location: ../admin/");
    }else{
        
        header("Location: ../index.php?error=Credenciales incorrectas");
    }



}else{
    header("Location: ../index.php");
}



?>