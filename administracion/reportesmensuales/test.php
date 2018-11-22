<?php

$hola="hola variable";
$hola2="hola variable2";

require("fpdf/fpdf.php");

$pdf = new FPDF('L','mm','letter');//Parametros('(L,P)','(pt,mm,cm,n)','(A3,A4,Legal,letter)')
$pdf-> AddPage();
$pdf-> SetFont('Arial','B','12');

//$pdf->SetX(50);
//$pdf->SetY(50);
//$pdf->SetXY(1,50);
$pdf->Cell(100, 10, $hola, 1, 0,'C');//Parametros (largo, alto, 'texto',border,salto de linea,'alineacion(L,C,R)')
$x=$pdf->GetX();
$pdf->SetX($x+10);
$pdf->Cell(100, 10, $hola2, 1, 1,'C');
//$pdf->MultiCell(100,5,'Contenido Multilenea y Color de fondo', 1, 'C',0 );//Parametros (largo, alto, 'texto',border,'alineacion',color)



//$pdf-> AddPage();

$pdf-> Output ();

?>