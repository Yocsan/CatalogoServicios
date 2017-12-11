<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Utilidades extends CI_Controller {
    function __construct() {
        parent::__construct();  
        $this->load->library('Utilities');//cargo libreria utilities
        
          
    }

    public function index() {
    
    	$this->utilities->principal();//llamo funcion principal que se encuentra en la libreria utilities
    }
    
    public function create() {//funcion para mostrar la vista agregar
    
    	$resultado = $this->load->view('utilidades/create_update',array(),TRUE);
    
    	$response = array('mensaje' => $resultado);// enviar la vista
    	
    	$this->output
	    	->set_status_header(200)
	    	->set_content_type('application/json', 'utf-8')
	    	->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
	    	->_display();
    	exit;
    }
}
