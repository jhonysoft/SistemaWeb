<?php
require "conexion.php";
require "plantillamensualesdia.php";
    $date1 = $_POST['date1'];
    $date2 = $_POST['date2'];
    $sql = "SELECT @rownum:=@rownum+1 AS rownum, CONCAT(c.apellido_paterno,' ',c.apellido_materno,' ',c.nombres) AS 'CLIENTES',
    DATE_FORMAT(m.fecha_inicio, '%d-%m-%y') AS 'F.INICIO'
    ,pr.observacion AS 'DETALLE', p.descripcion AS 'PLAN ENTRENAMIENTO',pr.abono AS 'PRECIO', DATE_FORMAT(pr.fecha_pago, '%d-%m-%y' ' %h:%i:%s %p') as 'FECHA DE PAGO'
    FROM (SELECT @rownum:=0)r, gym.clientes c
    INNER JOIN gym.matricula m
    ON c.id_clientes = m.id_clientes
    INNER JOIN gym.plan p
    ON m.id_plan = p.id_plan
    INNER JOIN gym.pago pr
    ON c.id_clientes = pr.id_clientes

    where pr.fecha_pago between '$date1' and '$date2'
    and m.estado_matricula='activo'";
    $resultado = $mysqli->query($sql); 


    $pdf = new PDF("P", "mm", "letter");
    $pdf->AliasNbPages();
    $pdf->SetMargins(10, 10, 10);
    $pdf->AddPage();

    $pdf->SetFont("Arial", "B", 9);
    $pdf->Cell(5, 5, "N", 1, 0, "C");
    $pdf->Cell(28, 5, "CLIENTE", 1, 0, "C");
    $pdf->Cell(15, 5, "INICIO", 1, 0, "C");
    $pdf->Cell(60, 5, "DETALLES", 1, 0, "C");
    $pdf->Cell(50, 5, "PLAN", 1, 0, "C");
    $pdf->Cell(12, 5, "PAGO", 1, 0, "C");
    $pdf->Cell(35, 5, "FECHA PAGO", 1, 1, "C");

    $pdf->SetFont("Arial", "", 9);

    while ($fila = $resultado->fetch_assoc()) {
        $pdf->Cell(5, 5, $fila['rownum'], 1, 0, "C");
        $pdf->Cell(28, 5, $fila['CLIENTES'], 1, 0, "C");
        $pdf->Cell(15, 5, $fila['F.INICIO'], 1, 0, "C");
        $pdf->Cell(60, 5, $fila['DETALLE'], 1, 0, "C");
        $pdf->Cell(50, 5, $fila['PLAN ENTRENAMIENTO'], 1, 0, "C");
        $pdf->Cell(12, 5, $fila['PRECIO'], 1, 0, "C");
        $pdf->Cell(35, 5, $fila['FECHA DE PAGO'], 1, 1, "C");

    }

    $pdf->Output('reportePagoDiarios.pdf','D');
