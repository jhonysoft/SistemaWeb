<?php
require "conexion.php";
require "plantillaPmensuales.php";
    $date1 = $_POST['date1'];
    $date2 = $_POST['date2'];
    $sql = "SELECT c.id_clientes AS 'ID_CLIENTE', CONCAT(c.apellido_paterno,' ',c.apellido_materno,' ',c.nombres) AS 'CLIENTES',
    p.abono AS 'PAGO', p.fecha_pago AS 'FECHA DE PAGO', p.n_boleta AS 'BOLETA', p.observacion AS 'OBSERVACION'
    FROM gym.clientes c
    INNER JOIN gym.pago p
    ON p.id_clientes = c.id_clientes
    where p.fecha_pago between '$date1' AND '$date2'";
    $resultado = $mysqli->query($sql);

    $pdf = new PDF("P", "mm", "letter");
    $pdf->AliasNbPages();
    $pdf->SetMargins(10, 10, 10);
    $pdf->AddPage();

    $pdf->SetFont("Arial", "B", 9);

    $pdf->Cell(10, 5, "#", 1, 0, "C");
    $pdf->Cell(50, 5, "Clientes", 1, 0, "C");
    $pdf->Cell(15, 5, "Pago", 1, 0, "C");
    $pdf->Cell(35, 5, "Fecha de Pago", 1, 0, "C");
    $pdf->Cell(25, 5, "Num. Boleta", 1, 0, "C");
    $pdf->Cell(70, 5, "Observacion", 1, 1, "C");

    $pdf->SetFont("Arial", "", 9);

    while ($fila = $resultado->fetch_assoc()) {
        $pdf->Cell(10, 5, $fila['ID_CLIENTE'], 1, 0, "C");
        $pdf->Cell(50, 5, $fila['CLIENTES'], 1, 0, "C");
        $pdf->Cell(15, 5, $fila['PAGO'], 1, 0, "C");
        $pdf->Cell(35, 5, $fila['FECHA DE PAGO'], 1, 0, "C");
        $pdf->Cell(25, 5, $fila['BOLETA'], 1, 0, "C");
        $pdf->Cell(70, 5, $fila['OBSERVACION'], 1, 1, "C");

    }

    $pdf->Output('reportePagosClientesMensual.pdf','D');
