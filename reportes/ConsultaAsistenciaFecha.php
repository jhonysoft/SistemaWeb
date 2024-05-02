<?php require "conexion.php";?>
<?php include('includes/encabezado.php');?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
</head>

<body>
    <div class="container">
    <h1 class="h1 text-center display-3">Generar reporte de Asistencia de clientes</h1>

    <form action="CAF.php" method="post" autocomplete="off">

        <label>Seleccione Fecha:</label>
      <input type="date" class="form-control" placeholder="Fecha"  name="date1" required>
      <br>
        <button type="submit" class="btn btn-outline-warning btn-sm btn-block">Generar</button>
        <a class="btn btn-secondary btn-sm btn-block" href="javascript:history.back()">Volver</a>
    </form>
</div>
 <!-- Popper y Bootstrap JS -->
    <script src="../js/jquery-3.5.1.slim.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>

</html>