<?php require_once "vistas/vista_superior.php"?>
<?php require "conexion.php";
$sql = "SELECT  DISTINCT estado_matricula FROM matricula";
$resultado = $mysqli->query($sql);
?>
<!-- Inicio de contenido principal-->
    <div class="container-fluid">
    <h1 class="h1 text-center display-3">Generar reporte de estados por Clientes</h1>

    <form action="CMC.php" method="post" autocomplete="off">
        <label>Seleccione estado de usuario:</label>
      <select id="estado" name="estado" class="form-control form-control-sm">
            <option value="">Selecciona una opcion</option>
            <?php while ($fila = $resultado->fetch_assoc()) { ?>
                <option value="<?php echo $fila['estado_matricula']; ?>"><?php echo $fila['estado_matricula']; ?></option>
            <?php } ?>
        </select>
      <br>
        <button type="submit" class="btn btn-primary btn-block">Generar</button>
    </form>
    </div>
<!-- Fin de contenido principal-->
<?php require_once "vistas/vista_inferior.php"?>