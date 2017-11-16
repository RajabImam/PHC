<?php
if (isset($_POST['print'])) {
	# code...

  $surname   = $_POST['surname'];
  $lastname    = $_POST['lastname'];
  $address   = $_POST['address'];
  $phone       = $_POST['phone'];
  $gender       = $_POST['gender'];
  $age       = $_POST['age'];
  $bloodgroup       = $_POST['bloodgroup'];
  $status       = $_POST['status'];
  $cardno       = $_POST['cardno'];
  $nextofkin       = $_POST['nextofkin'];
  $nextofkincontact  = $_POST['nextofkincontact'];
  //$image       = $_FILES['patientImage'] ['name'];

require 'includes/fpdf.php';

$pdf = new FPDF();
$pdf->AddPage();

$pdf->SetFont('Arial','B',16);

$pdf->Cell(0,10,"PATIENT INFORMATION", 1,1,"C");
$pdf->Cell(90,10, "Sur Name :", 1,0);
$pdf->Cell(90,10, $surname, 1,1);
$pdf->Cell(90,10, "Last Name :", 1,0);
$pdf->Cell(90,10, $lastname, 1,1);
$pdf->Cell(90,10, "Address :", 1,0);
$pdf->Cell(90,10, $address, 1,1);
$pdf->Cell(90,10, "Phone No :", 1,0);
$pdf->Cell(90,10, $phone, 1,1);
$pdf->Cell(90,10, "Gender :", 1,0);
$pdf->Cell(90,10, $gender, 1,1);
$pdf->Cell(90,10, "age :", 1,0);
$pdf->Cell(90,10, $age, 1,1);
$pdf->Cell(90,10, "Blood Group :", 1,0);
$pdf->Cell(90,10, $bloodgroup, 1,1);
$pdf->Cell(90,10, "Status :", 1,0);
$pdf->Cell(90,10, $status, 1,1);
$pdf->Cell(90,10, "Card No :", 1,0);
$pdf->Cell(90,10, $cardno, 1,1);
$pdf->Cell(90,10, "Next Of Kin :", 1,0);
$pdf->Cell(90,10, $nextofkin, 1,1);
$pdf->Cell(90,10, "Next Of Kin Contact :", 1,0);
$pdf->Cell(90,10, $nextofkincontact, 1,0);

$pdf->Output();


}



?>