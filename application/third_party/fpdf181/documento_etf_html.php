<?php
require('WriteHTML.php');
//require('html_table.php');


$pdf=new PDF_HTML();
$pdf->AddPage();
$pdf->SetMargins(10, 10); 

$pdf->SetFont('Arial');
$pdf->Image('logo.png',60,50,-180);

$miCabecera = array('Proceso:', 'Subproceso:');
$misDatos = array('Hugo', 'Martínez');

$pdf->Ln(90);
$pdf->Cell(0,20,utf8_decode('Documento de Especificaciones PIC para el Caso de uso '.$id),1,1,'C');
$pdf->AliasNbPages();
$pdf->AddPage();
//$pdf->SetAutoPageBreak(true, 10);
$pdf->Cell(60,10,utf8_decode('IDENTIFICACIÓN DEL PROYECTO'),0,1,'C');
$pdf->Ln(10);


$pdf->cabeceraVertical($miCabecera);
$pdf->datosVerticales($misDatos);
$pdf->Ln(10);
$pdf->cabeceraVertical($miCabecera);
$pdf->datosVerticales($misDatos);
$pdf->Output();
?>