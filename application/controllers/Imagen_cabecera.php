<?php
/*@author Jose Borges <josedavidborgesrangel@gmail.com>
 * @fecha_crecion 26/10/2016
*/

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Imagen_cabecera extends CI_Controller {

    function __construct() {
        parent::__construct();
        
        $this->load->model('Dominios_model');        
        $this->load->helper("datatables_helper");
        
    }
     
    public function create() {
    
    	$resultado = $this->load->view('imagen_cabecera/upload_update',array(),TRUE);
    
    	$response = array('mensaje' => $resultado);
    	
    	$this->output
	    	->set_status_header(200)
	    	->set_content_type('application/json', 'utf-8')
	    	->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
	    	->_display();
    	exit;
    }
    
    public function search() {
    	
       $resultado =  $this->load->view('dominios/search',array(),TRUE);
        
        $response = array('mensaje' => $resultado);
        
        $this->output
            ->set_status_header(200)
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
            ->_display();
       exit;
    }

    
    public function datatable() {
       
        $this->datatables->select('Id_dominio, Nombre_dominio')
            ->unset_column('Id_dominio')
            ->add_column('Acciones', get_buttons('$1','dominios'),'Id_dominio')
            ->from('dominios')
            ->where(array('Status_dominio'=>'1'));
        
        echo $this->datatables->generate();
        
    }
    
    
    public function consultarDominio() {
        
        $nombre_dominio = $this->input->post('nombre_dominio');
        
        $search = $this->Dominios_model->avalaible($nombre_dominio) ;  
        
        if($search){
            $resultado= '<span class="success">Disponible</span>';
            $codigo = FALSE;
        }else{
            $resultado= '<span class="error">Este dominio ya existe</span>';
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
	
	public function insert_dominio() {
			
        $data = array(
        		'Nombre_dominio' => $this->input->post('nombre_dominio'),
		      	'Descripcion_dominio' => $this->input->post('descripcion_dominio'),
        		'Status_dominio' => 1,                            
        );  
        
        $msg =  $this->Dominios_model->insert_dominio($data);
 
        $response = array('mensaje' => $msg);
        
        $this->output
            ->set_status_header(200)
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
            ->_display();
        exit;  
    }
    
    public function update_dominio(){  
    	
        $data = array(
        		'Id_dominio' => $this->input->post('id_dominio'),
        		'Nombre_dominio' => $this->input->post('nombre_dominio'),
		      	'Descripcion_dominio' => $this->input->post('descripcion_dominio'),
        		'Status_dominio' => 1,                            
      	);  
    
    
	    $datos['mensaje'] =  $this->Dominios_model->update_dominio($data);
	    
	    $response = array('view' => $this->load->view('dominios/search',$datos,TRUE));
	    
	    $this->output
	    ->set_status_header(200)
	    ->set_content_type('application/json', 'utf-8')
	    ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
	    ->_display();
	    exit;
    }
    
    public function carga_dominio_edit(){
    	
    	$id_dominio = $this->input->post('id_dominio');

    	$datos['datos'] = $this->Dominios_model->get_dominios_edit($id_dominio);
    	$resultado = $this->load->view('dominios/create_update',$datos,TRUE);
    	   	
    	$response = array('mensaje' => $resultado);
		
    	$this->output
    	->set_status_header(200)
    	->set_content_type('application/json', 'utf-8')
    	->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
    	->_display();
    	exit;
    	
    }
    
    public function delete_dominio(){
    
    	$id_dominio = $this->input->post('id_dominio');
    
        $datos['mensaje_delete']= $this->Dominios_model->delete_dominio($id_dominio);
      
        $response = array('view' => $this->load->view('dominios/search',$datos,TRUE)); 
        	
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
          
    public function carga_dominio_consult(){
    	
    	$id_dominio = $this->input->post('id_dominio');
    	//'datos' es lo que la vista necesita para poder administrar la información dentro del arreglo.
    	$datos['datos'] = $this->Dominios_transformaciones_model->get_dominios_transformaciones_edit($id_dominio);

    	$resultado = $this->load->view('dominios/consult',$datos,TRUE);
    	   	
    	$response = array('mensaje' => $resultado,
    	);
		
    	$this->output
    	->set_status_header(200)
    	->set_content_type('application/json', 'utf-8')
    	->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
    	->_display();
    	exit;
    	
    }
    
}