<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * @autor Ing. Angélica Espinosa  <angelica1387@gmail.com>
 * @fecha_creacion 02/10/2015
 */


if (!defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios extends CI_Controller {
     
    function __construct() {
        parent::__construct();
        $this->load->model(array('User_model','Rol_model'));        
        $this->load->helper("datatables_helper");
        
    }
    
    public function create() {
    	
    	$datos['roles'] = $this->Rol_model->get_roles();
        $resultado = $this->load->view('usuarios/create_update',$datos,TRUE);
    
        $response = array('mensaje' => $resultado );
        $this->output
            ->set_status_header(200)
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
            ->_display();
        exit;
        
    }
    
    public function search() {
    	
        $resultado =  $this->load->view('usuarios/search',array(),TRUE);
        
        $response = array('mensaje' => $resultado);
        $this->output
            ->set_status_header(200)
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
            ->_display();
        exit; 
        
    }
    

    public function datatable() {
    	
    	$this->datatables->select  ('id_usuario, nombre, apellido, cedula, telefono, roles.nombre_rol')
    	->unset_column('id_usuario')
    	->add_column('Acciones', get_buttons('$1','usuarios'),'id_usuario')
    	->from('usuarios')
    	->join('roles','usuarios.roles_id_rol = roles.id_rol')
    	->where(array('status_usuario'=>'1'));
    
    	echo $this->datatables->generate();
    
    }
    

    public function consultarNombreUsuario() {
    
    	$identifier = $this->input->post('usuario');
    
    	$search = $this->User_model->avalaible($identifier) ;
    
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
    
    
    public function insert_usuario() {
    	$data = array(
                'nombre'=> $this->input->post('nombre'),
    			'apellido'=>$this->input->post('apellidos'),
    			'usuario'=> $this->input->post('login'),
        		'password'=> $this->input->post('password'),
        		'p00'=> $this->input->post('p00'),
    			'telefono'=>$this->input->post('numero_contacto'),
    			'cedula'=> $this->input->post('cedula'),
    			'roles_id_rol'=>$this->input->post('tipo_rol'),
    			'status_usuario'=> 1
    	);
    
    	$msg =  $this->User_model->insert_usuario($data);
    
    	$response = array('mensaje' => $msg);
    	$this->output
    	->set_status_header(200)
    	->set_content_type('application/json', 'utf-8')
    	->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
    	->_display();
    	exit;
    
    }
    
    
    public function update_usuario() {
        $data = array(
                'nombre'=> $this->input->post('nombre'),
    			'apellido'=>$this->input->post('apellidos'),
    			'usuario'=> $this->input->post('login'),
        		'password'=> $this->input->post('password'),
        		'p00'=> $this->input->post('p00'),
    			'telefono'=>$this->input->post('numero_contacto'),
    			'cedula'=> $this->input->post('cedula'),
    			'roles_id_rol'=>$this->input->post('tipo_rol')
		);

	    $datos['mensaje'] =  $this->User_model->update_usuario($data);
	    $response = array('view' => $this->load->view('usuarios/search',$datos,TRUE));
	    
	    $this->output
	    ->set_status_header(200)
	    ->set_content_type('application/json', 'utf-8')
	    ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
	    ->_display();
	    exit;
    
    }
    
    //trae informacion de la base de datos para poder editarla
    public function carga_usuario_edit(){
    	 
    	$id_user = $this->input->post('identificador');
    	$datos['datos'] = $this->User_model->get_usuarios_edit($id_user);
    	$datos['roles'] = $this->Rol_model->get_roles();
    	$resultado = $this->load->view('usuarios/create_update',$datos,TRUE);
    	$response = array('mensaje' => $resultado);
    
    	$this->output
	    	->set_status_header(200)
	    	->set_content_type('application/json', 'utf-8')
	    	->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
	    	->_display();
    	exit;
    	 
    }

    public function delete_usuario(){
    
    	$user_id = $this->input->post('identificador');
        $datos['mensaje_delete']= $this->User_model->delete_usuario($user_id);
        $response = array('view' => $this->load->view('usuarios/search',$datos,TRUE)); 
        
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
 
