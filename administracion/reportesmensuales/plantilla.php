<?php
	require("fpdf/fpdf.php");
	
	class PDF extends FPDF
	{
		function Header()
		{
			$this->Image('header.jpg', 5, 5, 265 );		
		}
		
		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10, 'Reporte Mensual '.$this->PageNo().'/{nb}',0,0,'C' );
		}		
	}
?>