<?php

require 'includes/fpdf.php';
/**
* 
*/
class PDF extends FPDF
{
	
function Header(){
  $this->image('images/service.png', 10,6,30);
  $this->SetFont('Arial','B',15);
  $this->Cell(80);
  $this->Cell(30,10,'PRIMARY HEALTH CARE',1,0,'C');
  $this->Ln(20);
  
}

function Footer(){
  $this->SetY(-15);
  $this->SetFont('Arial','I',8);
  $this->Cell(0,10, 'PRIMARY HEALTH CARE',0,0,'C');
  
}

}

$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
$pdf->Cell(0,10,'Testing',0,1);
$pdf->Output();


?>