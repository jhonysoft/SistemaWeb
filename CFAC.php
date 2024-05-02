<?php
require "conexion.php";
require "plantilla.php";
    $nombreCompleto = $_POST['nombreCompleto'];
    $sql = "SELECT c.id_clientes AS 'ID_CLIENTE', CONCAT(c.apellido_paterno,' ',c.apellido_materno,' ',c.nombres) 
    AS 'CLIENTES', a.fecha_asistencia 
    as 'FECHA ASISTENCIA', p.secuencia as 'SECUENCIA'
    FROM matricula m
    left join clientes c
    on m.id_clientes = c.id_clientes
    left join control_asistencias a
    on m.id_clientes = c.id_clientes
    left join plan p 
    on m.id_plan = p.id_plan
    having CLIENTES like '%$nombreCompleto%'
    order by a.fecha_asistencia;";
    $resultado = $mysqli->query($sql);

    $pdf = new PDF("P", "mm", "letter");
    $pdf->AliasNbPages();
    $pdf->SetMargins(10, 10, 10);
    $pdf->AddPage();

    $pdf->SetFont("Arial", "B", 9);

    $pdf->Cell(10, 5, "#", 1, 0, "C");
    $pdf->Cell(50, 5, "CLIENTES", 1, 0, "C");
    $pdf->Cell(50, 5, "Fecha Asistencia", 1, 0, "C");
    $pdf->Cell(50, 5, "Secuencia", 1, 1, "C");

    $pdf->SetFont("Arial", "", 9);

    while ($fila = $resultado->fetch_assoc()) {
        $pdf->Cell(10, 5, $fila['ID_CLIENTE'], 1, 0, "C");
        $pdf->Cell(50, 5, utf8_decode($fila['CLIENTES']), 1, 0, "C");
        $pdf->Cell(50, 5, $fila['FECHA ASISTENCIA'], 1, 0, "C");
        $pdf->Cell(50, 5, $fila['SECUENCIA'], 1, 1, "C");

    }

    $pdf->Output('reporteFechaAsistenciaClientes.pdf','D');
