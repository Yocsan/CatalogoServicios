<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Utilidades extends CI_Controller {
    function __construct() {
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