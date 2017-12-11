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
     public function index() {    
        
	 	
    }
    
    public function search() 
    {
       $resultado =  $this->load->view('errores/search',array(),TRUE);
        
        $response = array('mensaje' => $resultado,
                          );
        $this->output
            ->set_status_header(200)
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
            ->_display();
       exit;
    }
    
    public function datatable()
    {
        $this->datatables->select('id_errores,codigo_error,descripcion_error')
            ->unset_column('id_errores')
            ->add_column('Acciones', get_buttons('$1','errores'),'id_errores')
            ->from('tb_errores')
        	->where(array('status_error'=>'1'));
        echo $this->datatables->generate();
        
    }
    
    public function create() {
        $last_id_error = (int)$this->Errores_model->consulta_error();
       
        $data['next_id_error'] = $last_id_error + 1;
        
        $resultado = $this->load->view('errores/create_update',$data,TRUE);
    
        $response = array('mensaje' => $resultado,
                          );
        $this->output
            ->set_status_header(200)
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
            ->_display();
       exit;
    }
    
    public function insert_error() 
    {          
        $data = array(  
                    'codigo_error'=> $this->input->post('codigo_errores'),
                    'descripcion_error'=> $this->input->post('descripcion_errores'));  
        
        $msg =  $this->Errores_model->insert_errores($data);
        
        $last_id_error = (int)$this->Errores_model->consulta_error();
       
        $last_id = $last_id_error + 1;
              
        $response = array('mensaje' => $msg,
                          'last_id'=> $last_id,
                          );
        $this->output
            ->set_status_header(200)
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
            ->_display();
        exit;  
    }
    
    public function translate()
        {
            echo $this->datatables->translate();
        }
        
    function edit($id)
    {
    	$data['value'] = 2;
        
        $resultado = $this->load->view('errores/create_update',$data,TRUE);
    
        $response = array('mensaje' => $resultado,
                          );
        $this->output
            ->set_status_header(200)
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
            ->_display();
       exit;
    }
    
    public function update_errores()
    {             //
    $data = array(
    		'codigo_error'=> $this->input->post('codigo_errores'),
    		'descripcion_error'=> $this->input->post('descripcion_errores'),
    );
    
    
    $datos['mensaje'] =  $this->Errores_model->update_errores($data);
    $response = array('view' => $this->load->view('errores/search',$datos,TRUE),
    );
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
    	// 		var_dump($datos);
    	// 		exit();
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
    
    public function carga_errores_delete(){
    
    	$id_errores = $this->input->post('codigo');

    	$datos['mensaje']= $this->Errores_model->get_errores_delete($id_errores);
    
    	$response = array('view' => $this->load->view('errores/search',$datos,TRUE));
    	 
    	$this->output
    	->set_status_header(200)
    	->set_content_type('application/json', 'utf-8')
    	->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
    	->_display();
    	exit;
    
    }
    
    function delete($id)
    {
        //add some delete code
        redirect('subscriber');
    }
    
}