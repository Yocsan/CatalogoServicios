<?php
/*@author Jose Borges <josedavidborgesrangel@gmail.com>
 * @fecha_crecion 09/11/2016
*/

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tipos_datos extends CI_Controller {

    function __construct() {
        parent::__construct();
        /*
        $this->load->model('Dominios_transformaciones_model');        
        $this->load->helper("datatables_helper");
       */ 
    } 
    
    public function index(){
    	 
    	$this->utilities->principal();
    }
    
  
    public function create()
    {

        $resultado = '<div class="alert alert-danger" role="alert">En Construccion</div>';
        
        $response = array('mensaje' => $resultado);
            	   
        $response = array('mensaje' => $resultado);
        
        $this->output
             ->set_status_header(200)
             ->set_content_type('application/json', 'utf-8')
             ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
             ->_display();
        exit;
        
    }
    public function search() 
    {
    	
       $resultado =  '<div class="alert alert-danger" role="alert">En Construccion</div>';
        $response = array('mensaje' => $resultado,
        				
                     );
        $this->output
            ->set_status_header(200)
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
            ->_display();
               
       exit;
    }
    
    
    
   
    
    
    
    
    
        
 
}