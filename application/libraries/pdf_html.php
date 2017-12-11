<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH.'third_party/fpdf/fpdf.php';

	class PDF_HTML extends FPDF
<<<<<<< HEAD

=======
<<<<<<< HEAD

=======
>>>>>>> 451a59e8a732f4a9fde7eb7a8345a9a34acdc000
>>>>>>> 85c9cc7b6a4352213737f6f054b2decc934642d3
	{

		var $widths;
		var $aligns;

		function __construct() {
			$this->ci =& get_instance();
			parent::FPDF();
		}

	    function Header()
   {

      $this->SetFont('Arial','B',10);

      $this->Cell(0,10,utf8_decode('Especificación de servicios de integración PIC Proyecto                   Fecha: '.date('t/n/Y')),1,0,'C');
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
<<<<<<< HEAD
	    $this->Cell(0,10,utf8_decode('Gerencia de Tecnología y Soluciones                 pagina '.$this->PageNo().'/{nb}'),1,1,'C');
=======
<<<<<<< HEAD
	    $this->Cell(0,10,utf8_decode('Gerencia de Tecnología y Soluciones                 pagina '.$this->PageNo().'/{nb}'),1,1,'C');
=======
	    $this->Cell(0,10,utf8_decode('Gerencia de Tecnología y Operaciones               pagina '.$this->PageNo().'/{nb}'),1,1,'C');
>>>>>>> 451a59e8a732f4a9fde7eb7a8345a9a34acdc000
>>>>>>> 85c9cc7b6a4352213737f6f054b2decc934642d3
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

	        for ($i=0; $i < count($cabecera) ; $i++) {

	            $this->Cell($str[$i],7, utf8_decode($cabecera[$i]),1, 0 , 'L',true );
	        }

	    }

	    function datosHorizontal($datos, $x, $y,$str, $cabecera)
	    {
<<<<<<< HEAD
					$this->SetXY($x, $y); // 77 = 70 posici�nY_anterior + 7 altura de las de cabecera
					$this->SetFont('Arial','',10); //Fuente, normal, tama�o
=======
<<<<<<< HEAD
					$this->SetXY($x, $y); // 77 = 70 posici�nY_anterior + 7 altura de las de cabecera
					$this->SetFont('Arial','',10); //Fuente, normal, tama�o
=======
            $this->SetXY($x, $y); // 77 = 70 posici�nY_anterior + 7 altura de las de cabecera
            $this->SetFont('Arial','',10); //Fuente, normal, tama�o
>>>>>>> 451a59e8a732f4a9fde7eb7a8345a9a34acdc000
>>>>>>> 85c9cc7b6a4352213737f6f054b2decc934642d3
	        $this->SetFillColor(229, 229, 229); //Gris tenue de cada fila
	        $this->SetTextColor(3, 3, 3); //Color del texto: Negro

	        for ($i=0; $i < count($cabecera) ; $i++) {
	            $this->Cell($str[$i],7, utf8_decode($datos[$i]),1, 0 , 'L',false );
	        }
	    }


	//--------------------------------Tabla adaptable--------------------------------------

	function SetWidths($w)
	{
	    //Set the array of column widths
	    $this->widths=$w;
	}

	function SetAligns($a)
	{
	    //Set the array of column alignments
	    $this->aligns=$a;
	}

	function Row($data)
	{
	    //Calculate the height of the row
	    $nb=0;
	    for($i=0;$i<count($data);$i++)
	        $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
	    $h=5*$nb;
	    //Issue a page break first if needed
	    $this->CheckPageBreak($h);
<<<<<<< HEAD
	    //Draw the cells of the row
	    for($i=0;$i<count($data);$i++)
	    {
=======
<<<<<<< HEAD
	    //Draw the cells of the row
	    for($i=0;$i<count($data);$i++)
	    {
=======
		$this->SetX(30);
		
		//Draw the cells of the row

	    for($i=0;$i<count($data);$i++)
	    {

>>>>>>> 451a59e8a732f4a9fde7eb7a8345a9a34acdc000
>>>>>>> 85c9cc7b6a4352213737f6f054b2decc934642d3
	        $w=$this->widths[$i];
	        $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
	        //Save the current position
	        $x=$this->GetX();
	        $y=$this->GetY();
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 85c9cc7b6a4352213737f6f054b2decc934642d3
	        //Draw the border
	        $this->Rect($x,$y,$w,$h);
	        //Print the text
	        $this->MultiCell($w,5,$data[$i],0,$a);
<<<<<<< HEAD
=======
=======
	        //Draw the borders
	        $this->Rect($x,$y,$w,$h);

			//Print the text
			
	        $this->MultiCell($w,5,utf8_decode($data[$i]),0,$a);
>>>>>>> 451a59e8a732f4a9fde7eb7a8345a9a34acdc000
>>>>>>> 85c9cc7b6a4352213737f6f054b2decc934642d3
	        //Put the position to the right of the cell
	        $this->SetXY($x+$w,$y);
	    }
	    //Go to the next line
	    $this->Ln($h);
	}


	function CheckPageBreak($h)
	{
	    //If the height h would cause an overflow, add a new page immediately
	    if($this->GetY()+$h>$this->PageBreakTrigger)
	        $this->AddPage($this->CurOrientation);
	}

	function NbLines($w,$txt)
	{
	    //Computes the number of lines a MultiCell of width w will take
	    $cw=&$this->CurrentFont['cw'];
	    if($w==0)
	        $w=$this->w-$this->rMargin-$this->x;
	    $wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
	    $s=str_replace("\r",'',$txt);
	    $nb=strlen($s);
	    if($nb>0 and $s[$nb-1]=="\n")
	        $nb--;
	    $sep=-1;
	    $i=0;
	    $j=0;
	    $l=0;
	    $nl=1;
	    while($i<$nb)
	    {
	        $c=$s[$i];
	        if($c=="\n")
	        {
	            $i++;
	            $sep=-1;
	            $j=$i;
	            $l=0;
	            $nl++;
	            continue;
	        }
	        if($c==' ')
	            $sep=$i;
	        $l+=$cw[$c];
	        if($l>$wmax)
	        {
	            if($sep==-1)
	            {
	                if($i==$j)
	                    $i++;
	            }
	            else
	                $i=$sep+1;
	            $sep=-1;
	            $j=$i;
	            $l=0;
	            $nl++;
	        }
	        else
	            $i++;
	    }
	    return $nl;
	}

}//end class PDF_HTML
