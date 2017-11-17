<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class fpdf_file extends CI_Controller {





	public function index() {	
		$this->load->library('fpdf_master');
		
		$this->fpdf->SetFont('Arial','B',14);
		 
		//$fpdf->Image('logo.png',60,50,-180);
		$this->fpdf->Ln(90);
		$this->fpdf->Cell(0,20,utf8_decode('Documento de Especificaciones PIC para el Caso de uso'),1,1,'C');
		
		$this->fpdf->AliasNbPages();
		$this->fpdf->AddPage();
		$this->fpdf->SetAutoPageBreak(true, 10);
		$this->fpdf->SetFont('Arial','B',12);
		$this->fpdf->Cell(60,10,utf8_decode('IDENTIFICACIÓN DEL PROYECTO'),0,1,'L');
		$this->fpdf->Ln(10);
		
		$this->fpdf->Cell(60,10,utf8_decode('HISTORIAL DE CAMBIOS:'),0,1,'L');
		$this->fpdf->AddPage();
		$this->fpdf->Cell(50,10,utf8_decode('TABLA DE CONTENIDOS'),0,1,'L');
		$this->fpdf->AddPage();
		$this->fpdf->Cell(50,10,utf8_decode('1.- Introduccion'),0,1,'L');

		$this->fpdf->SetFont('Arial','',10);
		
		$this->fpdf->MultiCell(0,5, utf8_decode('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras quis odio a orci eleifend auctor. In tincidunt quam lorem, eleifend varius enim semper ut. Nam at metus accumsan ex maximus scelerisque. Ut suscipit velit non ligula consequat elementum. In eget condimentum libero, vitae mattis sapien. Donec malesuada elit sit amet nulla pretium luctus. Duis facilisis pretium enim, ac tristique turpis congue a. Etiam blandit finibus enim, eu ornare est mollis non. Pellentesque accumsan tellus volutpat, gravida elit sed, fermentum lacus. Proin pellentesque nec tortor a dapibus. Cras interdum sem luctus ex pretium venenatis. Donec euismod aliquam mi. Aenean gravida ac diam facilisis lacinia. Proin egestas, tortor nec posuere dignissim, nisl metus blandit dui, eget pulvinar nisi mauris quis lacus. Donec finibus libero in tellus gravida mattis. Etiam non tellus nunc.'),0,'J',false);
		$this->fpdf->Ln(10);
		$this->fpdf->SetX(30);
		$this->fpdf->SetFont('Arial','B',10);
		$this->fpdf->Cell(0,10,utf8_decode('1.1- Premisas'),0,1,'L');
		$this->fpdf->SetFont('Arial','',10);
		$this->fpdf->SetX(30);

		$this->fpdf->MultiCell(0,5, utf8_decode('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras quis odio a orci eleifend auctor. In tincidunt quam lorem, eleifend varius enim semper ut. Nam at metus accumsan ex maximus scelerisque. Ut suscipit velit non ligula consequat elementum. In eget condimentum libero, vitae mattis sapien. Donec malesuada elit sit amet nulla pretium luctus. Duis facilisis pretium enim, ac tristique turpis congue a. Etiam blandit finibus enim, eu ornare est mollis non. Pellentesque accumsan tellus volutpat, gravida elit sed, fermentum lacus. Proin pellentesque nec tortor a dapibus. Cras interdum sem luctus ex pretium venenatis. Donec euismod aliquam mi. Aenean gravida ac diam facilisis lacinia. Proin egestas, tortor nec posuere dignissim, nisl metus blandit dui, eget pulvinar nisi mauris quis lacus. Donec finibus libero in tellus gravida mattis. Etiam non tellus nunc.'),0,'J',false);
		$this->fpdf->Ln(10);
		$this->fpdf->SetFont('Arial','B',12);
		$this->fpdf->SetX(20);

		$this->fpdf->Cell(0,10,utf8_decode('2.-	Especificaciones Funcionales de Interfases'),0,1,'L');
		$this->fpdf->Ln(5);
		$this->fpdf->SetFont('Arial','B',10);
		$this->fpdf->SetX(30);

		$this->fpdf->Cell(0,10,utf8_decode('2.1.-	Descripción del Proceso'),0,1,'L');
		$this->fpdf->SetFont('Arial','',10);
		$this->fpdf->SetX(30);

		$this->fpdf->MultiCell(0,5, utf8_decode('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras quis odio a orci eleifend auctor. In tincidunt quam lorem, eleifend varius enim semper ut. Nam at metus accumsan ex maximus scelerisque. Ut suscipit velit non ligula consequat elementum. In eget condimentum libero, vitae mattis sapien. Donec malesuada elit sit amet nulla pretium luctus. Duis facilisis pretium enim, ac tristique turpis congue a. Etiam blandit finibus enim, eu ornare est mollis non. Pellentesque accumsan tellus volutpat, gravida elit sed, fermentum lacus. Proin pellentesque nec tortor a dapibus. Cras interdum sem luctus ex pretium venenatis. Donec euismod aliquam mi. Aenean gravida ac diam facilisis lacinia. Proin egestas, tortor nec posuere dignissim, nisl metus blandit dui, eget pulvinar nisi mauris quis lacus. Donec finibus libero in tellus gravida mattis. Etiam non tellus nunc.'),0,'J',false);


		$this->fpdf->Ln(10);
		$this->fpdf->SetFont('Arial','B',10);
		$this->fpdf->SetX(30);
		$this->fpdf->Cell(0,10,utf8_decode('2.2.-	Casos de Uso Identificados'),0,1,'L');
		$this->fpdf->SetFont('Arial','',10);
		$this->fpdf->SetX(30);
		$this->fpdf->MultiCell(0,5, utf8_decode('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras quis odio a orci eleifend auctor. In tincidunt quam lorem, eleifend varius enim semper ut. Nam at metus accumsan ex maximus scelerisque. Ut suscipit velit non ligula consequat elementum. In eget condimentum libero, vitae mattis sapien. Donec malesuada elit sit amet nulla pretium luctus. Duis facilisis pretium enim, ac tristique turpis congue a. Etiam blandit finibus enim, eu ornare est mollis non. Pellentesque accumsan tellus volutpat, gravida elit sed, fermentum lacus. Proin pellentesque nec tortor a dapibus. Cras interdum sem luctus ex pretium venenatis. Donec euismod aliquam mi. Aenean gravida ac diam facilisis lacinia. Proin egestas, tortor nec posuere dignissim, nisl metus blandit dui, eget pulvinar nisi mauris quis lacus. Donec finibus libero in tellus gravida mattis. Etiam non tellus nunc.'),0,'J',false);

		$this->fpdf->SetFont('Arial','B',10);
		$this->fpdf->SetX(45);

		$this->fpdf->Cell(0,10,utf8_decode('2.2.1.-	Caso de Uso: Nombre de caso de uso'),0,1,'L');
		$this->fpdf->SetX(50);
		$this->fpdf->Cell(0,10,utf8_decode('2.2.1.1.-	Descripción Funcional'),0,1,'L');
		$this->fpdf->SetFont('Arial','',10);
		$this->fpdf->SetX(50);
		$this->fpdf->MultiCell(0,5, utf8_decode('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras quis odio a orci eleifend auctor. In tincidunt quam lorem, eleifend varius enim semper ut. Nam at metus accumsan ex maximus scelerisque. Ut suscipit velit non ligula consequat elementum. In eget condimentum libero, vitae mattis sapien. Donec malesuada elit sit amet nulla pretium luctus. Duis facilisis pretium enim, ac tristique turpis congue a. Etiam blandit finibus enim, eu ornare est mollis non. Pellentesque accumsan tellus volutpat, gravida elit sed, fermentum lacus. Proin pellentesque nec tortor a dapibus. Cras interdum sem luctus ex pretium venenatis. Donec euismod aliquam mi. Aenean gravida ac diam facilisis lacinia. Proin egestas, tortor nec posuere dignissim, nisl metus blandit dui, eget pulvinar nisi mauris quis lacus. Donec finibus libero in tellus gravida mattis. Etiam non tellus nunc.'),0,'J',false);
		$this->fpdf->Ln(10);
		$this->fpdf->SetFont('Arial','B',10);
		$this->fpdf->SetX(50);
		$this->fpdf->Cell(0,10,utf8_decode('2.2.1.2	Eventos de Inicio/Disparadores'),0,1,'L');
		$this->fpdf->SetFont('Arial','',10);
		$this->fpdf->SetX(50);
		$this->fpdf->MultiCell(0,5, utf8_decode('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras quis odio a orci eleifend auctor. In tincidunt quam lorem, eleifend varius enim semper ut. Nam at metus accumsan ex maximus scelerisque. Ut suscipit velit non ligula consequat elementum. In eget condimentum libero, vitae mattis sapien. Donec malesuada elit sit amet nulla pretium luctus. Duis facilisis pretium enim, ac tristique turpis congue a. Etiam blandit finibus enim, eu ornare est mollis non. Pellentesque accumsan tellus volutpat, gravida elit sed, fermentum lacus. Proin pellentesque nec tortor a dapibus. Cras interdum sem luctus ex pretium venenatis. Donec euismod aliquam mi. Aenean gravida ac diam facilisis lacinia. Proin egestas, tortor nec posuere dignissim, nisl metus blandit dui, eget pulvinar nisi mauris quis lacus. Donec finibus libero in tellus gravida mattis. Etiam non tellus nunc.'),0,'J',false);		
		$this->fpdf->Ln(10);
		$this->fpdf->SetFont('Arial','B',10);
		$this->fpdf->SetX(50);
		$this->fpdf->Cell(0,10,utf8_decode('2.2.1.3	Excepciones'),0,1,'L');
		$this->fpdf->SetFont('Arial','',10);
		$this->fpdf->SetX(50);
		$this->fpdf->MultiCell(0,5, utf8_decode('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras quis odio a orci eleifend auctor. In tincidunt quam lorem, eleifend varius enim semper ut. Nam at metus accumsan ex maximus scelerisque. Ut suscipit velit non ligula consequat elementum. In eget condimentum libero, vitae mattis sapien. Donec malesuada elit sit amet nulla pretium luctus. Duis facilisis pretium enim, ac tristique turpis congue a. Etiam blandit finibus enim, eu ornare est mollis non. Pellentesque accumsan tellus volutpat, gravida elit sed, fermentum lacus. Proin pellentesque nec tortor a dapibus. Cras interdum sem luctus ex pretium venenatis. Donec euismod aliquam mi. Aenean gravida ac diam facilisis lacinia. Proin egestas, tortor nec posuere dignissim, nisl metus blandit dui, eget pulvinar nisi mauris quis lacus. Donec finibus libero in tellus gravida mattis. Etiam non tellus nunc.'),0,'J',false);
		$this->fpdf->Ln(10);
		$this->fpdf->SetFont('Arial','B',10);
		$this->fpdf->SetX(50);
		$this->fpdf->Cell(0,10,utf8_decode('2.2.1.4	Servicio [respuestaDeFactibilidadyOS]'),0,1,'L');
		$this->fpdf->SetFont('Arial','',10);
		$this->fpdf->SetX(50);
		$this->fpdf->MultiCell(0,5, utf8_decode('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras quis odio a orci eleifend auctor. In tincidunt quam lorem, eleifend varius enim semper ut. Nam at metus accumsan ex maximus scelerisque. Ut suscipit velit non ligula consequat elementum. In eget condimentum libero, vitae mattis sapien. Donec malesuada elit sit amet nulla pretium luctus. Duis facilisis pretium enim, ac tristique turpis congue a. Etiam blandit finibus enim, eu ornare est mollis non. Pellentesque accumsan tellus volutpat, gravida elit sed, fermentum lacus. Proin pellentesque nec tortor a dapibus. Cras interdum sem luctus ex pretium venenatis. Donec euismod aliquam mi. Aenean gravida ac diam facilisis lacinia. Proin egestas, tortor nec posuere dignissim, nisl metus blandit dui, eget pulvinar nisi mauris quis lacus. Donec finibus libero in tellus gravida mattis. Etiam non tellus nunc.'),0,'J',false);	

		$this->fpdf->SetFont('Arial','B',10);
				$this->fpdf->Ln(10);

		$this->fpdf->SetX(20);
		$this->fpdf->Cell(0,10,utf8_decode('3.-	Especificaciones Técnicas Generales de Interfases'),0,1,'L');
		$this->fpdf->SetX(30);

		$this->fpdf->Cell(0,10,utf8_decode('3.1.-	Arquitectura del sistema con el que se conectará:'),0,1,'L');
		$this->fpdf->SetFont('Arial','',10);
		$this->fpdf->SetX(30);
		$this->fpdf->MultiCell(0,5, utf8_decode('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras quis odio a orci eleifend auctor. In tincidunt quam lorem, eleifend varius enim semper ut. Nam at metus accumsan ex maximus scelerisque. Ut suscipit velit non ligula consequat elementum. In eget condimentum libero, vitae mattis sapien. Donec malesuada elit sit amet nulla pretium luctus. Duis facilisis pretium enim, ac tristique turpis congue a. Etiam blandit finibus enim, eu ornare est mollis non. Pellentesque accumsan tellus volutpat, gravida elit sed, fermentum lacus. Proin pellentesque nec tortor a dapibus. Cras interdum sem luctus ex pretium venenatis. Donec euismod aliquam mi. Aenean gravida ac diam facilisis lacinia. Proin egestas, tortor nec posuere dignissim, nisl metus blandit dui, eget pulvinar nisi mauris quis lacus. Donec finibus libero in tellus gravida mattis. Etiam non tellus nunc.'),0,'J',false);
		$this->fpdf->Ln(10);
		$this->fpdf->SetFont('Arial','B',10);
		$this->fpdf->SetX(30);
		$this->fpdf->Cell(0,10,utf8_decode('3.2.- Conectividad'),0,1,'L');
		$this->fpdf->SetFont('Arial','',10);
		$this->fpdf->SetX(30);
		$this->fpdf->MultiCell(0,5, utf8_decode('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras quis odio a orci eleifend auctor. In tincidunt quam lorem, eleifend varius enim semper ut. Nam at metus accumsan ex maximus scelerisque. Ut suscipit velit non ligula consequat elementum. In eget condimentum libero, vitae mattis sapien. Donec malesuada elit sit amet nulla pretium luctus. Duis facilisis pretium enim, ac tristique turpis congue a. Etiam blandit finibus enim, eu ornare est mollis non. Pellentesque accumsan tellus volutpat, gravida elit sed, fermentum lacus. Proin pellentesque nec tortor a dapibus. Cras interdum sem luctus ex pretium venenatis. Donec euismod aliquam mi. Aenean gravida ac diam facilisis lacinia. Proin egestas, tortor nec posuere dignissim, nisl metus blandit dui, eget pulvinar nisi mauris quis lacus. Donec finibus libero in tellus gravida mattis. Etiam non tellus nunc.'),0,'J',false);

		$this->fpdf->Ln(10);
		$this->fpdf->SetFont('Arial','B',10);
		$this->fpdf->SetX(30);
		$this->fpdf->Cell(0,10,utf8_decode('3.3.- Protocolo'),0,1,'L');
		$this->fpdf->SetFont('Arial','',10);
				$this->fpdf->SetX(30);

		$this->fpdf->MultiCell(0,5, utf8_decode('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras quis odio a orci eleifend auctor. In tincidunt quam lorem, eleifend varius enim semper ut. Nam at metus accumsan ex maximus scelerisque. Ut suscipit velit non ligula consequat elementum. In eget condimentum libero, vitae mattis sapien. Donec malesuada elit sit amet nulla pretium luctus. Duis facilisis pretium enim, ac tristique turpis congue a. Etiam blandit finibus enim, eu ornare est mollis non. Pellentesque accumsan tellus volutpat, gravida elit sed, fermentum lacus. Proin pellentesque nec tortor a dapibus. Cras interdum sem luctus ex pretium venenatis. Donec euismod aliquam mi. Aenean gravida ac diam facilisis lacinia. Proin egestas, tortor nec posuere dignissim, nisl metus blandit dui, eget pulvinar nisi mauris quis lacus. Donec finibus libero in tellus gravida mattis. Etiam non tellus nunc.'),0,'J',false);

		$this->fpdf->Ln(10);
		$this->fpdf->SetFont('Arial','B',10);
		$this->fpdf->SetX(30);
		$this->fpdf->Cell(0,10,utf8_decode('3.4.-	Parámetros de configuración:'),0,1,'L');
		$this->fpdf->SetFont('Arial','',10);
		$this->fpdf->SetX(30);
		$this->fpdf->MultiCell(0,5, utf8_decode('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras quis odio a orci eleifend auctor. In tincidunt quam lorem, eleifend varius enim semper ut. Nam at metus accumsan ex maximus scelerisque. Ut suscipit velit non ligula consequat elementum. In eget condimentum libero, vitae mattis sapien. Donec malesuada elit sit amet nulla pretium luctus. Duis facilisis pretium enim, ac tristique turpis congue a. Etiam blandit finibus enim, eu ornare est mollis non. Pellentesque accumsan tellus volutpat, gravida elit sed, fermentum lacus. Proin pellentesque nec tortor a dapibus. Cras interdum sem luctus ex pretium venenatis. Donec euismod aliquam mi. Aenean gravida ac diam facilisis lacinia. Proin egestas, tortor nec posuere dignissim, nisl metus blandit dui, eget pulvinar nisi mauris quis lacus. Donec finibus libero in tellus gravida mattis. Etiam non tellus nunc.'),0,'J',false);

		$this->fpdf->Ln(10);
		$this->fpdf->SetFont('Arial','B',10);
		$this->fpdf->SetX(30);
		$this->fpdf->Cell(0,10,utf8_decode('3.5.-	Manejo de Errores.:'),0,1,'L');
		$this->fpdf->SetFont('Arial','',10);
		$this->fpdf->SetX(30);
		$this->fpdf->MultiCell(0,5, utf8_decode('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras quis odio a orci eleifend auctor. In tincidunt quam lorem, eleifend varius enim semper ut. Nam at metus accumsan ex maximus scelerisque. Ut suscipit velit non ligula consequat elementum. In eget condimentum libero, vitae mattis sapien. Donec malesuada elit sit amet nulla pretium luctus. Duis facilisis pretium enim, ac tristique turpis congue a. Etiam blandit finibus enim, eu ornare est mollis non. Pellentesque accumsan tellus volutpat, gravida elit sed, fermentum lacus. Proin pellentesque nec tortor a dapibus. Cras interdum sem luctus ex pretium venenatis. Donec euismod aliquam mi. Aenean gravida ac diam facilisis lacinia. Proin egestas, tortor nec posuere dignissim, nisl metus blandit dui, eget pulvinar nisi mauris quis lacus. Donec finibus libero in tellus gravida mattis. Etiam non tellus nunc.'),0,'J',false);



		echo $this->fpdf->Output();// Name of PDF file
		//Can change the type from D=Download the file		
	}
}
