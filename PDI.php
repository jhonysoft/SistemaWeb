<?php
require "conexion.php";
require "plantillasinterdiario.php";
    $date1 = $_POST['date1'];
    $date2 = $_POST['date2'];

    $sql = "select @rownum:=@rownum+1 AS rownum,CONCAT(c.nombres,' ', c.apellido_paterno,' ', c.apellido_materno) as 'NOMBRES',
          p.descripcion as 'DESCRIPCION',CONCAT('Inicio ',m.fecha_inicio,' Vence ',m.fecha_fin) as 'RANGO DE FECHAS',ca.fecha_asistencia as 'FECHA ASISTENCIA',p.secuencia as 'FRECUENCIA'
          from (SELECT @rownum:=0) r, gym.matricula m
          inner join clientes c
          on c.id_clientes = m.id_clientes
          inner join gym.control_asistencias ca
          on ca.id_clientes = c.id_clientes
          inner join gym.plan p
          on p.id_plan = m.id_plan
          where p.secuencia = 'interdiario' and m.estado_matricula = 'activo' and ca.fecha_asistencia between '$date1' and '$date2' ;" ;
          $resultado = $mysqli->query($sql);

    $pdf = new PDF("P", "mm", "letter");
    $pdf->AliasNbPages();
    $pdf->SetMargins(10, 10, 10);
    $pdf->AddPage();

    $pdf->SetFont("Arial", "B", 9);
    $pdf->Cell(5, 5, "N", 1, 0, "C");
    $pdf->Cell(35, 5, "CLIENTE", 1, 0, "C");
    $pdf->Cell(55, 5, "PLAN", 1, 0, "C");
    $pdf->Cell(55, 5, "FECHAS", 1, 0, "C");
    $pdf->Cell(33, 5, "ASISTENCIA", 1, 0, "C");
    $pdf->Cell(21, 5, "SECUENCIA", 1, 1, "C");

    $pdf->SetFont("Arial", "", 9);

    while ($fila = $resultado->fetch_assoc()) {
        $pdf->Cell(5, 5, $fila['rownum'], 1, 0, "C");
        $pdf->Cell(35, 5, $fila['NOMBRES'], 1, 0, "C");
        $pdf->Cell(55, 5, $fila['DESCRIPCION'], 1, 0, "C");
        $pdf->Cell(55, 5, $fila['RANGO DE FECHAS'], 1, 0, "C");
        $pdf->Cell(33, 5, $fila['FECHA ASISTENCIA'], 1, 0, "C");
        $pdf->Cell(21, 5, $fila['FRECUENCIA'], 1, 1, "C");

    }

    $pdf->Output('reporteinterdiarios.pdf','D');
