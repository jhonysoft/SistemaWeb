<?php
require "conexion.php";
require "plantilla.php";
    $sql = "select id_clientes,concat(nombres,' ',apellido_paterno,' ' ,apellido_materno)nombreCompleto, dni, celular, email, contacto  
 from clientes order by nombreCompleto;";
    $resultado = $mysqli->query($sql);

    $pdf = new PDF("P", "mm", "letter");
    $pdf->AliasNbPages();
    $pdf->SetMargins(10, 10, 10);
    $pdf->AddPage();

    $pdf->SetFont("Arial", "B", 9);

    $pdf->Cell(10, 5, "#", 1, 0, "C");
    $pdf->Cell(50, 5, "nombreCompleto", 1, 0, "C");
    $pdf->Cell(22, 5, "dni", 1, 0, "C");

    $pdf->Cell(22, 5, "celular", 1, 0, "C");
    $pdf->Cell(45, 5, "email", 1, 0, "C");
    $pdf->Cell(50, 5, "contacto", 1, 1, "C");

    $pdf->SetFont("Arial", "", 9);

    while ($fila = $resultado->fetch_assoc()) {
        $pdf->Cell(10, 5, $fila['id_clientes'], 1, 0, "C");
        $pdf->Cell(50, 5, utf8_decode($fila['nombreCompleto']), 1, 0, "C");
        $pdf->Cell(22, 5, $fila['dni'], 1, 0, "C");
        $pdf->Cell(22, 5, $fila['celular'], 1, 0, "C");
        $pdf->Cell(45, 5, $fila['email'], 1, 0, "C");
        $pdf->Cell(50, 5, $fila['contacto'], 1, 1, "C");

    }

    $pdf->Output();
