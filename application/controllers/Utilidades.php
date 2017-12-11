<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Utilidades extends CI_Controller {
    function __construct() {
<<<<<<< HEAD
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
=======
        parent::__construct();      
          
    }
    function index() { 
        
        $resultado = '<div class="alert alert-danger" role="alert">En Construccion</div>';
        
        $response = array('mensaje' => $resultado);
        
        $this->output
             ->set_status_header(200)
             ->set_content_type('application/json', 'utf-8')
             ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
             ->_display();
        exit;
      
    }
}
>>>>>>> 451a59e8a732f4a9fde7eb7a8345a9a34acdc000
