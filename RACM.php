<?php
require "conexion.php";
require "plantillaAmensuales.php";
    $date1 = $_POST['date1'];
    $date2 = $_POST['date2'];
    $sql = "select @rownum:=@rownum+1 AS rownum,
          CONCAT(c.nombres,' ', c.apellido_paterno,' ', c.apellido_materno) as 'CLIENTES',
          p.descripcion as 'PROMOCION',DATE_FORMAT(m.fecha_inicio, '%d-%m-%y')as 'FECHA INICIO',DATE_FORMAT(m.fecha_fin, '%d-%m-%y') as 'FECHA FIN',DATE_FORMAT(a.fecha_asistencia, '%d-%m-%y' ' %h:%i:%s %p') as
          'FECHA Y HORA DE ASISTENCIA'
          from (SELECT @rownum:=0) r, sistema.matricula m
          inner join clientes c
          on c.id_clientes = m.id_clientes
          inner join sistema.control_asistencias a
          on a.id_clientes = c.id_clientes
          inner join sistema.plan p
          on p.id_plan = m.id_plan
    where a.fecha_asistencia between '$date1' AND '$date2'
    and m.estado_matricula='activo'";
    $resultado = $mysqli->query($sql);

    $pdf = new PDF("P", "mm", "letter");
    $pdf->AliasNbPages();
    $pdf->SetMargins(10, 10, 10);
    $pdf->AddPage();

    $pdf->SetFont("Arial", "B", 9);

    $pdf->Cell(5, 5, "N", 1, 0, "C");
    //$pdf->Cell(60, 5, "Numero", 1, 0, "C");
    $pdf->Cell(40, 5, "NOMBRE", 1, 0, "C");
    $pdf->Cell(60, 5, "PROMOCION", 1, 0, "C");
    $pdf->Cell(20, 5, "F. INICIO", 1, 0, "C");
    $pdf->Cell(20, 5, "F. FINAL", 1, 0, "C");
    $pdf->Cell(40, 5, "FECHA DE ASISTENCIA", 1, 1, "C");

    $pdf->SetFont("Arial", "", 9);

    while ($fila = $resultado->fetch_assoc()) {
        $pdf->Cell(5, 5, $fila['rownum'], 1, 0, "C");
      //  $pdf->Cell(60, 5, utf8_decode($fila['N']), 1, 0, "C");
        $pdf->Cell(40, 5, utf8_decode($fila['CLIENTES']), 1, 0, "C");
        $pdf->Cell(60, 5, utf8_decode($fila['PROMOCION']), 1, 0, "C");
        $pdf->Cell(20, 5, $fila['FECHA INICIO'], 1, 0, "C");
        $pdf->Cell(20, 5, $fila['FECHA FIN'], 1, 0, "C");
        $pdf->Cell(40, 5, $fila['FECHA Y HORA DE ASISTENCIA'], 1, 1, "C");

    }

    $pdf->Output('reporteAsistenciaClientesMensual.pdf','D');
