<?php


if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Consultas extends CI_Controller{ 
   function __construct() {
        parent::__construct();      
     
        $this->load->model('Menu_model');
        $this->load->model(array('Servicios_model','Vertical_model','Esquema_model','Sistemas_aplicaciones_model'));$this->load->helper("datatables_helper");
       
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
            $data['tipos_servicio'] = $this->Servicios_model->get_tipos_servicio();
            $content = $this->load->view($this->load_vista($id_menu_padre).'/default',$data,TRUE); 
            return $content;
        }              
            
    }
    
    public function load_vista($id_menu) {
        
        $prop_vista = $this->Menu_model->get_vista($id_menu);
        return $prop_vista[0]->vista;
        
    }
    
   //carga vista de servicios ftp o servicios web
   public function carga_tabla_servicios(){
    
    	$id_tipo_servicio = filter_input(INPUT_POST, 'tipo_servicio');
    
    	switch ($id_tipo_servicio) {
    		 
    		case "1":
    
    			$vista_config = $this->load->view('consultas/consultas_ftp',array(),TRUE);
    			 
    			break;
    			 
    		case "2":
    			 
    			$vista_config = $this->load->view('consultas/consultas_web',array(),TRUE);
    
    			break;
    	}
    
    	$resultado =$vista_config;
    
    	$response = array('mensaje' => $resultado );
    
    	$this->output
         ->set_status_header(200)
         ->set_content_type('application/json', 'utf-8')
         ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
         ->_display();
    	exit;
    
    }

   //carga contenido en la tabla servicio ftp
   public function carga_tabla_ftp() {
    	
    	$this->datatables->select ('id_servicio, nombre, tipos_necesidad.nombre_necesidad, necesidades.num_necesidad, esquemas.nombre_esquema, verticales.nombre_vertical')
	    	->unset_column('id_servicio')
	    	-> add_column('Acciones', get_buttons_1('$1','servicios'),'id_servicio')
	    	-> from ('servicios')
	    	-> join ('necesidades','necesidades.id_necesidad = servicios.necesidades_id_necesidad')
	         -> join ('tipos_necesidad','necesidades.tipos_necesidad_id_tipo_necesidad = tipos_necesidad.id_tipo_necesidad')
	         -> join ('esquemas','esquemas.id_esquema = servicios.esquemas_id_esquema')
	         -> join ('verticales','verticales.id_vertical = servicios.verticales_id_vertical')
	    	->where(array('status_servicio'=>'1','tipos_servicios_id_tipo_servicio'=>'1'));
    	
    	echo $this->datatables->generate();
    }
   

   //carga contenido en la tabla servicios web
    public function carga_tabla_web() {
    	$this->datatables-> select ('id_servicio, nombre, tipos_necesidad.nombre_necesidad, necesidades.num_necesidad, esquemas.nombre_esquema, verticales.nombre_vertical')
	    	->unset_column('id_servicio')
	    	-> add_column('Acciones', get_buttons_1('$1','servicios'),'id_servicio')
	    	-> from ('servicios')
	    	-> join ('necesidades','necesidades.id_necesidad = servicios.necesidades_id_necesidad')
	         -> join ('tipos_necesidad','necesidades.tipos_necesidad_id_tipo_necesidad = tipos_necesidad.id_tipo_necesidad')
	         -> join ('esquemas','esquemas.id_esquema = servicios.esquemas_id_esquema')
	         -> join ('verticales','verticales.id_vertical = servicios.verticales_id_vertical')
	    	->where(array('status_servicio'=>'1','tipos_servicios_id_tipo_servicio'=>'2'));
    	
    	echo $this->datatables->generate();
    }
   
   public function carga_consulta() {
      
      $id_servicio = $this->input->post('identificador');

      $datos['datos'] = $this->Servicios_model->get_info_servicio($id_servicio);

      $resultado = $this->load->view('consultas/consulta', $datos , TRUE);

      $response = array('mensaje' => $resultado);

      $this->output
         ->set_status_header(200)
         ->set_content_type('application/json', 'utf-8')
         ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
         ->_display();
      exit;
      
   }
 
}