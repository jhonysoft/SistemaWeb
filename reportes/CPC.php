<?php
require "conexion.php";
require "plantilla.php";
    $nombreCompleto = $_POST['nombreCompleto'];
    $sql = "select p.id_pago as idPago, concat(c.nombres,' ',c.apellido_paterno,' ' ,c.apellido_materno) as nombreCompleto,
p.abono as abonoPago,count(p.abono) as cuotas ,m.fecha_fin as fechaFin, p.observacion as detalle, pl.precio as precioPromocion,
p.fecha_pago as fechaPago, p.n_boleta as boleta, sum(abono) as TotalAbono
from clientes c
inner join pago p
on c.id_clientes = p.id_clientes
inner join matricula m
on c.id_clientes = m.id_clientes
inner join plan pl
on m.id_plan = pl.id_plan
where concat(c.nombres,' ',c.apellido_paterno,' ' ,c.apellido_materno) like'%$nombreCompleto%'";
    $resultado = $mysqli->query($sql);

    $pdf = new PDF("P", "mm", "letter");
    $pdf->AliasNbPages();
    $pdf->SetMargins(10, 10, 10);
    $pdf->AddPage();

    $pdf->SetFont("Arial", "B", 9);

    $pdf->Cell(10, 5, "Id", 1, 0, "C");
    $pdf->Cell(40, 5, "Nombre", 1, 0, "C");
    $pdf->Cell(20, 5, "Abono", 1, 0, "C");
    $pdf->Cell(15, 5, "Cuotas", 1, 0, "C");
    $pdf->Cell(35, 5, "Fecha", 1, 0, "C");
    $pdf->Cell(50, 5, "observacion", 1, 0, "C");
    $pdf->Cell(20, 5, "Total Abono", 1, 1, "C");

    $pdf->SetFont("Arial", "", 9);

    while ($fila = $resultado->fetch_assoc()) {
        $pdf->Cell(10, 5, $fila['idPago'], 1, 0, "C");
        $pdf->Cell(40, 5, utf8_decode($fila['nombreCompleto']), 1, 0, "C");
        $pdf->Cell(20, 5, $fila['abonoPago'], 1, 0, "C");
        $pdf->Cell(15, 5, $fila['cuotas'], 1, 0, "C");
        $pdf->Cell(35, 5, $fila['fechaPago'], 1, 0, "C");
        $pdf->Cell(50, 5, $fila['detalle'], 1, 0, "C");
        $pdf->Cell(20, 5, $fila['TotalAbono'], 1, 1, "C");

    }

    $pdf->Output();
