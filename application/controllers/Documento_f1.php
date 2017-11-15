<?php 

/**
 * Description of Consultas
 *  Funciones para la creaciÃ³n, actualizaciÃ³n de los servicios del Catalogo
 *
 * @author TSU Yocsan Burgos  <yocsan19@gmail.com>
 * @fecha_crecion 26/10/2017
 */

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Documento_f1 extends CI_Controller {
    function __construct() {
        parent::__construct();
        
        $this->load->library(array('PHPExcel'));
        
        $this->load->helper("datatables_helper");
         
    }    

    public function create() {
    	    
    	$resultado = $this->load->view('documento_f1/create_update',array(),TRUE);
    
    	$response = array('mensaje' => $resultado);
    
    	$this->output
	    	->set_status_header(200)
	    	->set_content_type('application/json', 'utf-8')
	    	->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
	    	->_display();
    	exit;
    }
    
    public function generar_documento() {

    	// Create new PHPExcel object
    	$objPHPExcel = $this->phpexcel;
    	// Set document properties
    	$objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
    	->setLastModifiedBy("Maarten Balliauw")
    	->setTitle("Office 2007 XLSX Test Document")
    	->setSubject("Office 2007 XLSX Test Document")
    	->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
    	->setKeywords("office 2007 openxml php")
    	->setCategory("Test result file");
    	// Add some data
    	$objPHPExcel->setActiveSheetIndex(0)
    	->setCellValue('A1', 'Hello')
    	->setCellValue('B2', 'world!')
    	->setCellValue('C1', 'Hello')
    	->setCellValue('D2', 'world!');
    	// Miscellaneous glyphs, UTF-8
    	$objPHPExcel->setActiveSheetIndex(0)
    	->setCellValue('A4', 'Miscellaneous glyphs')
    	->setCellValue('A5', 'éàèùâêîôûëïüÿäöüç');
    	// Rename worksheet
    	$objPHPExcel->getActiveSheet()->setTitle('Simple');
    	// Set active sheet index to the first sheet, so Excel opens this as the first sheet
    	$objPHPExcel->setActiveSheetIndex(0);
    	// Redirect output to a client’s web browser (OpenDocument)
    	header('Content-Type: application/vnd.oasis.opendocument.spreadsheet');
    	header('Content-Disposition: attachment;filename="01simple.ods"');
    	header('Cache-Control: max-age=0');
    	// If you're serving to IE 9, then the following may be needed
    	header('Cache-Control: max-age=1');
    	// If you're serving to IE over SSL, then the following may be needed
    	header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
    	header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
    	header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
    	header ('Pragma: public'); // HTTP/1.0
    	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'OpenDocument');
    	return $objWriter->save('php://output');
		
    	    	
    }
    
}