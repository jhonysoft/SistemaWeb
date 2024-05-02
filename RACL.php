<?php
require "conexion.php";
require "plantilla.php";
    $date1 = $_POST['date1'];
    $date2 = $_POST['date2'];
    $sql = "SELECT id_libre as '#', fecha_pago as 'FECHA ASISTENCIA', nombres AS 'CLIENTES', abono as 'PAGO' from libre
    where fecha_pago between '$date1' AND '$date2'";
    $resultado = $mysqli->query($sql);

    $pdf = new PDF("P", "mm", "letter");
    $pdf->AliasNbPages();
    $pdf->SetMargins(10, 10, 10);
    $pdf->AddPage();

    $pdf->SetFont("Arial", "B", 9);

    $pdf->Cell(10, 5, "#", 1, 0, "C");
    $pdf->Cell(60, 5, "Fecha Asistencia", 1, 0, "C");
    $pdf->Cell(60, 5, "Clientes", 1, 0, "C");
    $pdf->Cell(40, 5, "Pago", 1, 1, "C");

    $pdf->SetFont("Arial", "", 9);

    while ($fila = $resultado->fetch_assoc()) {
        $pdf->Cell(10, 5, $fila['#'], 1, 0, "C");
        $pdf->Cell(60, 5, $fila['FECHA ASISTENCIA'], 1, 0, "C");
        $pdf->Cell(60, 5, utf8_decode($fila['CLIENTES']), 1, 0, "C");
        $pdf->Cell(40, 5, $fila['PAGO'], 1, 1, "C");

    }

    $pdf->Output('reporteAsistenciaClientesLibres.pdf','D');
