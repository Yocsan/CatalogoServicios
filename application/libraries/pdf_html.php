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

      $this->SetFont('Arial','B',10);

      $this->Cell(0,10,utf8_decode('Especificación de servicios de integración CI Proyecto                   Fecha: '.date('t/n/Y')),1,0,'C');
      $this->Ln(25);
    

   }

function Footer()
{
    // Go to 1.5 cm from bottom
    $this->SetY(-25);
    // Select Arial italic 8
    $this->SetFont('Arial','I',8);
    $image=$this->Image(base_url('assets/img/logo_etf.png'),180,274,-1400);
     //$imagen= $this->Image(base_url('assets/img/logo_etf.png'),10,8,33);
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
            //Par�metro con valor 2, hace que la cabecera sea vertical
            $this->Cell($celly,7, utf8_decode($columna),1, 2 , 'L' ,true);
        }
    }
 
    function datosVerticales($datos, $x, $y,$celly)
    {
        $this->SetXY($x, $y); //40 = 10 posici�nX_anterior + 30ancho Celdas de cabecera
        $this->SetFont('Arial','',10); //Fuente, Normal, tama�o
        $this->SetFillColor(229, 229, 229); //Gris tenue de cada fila
        $this->SetTextColor(3, 3, 3); //Color del texto: Negro
        
        foreach($datos as $columna)
        {
            $this->Cell($celly,7, utf8_decode($columna),1, 2 , 'L' );
        }
    }
    function contar($cabecera){

        for ($i=0; $i < count($cabecera) ; $i++) { 
            $str[$i]=strlen($cabecera[$i])+15;
         
        }
        return $str;
    }

    function cabeceraHorizontal($cabecera, $x, $y,$str)
    {
        $this->SetXY($x, $y);
        $this->SetFont('Arial','B',10);
        $this->SetFillColor(0,0,255);//Fondo verde de celda
        $this->SetTextColor(240, 255, 240); //Letra color blanco
        /*foreach($cabecera as $fila)
        {
            //Atenci�n!! el par�metro valor 0, hace que sea horizontal
            $str=strlen($fila)+15;
         // echo $str."-";
            $this->Cell($str,7, utf8_decode($fila),1, 0 , 'L',true );
        }*/
     
        for ($i=0; $i < count($cabecera) ; $i++) { 
          
            $this->Cell($str[$i],7, utf8_decode($cabecera[$i]),1, 0 , 'L',true );
        }


    }
    
    
 
    function datosHorizontal($datos, $x, $y,$str)
    {
        $this->SetFillColor(229, 229, 229); //Gris tenue de cada fila
        $this->SetTextColor(3, 3, 3); //Color del texto: Negro
        
          $this->SetXY($x, $y); // 77 = 70 posici�nY_anterior + 7 altura de las de cabecera
        $this->SetFont('Arial','',10); //Fuente, normal, tama�o

         for ($i=0; $i < count($datos) ; $i++) { 
        
            
            $this->Cell($str[$i],7, utf8_decode($datos[$i]),1, 0 , 'L',false );
        }
    }
  

}//end class PDF_HTML
