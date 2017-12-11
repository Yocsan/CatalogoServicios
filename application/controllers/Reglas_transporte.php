<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Reglas_transporte extends CI_Controller {
     
    function __construct() {
        parent::__construct();
      //  $this->load->model('Frecuencias_model');        
        $this->load->helper("datatables_helper");
       
        
    }
    //funcion que carga la vista para crear
    public function create() {
    	 
    
    	$resultado = $this->load->view('reglas_transporte/create_update',array(),TRUE);
    
    	$response = array('mensaje' => $resultado );
    	$this->output
    	->set_status_header(200)
    	->set_content_type('application/json', 'utf-8')
    	->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
    	->_display();
    	exit;
    
    }
    
    //funcion que carga la vista para consultar
    public function search() {
    	 
    	$resultado =  $this->load->view('reglas_transporte/search',array(),TRUE);
    
    	$response = array('mensaje' => $resultado);
    	$this->output
    	->set_status_header(200)
    	->set_content_type('application/json', 'utf-8')
    	->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
    	->_display();
    	exit;
    
    }
}