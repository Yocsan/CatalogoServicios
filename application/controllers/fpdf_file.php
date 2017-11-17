<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class fpdf_file extends CI_Controller {

	function __construct() {
		parent::__construct();
	
		$this->load->library('PDF_HTML');
				 
	}

	public function index() {
		
		
		$pdf=new PDF_HTML();
		$pdf->AddPage();
		
		
		        //-------------------------------------------------------------------------------------------------------------------------

		$pdf->SetMargins(10, 10); 
		
		$pdf->SetFont('Arial');
		$pdf->Image(base_url('assets/img/logo_etf.png'),60,50,-180);
		
		$miCabecera = array('Proceso:', 'Subproceso:','Nombre del Documento:','Proyecto,Preparado por:','Fecha dise�o Funcional:', 'fecha dise�o T�cnico','ID Servicio','Servicio:');
		$data = array('1', '2','3','4','5','6','7','8');
		
		
		
		$pdf->Ln(90);
		$pdf->Cell(0,20,utf8_decode('Documento de Especificaciones PIC para el Caso de uso '),1,1,'C');
		$pdf->AliasNbPages();
		$pdf->AddPage();
		$pdf->SetAutoPageBreak(true, 20);
		$pdf->Cell(60,10,utf8_decode('IDENTIFICACI�N DEL PROYECTO'),0,1,'C');
		$pdf->Ln(5);
		
		// Carga de datos
		$pdf->SetFont('Arial','',14);
		
		
		$pdf->cabeceraVertical($miCabecera,10,50,50);
		$pdf->datosVerticales($data,60,50,130);
		$pdf->Ln(5);
		$pdf->setx(0);
		
		
		
		
		$pdf->Cell(60,10,utf8_decode('HISTORIAL DE CAMBIOS'),0,1,'C');
		
		$miCabecera = array('Versi�n', 'Fecha','Elaborado Por','Revisado Por','Descripci�n');
		$data = array('1', '2','3','4','5');
		
		$posy=$pdf->gety();
		
		$pdf->cabeceraHorizontal($miCabecera,10,7+$posy,36);
		$pdf->datosHorizontal($data,10,14+$posy,36);
		$pdf->AddPage();
		$pdf->SetAutoPageBreak(true, 30);
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(50,10,utf8_decode('TABLA DE CONTENIDOS'),0,1,'L');
		$pdf->AddPage();
		$pdf->Cell(50,10,utf8_decode('1.- Introduccion'),0,1,'L');

		$pdf->SetFont('Arial','',10);
		
		$pdf->MultiCell(0,5, utf8_decode('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras quis odio a orci eleifend auctor. In tincidunt quam lorem, eleifend varius enim semper ut. Nam at metus accumsan ex maximus scelerisque. Ut suscipit velit non ligula consequat elementum. In eget condimentum libero, vitae mattis sapien. Donec malesuada elit sit amet nulla pretium luctus. Duis facilisis pretium enim, ac tristique turpis congue a. Etiam blandit finibus enim, eu ornare est mollis non. Pellentesque accumsan tellus volutpat, gravida elit sed, fermentum lacus. Proin pellentesque nec tortor a dapibus. Cras interdum sem luctus ex pretium venenatis. Donec euismod aliquam mi. Aenean gravida ac diam facilisis lacinia. Proin egestas, tortor nec posuere dignissim, nisl metus blandit dui, eget pulvinar nisi mauris quis lacus. Donec finibus libero in tellus gravida mattis. Etiam non tellus nunc.'),0,'J',false);
		$pdf->Ln(10);
		$pdf->SetX(30);
		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(0,10,utf8_decode('1.1- Premisas'),0,1,'L');
		$pdf->SetFont('Arial','',10);
		$pdf->SetX(30);

		$pdf->MultiCell(0,5, utf8_decode('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras quis odio a orci eleifend auctor. In tincidunt quam lorem, eleifend varius enim semper ut. Nam at metus accumsan ex maximus scelerisque. Ut suscipit velit non ligula consequat elementum. In eget condimentum libero, vitae mattis sapien. Donec malesuada elit sit amet nulla pretium luctus. Duis facilisis pretium enim, ac tristique turpis congue a. Etiam blandit finibus enim, eu ornare est mollis non. Pellentesque accumsan tellus volutpat, gravida elit sed, fermentum lacus. Proin pellentesque nec tortor a dapibus. Cras interdum sem luctus ex pretium venenatis. Donec euismod aliquam mi. Aenean gravida ac diam facilisis lacinia. Proin egestas, tortor nec posuere dignissim, nisl metus blandit dui, eget pulvinar nisi mauris quis lacus. Donec finibus libero in tellus gravida mattis. Etiam non tellus nunc.'),0,'J',false);
		$pdf->Ln(10);
		$pdf->SetFont('Arial','B',10);
		$pdf->SetX(30);
		$pdf->Cell(0,10,utf8_decode('Caracter�stica b�sica de los servicios:'),0,1,'L');
		$pdf->Ln(5);
		$pdf->SetX(30);

		$pdf->Cell(0,10,utf8_decode('Nombre del servicio'),0,1,'L');

		$miCabecera = array('Prioridad:', 'Sentido','Procesamiento','Frecuencia','Volumen','Tama�o Archivo','Retorno');


		$data = array('1', '2','3','4','5','6','7');

		$posy=$pdf->gety();
		$pdf->cabeceraVertical($miCabecera,30,10+$posy,50);
		$pdf->datosVerticales($data,80,10+$posy,120);
		$pdf->Ln(20);
		$pdf->SetFont('Arial','B',12);
		$pdf->SetX(20);

		$pdf->Cell(0,10,utf8_decode('2.-	Especificaciones Funcionales de Interfases'),0,1,'L');
		$pdf->Ln(5);
		$pdf->SetFont('Arial','B',10);
		$pdf->SetX(30);

		$pdf->Cell(0,10,utf8_decode('2.1.-	Descripci�n del Proceso'),0,1,'L');
		$pdf->SetFont('Arial','',10);
		$pdf->SetX(30);

		$pdf->MultiCell(0,5, utf8_decode('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras quis odio a orci eleifend auctor. In tincidunt quam lorem, eleifend varius enim semper ut. Nam at metus accumsan ex maximus scelerisque. Ut suscipit velit non ligula consequat elementum. In eget condimentum libero, vitae mattis sapien. Donec malesuada elit sit amet nulla pretium luctus. Duis facilisis pretium enim, ac tristique turpis congue a. Etiam blandit finibus enim, eu ornare est mollis non. Pellentesque accumsan tellus volutpat, gravida elit sed, fermentum lacus. Proin pellentesque nec tortor a dapibus. Cras interdum sem luctus ex pretium venenatis. Donec euismod aliquam mi. Aenean gravida ac diam facilisis lacinia. Proin egestas, tortor nec posuere dignissim, nisl metus blandit dui, eget pulvinar nisi mauris quis lacus. Donec finibus libero in tellus gravida mattis. Etiam non tellus nunc.'),0,'J',false);


		$pdf->Ln(10);
		$pdf->SetFont('Arial','B',10);
		$pdf->SetX(30);
		$pdf->Cell(0,10,utf8_decode('2.2.-	Casos de Uso Identificados'),0,1,'L');
		$pdf->SetFont('Arial','',10);
		$pdf->SetX(30);
		$pdf->MultiCell(0,5, utf8_decode('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras quis odio a orci eleifend auctor. In tincidunt quam lorem, eleifend varius enim semper ut. Nam at metus accumsan ex maximus scelerisque. Ut suscipit velit non ligula consequat elementum. In eget condimentum libero, vitae mattis sapien. Donec malesuada elit sit amet nulla pretium luctus. Duis facilisis pretium enim, ac tristique turpis congue a. Etiam blandit finibus enim, eu ornare est mollis non. Pellentesque accumsan tellus volutpat, gravida elit sed, fermentum lacus. Proin pellentesque nec tortor a dapibus. Cras interdum sem luctus ex pretium venenatis. Donec euismod aliquam mi. Aenean gravida ac diam facilisis lacinia. Proin egestas, tortor nec posuere dignissim, nisl metus blandit dui, eget pulvinar nisi mauris quis lacus. Donec finibus libero in tellus gravida mattis. Etiam non tellus nunc.'),0,'J',false);
		$pdf->Ln(10);
		
							
		$miCabecera = array('Nombre', 'Paso','Cliente','Proveedor','S�ncrono/ As�ncrono','Online/ Batch','Volumen','Tiempo de Respuesta');

		$data = array('1', '2','3','4','5','6','7','8');
	$posy=$pdf->gety();
		$pdf->cabeceraVertical($miCabecera,30,10+$posy,50);
		$pdf->datosVerticales($data,80,10+$posy,120);
	
		$pdf->Ln(20);
		$pdf->SetFont('Arial','B',12);
		$pdf->SetX(20);
		$pdf->SetFont('Arial','B',10);
		$pdf->SetX(45);

		$pdf->Cell(0,10,utf8_decode('2.2.1.-	Caso de Uso: Nombre de caso de uso'),0,1,'L');
		$pdf->SetX(50);
		$pdf->Cell(0,10,utf8_decode('2.2.1.1.-	Descripci�n Funcional'),0,1,'L');
		$pdf->SetFont('Arial','',10);
		$pdf->SetX(50);
		$pdf->MultiCell(0,5, utf8_decode('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras quis odio a orci eleifend auctor. In tincidunt quam lorem, eleifend varius enim semper ut. Nam at metus accumsan ex maximus scelerisque. Ut suscipit velit non ligula consequat elementum. In eget condimentum libero, vitae mattis sapien. Donec malesuada elit sit amet nulla pretium luctus. Duis facilisis pretium enim, ac tristique turpis congue a. Etiam blandit finibus enim, eu ornare est mollis non. Pellentesque accumsan tellus volutpat, gravida elit sed, fermentum lacus. Proin pellentesque nec tortor a dapibus. Cras interdum sem luctus ex pretium venenatis. Donec euismod aliquam mi. Aenean gravida ac diam facilisis lacinia. Proin egestas, tortor nec posuere dignissim, nisl metus blandit dui, eget pulvinar nisi mauris quis lacus. Donec finibus libero in tellus gravida mattis. Etiam non tellus nunc.'),0,'J',false);
		$pdf->Ln(10);
		$pdf->SetFont('Arial','B',10);
		$pdf->SetX(50);
		$pdf->Cell(0,10,utf8_decode('2.2.1.2	Eventos de Inicio/Disparadores'),0,1,'L');
		$pdf->SetFont('Arial','',10);
		$pdf->SetX(50);
		$pdf->MultiCell(0,5, utf8_decode('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras quis odio a orci eleifend auctor. In tincidunt quam lorem, eleifend varius enim semper ut. Nam at metus accumsan ex maximus scelerisque. Ut suscipit velit non ligula consequat elementum. In eget condimentum libero, vitae mattis sapien. Donec malesuada elit sit amet nulla pretium luctus. Duis facilisis pretium enim, ac tristique turpis congue a. Etiam blandit finibus enim, eu ornare est mollis non. Pellentesque accumsan tellus volutpat, gravida elit sed, fermentum lacus. Proin pellentesque nec tortor a dapibus. Cras interdum sem luctus ex pretium venenatis. Donec euismod aliquam mi. Aenean gravida ac diam facilisis lacinia. Proin egestas, tortor nec posuere dignissim, nisl metus blandit dui, eget pulvinar nisi mauris quis lacus. Donec finibus libero in tellus gravida mattis. Etiam non tellus nunc.'),0,'J',false);		
		$pdf->Ln(10);
		$pdf->SetFont('Arial','B',10);
		$pdf->SetX(50);
		$pdf->Cell(0,10,utf8_decode('2.2.1.3	Excepciones'),0,1,'L');
		$pdf->SetFont('Arial','',10);
		$pdf->SetX(50);
		$pdf->MultiCell(0,5, utf8_decode('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras quis odio a orci eleifend auctor. In tincidunt quam lorem, eleifend varius enim semper ut. Nam at metus accumsan ex maximus scelerisque. Ut suscipit velit non ligula consequat elementum. In eget condimentum libero, vitae mattis sapien. Donec malesuada elit sit amet nulla pretium luctus. Duis facilisis pretium enim, ac tristique turpis congue a. Etiam blandit finibus enim, eu ornare est mollis non. Pellentesque accumsan tellus volutpat, gravida elit sed, fermentum lacus. Proin pellentesque nec tortor a dapibus. Cras interdum sem luctus ex pretium venenatis. Donec euismod aliquam mi. Aenean gravida ac diam facilisis lacinia. Proin egestas, tortor nec posuere dignissim, nisl metus blandit dui, eget pulvinar nisi mauris quis lacus. Donec finibus libero in tellus gravida mattis. Etiam non tellus nunc.'),0,'J',false);
		$pdf->Ln(10);
		$pdf->SetFont('Arial','B',10);
		$pdf->SetX(50);
		$pdf->Cell(0,10,utf8_decode('2.2.1.4	Servicio [respuestaDeFactibilidadyOS]'),0,1,'L');
		$pdf->SetFont('Arial','',10);
		$pdf->SetX(50);
		$pdf->MultiCell(0,5, utf8_decode('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras quis odio a orci eleifend auctor. In tincidunt quam lorem, eleifend varius enim semper ut. Nam at metus accumsan ex maximus scelerisque. Ut suscipit velit non ligula consequat elementum. In eget condimentum libero, vitae mattis sapien. Donec malesuada elit sit amet nulla pretium luctus. Duis facilisis pretium enim, ac tristique turpis congue a. Etiam blandit finibus enim, eu ornare est mollis non. Pellentesque accumsan tellus volutpat, gravida elit sed, fermentum lacus. Proin pellentesque nec tortor a dapibus. Cras interdum sem luctus ex pretium venenatis. Donec euismod aliquam mi. Aenean gravida ac diam facilisis lacinia. Proin egestas, tortor nec posuere dignissim, nisl metus blandit dui, eget pulvinar nisi mauris quis lacus. Donec finibus libero in tellus gravida mattis. Etiam non tellus nunc.'),0,'J',false);	

		$pdf->SetFont('Arial','B',10);
				$pdf->Ln(10);

		$pdf->SetX(20);
		$pdf->Cell(0,10,utf8_decode('3.-	Especificaciones T�cnicas Generales de Interfases'),0,1,'L');
		$pdf->SetX(30);

		$pdf->Cell(0,10,utf8_decode('3.1.-	Arquitectura del sistema con el que se conectar�:'),0,1,'L');
		$pdf->SetFont('Arial','',10);
		$pdf->SetX(30);
		$pdf->MultiCell(0,5, utf8_decode('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras quis odio a orci eleifend auctor. In tincidunt quam lorem, eleifend varius enim semper ut. Nam at metus accumsan ex maximus scelerisque. Ut suscipit velit non ligula consequat elementum. In eget condimentum libero, vitae mattis sapien. Donec malesuada elit sit amet nulla pretium luctus. Duis facilisis pretium enim, ac tristique turpis congue a. Etiam blandit finibus enim, eu ornare est mollis non. Pellentesque accumsan tellus volutpat, gravida elit sed, fermentum lacus. Proin pellentesque nec tortor a dapibus. Cras interdum sem luctus ex pretium venenatis. Donec euismod aliquam mi. Aenean gravida ac diam facilisis lacinia. Proin egestas, tortor nec posuere dignissim, nisl metus blandit dui, eget pulvinar nisi mauris quis lacus. Donec finibus libero in tellus gravida mattis. Etiam non tellus nunc.'),0,'J',false);
		$pdf->Ln(10);
		$pdf->SetFont('Arial','B',10);
		$pdf->SetX(30);
		$pdf->Cell(0,10,utf8_decode('3.2.- Conectividad'),0,1,'L');
		$pdf->SetFont('Arial','',10);
		$pdf->SetX(30);
		$pdf->MultiCell(0,5, utf8_decode('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras quis odio a orci eleifend auctor. In tincidunt quam lorem, eleifend varius enim semper ut. Nam at metus accumsan ex maximus scelerisque. Ut suscipit velit non ligula consequat elementum. In eget condimentum libero, vitae mattis sapien. Donec malesuada elit sit amet nulla pretium luctus. Duis facilisis pretium enim, ac tristique turpis congue a. Etiam blandit finibus enim, eu ornare est mollis non. Pellentesque accumsan tellus volutpat, gravida elit sed, fermentum lacus. Proin pellentesque nec tortor a dapibus. Cras interdum sem luctus ex pretium venenatis. Donec euismod aliquam mi. Aenean gravida ac diam facilisis lacinia. Proin egestas, tortor nec posuere dignissim, nisl metus blandit dui, eget pulvinar nisi mauris quis lacus. Donec finibus libero in tellus gravida mattis. Etiam non tellus nunc.'),0,'J',false);

		$pdf->Ln(10);
		$pdf->SetFont('Arial','B',10);
		$pdf->SetX(30);
		$pdf->Cell(0,10,utf8_decode('3.3.- Protocolo'),0,1,'L');
		$pdf->SetFont('Arial','',10);
				$pdf->SetX(30);

		$pdf->MultiCell(0,5, utf8_decode('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras quis odio a orci eleifend auctor. In tincidunt quam lorem, eleifend varius enim semper ut. Nam at metus accumsan ex maximus scelerisque. Ut suscipit velit non ligula consequat elementum. In eget condimentum libero, vitae mattis sapien. Donec malesuada elit sit amet nulla pretium luctus. Duis facilisis pretium enim, ac tristique turpis congue a. Etiam blandit finibus enim, eu ornare est mollis non. Pellentesque accumsan tellus volutpat, gravida elit sed, fermentum lacus. Proin pellentesque nec tortor a dapibus. Cras interdum sem luctus ex pretium venenatis. Donec euismod aliquam mi. Aenean gravida ac diam facilisis lacinia. Proin egestas, tortor nec posuere dignissim, nisl metus blandit dui, eget pulvinar nisi mauris quis lacus. Donec finibus libero in tellus gravida mattis. Etiam non tellus nunc.'),0,'J',false);

		$pdf->Ln(10);
		$pdf->SetFont('Arial','B',10);
		$pdf->SetX(30);
		$pdf->Cell(0,10,utf8_decode('3.4.-	Par�metros de configuraci�n:'),0,1,'L');
		$pdf->SetFont('Arial','',10);
		$pdf->SetX(30);
		$pdf->MultiCell(0,5, utf8_decode('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras quis odio a orci eleifend auctor. In tincidunt quam lorem, eleifend varius enim semper ut. Nam at metus accumsan ex maximus scelerisque. Ut suscipit velit non ligula consequat elementum. In eget condimentum libero, vitae mattis sapien. Donec malesuada elit sit amet nulla pretium luctus. Duis facilisis pretium enim, ac tristique turpis congue a. Etiam blandit finibus enim, eu ornare est mollis non. Pellentesque accumsan tellus volutpat, gravida elit sed, fermentum lacus. Proin pellentesque nec tortor a dapibus. Cras interdum sem luctus ex pretium venenatis. Donec euismod aliquam mi. Aenean gravida ac diam facilisis lacinia. Proin egestas, tortor nec posuere dignissim, nisl metus blandit dui, eget pulvinar nisi mauris quis lacus. Donec finibus libero in tellus gravida mattis. Etiam non tellus nunc.'),0,'J',false);

		$pdf->Ln(10);
		$pdf->SetFont('Arial','B',10);
		$pdf->SetX(30);
		$pdf->Cell(0,10,utf8_decode('3.5.-	Manejo de Errores.:'),0,1,'L');
		$pdf->SetFont('Arial','',10);
		$pdf->SetX(30);
		$pdf->MultiCell(0,5, utf8_decode('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras quis odio a orci eleifend auctor. In tincidunt quam lorem, eleifend varius enim semper ut. Nam at metus accumsan ex maximus scelerisque. Ut suscipit velit non ligula consequat elementum. In eget condimentum libero, vitae mattis sapien. Donec malesuada elit sit amet nulla pretium luctus. Duis facilisis pretium enim, ac tristique turpis congue a. Etiam blandit finibus enim, eu ornare est mollis non. Pellentesque accumsan tellus volutpat, gravida elit sed, fermentum lacus. Proin pellentesque nec tortor a dapibus. Cras interdum sem luctus ex pretium venenatis. Donec euismod aliquam mi. Aenean gravida ac diam facilisis lacinia. Proin egestas, tortor nec posuere dignissim, nisl metus blandit dui, eget pulvinar nisi mauris quis lacus. Donec finibus libero in tellus gravida mattis. Etiam non tellus nunc.'),0,'J',false);

		return $pdf->Output();

		/*
		$fpdf = new FPDF();
		
		$fpdf->SetFont('Arial','B',14);

		//$fpdf->Image('logo.png',60,50,-180);
		$fpdf->Ln(90);
		$fpdf->Cell(0,20,utf8_decode('Documento de Especificaciones PIC para el Caso de uso'),1,1,'C');

		$fpdf->AliasNbPages();
		$fpdf->AddPage();
		$fpdf->SetAutoPageBreak(true, 10);
		$fpdf->SetFont('Arial','B',12);
		$fpdf->Cell(60,10,utf8_decode('IDENTIFICACIÓN DEL PROYECTO'),0,1,'L');
		$fpdf->Ln(10);

		$fpdf->Cell(60,10,utf8_decode('HISTORIAL DE CAMBIOS:'),0,1,'L');
		$fpdf->AddPage();
		$fpdf->Cell(50,10,utf8_decode('TABLA DE CONTENIDOS'),0,1,'L');
		$fpdf->AddPage();
		$fpdf->Cell(50,10,utf8_decode('1.- Introduccion'),0,1,'L');

		$fpdf->SetFont('Arial','',10);

		$fpdf->MultiCell(0,5, utf8_decode('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras quis odio a orci eleifend auctor. In tincidunt quam lorem, eleifend varius enim semper ut. Nam at metus accumsan ex maximus scelerisque. Ut suscipit velit non ligula consequat elementum. In eget condimentum libero, vitae mattis sapien. Donec malesuada elit sit amet nulla pretium luctus. Duis facilisis pretium enim, ac tristique turpis congue a. Etiam blandit finibus enim, eu ornare est mollis non. Pellentesque accumsan tellus volutpat, gravida elit sed, fermentum lacus. Proin pellentesque nec tortor a dapibus. Cras interdum sem luctus ex pretium venenatis. Donec euismod aliquam mi. Aenean gravida ac diam facilisis lacinia. Proin egestas, tortor nec posuere dignissim, nisl metus blandit dui, eget pulvinar nisi mauris quis lacus. Donec finibus libero in tellus gravida mattis. Etiam non tellus nunc.'),0,'J',false);
		$fpdf->Ln(10);
		$fpdf->SetX(30);
		$fpdf->SetFont('Arial','B',10);
		$fpdf->Cell(0,10,utf8_decode('1.1- Premisas'),0,1,'L');
		$fpdf->SetFont('Arial','',10);
		$fpdf->SetX(30);

		$fpdf->MultiCell(0,5, utf8_decode('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras quis odio a orci eleifend auctor. In tincidunt quam lorem, eleifend varius enim semper ut. Nam at metus accumsan ex maximus scelerisque. Ut suscipit velit non ligula consequat elementum. In eget condimentum libero, vitae mattis sapien. Donec malesuada elit sit amet nulla pretium luctus. Duis facilisis pretium enim, ac tristique turpis congue a. Etiam blandit finibus enim, eu ornare est mollis non. Pellentesque accumsan tellus volutpat, gravida elit sed, fermentum lacus. Proin pellentesque nec tortor a dapibus. Cras interdum sem luctus ex pretium venenatis. Donec euismod aliquam mi. Aenean gravida ac diam facilisis lacinia. Proin egestas, tortor nec posuere dignissim, nisl metus blandit dui, eget pulvinar nisi mauris quis lacus. Donec finibus libero in tellus gravida mattis. Etiam non tellus nunc.'),0,'J',false);
		$fpdf->Ln(10);
		$fpdf->SetFont('Arial','B',12);
		$fpdf->SetX(20);

		$fpdf->Cell(0,10,utf8_decode('2.-	Especificaciones Funcionales de Interfases'),0,1,'L');
		$fpdf->Ln(5);
		$fpdf->SetFont('Arial','B',10);
		$fpdf->SetX(30);

		$fpdf->Cell(0,10,utf8_decode('2.1.-	Descripción del Proceso'),0,1,'L');
		$fpdf->SetFont('Arial','',10);
		$fpdf->SetX(30);

		$fpdf->MultiCell(0,5, utf8_decode('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras quis odio a orci eleifend auctor. In tincidunt quam lorem, eleifend varius enim semper ut. Nam at metus accumsan ex maximus scelerisque. Ut suscipit velit non ligula consequat elementum. In eget condimentum libero, vitae mattis sapien. Donec malesuada elit sit amet nulla pretium luctus. Duis facilisis pretium enim, ac tristique turpis congue a. Etiam blandit finibus enim, eu ornare est mollis non. Pellentesque accumsan tellus volutpat, gravida elit sed, fermentum lacus. Proin pellentesque nec tortor a dapibus. Cras interdum sem luctus ex pretium venenatis. Donec euismod aliquam mi. Aenean gravida ac diam facilisis lacinia. Proin egestas, tortor nec posuere dignissim, nisl metus blandit dui, eget pulvinar nisi mauris quis lacus. Donec finibus libero in tellus gravida mattis. Etiam non tellus nunc.'),0,'J',false);


		$fpdf->Ln(10);
		$fpdf->SetFont('Arial','B',10);
		$fpdf->SetX(30);
		$fpdf->Cell(0,10,utf8_decode('2.2.-	Casos de Uso Identificados'),0,1,'L');
		$fpdf->SetFont('Arial','',10);
		$fpdf->SetX(30);
		$fpdf->MultiCell(0,5, utf8_decode('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras quis odio a orci eleifend auctor. In tincidunt quam lorem, eleifend varius enim semper ut. Nam at metus accumsan ex maximus scelerisque. Ut suscipit velit non ligula consequat elementum. In eget condimentum libero, vitae mattis sapien. Donec malesuada elit sit amet nulla pretium luctus. Duis facilisis pretium enim, ac tristique turpis congue a. Etiam blandit finibus enim, eu ornare est mollis non. Pellentesque accumsan tellus volutpat, gravida elit sed, fermentum lacus. Proin pellentesque nec tortor a dapibus. Cras interdum sem luctus ex pretium venenatis. Donec euismod aliquam mi. Aenean gravida ac diam facilisis lacinia. Proin egestas, tortor nec posuere dignissim, nisl metus blandit dui, eget pulvinar nisi mauris quis lacus. Donec finibus libero in tellus gravida mattis. Etiam non tellus nunc.'),0,'J',false);

		$fpdf->SetFont('Arial','B',10);
		$fpdf->SetX(45);

		$fpdf->Cell(0,10,utf8_decode('2.2.1.-	Caso de Uso: Nombre de caso de uso'),0,1,'L');
		$fpdf->SetX(50);
		$fpdf->Cell(0,10,utf8_decode('2.2.1.1.-	Descripción Funcional'),0,1,'L');
		$fpdf->SetFont('Arial','',10);
		$fpdf->SetX(50);
		$fpdf->MultiCell(0,5, utf8_decode('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras quis odio a orci eleifend auctor. In tincidunt quam lorem, eleifend varius enim semper ut. Nam at metus accumsan ex maximus scelerisque. Ut suscipit velit non ligula consequat elementum. In eget condimentum libero, vitae mattis sapien. Donec malesuada elit sit amet nulla pretium luctus. Duis facilisis pretium enim, ac tristique turpis congue a. Etiam blandit finibus enim, eu ornare est mollis non. Pellentesque accumsan tellus volutpat, gravida elit sed, fermentum lacus. Proin pellentesque nec tortor a dapibus. Cras interdum sem luctus ex pretium venenatis. Donec euismod aliquam mi. Aenean gravida ac diam facilisis lacinia. Proin egestas, tortor nec posuere dignissim, nisl metus blandit dui, eget pulvinar nisi mauris quis lacus. Donec finibus libero in tellus gravida mattis. Etiam non tellus nunc.'),0,'J',false);
		$fpdf->Ln(10);
		$fpdf->SetFont('Arial','B',10);
		$fpdf->SetX(50);
		$fpdf->Cell(0,10,utf8_decode('2.2.1.2	Eventos de Inicio/Disparadores'),0,1,'L');
		$fpdf->SetFont('Arial','',10);
		$fpdf->SetX(50);
		$fpdf->MultiCell(0,5, utf8_decode('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras quis odio a orci eleifend auctor. In tincidunt quam lorem, eleifend varius enim semper ut. Nam at metus accumsan ex maximus scelerisque. Ut suscipit velit non ligula consequat elementum. In eget condimentum libero, vitae mattis sapien. Donec malesuada elit sit amet nulla pretium luctus. Duis facilisis pretium enim, ac tristique turpis congue a. Etiam blandit finibus enim, eu ornare est mollis non. Pellentesque accumsan tellus volutpat, gravida elit sed, fermentum lacus. Proin pellentesque nec tortor a dapibus. Cras interdum sem luctus ex pretium venenatis. Donec euismod aliquam mi. Aenean gravida ac diam facilisis lacinia. Proin egestas, tortor nec posuere dignissim, nisl metus blandit dui, eget pulvinar nisi mauris quis lacus. Donec finibus libero in tellus gravida mattis. Etiam non tellus nunc.'),0,'J',false);
		$fpdf->Ln(10);
		$fpdf->SetFont('Arial','B',10);
		$fpdf->SetX(50);
		$fpdf->Cell(0,10,utf8_decode('2.2.1.3	Excepciones'),0,1,'L');
		$fpdf->SetFont('Arial','',10);
		$fpdf->SetX(50);
		$fpdf->MultiCell(0,5, utf8_decode('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras quis odio a orci eleifend auctor. In tincidunt quam lorem, eleifend varius enim semper ut. Nam at metus accumsan ex maximus scelerisque. Ut suscipit velit non ligula consequat elementum. In eget condimentum libero, vitae mattis sapien. Donec malesuada elit sit amet nulla pretium luctus. Duis facilisis pretium enim, ac tristique turpis congue a. Etiam blandit finibus enim, eu ornare est mollis non. Pellentesque accumsan tellus volutpat, gravida elit sed, fermentum lacus. Proin pellentesque nec tortor a dapibus. Cras interdum sem luctus ex pretium venenatis. Donec euismod aliquam mi. Aenean gravida ac diam facilisis lacinia. Proin egestas, tortor nec posuere dignissim, nisl metus blandit dui, eget pulvinar nisi mauris quis lacus. Donec finibus libero in tellus gravida mattis. Etiam non tellus nunc.'),0,'J',false);
		$fpdf->Ln(10);
		$fpdf->SetFont('Arial','B',10);
		$fpdf->SetX(50);
		$fpdf->Cell(0,10,utf8_decode('2.2.1.4	Servicio [respuestaDeFactibilidadyOS]'),0,1,'L');
		$fpdf->SetFont('Arial','',10);
		$fpdf->SetX(50);
		$fpdf->MultiCell(0,5, utf8_decode('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras quis odio a orci eleifend auctor. In tincidunt quam lorem, eleifend varius enim semper ut. Nam at metus accumsan ex maximus scelerisque. Ut suscipit velit non ligula consequat elementum. In eget condimentum libero, vitae mattis sapien. Donec malesuada elit sit amet nulla pretium luctus. Duis facilisis pretium enim, ac tristique turpis congue a. Etiam blandit finibus enim, eu ornare est mollis non. Pellentesque accumsan tellus volutpat, gravida elit sed, fermentum lacus. Proin pellentesque nec tortor a dapibus. Cras interdum sem luctus ex pretium venenatis. Donec euismod aliquam mi. Aenean gravida ac diam facilisis lacinia. Proin egestas, tortor nec posuere dignissim, nisl metus blandit dui, eget pulvinar nisi mauris quis lacus. Donec finibus libero in tellus gravida mattis. Etiam non tellus nunc.'),0,'J',false);

		$fpdf->SetFont('Arial','B',10);
				$fpdf->Ln(10);

		$fpdf->SetX(20);
		$fpdf->Cell(0,10,utf8_decode('3.-	Especificaciones Técnicas Generales de Interfases'),0,1,'L');
		$fpdf->SetX(30);

		$fpdf->Cell(0,10,utf8_decode('3.1.-	Arquitectura del sistema con el que se conectará:'),0,1,'L');
		$fpdf->SetFont('Arial','',10);
		$fpdf->SetX(30);
		$fpdf->MultiCell(0,5, utf8_decode('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras quis odio a orci eleifend auctor. In tincidunt quam lorem, eleifend varius enim semper ut. Nam at metus accumsan ex maximus scelerisque. Ut suscipit velit non ligula consequat elementum. In eget condimentum libero, vitae mattis sapien. Donec malesuada elit sit amet nulla pretium luctus. Duis facilisis pretium enim, ac tristique turpis congue a. Etiam blandit finibus enim, eu ornare est mollis non. Pellentesque accumsan tellus volutpat, gravida elit sed, fermentum lacus. Proin pellentesque nec tortor a dapibus. Cras interdum sem luctus ex pretium venenatis. Donec euismod aliquam mi. Aenean gravida ac diam facilisis lacinia. Proin egestas, tortor nec posuere dignissim, nisl metus blandit dui, eget pulvinar nisi mauris quis lacus. Donec finibus libero in tellus gravida mattis. Etiam non tellus nunc.'),0,'J',false);
		$fpdf->Ln(10);
		$fpdf->SetFont('Arial','B',10);
		$fpdf->SetX(30);
		$fpdf->Cell(0,10,utf8_decode('3.2.- Conectividad'),0,1,'L');
		$fpdf->SetFont('Arial','',10);
		$fpdf->SetX(30);
		$fpdf->MultiCell(0,5, utf8_decode('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras quis odio a orci eleifend auctor. In tincidunt quam lorem, eleifend varius enim semper ut. Nam at metus accumsan ex maximus scelerisque. Ut suscipit velit non ligula consequat elementum. In eget condimentum libero, vitae mattis sapien. Donec malesuada elit sit amet nulla pretium luctus. Duis facilisis pretium enim, ac tristique turpis congue a. Etiam blandit finibus enim, eu ornare est mollis non. Pellentesque accumsan tellus volutpat, gravida elit sed, fermentum lacus. Proin pellentesque nec tortor a dapibus. Cras interdum sem luctus ex pretium venenatis. Donec euismod aliquam mi. Aenean gravida ac diam facilisis lacinia. Proin egestas, tortor nec posuere dignissim, nisl metus blandit dui, eget pulvinar nisi mauris quis lacus. Donec finibus libero in tellus gravida mattis. Etiam non tellus nunc.'),0,'J',false);

		$fpdf->Ln(10);
		$fpdf->SetFont('Arial','B',10);
		$fpdf->SetX(30);
		$fpdf->Cell(0,10,utf8_decode('3.3.- Protocolo'),0,1,'L');
		$fpdf->SetFont('Arial','',10);
				$fpdf->SetX(30);

		$fpdf->MultiCell(0,5, utf8_decode('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras quis odio a orci eleifend auctor. In tincidunt quam lorem, eleifend varius enim semper ut. Nam at metus accumsan ex maximus scelerisque. Ut suscipit velit non ligula consequat elementum. In eget condimentum libero, vitae mattis sapien. Donec malesuada elit sit amet nulla pretium luctus. Duis facilisis pretium enim, ac tristique turpis congue a. Etiam blandit finibus enim, eu ornare est mollis non. Pellentesque accumsan tellus volutpat, gravida elit sed, fermentum lacus. Proin pellentesque nec tortor a dapibus. Cras interdum sem luctus ex pretium venenatis. Donec euismod aliquam mi. Aenean gravida ac diam facilisis lacinia. Proin egestas, tortor nec posuere dignissim, nisl metus blandit dui, eget pulvinar nisi mauris quis lacus. Donec finibus libero in tellus gravida mattis. Etiam non tellus nunc.'),0,'J',false);

		$fpdf->Ln(10);
		$fpdf->SetFont('Arial','B',10);
		$fpdf->SetX(30);
		$fpdf->Cell(0,10,utf8_decode('3.4.-	Parámetros de configuración:'),0,1,'L');
		$fpdf->SetFont('Arial','',10);
		$fpdf->SetX(30);
		$fpdf->MultiCell(0,5, utf8_decode('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras quis odio a orci eleifend auctor. In tincidunt quam lorem, eleifend varius enim semper ut. Nam at metus accumsan ex maximus scelerisque. Ut suscipit velit non ligula consequat elementum. In eget condimentum libero, vitae mattis sapien. Donec malesuada elit sit amet nulla pretium luctus. Duis facilisis pretium enim, ac tristique turpis congue a. Etiam blandit finibus enim, eu ornare est mollis non. Pellentesque accumsan tellus volutpat, gravida elit sed, fermentum lacus. Proin pellentesque nec tortor a dapibus. Cras interdum sem luctus ex pretium venenatis. Donec euismod aliquam mi. Aenean gravida ac diam facilisis lacinia. Proin egestas, tortor nec posuere dignissim, nisl metus blandit dui, eget pulvinar nisi mauris quis lacus. Donec finibus libero in tellus gravida mattis. Etiam non tellus nunc.'),0,'J',false);

		$fpdf->Ln(10);
		$fpdf->SetFont('Arial','B',10);
		$fpdf->SetX(30);
		$fpdf->Cell(0,10,utf8_decode('3.5.-	Manejo de Errores.:'),0,1,'L');
		$fpdf->SetFont('Arial','',10);
		$fpdf->SetX(30);
		$fpdf->MultiCell(0,5, utf8_decode('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras quis odio a orci eleifend auctor. In tincidunt quam lorem, eleifend varius enim semper ut. Nam at metus accumsan ex maximus scelerisque. Ut suscipit velit non ligula consequat elementum. In eget condimentum libero, vitae mattis sapien. Donec malesuada elit sit amet nulla pretium luctus. Duis facilisis pretium enim, ac tristique turpis congue a. Etiam blandit finibus enim, eu ornare est mollis non. Pellentesque accumsan tellus volutpat, gravida elit sed, fermentum lacus. Proin pellentesque nec tortor a dapibus. Cras interdum sem luctus ex pretium venenatis. Donec euismod aliquam mi. Aenean gravida ac diam facilisis lacinia. Proin egestas, tortor nec posuere dignissim, nisl metus blandit dui, eget pulvinar nisi mauris quis lacus. Donec finibus libero in tellus gravida mattis. Etiam non tellus nunc.'),0,'J',false);

		echo $fpdf->Output();// Name of PDF file
		//Can change the type from D=Download the file
	*/
	}
	
}
