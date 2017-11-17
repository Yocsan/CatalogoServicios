<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class fpdf_file extends CI_Controller {





	public function index() {	
		$this->load->library('fpdf_master');
		
		$this->fpdf->SetFont('Arial','B',18);
		 
		$this->fpdf->SetFont('Arial');
		//$fpdf->Image('logo.png',60,50,-180);
		$this->fpdf->Ln(90);
		$this->fpdf->Cell(0,20,utf8_decode('Documento de Especificaciones PIC para el Caso de uso'),1,1,'C');
		$this->fpdf->AliasNbPages();
		$this->fpdf->AddPage();
	
		//$pdf->SetAutoPageBreak(true, 10);
		$this->fpdf->Cell(60,10,utf8_decode('IDENTIFICACIÓN DEL PROYECTO'),0,1,'C');
		$this->fpdf->Ln(10);

		
		
		
		echo $this->fpdf->Output();// Name of PDF file
		//Can change the type from D=Download the file		
	}
}
