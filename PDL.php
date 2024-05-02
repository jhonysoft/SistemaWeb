<?php
require "conexion.php";
require "plantillalibresdia.php";
    $date1 = $_POST['date1'];
    $date2 = $_POST['date2'];
    $sql = "select rownum,id_libre,DATE_FORMAT(fecha_pago, '%d-%m-%y' ' %h:%i:%s %p') as 'FECHA',nombres,abono, CASE ROWNUM WHEN 1 THEN TotalPago ELSE 0 END 'PagoTotal' from
    (select @rownum:=@rownum+1 AS rownum, 
    id_libre,fecha_pago,nombres,abono,
    (select sum(abono) from libre where fecha_pago between '$date1' and '$date2') as 'TotalPago'
    FROM (SELECT @rownum:=0) r, libre
    where fecha_pago between '$date1' and '$date2')A;";
    $resultado = $mysqli->query($sql);

    $pdf = new PDF("P", "mm", "letter");
    $pdf->AliasNbPages();
    $pdf->SetMargins(10, 10, 10);
    $pdf->AddPage();

    $pdf->SetFont("Arial", "B", 9);
    $pdf->Cell(5, 5, "N", 1, 0, "C");
    //$pdf->Cell(15, 5, "# Pago", 1, 0, "C");
    $pdf->Cell(40, 5, "FECHA DE PAGO", 1, 0, "C");
    $pdf->Cell(60, 5, "NOMBRES", 1, 0, "C");
    $pdf->Cell(20, 5, "ABONO", 1, 0, "C");
    $pdf->Cell(30, 5, "PAGO TOTAL", 1, 1, "C");

    $pdf->SetFont("Arial", "", 9);

    while ($fila = $resultado->fetch_assoc()) {
        $pdf->Cell(5, 5, $fila['rownum'], 1, 0, "C");
        //$pdf->Cell(15, 5, $fila['id_libre'], 1, 0, "C");
        $pdf->Cell(40, 5, $fila['FECHA'], 1, 0, "C");
        $pdf->Cell(60, 5, $fila['nombres'], 1, 0, "C");
        $pdf->Cell(20, 5, $fila['abono'], 1, 0, "C");
        $pdf->Cell(30, 5, $fila['PagoTotal'], 1, 1, "C");

    }

    $pdf->Output('reportePagoDiarios.pdf','D');
