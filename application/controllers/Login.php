<?php 
	if (!defined('BASEPATH')) exit('No direct script access allowed');
/*
 * This file is part of AuthLDAP.

    AuthLDAP is free software: you can redistribute it and/or modify
    it under the terms of the GNU Lesser General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    AuthLDAP is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with AuthLDAP.  If not, see <http://www.gnu.org/licenses/>.
 * 
 */

/**
 * @author      Greg Wojtak <gwojtak@techrockdo.com>
 * @copyright   Copyright © 2010-2013 by Greg Wojtak <gwojtak@techrockdo.com>
 * @package     AuthLDAP
 * @subpackage  auth demo
 * @license     GNU Lesser General Public License
 */
class Login extends CI_Controller {
    function __construct() {
        parent::__construct();      
        
       // $this->load->library(array('AuthLDAP','user_agent','parser','table'));
        $this->load->library(array('AuthLDAP','user_agent','parser','table'));
        $this->load->helper('date');
        $this->load->model(array('Rol_model','User_model','Menu_rol_model'));
      
    }

    function index() {
        $this->session->keep_flashdata('tried_t');
        $this->login();
    }

    function login($errorMsg = NULL){
    	
        $this->session->keep_flashdata('tried_to');
       
        if(!$this->authldap->is_authenticated()) {
            // Set up rules for form validation
            $rules = $this->form_validation;
            $rules->set_rules('in_usuario', 'Usuario', 'required|alpha_dash');
            $rules->set_rules('in_pass', 'Password', 'required');

            
            // Do the login...
            if($rules->run() && $this->authldap->login($rules->set_value('in_usuario'),$rules->set_value('in_pass'))) {
                // Login WIN!
                if($this->session->flashdata('tried_to')) {
                    redirect($this->session->flashdata('tried_to'));
                }
                else {           	
                	
                    $this->_load_login();

                }
            }
           
            else {
                 //Error login
            	$datos_header= array('id_usuario' => 0,
            			'logged_in' => FALSE,
            	);
            	$this->load->view('layout/header', $datos_header);
                // Login FAIL
                $this->load->view('login/index_login', array('login_fail_msg'
                                        => 'Ocurr�o un error de autenticaci�n.'));
             }
             
        }else {
                // Already logged in...
                 $this->_load_login();
            
        }
    }
   
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
                            'role_name' => $role_level[0]->nombre_rol,
                            'role_level' => $get_role_arg,
                            'user_agent' => $this->agent->agent_string(),
                            'default_view'=> $role_level[0]->vista
                             );
        $this->session->set_userdata($customdata);
         
        $this->_load_login();
        
    }
    
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
            $this->authldap->logout();        
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


