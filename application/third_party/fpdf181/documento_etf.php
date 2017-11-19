<?php
require('fpdf.php');
$id='1';
$pdf = new FPDF();
$pdf->AddPage();

$pdf->SetFont('Arial','B',16);
// Move to 8 cm to the right
//$pdf->Cell(80);
// Texto centrado en una celda con cuadro 20*10 mm y salto de línea
//$pdf->Cell(20,10,$id,1,1,'C');
$pdf->Image('logo.png',60,50,-180);
$pdf->Ln(90);
$pdf->Cell(0,20,'Documento de Especificaciones PIC para el Caso de uso '.$id,1,1,'C');
$pdf->Ln(20);

$pdf->Output();
?>