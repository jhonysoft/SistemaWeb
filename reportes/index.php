<?php require "conexion.php";?>
<?php include('includes/encabezado.php');?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte</title>
     <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
</head>

<body>
<div class="container">
<h1 class="h1 text-center display-3">Reportes de Sistema Total Fitness</h1>
<ul class="list-group list-group-flush">
    <li class="list-group-item"><a href="ReporteFechaIngresos.php" class="btn btn-light btn-block btn-sm">Reporte de fechas de Ingresos</a></li>  
    <li class="list-group-item"><a href="ConsultaPagosClientes.php" class="btn btn-light btn-block btn-sm">Reporte de Pagos por Cliente</a></li>  
    <li class="list-group-item"><a href="C.php" class="btn btn-light btn-block btn-sm">Reporte de Clientes</a></li>  
    <li class="list-group-item"><a href="ConsultaMatriculaClientes.php" class="btn btn-light btn-block btn-sm">Consulta de Matricula de Clientes</a></li>  
    <li class="list-group-item"><a href="ConsultaAsistenciaFecha.php" class="btn btn-light btn-block btn-sm">Reporte de Asistencias por fechas</a></li>  
</ul>
</div>
 <!-- Popper y Bootstrap JS -->
    <script src="../js/jquery-3.5.1.slim.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>