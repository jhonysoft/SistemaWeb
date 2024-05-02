<?php
require "conexion.php";
require "plantilla.php";
    $date1 = $_POST['date1'];
    $date2 = $_POST['date2'];
    $sql = "SELECT c.id_clientes AS 'codigo', CONCAT(c.apellido_paterno,' ',c.apellido_materno,' ',c.nombres) 
    AS 'nombreCompleto', m.fecha_inicio,m.fecha_fin 
    FROM gym.clientes c
    inner JOIN gym.matricula m
    ON c.id_clientes = m.id_clientes
    inner JOIN gym.control_asistencias a
    on c.id_clientes = a.id_clientes
    where m.fecha_inicio between '$date1' AND '$date2'";
    $resultado = $mysqli->query($sql);

    $pdf = new PDF("P", "mm", "letter");
    $pdf->AliasNbPages();
    $pdf->SetMargins(10, 10, 10);
    $pdf->AddPage();

    $pdf->SetFont("Arial", "B", 9);

    $pdf->Cell(10, 5, "Id", 1, 0, "C");
    $pdf->Cell(40, 5, "Nombre", 1, 0, "C");
    $pdf->Cell(20, 5, "F Inicio", 1, 0, "C");
    $pdf->Cell(20, 5, "F Final", 1, 1, "C");

    $pdf->SetFont("Arial", "", 9);

    while ($fila = $resultado->fetch_assoc()) {
        $pdf->Cell(10, 5, $fila['codigo'], 1, 0, "C");
        $pdf->Cell(40, 5, utf8_decode($fila['nombreCompleto']), 1, 0, "C");
        $pdf->Cell(20, 5, $fila['fecha_inicio'], 1, 0, "C");
        $pdf->Cell(20, 5, $fila['fecha_fin'], 1, 1, "C");

    }

    $pdf->Output();
