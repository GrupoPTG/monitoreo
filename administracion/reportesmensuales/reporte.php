<?php

    $cliente= $_POST['cliente'];



	include 'plantilla.php';
	
	$pdf = new PDF('L','mm','letter');
	$pdf->AliasNbPages();
	$pdf->AddPage();
    

    $pdf->SetFillColor(232,232,232);
    $pdf->SetFont('Arial','B',10);
    $pdf->SetY(36);
	$pdf->Cell(130,6,'Datos del cliente',0,0,'L',1);
    $pdf->Cell(130,6,'Fin de Contrato',0,1,'L',1);
    $pdf->Cell(130,6,'Direccion del cliente',0,0,'L',1);
    $pdf->Cell(130,6,'Inicio de Contrato',0,1,'L',1);
    $pdf->Cell(130,6,'Correo del cliente',0,0,'L',1);
    $pdf->Cell(130,6,'',0,1,'L',1);
    $pdf->Cell(130,6,'Telefono del cliente',0,0,'L',1);
    $pdf->Cell(130,6,'',0,1,'L',1);
    


    $pdf->SetFillColor(200,200,200);
    $pdf->SetFont('Arial','B',10);
    $pdf->Ln();
	$pdf->Cell(0,6,'Reporte de Monitoreo de Normas',0,1,'C',1);
    $pdf->Cell(0,6,'Fecha de Reporte',0,1,'C',1);


    

	$pdf->SetFillColor(232,232,232);
    $pdf->SetFont('Arial','B',8);
    $pdf->Ln();
    $pdf->Cell(17,6,'SDO-ORG',1,0,'C',1);
    $pdf->Cell(15,6,'CODIGO',1,0,'C',1);
    $pdf->Cell(38,6,'REVISION DEL CLIENTE',1,0,'C',1);
    $pdf->Cell(38,6,'REVISION MAS ACTUAL',1,0,'C',1);
    $pdf->Cell(38,6,'TITULO DE LA NORMA',1,0,'C',1);
    $pdf->Cell(38,6,'ESTATUS DE NORMA',1,0,'C',1);
    $pdf->Cell(38,6,'ESTATU CLIENTE',1,0,'C',1);
    $pdf->Cell(38,6,'OBSERVACIONES',1,0,'C',1);
    
    require_once("../../modelo/connect.php");

    //$cliente= '1';

    $consulta = "SELECT Norcli.norma, Norcli.cliente, Norcli.revisionCliente, Norcli.estatusCliente,Norcli.observaciones,
        Nor.documento, Nor.revisionActual, Nor.sdo, Nor.titulo, Nor.estatus
        FROM normacliente Norcli
        INNER JOIN normas Nor ON Norcli.norma=Nor.documento WHERE cliente='$cliente'";
    $hacerconsulta = $conexion->query($consulta);


	
    $pdf->SetFont('Arial','',10);
    $pdf->Ln();
	
	while($row = $hacerconsulta->fetch_array())
	{
        $pdf->Cell(17,6,utf8_decode($row['sdo']),1,'C');
        $pdf->Cell(15,6,utf8_decode($row['norma']),1,'C');
        $pdf->Cell(38,6,utf8_decode($row['revisionCliente']),1,'C');
        $pdf->Cell(38,6,utf8_decode($row['revisionActual']),1,'C');
        $pdf->Cell(38,6,utf8_decode($row['titulo']),1,'C');
        $pdf->Cell(38,6,utf8_decode($row['estatus']),1,'C');
        $pdf->Cell(38,6,utf8_decode($row['estatusCliente']),1,'C');
        $pdf->Cell(38,6,utf8_decode($row['observaciones']),1,'C');
        $pdf->Ln();
    }

    $pdf->Ln(30);
    //$pdf->MultiCell(50,5,'Contenido Multilenea y Color de fondo', 1, 'C',0 );
    //$pdf->MultiCell(50,5,'Contenido Multilenea y Color de fondo', 1, 'C',0 );
    $pdf->Cell(0,6,'*Todas las modificaciones del documento es responsabilidad del SDO creador.',0,1,'L');
    $pdf->Cell(0,6,'**Nuestro banco de datos es actualizado cada 15 dias, siempre respetando la informacion del SDO.',0,1,'L');
    $pdf->Cell(0,6,'***En PTG contamos con un servicio de Help Desk 24/7- Contamos con un equipo extremadamente capacitado, no dude en contactarnos, estamos a la orden.',0,1,'L');

    $pdf->Ln(20);
    $pdf->Cell(0,6,'Panamericana de Tecnologia Global Ltda',0,1,'C');
    $pdf->Cell(0,6,'www.grupoptg.com | monitoreo@grupoptg.com',0,1,'C');
    
    $pdf->AddPage();
	$pdf->Output();
?>