<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/**
 * Description of errores
 * AdministraciÃ³n de las errores existentes en PIC
 
 * @author Ing. AngÃ©lica Espinosa  <angelica1387@gmail.com>
 * @fecha_crecion 19/10/2015
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Errores extends CI_Controller {

    function __construct() {
        parent::__construct();
        
        $this->load->model('Errores_model');
        $this->load->helper("datatables_helper");
    }
    

    public function create() {
    	 
    	$resultado = $this->load->view('errores/create_update',array(),TRUE);
    
    	$response = array('mensaje' => $resultado);
    
    	$this->output
    	->set_status_header(200)
    	->set_content_type('application/json', 'utf-8')
    	->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
    	->_display();
    	exit;
    }
    
    public function search() {
    	
       $resultado =  $this->load->view('errores/search',array(),TRUE);
        
        $response = array('mensaje' => $resultado);
        $this->output
            ->set_status_header(200)
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
            ->_display();
       exit;
    }
        
    public function datatable() {
        $this->datatables->select('Codigo_error, Mensaje_error, Transporte')
            ->add_column('Acciones', get_buttons('$1','errores'),'Codigo_error')
            ->from('errores')
        	->where(array('Status_error'=>'1'));
        echo $this->datatables->generate();
        
    }    

    public function consultarCodigoError() {
    
    	$identifier = $this->input->post('codigo');
    
    	$search = $this->Errores_model->avalaible($identifier) ;
    
    	if($search){
    		$resultado = '<span class="success">Disponible</span>';
    		$codigo = FALSE;
    	}else{
    		$resultado = '<span class="error">No Disponible</span>';
    		$codigo = TRUE;
    	}
    
    	$response = array('mensaje' => $resultado,'cod'=> $codigo);
    	$this->output
    	->set_status_header(200)
    	->set_content_type('application/json', 'utf-8')
    	->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
    	->_display();
    	exit;
    }
    
    public function insert_error() {          
        $data = array(  
                    'Codigo_error'=> $this->input->post('codigo_error'),
                    'Mensaje_error'=> $this->input->post('descripcion_error'),
        			'Transporte' => $this->input->post('transporte'),
        			'Status_error' => 1
        );  
        
        $msg =  $this->Errores_model->insert_error($data);       
        $response = array('mensaje' => $msg );
        
        $this->output
            ->set_status_header(200)
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
            ->_display();
        exit;  
    }

    public function update_error() {           
    	$data = array(  
                    'Codigo_error'=> $this->input->post('codigo_error'),
                    'Mensaje_error'=> $this->input->post('descripcion_error'),
        			'Transporte' => $this->input->post('transporte'),
        			'Status_error' => 1
        ); 
    
	    $datos['mensaje'] =  $this->Errores_model->update_error($data);
	    $response = array('view' => $this->load->view('errores/search',$datos,TRUE));
	    
	    $this->output
	    ->set_status_header(200)
	    ->set_content_type('application/json', 'utf-8')
	    ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
	    ->_display();
	    exit;
    }
    
    public function carga_errores_edit(){
    	
    	$id_errores = $this->input->post('codigo');
    	//'datos' es lo que la vista necesita para poder administrar la información dentro del arreglo.
    	$datos['datos'] = $this->Errores_model->get_errores_edit($id_errores);

    	$resultado = $this->load->view('errores/create_update',$datos,TRUE);
    		
    	$response = array('mensaje' => $resultado,
    	);
    
    	$this->output
    	->set_status_header(200)
    	->set_content_type('application/json', 'utf-8')
    	->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
    	->_display();
    	exit; 
    }
    
    public function delete_error(){
    
    	$id_errores = $this->input->post('codigo');

    	$datos['mensaje_delete']= $this->Errores_model->delete_error($id_errores);
    
    	$response = array('view' => $this->load->view('errores/search',$datos,TRUE));
    	 
    	$this->output
    	->set_status_header(200)
    	->set_content_type('application/json', 'utf-8')
    	->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
    	->_display();
    	exit;
    
    }
    
    public function translate() {
    	echo $this->datatables->translate();
    }
}