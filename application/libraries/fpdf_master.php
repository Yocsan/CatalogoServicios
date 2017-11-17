<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Fpdf_master {
		
	public function __construct() {
		
		require_once APPPATH.'third_party/fpdf/fpdf-1.7.php';
		
		$pdf = new FPDF();
		$pdf->AddPage();
		$pdf->SetMargins(20, 20); 
		
		$CI =& get_instance();
		$CI->fpdf = $pdf;
		
	}
function Header()
   {

       //$this->Image('logo.png',10,8,33);

      $this->SetFont('Arial','B',10);

      $this->Cell(0,10,utf8_decode('Especificación de servicios de integración CI Proyecto                   Fecha'),1,0,'C');
        $this->Ln(25);
    

   }

function Footer()
{
    // Go to 1.5 cm from bottom
    $this->SetY(-25);
    // Select Arial italic 8
    $this->SetFont('Arial','I',8);
    //$image=$this->Image('logo.png',180,274,-1400);
    $this->Cell(0,10,utf8_decode('Gerencia de Tecnología y Soluciones                 pagina '.$this->PageNo().'/{nb}'),1,1,'C');
    // Print current and total page numbers
    
}
	
}