<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Frecuencias extends CI_Controller {
     
    function __construct() {
        parent::__construct();
       $this->load->model('Frecuencias_model');        
        $this->load->helper("datatables_helper");
       
        
    }
    //funcion que carga la vista para crear
    public function create() {
    	 
    
    	$resultado = $this->load->view('frecuencias/create_update',array(),TRUE);
    
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
    	 
    	$resultado =  $this->load->view('frecuencias/search',array(),TRUE);
    
    	$response = array('mensaje' => $resultado);
    	$this->output
    	->set_status_header(200)
    	->set_content_type('application/json', 'utf-8')
    	->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
    	->_display();
    	exit;
    
    }
    
    //funcion que carga el datable con los parametros que se le pasa
    public function datatable() {
    	 
    	$this->datatables->select  ('nombre_frecuencia,id_frecuencia')
    	->unset_column('id_frecuencia')
    	->add_column('Acciones', get_buttons('$1','frecuencias'),'id_frecuencia')
    	->from('frecuencias')
    	
    	->where(array('status_frecuencia'=>'1'));
    
    	echo $this->datatables->generate();
    
    }
    
    

    //Consulta si la nueva frecuencia ya existe
    public function consultarFrecuencia() {
    
    	$identifier = $this->input->post('frecuencia');
    
    	$search = $this->Frecuencias_model->avalaible($identifier) ;
    
    	if($search){
    		$resultado = '<span id="mensaje" class="success">Disponible</span>';
    		$codigo = FALSE;
    	}else{
    		$resultado = '<span id="mensaje" class="error">No Disponible</span>';
    		$codigo = TRUE;
    	}
    
    	$response = array('mensaje' => $resultado, 'cod' => $codigo);
    	$this->output
    	->set_status_header(200)
    	->set_content_type('application/json', 'utf-8')
    	->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
    	->_display();
    	exit;
    }
    
    //funcion que inserta frecuencia
    public function insert_frecuencia() {
    	$frecuencia = array ( 'nombre_frecuencia'=> $this->input->post('nombre_frecuencia'),
    			'status_frecuencia'=>1
    	);
    			
    
    	$msg =  $this->Frecuencias_model->insert_frecuencia($frecuencia);
    
    	$response = array('mensaje' => $msg);
    	$this->output
    	->set_status_header(200)
    	->set_content_type('application/json', 'utf-8')
    	->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
    	->_display();
    	exit;
    
    }
    
    
}