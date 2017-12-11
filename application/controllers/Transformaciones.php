<?php
/*@author Jose Borges <josedavidborgesrangel@gmail.com>
 * @fecha_crecion 26/10/2016
*/

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Transformaciones extends CI_Controller {

    function __construct() {
        parent::__construct();
        
        $this->load->model('Transformaciones_model');        
        $this->load->helper("datatables_helper");
        
    }
 
    public function index(){
       
        
    }
    
    public function search() 
    {
    	
       $resultado =  $this->load->view('dominios_transformaciones/search',array(),TRUE);
        
        $response = array('mensaje' => $resultado,
        				
                          );
        $this->output
            ->set_status_header(200)
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
            ->_display();
       exit;
    }
    //function to handle callbacks
    public function datatable()
    {
       
        $this->datatables->select('id_dominio,descripcion_dominio,sistema_origen,')
                //->unset_column('id_dominio')
            ->add_column('Acciones', get_buttons_4('$1','dominios_transformaciones'),'id_dominio')
            ->from('tb_dominios')
            ->where(array('status_dominio'=>'1'));
        
        echo $this->datatables->generate();
        
    }
    
    public function create() {
        
        
        $resultado = $this->load->view('dominios_transformaciones/agregar_transformaciones',array(),TRUE);
    
        $response = array('mensaje' => $resultado,
                          );
        $this->output
            ->set_status_header(200)
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
            ->_display();
       exit;
    }
    
    public function edit($data) {
        
        $data['value'] = 2;
        
        $resultado = $this->load->view('dominios_transformaciones/agregar_transformaciones',$data,TRUE);
    
        $response = array('mensaje' => $resultado,
                          );
        $this->output
            ->set_status_header(200)
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
            ->_display();
       exit;
    }
    
    public function consultarIdTransformaciones() {
        
        $identifier = $this->input->post('id_dominio');
       // echo $identifier;
        
        $search = $this->Transformaciones_model->avalaible($identifier) ;  
        
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
        public function insert_transformaciones() 
    {
        $data = array(
      'id_dominio'=> $this->input->post('id_dominio'),
      'descripcion_dominio'=> $this->input->post('descripcion_dominio'),
      'sistema_origen'=>$this->input->post('sistema_origen'),
      'sist_equi1'=>$this->input->post('sist_equi1'),
      'sist_equi2'=> $this->input->post('sist_equi2'),
      'sist_equi3'=> $this->input->post('sist_equi3'),
      'sist_equi4'=> $this->input->post('sist_equi4'),
      'sist_equi5'=> $this->input->post('sist_equi5'),
      'sist_equi6'=> $this->input->post('sist_equi6'),
      'sist_equi7'=> $this->input->post('sist_equi7'),
      'val_equi1'=> $this->input->post('val_equi1'),
      'val_equi2'=> $this->input->post('val_equi2'),
      'val_equi3'=> $this->input->post('val_equi3'),
      'val_equi4'=> $this->input->post('val_equi4'),
      'val_equi5'=> $this->input->post('val_equi5'),
      'val_equi6'=> $this->input->post('val_equi6'),
      'val_equi7'=> $this->input->post('val_equi7'),
      'status_dominio'=> 1,
                                
       );  
        
        $msg =  $this->Transformaciones_model->insert_transformaciones($data);
              
        $response = array('mensaje' => $msg,
                          );
        $this->output
            ->set_status_header(200)
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
            ->_display();
        exit;  
    }
    public function update_transformaciones(){  
    $data = array(
        
    		'id_dominio'=> $this->input->post('id_dominio'),
    		'descripcion_dominio'=> $this->input->post('descripcion_dominio'),
    		'sistema_origen'=>$this->input->post('sistema_origen'),
                'sist_equi1'=>$this->input->post('sist_equi1'),
                'sist_equi2'=> $this->input->post('sist_equi2'),
                'sist_equi3'=> $this->input->post('sist_equi3'),
                'sist_equi4'=> $this->input->post('sist_equi4'),
                'sist_equi5'=> $this->input->post('sist_equi5'),
                'sist_equi6'=> $this->input->post('sist_equi6'),
                'sist_equi7'=> $this->input->post('sist_equi7'),
                'val_equi1'=> $this->input->post('val_equi1'),
                'val_equi2'=> $this->input->post('val_equi2'),
                'val_equi3'=> $this->input->post('val_equi3'),
                'val_equi4'=> $this->input->post('val_equi4'),
                'val_equi5'=> $this->input->post('val_equi5'),
                'val_equi6'=> $this->input->post('val_equi6'),
                'val_equi7'=> $this->input->post('val_equi7'),
                'status_dominio'=> 1,
    );
    
    
    $datos['mensaje'] =  $this->Transformaciones_model->update_transformaciones($data);
    $response = array('view' => $this->load->view('dominios_transformaciones/search',$datos,TRUE),        
    );
    $this->output
    ->set_status_header(200)
    ->set_content_type('application/json', 'utf-8')
    ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
    ->_display();
    exit;
    }
    
    public function carga_transformaciones_consult(){
    	
    	$id_dominio = $this->input->post('id_dominio');
    	//'datos' es lo que la vista necesita para poder administrar la información dentro del arreglo.
    	$datos['datos'] = $this->Transformaciones_model->get_transformaciones_edit($id_dominio);

    	$resultado = $this->load->view('dominios_transformaciones/consult',$datos,TRUE);
    	   	
    	$response = array('mensaje' => $resultado,
    	);
		
    	$this->output
    	->set_status_header(200)
    	->set_content_type('application/json', 'utf-8')
    	->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
    	->_display();
    	exit;
    	
    }
    
    public function carga_transformaciones_edit(){
    	
    	$id_dominio = $this->input->post('id_dominio');
    	//'datos' es lo que la vista necesita para poder administrar la información dentro del arreglo.
    	$datos['datos'] = $this->Transformaciones_model->get_transformaciones_edit($id_dominio);
// 		var_dump($datos);
// 		exit();
    	$resultado = $this->load->view('dominios_transformaciones/agregar_transformaciones',$datos,TRUE);
    	   	
    	$response = array('mensaje' => $resultado,
    	);
		
    	$this->output
    	->set_status_header(200)
    	->set_content_type('application/json', 'utf-8')
    	->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
    	->_display();
    	exit;
    	
    }
    
    public function carga_transformaciones_delete(){
    
    	$id_dominio = $this->input->post('id_dominio');
    
        $datos['mensaje']= $this->Transformaciones_model->get_transformaciones_delete($id_dominio);
      
        $response = array('view' => $this->load->view('dominios_transformaciones/search_transformaciones',$datos,TRUE)); 
        	
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