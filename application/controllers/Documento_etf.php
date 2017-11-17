<?php 
/**
 * Description of Consultas
 *  Funciones para la creaciÃ³n, actualizaciÃ³n de los servicios del Catalogo
 *
 * @author TSU Yocsan Burgos  <yocsan19@gmail.com>
 * @fecha_crecion 26/10/2017
 */
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Documento_etf extends CI_Controller {
    function __construct() {
        parent::__construct();
        
         $this->load->library('fpdf');
         $this->load->helper("datatables_helper");
         
    }    
    public function create() {
 
      $resultado = $this->load->view('documento_etf/create_update',array(),TRUE);
    
      $response = array('mensaje' => $resultado);
    
      $this->output
        ->set_status_header(200)
        ->set_content_type('application/json', 'utf-8')
        ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
        ->_display();
      exit;
    }
    
    public function generar_documento() {
    $pdf = new FPDF('P','mm','A4');
    $pdf->AddPage();
      $pdf->SetFont('Arial','B',16);
      $pdf->Cell(40,10,'¡Mi primera página pdf con FPDF!');
      return $pdf->Output();
      
      
  /*
    header("Content-type: application/vnd.ms-word");
    header("Content-Disposition: attachment;Filename=documento.doc");
    
    echo "<html>";
    echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Windows-1252\">";
    echo "<body>";
    echo "<b>Mi primer documento</b><br />";
    echo "Aqu&iacute; va todo el testo que querais, en formato HTML</body>";
    echo "</html>";
  */
            
    }
    
}