<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


require_once APPPATH.'third_party/fpdf/fpdf.php';

	class PDF_HTML extends FPDF
	
	{
		
		function __construct() {
			$this->ci =& get_instance();
			parent::FPDF();
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
    $image=$this->Image('http://www.cantv.com.ve/Portales/Cantv/Plantilla2007/logoCantv_portal.jpg',180,274,-1400);
    $this->Cell(0,10,utf8_decode('Gerencia de Tecnología y Soluciones                 pagina '.$this->PageNo().'/{nb}'),1,1,'C');
    // Print current and total page numbers
    
}
function cabeceraVertical($cabecera, $x, $y,$celly)
    {
        $this->SetXY($x, $y);
        $this->SetFont('Arial','B',10);
        $this->SetFillColor(0,0,255);//Fondo verde de celda
        $this->SetTextColor(240, 255, 240); //Letra color blanco
        foreach($cabecera as $columna)
        {
            //Parámetro con valor 2, hace que la cabecera sea vertical
            $this->Cell($celly,7, utf8_decode($columna),1, 2 , 'L' ,true);
        }
    }
 
    function datosVerticales($datos, $x, $y,$celly)
    {
        $this->SetXY($x, $y); //40 = 10 posiciónX_anterior + 30ancho Celdas de cabecera
        $this->SetFont('Arial','',10); //Fuente, Normal, tamaño
        $this->SetFillColor(229, 229, 229); //Gris tenue de cada fila
        $this->SetTextColor(3, 3, 3); //Color del texto: Negro
        
        foreach($datos as $columna)
        {
            $this->Cell($celly,7, utf8_decode($columna),1, 2 , 'L' );
        }
    }
 
    function cabeceraHorizontal($cabecera, $x, $y,$celly)
    {
        $this->SetXY($x, $y);
        $this->SetFont('Arial','B',10);
        $this->SetFillColor(0,0,255);//Fondo verde de celda
        $this->SetTextColor(240, 255, 240); //Letra color blanco
        foreach($cabecera as $fila)
        {
            //Atención!! el parámetro valor 0, hace que sea horizontal
            $this->Cell($celly,7, utf8_decode($fila),1, 0 , 'L',true );
        }
    }
    
    
 
    function datosHorizontal($datos, $x, $y,$celly)
    {
        $this->SetFillColor(229, 229, 229); //Gris tenue de cada fila
        $this->SetTextColor(3, 3, 3); //Color del texto: Negro
        
          $this->SetXY($x, $y); // 77 = 70 posiciónY_anterior + 7 altura de las de cabecera
        $this->SetFont('Arial','',10); //Fuente, normal, tamaño

        foreach($datos as $fila)
        {
            //Atención!! el parámetro valor 0, hace que sea horizontal
            $this->Cell($celly,7, utf8_decode($fila),1, 0 , 'L',false );
        }
    }
  

}//end class PDF_HTML
