<?php 
	if (!defined('BASEPATH')) exit('No direct script access allowed');


class Login_normal extends CI_Controller {
    function __construct() {
        parent::__construct();      
        
        //$this->load->library(array('AuthLDAP','user_agent','parser','table'));
        $this->load->library(array('user_agent','parser','table'));
        $this->load->helper('date');
        $this->load->model(array('Rol_model','User_model','Menu_rol_model'));
        
      
    }

    public function index() {
        $this->session->keep_flashdata('tried_t');
        $this->login();
    }


    function login(){
    	$this->session->keep_flashdata('tried_to');
    	$rules = $this->form_validation;
    	$rules->set_rules('in_usuario', 'Usuario', 'required|alpha_dash');
    	$rules->set_rules('in_pass', 'Contrase&ntilde;a', 'required');
    	 
    	$usuario = $this->input->post('in_usuario');
    	$password = $this->input->post('in_pass');
    	 
    	$consulta = $this->User_model->login($usuario, $password);
    	$consulta2 = $this->User_model->usuario_login($usuario);
    	if($rules->run()) {
    		 
    		if($consulta == TRUE) {
    
    			$nombre = $consulta[0]->nombre.' '.$consulta[0]->apellido;
    			$id = $consulta[0]->id_usuario;
    			$get_role_arg = $consulta[0]->roles_id_rol;
            $rol = $consulta[0]->roles_id_rol;
    			$role_level = $this->Rol_model->get_rol($get_role_arg);
    
    
    			$customdata = array('logged_in' => TRUE,
    					'username' => $usuario,
    					'user_id' => $id,
    					'name' => $nombre,
    					'role_name' => $role_level[0]->nombre_rol,
    					'role_level' => $rol,
    					//'user_agent' => $this->agent->agent_string(),
    					'default_view'=> $role_level[0]->vista
    			);
    			$this->session->set_userdata($customdata);
    
    			$this->_load_login();
    
    
    		} elseif ( $consulta2 == TRUE ) {
    			$datos['mensaje'] = '<p style ="padding-left:10px;" class="error" >La contrase&ntilde;a es incorrecta</p>';
    			$this->load->view('layout/header',$datos);
    			$this->load->view('login/login');
    
    		} else {
    			$datos['mensaje'] = '<p style ="padding-left:10px;" class="error"> Usuario no encontrado</p>';
    			$this->load->view('layout/header',$datos);
    			$this->load->view('login/login');
    		}
    
    	} else {
         $datos['mensaje'] = '<p style ="padding-left:10px;" class="error"> Usuario y Contrase&ntilde;a incorrecta</p>';

    		$this->load->view('layout/header',$datos);
    		$this->load->view('login/login');
    	}
    	 
    }
    
    
 /*  
    public function login_without_ldap() {
            
        $username='yburgo02';        
        //$this->User_model->__construct($username) ;
        $id = 1;//$this->User_model->get_id();
        $get_role_arg = 1;//$this->User_model->get_rol();
        
        $role_level = $this->Rol_model->get_rol($get_role_arg);
        
        $customdata = array('logged_in' => TRUE,
                            'username' => $username,
                            'user_id' => $id,
                            'name' => 'Maria Fernanda ',
                            'role_name' => $role_level[0]->Nombre_rol,
                            'role_level' => $get_role_arg,
                            //'user_agent' => $this->agent->agent_string(),
                            'default_view'=> $role_level[0]->Vista
                             );
        $this->session->set_userdata($customdata);
         
        $this->_load_login();
        
    }
    */
    private function _load_login() {
        
        $data['header']= $this->load->view('layout/header',$this->_load_header(),TRUE);
        $data['menu_superior'] = $this->parser->parse('layout/menu',$this->_load_menusuperior(),TRUE); 
        
        //$data['items_menu_superior'] = $this->authldap->load_menu_superior($this->session->userdata('role_level'));
        
        $data['items_menu_superior'] = $this->Menu_model->get_menu($this->session->userdata('role_level'));
        $data['principal'] = $this->_load_view_default();
        $data['role_name'] = $this->session->userdata('role_name');

        $this->parser->parse('default/principal_catalogo',$data);
        
    }
    
    private function _load_view_default(){
    /*
     * Preparación de los datos que se mostraran en la vista por defecto de 
     * cada usuario dependiento su rol
     */
        /*Activar LDAP*/
		/*
    	$datos = array('role_name' =>$this->session->userdata('role_name'),
                        'items_menu_superior'=>$this->authldap->load_menu_superior($this->session->userdata('role_level')));
        */
        /*Desactivar LDAP*/
        $datos = array('role_name' =>$this->session->userdata('role_name'),
                        'items_menu_superior'=>$this->Menu_model->get_menu($this->session->userdata('role_level')));
                        
        $view_default = $this->parser->parse('default/'.$this->session->userdata('default_view'), $datos,TRUE);
        
        return $view_default;
    }
     
    private function _load_header() {
       
        $datos_header= array('id_usuario' => $this->session->userdata('user_id'),
                            'logged_in' => $this->session->userdata('logged_in'),
                            'name' => $this->session->userdata('name'),
                             'role_name' => $this->session->userdata('role_name')
                                            );
        return $datos_header;
            
        }
             
    private function _load_menusuperior(){
        /*Activar LDAP*/
    	/*
        $menu_superior = array('menu_superior'=> $this->authldap->load_menu_superior($this->session->userdata('role_level')),
                                'default_view'=>$this->session->userdata('default_view'));
        */                 
        /*Desactivar LDAP*/
    	
         $menu_superior = array('menu_superior'=>$this->Menu_model->get_menu($this->session->userdata('role_level')),
                                'default_view'=>$this->session->userdata('default_view'));

         return $menu_superior;
    }
    
    function logout() {
            //$this->authldap->logout();        
            $this->load->view('layout/header');
            $this->load->view('login/index_login');
            
    }
    
    public function load_default(){
            
        $resultado = $this->_load_view_default();
        
        $response = array('mensaje' => $resultado);
        
        $this->output
             ->set_status_header(200)
             ->set_content_type('application/json', 'utf-8')
             ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
             ->_display();
        exit;
    }
  
}
