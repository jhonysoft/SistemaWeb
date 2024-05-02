<?php
require "conexion.php";
require "plantilla.php";
    $date1 = $_POST['date1'];
    $sql = "SELECT c.id_clientes as 'codigo', CONCAT(c.apellido_paterno,' ',c.apellido_materno,' ',c.nombres) 
    as 'nombreCompleto',
    a.fecha_asistencia 
    as 'FechaAsistencia' 
    FROM gym.clientes c
    inner JOIN gym.matricula m
    ON c.id_clientes = m.id_clientes
    inner JOIN gym.control_asistencias a
    on c.id_clientes = a.id_clientes
    where a.FECHA_asistencia ='$date1';";
    $resultado = $mysqli->query($sql);

    $pdf = new PDF("P", "mm", "letter");
    $pdf->AliasNbPages();
    $pdf->SetMargins(10, 10, 10);
    $pdf->AddPage();

    $pdf->SetFont("Arial", "B", 9);

    $pdf->Cell(10, 5, "#", 1, 0, "C");
    $pdf->Cell(60, 5, "Nombre Completo", 1, 0, "C");
    $pdf->Cell(40, 5, "F Asistencia", 1, 1, "C");

    $pdf->SetFont("Arial", "", 9);

    while ($fila = $resultado->fetch_assoc()) {
        $pdf->Cell(10, 5, $fila['codigo'], 1, 0, "C");
        $pdf->Cell(60, 5, utf8_decode($fila['nombreCompleto']), 1, 0, "C");
        $pdf->Cell(40, 5, $fila['FechaAsistencia'], 1, 1, "C");

    }

    $pdf->Output();
