<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
 

/**
 * Description of verticales
 * AdministraciÃ³n de las sistemas y aplicaciones existentes en PIC
 
 * @author Tsu Angel Jaramillo  <angeljaramillo34@gmail.com>
 * @fecha_creacion 07/10/2016
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sistemas_aplicaciones extends CI_Controller {

	function __construct() {
		parent::__construct();

		$this->load->model('Sistemas_aplicaciones_model');
		$this->load->helper("datatables_helper");

	}
	
	public function index()
	{
		 
	}
	
	public function search() {
		 
		$resultado =  $this->load->view('sistemas_aplicaciones/search',array(),TRUE);
	
		$response = array('mensaje' => $resultado
		);
		
		$this->output
			->set_status_header(200)
			->set_content_type('application/json', 'utf-8')
			->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
			->_display();
		exit;
	}
	

	public function datatable_sistema() {

		$this->datatables->select('id_sistema, nombre_sistema , descripcion')
		->unset_column('id_sistema')
		->add_column('Acciones', get_buttons('$1','sistemas'),'id_sistema')
		->from('sistemas')
		->where('status_sistema', '1');
		
		echo $this->datatables->generate();

	}
		
	
	public function create() {
		$resultado = $this->load->view('sistemas_aplicaciones/create_update',array(),TRUE);
		$response = array('mensaje' => $resultado
		);
		$this->output
			->set_status_header(200)
			->set_content_type('application/json', 'utf-8')
			->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
			->_display();
		exit;
	}
	
	public function consultarSistema() {
	
		$nombre_sistema =  $this->input->post('nombre_sistema');
	
		$search = $this->Sistemas_aplicaciones_model->avalaible($nombre_sistema) ;
	
		if($search) {
			$resultado= '<span id="mensaje" class="success">Disponible</span>';
			$codigo = FALSE;
		} else {
			$resultado= '<span id="mensaje" class="error">No Disponible</span>';
			$codigo = TRUE;
		}
	
		$response = array('mensaje' => $resultado,
						'cod'=> $codigo
		);
		
		$this->output
			->set_status_header(200)
			->set_content_type('application/json', 'utf-8')
			->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
			->_display();
		exit;
	}
	 	
	public function insert_sistema() {
		
		$data = array(
				'nombre_sistema' => $this->input->post('nombre_sistema'),
				'descripcion' => $this->input->post('descripcion_sistema'),
				'status_sistema' => 1
			
		);
				
    	$msg =  $this->Sistemas_aplicaciones_model->insert_sistema($data);
    
    	$response = array('mensaje' => $msg);
	
		$this->output
			->set_status_header(200)
			->set_content_type('application/json', 'utf-8')
			->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
			->_display();
		exit;
		
	}
	         
         
        public function update_sistema(){
        	
        	$data = array(
        			'id_sistema' => $this->input->post('id_sistema'),
        			'nombre_sistema'=> $this->input->post('nombre_sistema'), 			
        			'descripcion'=> $this->input->post('descripcion_sistema'),
        			'status_sistema'=>	1,
        	);

	        $datos['mensaje'] = $this->Sistemas_aplicaciones_model->update_sistema($data);
	        
	        $response = array('view' => $this->load->view('sistemas_aplicaciones/search',$datos,TRUE));
	    
	        $this->output
		        ->set_status_header(200)
		        ->set_content_type('application/json', 'utf-8')
		        ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
		        ->_display();
	        exit;
    
        } 
         
        public function delete_sistema(){
    
            $id_sistemas = $this->input->post('identificador');

            $datos['mensaje_delete']= $this->Sistemas_aplicaciones_model->delete_sistema($id_sistemas);

            $response = array('view' => $this->load->view('sistemas_aplicaciones/search',$datos,TRUE)); 
            
            $this->output
                ->set_status_header(200)
                ->set_content_type('application/json', 'utf-8')
                ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
                ->_display();
            exit;
        }
                
        //funcion para cargar la informacion, cuando se edita 
		public function carga_sistema_edit(){
    	
            $id_sistema = $this->input->post('identificador');
    	    //'datos' es lo que la vista necesita para poder administrar la información dentro del arreglo.
            $datos['datos'] = $this->Sistemas_aplicaciones_model->carga_sistema_edit($id_sistema);

       		$resultado = $this->load->view('sistemas_aplicaciones/create_update', $datos, TRUE);

            $response = array('mensaje' => $resultado);
            
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
    
         
         
}