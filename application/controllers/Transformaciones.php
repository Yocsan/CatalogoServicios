<?php
/*@author Jose Borges <josedavidborgesrangel@gmail.com>
 * @fecha_crecion 26/10/2016
*/

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Transformaciones extends CI_Controller {

    function __construct() {
        parent::__construct();
        
        $this->load->model(array('Transformaciones_model','Dominios_model'));        
        $this->load->helper("datatables_helper");
        
    }

    public function create() {
	
    	$data['dominios'] = $this->Dominios_model->get_all_dominios();
    	    	
    	$resultado = $this->load->view('transformaciones/create_update',$data,TRUE);
    
    	$response = array('mensaje' => $resultado);
    	
    	$this->output
    	->set_status_header(200)
    	->set_content_type('application/json', 'utf-8')
    	->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
    	->_display();
    	exit;
    }
    
    public function search(){
    	
		$resultado =  $this->load->view('transformaciones/search',array(),TRUE);
        
        $response = array('mensaje' => $resultado);
        $this->output
            ->set_status_header(200)
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
            ->_display();
       exit;
    }
    
    public function datatable(){
       
        $this->datatables->select('Id_detalle_dominio, dominios.Nombre_dominio, Sistema_origen, detalles_dominio.Valor_equivalencia')
            ->unset_column('Id_detalle_dominio')
            ->add_column('Acciones', get_buttons('$1','transformaciones'),'Id_detalle_dominio')
            ->from('detalles_dominio')
            ->join('dominios', 'dominios.Id_dominio = detalles_dominio.Id_dominio')
            ->where(array('dominios.Status_dominio'=>'1', 'detalles_dominio.Status_dominio'=>'1'));
        echo $this->datatables->generate();
        
    }
    
    public function consultarSistema_origen() {
        
        $sistema_origen = $this->input->post('sistema_origen');
        $id_dominio = $this->input->post('dominio');
           
        $search = $this->Transformaciones_model->avalaible($sistema_origen, $id_dominio) ;  
        
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
	
	public function insert_transformacion() {

		$data = array(
		      	'Id_dominio'=> $this->input->post('dominio'),
				'Sistema_origen'=> $this->input->post('sistema_origen'),
        		'Valor_equivalencia'=> $this->input->post('valor_equivalencia'),
		      	'Sistema_equivalente1'=>$this->input->post('sistema_destino1'),
		      	'Valor_equivalente1'=> $this->input->post('valor_equivalente1'),
		        'Sistema_equivalente2'=>$this->input->post('sistema_destino2'),
		        'Valor_equivalente2'=> $this->input->post('valor_equivalente2'),
        		'Sistema_equivalente3'=>$this->input->post('sistema_destino3'),
        		'Valor_equivalente3'=> $this->input->post('valor_equivalente3'),
        		'Sistema_equivalente4'=>$this->input->post('sistema_destino4'),
        		'Valor_equivalente4'=> $this->input->post('valor_equivalente4'),
        		'Sistema_equivalente5'=>$this->input->post('sistema_destino5'),
        		'Valor_equivalente5'=> $this->input->post('valor_equivalente5'),
        		'Sistema_equivalente6'=>$this->input->post('sistema_destino6'),
        		'Valor_equivalente6'=> $this->input->post('valor_equivalente6'),
        		'Sistema_equivalente7'=>$this->input->post('sistema_destino7'),
        		'Valor_equivalente7'=> $this->input->post('valor_equivalente7'),
      			'Status_dominio'=> 1,
                                
       );  
        
        $msg =  $this->Transformaciones_model->insert_transformacion($data);
              
        $response = array('mensaje' => $msg);
        $this->output
            ->set_status_header(200)
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
            ->_display();
        exit;  
    }
    
    public function update_transformacion(){  
	    	
	    $data = array(
	    			'Id_detalle_dominio'=> $this->input->post('id_detalle_dominio'),
			      	'Id_dominio'=> $this->input->post('dominio'),
	    			'Sistema_origen'=> $this->input->post('sistema_origen'),
	        		'Valor_equivalencia'=> $this->input->post('valor_equivalencia'),
			      	'Sistema_equivalente1'=>$this->input->post('sistema_destino1'),
			      	'Valor_equivalente1'=> $this->input->post('valor_equivalente1'),
			        'Sistema_equivalente2'=>$this->input->post('sistema_destino2'),
			        'Valor_equivalente2'=> $this->input->post('valor_equivalente2'),
	        		'Sistema_equivalente3'=>$this->input->post('sistema_destino3'),
	        		'Valor_equivalente3'=> $this->input->post('valor_equivalente3'),
	        		'Sistema_equivalente4'=>$this->input->post('sistema_destino4'),
	        		'Valor_equivalente4'=> $this->input->post('valor_equivalente4'),
	        		'Sistema_equivalente5'=>$this->input->post('sistema_destino5'),
	        		'Valor_equivalente5'=> $this->input->post('valor_equivalente5'),
	        		'Sistema_equivalente6'=>$this->input->post('sistema_destino6'),
	        		'Valor_equivalente6'=> $this->input->post('valor_equivalente6'),
	        		'Sistema_equivalente7'=>$this->input->post('sistema_destino7'),
	        		'Valor_equivalente7'=> $this->input->post('valor_equivalente7'),
	      			'Status_dominio'=> 1,
	    );
	      
	    $datos['mensaje'] =  $this->Transformaciones_model->update_transformacion($data);
	    $response = array('view' => $this->load->view('transformaciones/search',$datos,TRUE));
	    $this->output
	    ->set_status_header(200)
	    ->set_content_type('application/json', 'utf-8')
	    ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
	    ->_display();
	    exit;
    }
    
    public function carga_transformaciones_edit(){
    	
    	$id_transformacion = $this->input->post('id_transformacion');
    	$datos['datos'] = $this->Transformaciones_model->get_transformaciones_edit($id_transformacion);
    	$datos['dominios'] = $this->Dominios_model->get_all_dominios();
    	$resultado = $this->load->view('transformaciones/create_update',$datos,TRUE);	   	
    	$response = array('mensaje' => $resultado);
		
    	$this->output
    	->set_status_header(200)
    	->set_content_type('application/json', 'utf-8')
    	->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
    	->_display();
    	exit;
    	
    }
    
    public function delete_transformacion(){
    
    	$id_transformacion = $this->input->post('id_transformacion');

        $datos['mensaje_delete']= $this->Transformaciones_model->delete_transformacion($id_transformacion);
      
        $response = array('view' => $this->load->view('transformaciones/search',$datos,TRUE)); 
        	
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
  
    	 
        
}