<?php
require "conexion.php";
require "plantilla.php";
$estado = $_POST['estado'];
    $sql = " SELECT  id_matricula, CONCAT(clientes.nombres,' ' ,clientes.apellido_paterno,' ', clientes.apellido_materno) as nombreCompleto, 
plan.nombre_plan as nombrePlan, fecha_inicio, fecha_fin, estado_matricula 
             from matricula
             inner join clientes on matricula.id_clientes = clientes.id_clientes
             inner join plan on matricula.id_plan = plan.id_plan
             where estado_matricula = '$estado';";
    $resultado = $mysqli->query($sql);

    $pdf = new PDF("P", "mm", "letter");
    $pdf->AliasNbPages();
    $pdf->SetMargins(10, 10, 10);
    $pdf->AddPage();

    $pdf->SetFont("Arial", "B", 9);

    $pdf->Cell(10, 5, "#", 1, 0, "C");
    $pdf->Cell(60, 5, "Nombre Completo", 1, 0, "C");
    $pdf->Cell(40, 5, "Plan", 1, 0, "C");
    $pdf->Cell(20, 5, "F. Inicio.", 1, 0, "C");
    $pdf->Cell(20, 5, "F. Final", 1, 0, "C");
    $pdf->Cell(20, 5, "Estado", 1, 1, "C");

    $pdf->SetFont("Arial", "", 9);

    while ($fila = $resultado->fetch_assoc()) {
        $pdf->Cell(10, 5, $fila['id_matricula'], 1, 0, "C");
        $pdf->Cell(60, 5, utf8_decode($fila['nombreCompleto']), 1, 0, "C");
        $pdf->Cell(40, 5, $fila['nombrePlan'], 1, 0, "C");
        $pdf->Cell(20, 5, $fila['fecha_inicio'], 1, 0, "C");
        $pdf->Cell(20, 5, $fila['fecha_fin'], 1, 0, "C");
        $pdf->Cell(20, 5, $fila['estado_matricula'], 1, 1, "C");

    }

    $pdf->Output();
