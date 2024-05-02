<?php
require "conexion.php";
require "plantillaMatriculados.php";
    $sql = "SELECT c.id_clientes AS 'ID_CLIENTE', CONCAT(c.apellido_paterno,' ',c.apellido_materno,' ',c.nombres) AS 'CLIENTES',
    m.fecha_inicio AS 'FECHA INICIO'
    ,m.fecha_fin AS 'FECHA FIN', p.descripcion AS 'PLAN ENTRENAMIENTO', p.secuencia as 'SECUENCIA',p.precio AS 'PRECIO' 
    FROM gym.clientes c
    INNER JOIN gym.matricula m
    ON c.id_clientes = m.id_clientes
    INNER JOIN gym.plan p
    ON m.id_plan = p.id_plan;";
    $resultado = $mysqli->query($sql);

    $pdf = new PDF("P", "mm", "letter");
    $pdf->AliasNbPages();
    $pdf->SetMargins(10, 10, 10);
    $pdf->AddPage();

    $pdf->SetFont("Arial", "B", 9);

    $pdf->Cell(10, 5, "#", 1, 0, "C");
    $pdf->Cell(50, 5, "Clientes", 1, 0, "C");
    $pdf->Cell(22, 5, "Fecha Inicio", 1, 0, "C");
    $pdf->Cell(22, 5, "Fecha Fin", 1, 0, "C");
    $pdf->Cell(45, 5, "Plan de Entrenamiento", 1, 0, "C");
    $pdf->Cell(25, 5, "Secuencia", 1, 0, "C");
    $pdf->Cell(20, 5, "Precio", 1, 1, "C");

    $pdf->SetFont("Arial", "", 9);

    while ($fila = $resultado->fetch_assoc()) {
        $pdf->Cell(10, 5, $fila['ID_CLIENTE'], 1, 0, "C");
        $pdf->Cell(50, 5, utf8_decode($fila['CLIENTES']), 1, 0, "C");
        $pdf->Cell(22, 5, $fila['FECHA INICIO'], 1, 0, "C");
        $pdf->Cell(22, 5, $fila['FECHA FIN'], 1, 0, "C");
        $pdf->Cell(45, 5, $fila['PLAN ENTRENAMIENTO'], 1, 0, "C");
        $pdf->Cell(25, 5, $fila['SECUENCIA'], 1, 0, "C");
        $pdf->Cell(20, 5, $fila['PRECIO'], 1, 1, "C");

    }

    $pdf->Output('reporteMatriculas.pdf','D');
