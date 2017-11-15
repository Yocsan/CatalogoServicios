<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/**
 * Description of verticales
 * AdministraciÃ³n de las verticales existentes en PIC
 
 * @author Ing. AngÃ©lica Espinosa  <angelica1387@gmail.com>
 * @fecha_crecion 19/10/2015
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Verticales extends CI_Controller {

    function __construct() {
        parent::__construct();
        
        $this->load->model('Vertical_model');        
        $this->load->helper("datatables_helper");
        
    }
    

    public function create() {
 
    	$resultado = $this->load->view('verticales/create_update',array(),TRUE);
    
    	$response = array('mensaje' => $resultado);
    	$this->output
    	->set_status_header(200)
    	->set_content_type('application/json', 'utf-8')
    	->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
    	->_display();
    	exit;
    }
    
    public function search() {
    	
       $resultado =  $this->load->view('verticales/search',array(),TRUE);
        
        $response = array('mensaje' => $resultado);
        $this->output
            ->set_status_header(200)
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
            ->_display();
       exit;
    }
    
    public function datatable() {
       
        $this->datatables->select(' identificador_vertical, nombre_vertical')
        	//->unset_column('Id_vertical')
            ->add_column('Acciones', get_buttons('$1','verticales'),'identificador_vertical')
            ->from('verticales')
            ->where(array('status_vertical'=>'1'));
        
        echo $this->datatables->generate();
        
    }
    
    public function consultarIdVertical() {
        
        $identifier = $this->input->post('identificador');
        
        $search = $this->Vertical_model->avalaible($identifier) ;  
        
        if($search){
            $resultado= '<span class="success">Disponible</span>';
            $codigo = FALSE;
        }else{
            $resultado= '<span class="error">No Disponible</span>';
             $codigo = TRUE;
        } 
        
        $response = array('mensaje' => $resultado,
                          'cod'=> $codigo);
        $this->output
            ->set_status_header(200)
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
            ->_display();
       exit;
    }
    
    public function insert_vertical() {   
    	
        $data = array(
                    'identificador_vertical'=> $this->input->post('identificador_vertical'),
                    'nombre_vertical'=> $this->input->post('nombre_vertical'),	
        			'status_vertical'=> 1
        );  
        
        $msg =  $this->Vertical_model->insert_vertical($data);
              
        $response = array('mensaje' => $msg,
                          );
        $this->output
            ->set_status_header(200)
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
            ->_display();
        exit;  
    }
    
    public function update_vertical(){     
    	
	    $data = array(
                    'identificador_vertical'=> $this->input->post('identificador_vertical'),
                    'nombre_vertical'=> $this->input->post('nombre_vertical'),	
        			'status_vertical'=> 1
	    );
	    
	    $datos['mensaje'] =  $this->Vertical_model->update_vertical($data);
	    $response = array('view' => $this->load->view('verticales/search',$datos,TRUE));
	    
	    $this->output
	    ->set_status_header(200)
	    ->set_content_type('application/json', 'utf-8')
	    ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
	    ->_display();
	    exit;
    }
    
    public function carga_vertical_edit(){
    	
    	$id_vertical = $this->input->post('identificador');
    	//'datos' es lo que la vista necesita para poder administrar la información dentro del arreglo.
    	$datos['datos'] = $this->Vertical_model->get_verticales_edit($id_vertical);

    	$resultado = $this->load->view('verticales/create_update',$datos,TRUE);
    	   	
    	$response = array('mensaje' => $resultado);
		
    	$this->output
    	->set_status_header(200)
    	->set_content_type('application/json', 'utf-8')
    	->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
    	->_display();
    	exit;
    	
    }
    
    public function delete_vertical(){
    
    	$id_vertical = $this->input->post('identificador');
    	
        $datos['mensaje_delete']= $this->Vertical_model->delete_vertical($id_vertical);
      
        $response = array('view' => $this->load->view('verticales/search',$datos,TRUE)); 
        	
    	$this->output
            ->set_status_header(200)
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
            ->_display();
    	exit;
		
    }
    
    public function translate(){
            echo $this->datatables->translate();
        }
   
    
}
    