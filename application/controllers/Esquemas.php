<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Esquemas extends CI_Controller {

    function __construct() {
          parent::__construct();
        
        $this->load->model('Esquema_model');        
        $this->load->helper("datatables_helper");
        
    } 
    
  public function create() {
 
        $resultado = $this->load->view('esquemas/create_update',array(),TRUE);
    
        $response = array('mensaje' => $resultado);
        $this->output
        ->set_status_header(200)
        ->set_content_type('application/json', 'utf-8')
        ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
        ->_display();
        exit;
    }
    
    public function search() {
        
       $resultado =  $this->load->view('esquemas/search',array(),TRUE);
        
        $response = array('mensaje' => $resultado);
        $this->output
            ->set_status_header(200)
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
            ->_display();
       exit;
    }
    
    public function datatable() {
       
        $this->datatables->select('nombre_esquema, descripcion_esquema')
            //->unset_column('Id_esquema')
            ->add_column('Acciones', get_buttons('$1','esquemas'),'nombre_esquema')
            ->from('esquemas')
            ->where(array('status_esquema'=>'1'));
        
        echo $this->datatables->generate();
        
    }
    
    public function consultarIdEsquema() {
        
        $identifier = $this->input->post('identificador');
        
        $search = $this->Esquema_model->avalaible($identifier) ;  
        
        if($search){
            $resultado= '<span id="mensaje" class="success">Disponible</span>';
            $codigo = FALSE;
        }else{
            $resultado= '<span id="mensaje" class="error">No Disponible</span>';
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
    
    public function insert_esquema() {   
        
        $data = array(
                    'nombre_esquema'=> $this->input->post('nombre_esquema'),
                    'descripcion_esquema'=> $this->input->post('descripcion_esquema'),  
                    'status_esquema'=> 1
        );  
        
        $msg =  $this->Esquema_model->insert_esquema($data);
              
        $response = array('mensaje' => $msg,
                          );
        $this->output
            ->set_status_header(200)
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
            ->_display();
        exit;  
    }
    
    public function update_esquema(){     
        
        $data = array(
                    'nombre_esquema'=> $this->input->post('nombre_esquema'),
                    'descripcion_esquema'=> $this->input->post('descripcion_esquema'),  
                    'status_esquema'=> 1
        );
        
        $datos['mensaje'] =  $this->Esquema_model->update_esquema($data);
        $response = array('view' => $this->load->view('esquemas/search',$datos,TRUE));
        
        $this->output
        ->set_status_header(200)
        ->set_content_type('application/json', 'utf-8')
        ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
        ->_display();
        exit;
    }
    
    public function carga_esquema_edit(){
        
        $id_esquema = $this->input->post('identificador');
        //'datos' es lo que la vista necesita para poder administrar la información dentro del arreglo.
        $datos['datos'] = $this->Esquema_model->get_esquemas_edit($id_esquema);

        $resultado = $this->load->view('esquemas/create_update',$datos,TRUE);
            
        $response = array('mensaje' => $resultado);
        
        $this->output
        ->set_status_header(200)
        ->set_content_type('application/json', 'utf-8')
        ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
        ->_display();
        exit;
        
    }
    
    //funcion que elimina el esquema
    public function delete_esquema(){
    
        $id_esquema = $this->input->post('identificador');
        
        $datos['mensaje_delete']= $this->Esquema_model->delete_esquema($id_esquema);
      
        $response = array('view' => $this->load->view('esquemas/search',$datos,TRUE)); 
            
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
    