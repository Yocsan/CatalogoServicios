<?php

/**
 * Description of Servicios_model
 *
 * @author Ing. Angelica Espinosa Benitez
 * 
 */

     class Servicios_model extends CI_Model {    
  
		var $table = array('tb_servicio','dt_origen_ftp','dt_destino_ftp');
		var $column_order = array('id_proyecto','id_vertical','srt_funcionalidad','str_requerimiento','id_esquema','str_url_etf','str_caso_uso','dsc_caso_uso','id_tipo_servicio','id_origen_ftp','id_sistema_origen','modo','ruta_directorio','nombre_archivo','regla','directorio_historico','id_sistema_destino','modo','ruta_directorio','nombre_archivo','comand_quote','comand_quote_shell','simular_gdg','comand_control_m',null); //set column field database for datatable orderable
		var $column_search = array('id_servicio','id_origen_ftp','id_destino_ftp'); //set column field database for datatable searchable just identificador_vertical , nombre_vertical are searchable
		var $order = array('id' => 'desc');
	
	    public function __construct(){
			parent::__construct();		
			$this->load->database();		
		}
		

		public function avalaible($identifier){
			 
			$this->db->select("num_necesidad")
			->from("necesidades")
			->where("num_necesidad",$identifier)
			->where("status_necesidad",1);
			$num_necesidad = $this->db->get()->result();
			
			if(!empty($num_necesidad)) {
				return FALSE;
			}
			else{
				return TRUE;
			}
		}
		
		public function avalaible_nombre_servicio($identifier){
		
			$this->db->select("nombre")
			->from("servicios")
			->where("nombre",$identifier)
			->where("status_servicio",1);
			$nombre_servicio = $this->db->get()->result();
				
			if(!empty($nombre_servicio)) {
				return FALSE;
			}
			else{
				return TRUE;
			}
		}
		
        public function get_tipos_servicio(){        
        	$this->db->where('status_tipo_servicio=1');
            $tipo_servicio = $this->db->get('tipos_servicios');        
            return $tipo_servicio->result();
        }
        
        //trae los todos los tipos de procesamientos 
        public function get_procesamientos() {
            $this->db->where('status_procesamiento=1');
            $procesamientos = $this->db->get('procesamientos');
            return $procesamientos->result();
        }
        
        //trae los todos los tipos de prioridades
        public function get_prioridades() {
            $this->db->where('status_prioridad=1');
            $prioridades = $this->db->get('prioridades');
            return $prioridades->result();
        }
        
        //trae los todos los tipos de frecuencias
        public function get_frecuencias() {
            $this->db->where('status_frecuencia=1');
            $frecuencias = $this->db->get('frecuencias');
            return $frecuencias->result();
        }
        
      //trae los todos los tipos de frecuencias ftp
        public function get_frecuencias_ftp() {
            $this->db->where('status_frecuencia_ftp=1');
            $frecuencias = $this->db->get('frecuencias_ftp');
            return $frecuencias->result();
        }
        
        //trae los todos las reglas de transporte
        public function get_reglas_transporte() {
            $this->db->where('status_regla_transporte=1');
            $frecuencias = $this->db->get('reglas_transporte');
            return $frecuencias->result();
        }
        
        //trae los todos las modelo de datos
        public function get_modelo_datos() {
            $this->db->where('status_modelo_dato=1');
            $frecuencias = $this->db->get('modelo_datos');
            return $frecuencias->result();
        }
        
        //trae los todos los tipos de necesidades
        public function get_tipos_necesidades() {
            $this->db->where('status_tipo_necesidad=1');
            $tipos_necesidad = $this->db->get('tipos_necesidad');
            return $tipos_necesidad->result();
        }
        
        public function get_necesidad($id_necesidad) {
           
            $this->db->where(array('status_necesidad'=>1,
                                  'id_necesidad'=>$id_necesidad[0]->id));
            $necesidad = $this->db->get('necesidades')->result_array();
            return $necesidad[0];
           
        }
        
       public function get_servicio($id_servicio) {
           
            $this->db->where(array('status_servicio'=>1,
                                  'id_servicio'=>$id_servicio[0]->id));
            $servicio = $this->db->get('servicios')->result_array();
            return $servicio[0];
           
        }    
                
       public function get_info_servicio($id_servicio) {
           
            $this->db->where(array('status_servicio'=>1,
                                  'id_servicio'=>$id_servicio));
            $servicio = $this->db->get('servicios')->result_array();
            return $servicio[0];       
        }
        
        //trae el id mayor de la tabla de necesidad
        public function get_ultima_necesidad() {	
            $necesidades = $this->db->query('SELECT MAX(id_necesidad) AS id FROM necesidades WHERE status_necesidad = 1');
            return $necesidades->result();
        }
        
        //trae el id mayor de la tabla de servicios
        public function get_ultimo_servicio() {
            $id_servicio = $this->db->query('SELECT MAX(id_servicio) AS id FROM servicios WHERE status_servicio = 1');
            return $id_servicio->result();
        }
        
         //trae el id mayor de la tabla de servicios
        public function get_ultima_config_ftp() {
            $id_servicio = $this->db->query('SELECT MAX(id_conf_ftp) AS id FROM conf_ftp');
            return $id_servicio->result();
        }
        
        public function get_documento_etf($id_documento){
            $documento = $this->db->query("SELECT * FROM servicios serv 
            INNER JOIN procesamientos proc ON serv.procesamientos_id_procesamiento = proc.id_procesamiento
            INNER JOIN necesidades necesid ON serv.necesidades_id_necesidad = necesid.id_necesidad
            INNER JOIN esquemas esq ON serv.esquemas_id_esquema = esq.id_esquema
            INNER JOIN prioridades prior ON serv.prioridades_id_prioridad = prior.id_prioridad
            INNER JOIN verticales vert ON serv.verticales_id_vertical = vert.id_vertical
            INNER JOIN frecuencias frec ON serv.frecuencias_id_frecuencia = frec.id_frecuencia
            INNER JOIN tipos_servicios tipos_serv ON 
            serv.tipos_servicios_id_tipo_servicio = tipos_serv.id_tipo_servicio
            INNER JOIN premisas prem ON 
            serv.id_servicio = prem.servicios_id_servicio
            WHERE status_servicio = '1' AND id_servicio ='$id_documento'");
                 /*                         
            $documento->result();
            var_dump($documento);
            exit();
            */
            return $documento->result();
            //return $documento[0];
           
        }
        
        /*----------------------------------------------------------------------*/
        
		//inserta la informacion del primer paso del formulario (definicion de la necesidad)
        public function insert_necesidad($data){
        
        	return $this->db->insert('necesidades',$data);
        }
  
		//inserta la informacion del segundo paso del formulario (informacion general del servicio)
        public function insert_servicio($data){
        		
        	return $this->db->insert('servicios',$data);	
        }
        
        //inserta la informacion del tercer paso del formulario (descripcion de las premisas)
        public function insert_premisa($data){
        
        	return $this->db->insert('premisas',$data);
        }
        
        //inserta la informacion del ultimo paso del formulario si es web
        public function insert_config_web($data) {
           
           return $this->db->insert('conf_web',$data);
        }
      
        //inserta la informacion del ultimo paso del formulario si es ftp
        public function insert_config_ftp($data){
        	
        	return $this->db->insert('conf_ftp',$data);
        }
        
       //inserta los sistemas de origen y destinos asociados al servicio
        public function insert_servicio_has_sistema($data) {
           
           return $this->db->insert('servicios_has_sistemas',$data);
        }
    	
/*-----------------------------------------------------------------------------------*/
        
        public function update_necesidad($data) {
                    	 
         	$result = $this->db->where('id_necesidad', $data['id_necesidad'])
         						->update('necesidades', $data);
           
        }

    /*---------------------------------------------------------------------------------*/
                /*------------------funcion que elimina servicio web-----------------------*/
        public function delete_servicio($dato){
	         $status = array ('status_servicio' => 0);
            $result = $this->db->where('id_servicio', $dato)
                           ->update('servicios', $status);
            return $result;
   		}

  
        
        public function get_servicio_ftp_edit($dato){
        	
            $this->db->select()
            ->from('tb_config_ftp')
            ->join('tb_servicio','tb_servicio.id_servicio=tb_config_ftp.id_servicio')
            ->join('dt_origen_ftp','tb_config_ftp.id_servicio=dt_origen_ftp.id_servicio')
            ->join('tb_sistema','tb_sistema.id_sistemas=dt_origen_ftp.id_sistema_origen')
            ->where(array('tb_servicio.id_servicio'=>$dato));
    			
            $tb_servicio = $this->db->get()->result_array(); 
            return $tb_servicio[0];
        }
         
        public function get_servicios_origen($dato){
        	
        	$this->db->select('*')
        	->from('dt_origen_ftp')
        	->where(array('id_servicio'=>$dato));
        	
        	$result = $this->db->get();
        	return $result->result_array();
        }
        
        public function get_servicios_destino($dato){
        	 
        	$this->db->select('*')
        	->from('dt_destino_ftp')
        	->where(array('id_servicio'=>$dato));
        	 
        	$result = $this->db->get();
        	return $result->result_array();
        }
         
        public function get_servicio_ftp_delete($dato){
	    	$status = array ('status_servicio' => 0);
	    	$result = $this->db->where('id_servicio', $dato)
    					->update('tb_servicio', $status);
    		return $result;
        }
        
        public function get_imagen($dato){
        
        	$this->db->select('img_uml')
        	->from('tb_servicio')
        	->where(array('id_servicio'=>$dato));
        
        	$result = $this->db->get()->result_array();
        	return $result[0];
        }
            
        public function get_web_edit($dato){
            $this->db->select()
            ->from('tb_config_web')
            ->join('tb_servicio','tb_servicio.id_servicio=tb_config_web.id_servicio')
            ->join('dt_cliente_web','dt_cliente_web.id_servicio=tb_config_web.id_servicio')
            ->join('tb_sistema','tb_sistema.id_sistemas=dt_cliente_web.id_sistema_cliente')
            ->where(array('tb_servicio.id_servicio'=>$dato));
	    	$web = $this->db->get()->result_array();
	    	return $web[0];
        }

        public function get_servicios_cliente($dato){
        	 
        	$this->db->select('*')
        	->from('dt_cliente_web')
        	->where(array('id_servicio'=>$dato));
        	 
        	$result = $this->db->get();
        	return $result->result_array();
        }
        
        public function get_servicios_proveedor($dato){
        
        	$this->db->select('*')
        	->from('dt_proveedor_web')
        	->where(array('id_servicio'=>$dato));
        
        	$result = $this->db->get();
        	return $result->result_array();
        }
        /*------------------funcion que elimina servicio web-----------------------*/
        public function delete_servicio_web($dato){
	        $status = array ('status_servicio' => 0);
	    	$result = $this->db->where('id_servicio', $dato)
	    					   ->update('servicios', $status);
    		return $result;
   		}
	    
   		public function update_servicio($data){
   			 
   			$result = $this->db->where('id_servicio', $data['id_servicio'])
   								->update('tb_servicio', $data);
   			return $result;
   			 
   		}
	    
	    public function update_servicio_web($data){
	    	
	    	$result = $this->db->where('id_servicio', $data['id_servicio'])
	    			 		   ->update('tb_config_web', $data);
	        return $result;
	    }
   
        public function update_servicio_ftp($data){
         	 
         	$result = $this->db->where('id_servicio', $data['id_servicio'])
         						->update('tb_config_ftp', $data);
         	
         	return $result;
        }
        
        public function update_origen_ftp($data){
        	 
        	$result = $this->db->where('id_origen_ftp', $data['id_origen_ftp'])
        						->update('dt_origen_ftp', $data);
        	return $result;
        }
        
        public function update_destino_ftp($data){
        	 
        	$result = $this->db->where('id_destino_ftp', $data['id_destino_ftp'])
        	->update('dt_destino_ftp', $data);
        	return $result;
        }
        
        public function update_cliente_web($data){
        	
        	$result = $this->db->where('id_cliente_web', $data['id_cliente_web'])
        	->update('dt_cliente_web', $data);
        	return $result;
        }
        
        public function update_proveedor_web($data){
        	 
        	$result = $this->db->where('id_proveedor_web', $data['id_proveedor_web'])
        	->update('dt_proveedor_web', $data);
        	return $result;
        }
        
        public function consulta_id_tipo_servicio(){
         	
        	$this->db->select("id_servicio")
	        	->from("tb_servicio")
	        	->where("id_servicio = (Select MAX(`id_servicio`) FROM `tb_servicio`)");
        
        	$id_servicio = $this->db->get();
        	$last_id_servicio = $id_servicio->result();
        	return  $last_id_servicio[0]->id_servicio;
        }
}
