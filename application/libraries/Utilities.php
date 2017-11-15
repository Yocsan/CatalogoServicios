<?php
/**
 * Description of Utilities
 *
 * @author Ing. Angélica Espinosa  <angelica1387@gmail.com>
 * @fecha_crecion 13/11/2015
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Utilities {

    function __construct() {      
      $this->ci =& get_instance();
      $this->ci->load->model(array('Menu_model'));
    }
    
    function principal() { 
        
        $id_menu_padre = filter_input(INPUT_POST, 'id_menu_superior'); 
        $name_menu = filter_input(INPUT_POST, 'menu_superior'); 
        
        $datos['submenu'] = $this->_load_submenu($id_menu_padre,$name_menu);
        $datos['content']= $this->load_default_content($id_menu_padre);
        $resultado = $this->ci->parser->parse('layout/layout_content', $datos, TRUE);
        
        if(empty($resultado)) {
            $resultado = '<div class="alert alert-danger" role="alert">Sin contenido para mostrar!!!!!</div>';    
        }
        
        $response = array('mensaje' => $resultado);
        
        $this->ci->output
             ->set_status_header(200)
             ->set_content_type('application/json', 'utf-8')
             ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
             ->_display();
        exit;
      
    }

    private function _load_submenu($id_menu_padre, $name_menu ){
        
	    $submenu = array('submenu'=> $this->ci->Menu_model->get_sub_menu($id_menu_padre,
	                                 $this->ci->session->userdata('role_level')),
	                                 'menu_superior' => $name_menu,
	                                 'id_menu_superior'=>$id_menu_padre,
	                                 'Vista'=>  $this->load_vista($id_menu_padre)
	        			);
	     
	     $view = $this->ci->parser->parse('layout/submenu', $submenu, TRUE);
	     
	     return $view;
    
    }
    
    public function load_default_content($id_menu_padre = NULL){    
      
        if ($this->ci->input->is_ajax_request() && $id_menu_padre == NULL ) {
            
            $id_menu_padre = filter_input(INPUT_POST, 'id_menu_superior');
            $mensaje = $this->ci->load->view($this->load_vista($id_menu_padre).'/default',array(),TRUE); 
            $response = array('mensaje' => $mensaje);
           
            $this->ci->output
                    ->set_status_header(200)
                    ->set_content_type('application/json', 'utf-8')
                    ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
                    ->_display();
            exit;
        }
        
        else { 
        	      
            $content = $this->ci->load->view($this->load_vista($id_menu_padre).'/default',array(),TRUE); 
            return $content;
        }              
      
        
    }
    
    public function load_vista($id_menu) {
        
        $prop_vista = $this->ci->Menu_model->get_vista($id_menu);
        return $prop_vista[0]->vista;
        
    }
    
}
