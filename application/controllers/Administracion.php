<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Administracion extends CI_Controller {
    function __construct() {
        parent::__construct();      
     
        $this->load->model('Menu_model');
       
    }
    
    public function index() { 
        
        $id_menu_padre = filter_input(INPUT_POST, 'id_menu_superior'); 
        $name_menu = filter_input(INPUT_POST, 'menu_superior'); 
                
        $datos['submenu'] = $this->_load_submenu($id_menu_padre,$name_menu);
        $datos['content']= $this->load_default_content($id_menu_padre);
        $resultado = $this->parser->parse('layout/layout_content', $datos, TRUE);
        
        if(empty($resultado)){
            $resultado = '<div class="alert alert-danger" role="alert">Sin contenido para mostrar!!!!!</div>';
            
        }
        $response = array('mensaje' => $resultado);
        
        $this->output
             ->set_status_header(200)
             ->set_content_type('application/json', 'utf-8')
             ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
             ->_display();
        exit;
      
    }

    
    private function _load_submenu($id_menu_padre,$name_menu ){
        
	    $submenu = array('submenu'=> $this->Menu_model->get_sub_menu($id_menu_padre,
	                                 $this->session->userdata('role_level')),
	                                 'menu_superior' => $name_menu,
	                                 'id_menu_superior'=>$id_menu_padre,
	                                 'Vista'=>  $this->load_vista($id_menu_padre)
	        			);
	     
	     $view = $this->parser->parse('layout/submenu', $submenu, TRUE);
	     
	     return $view;
	    
    }
    
    public function load_default_content($id_menu_padre = NULL){    
      
        if ($this->input->is_ajax_request() && $id_menu_padre == NULL ) {
            
            $id_menu_padre = filter_input(INPUT_POST, 'id_menu_superior');
            $mensaje = $this->load->view($this->load_vista($id_menu_padre).'/default',array(),TRUE); 
            $response = array('mensaje' => $mensaje);
           
            $this->output
                    ->set_status_header(200)
                    ->set_content_type('application/json', 'utf-8')
                    ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
                    ->_display();
            exit;
        }
        else{       
            $content = $this->load->view($this->load_vista($id_menu_padre).'/default',array(),TRUE); 
            return $content;
        }              
            
    }
    
    public function load_vista($id_menu) {
        
        $prop_vista = $this->Menu_model->get_vista($id_menu);
        return $prop_vista[0]->vista;
        
    }
}