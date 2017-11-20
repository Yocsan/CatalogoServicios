<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Servicios extends CI_Controller{ 
	
	private $_ruta_diagrama;
	private $_nombre_diagrama;
	
    function __construct() {
        parent::__construct();
        
        	$this->load->library('Utilities');
        	$this->load->model(array('Servicios_model','Vertical_model','Esquema_model','Sistemas_aplicaciones_model'));
        	$this->load->helper("datatables_helper");
         
    }
      
    public function index() {        
       
        $this->utilities->principal();        
    }
    
    public function consultaNumeroNecesidad() {
    
    	$identifier = $this->input->post('numero_requerimiento');
    
    	$search = $this->Servicios_model->avalaible($identifier) ;
    
    	if($search){
    		$resultado= '<span id="mensaje" class="success">N&uacute;mero de requerimiento disponible</span>';
    		$codigo = FALSE;
    	}else{
    		$resultado= '<span id="mensaje" class="error">El n&uacute;mero de requerimiento no se encuentra disponible</span>';
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
    
    public function consultaNombre_servicio() {
    
    	$identifier = $this->input->post('nombre_servicio');
    
    	$search = $this->Servicios_model->avalaible_nombre_servicio($identifier) ;
    
    	if($search){
    		$resultado= '<span id="mensaje" class="success">Nombre disponible</span>';
    		$codigo = FALSE;
    	}else{
    		$resultado= '<span id="mensaje" class="error">El nombre del servicio no se encuentra disponible</span>';
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
    
    
    public function search() {
    	$data['tipos_servicio'] = $this->Servicios_model->get_tipos_servicio();
    	 
    	$resultado =  $this->load->view('servicios/search',$data, TRUE);
    
    	$response = array('mensaje' => $resultado 
    	);
    	
    	$this->output
         ->set_status_header(200)
         ->set_content_type('application/json', 'utf-8')
         ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
         ->_display();
    	exit;
    }
    

    public function carga_tabla_servicios(){
    
    	$id_tipo_servicio = filter_input(INPUT_POST, 'tipo_servicio');
    
    	switch ($id_tipo_servicio) {
    		 
    		case "1":
    
    			$vista_config = $this->load->view('servicios/search_ftp',array(),TRUE);
    			 
    			break;
    			 
    		case "2":
    			 
    			$vista_config = $this->load->view('servicios/search_web',array(),TRUE);
    
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
    
    public function carga_tabla_ftp() {
    	
    	$this->datatables-> select ('id_servicio, nombre, tipos_necesidad.nombre_necesidad, necesidades.num_necesidad, esquemas.nombre_esquema, verticales.nombre_vertical')
	    	->unset_column('id_servicio')
	    	-> add_column('Acciones', get_buttons_img('$1','servicios'),'id_servicio')
	    	-> from ('servicios')
	    	-> join ('necesidades','necesidades.id_necesidad = servicios.necesidades_id_necesidad')
         -> join ('tipos_necesidad','necesidades.tipos_necesidad_id_tipo_necesidad = tipos_necesidad.id_tipo_necesidad')
         -> join ('esquemas','esquemas.id_esquema = servicios.esquemas_id_esquema')
         -> join ('verticales','verticales.id_vertical = servicios.verticales_id_vertical')
	    	->where(array('status_servicio'=>'1','tipos_servicios_id_tipo_servicio'=>'1'));
    	
    	echo $this->datatables->generate();
    }
    
    public function carga_tabla_web() {
    	$this->datatables-> select ('id_servicio, nombre, tipos_necesidad.nombre_necesidad, necesidades.num_necesidad, esquemas.nombre_esquema, verticales.nombre_vertical')
	    	->unset_column('id_servicio')
	    	-> add_column('Acciones', get_buttons_img('$1','servicios'),'id_servicio')
	    	-> from ('servicios')
	    	-> join ('necesidades','necesidades.id_necesidad = servicios.necesidades_id_necesidad')
         -> join ('tipos_necesidad','necesidades.tipos_necesidad_id_tipo_necesidad = tipos_necesidad.id_tipo_necesidad')
         -> join ('esquemas','esquemas.id_esquema = servicios.esquemas_id_esquema')
         -> join ('verticales','verticales.id_vertical = servicios.verticales_id_vertical')
	    	->where(array('status_servicio'=>'1','tipos_servicios_id_tipo_servicio'=>'2'));
    	
    	echo $this->datatables->generate();
    }
    /*carga la vista de necesidades*/
    public function create() {

         $data['necesidades'] = $this->Servicios_model->get_tipos_necesidades();

         $resultado = $this->load->view('servicios/create_update_1',$data, TRUE);

        $response = array('mensaje' => $resultado);

        $this->output
            ->set_status_header(200)
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
            ->_display();
        exit;
    }
    

    /*carga la vista de servicios*/
    public function carga_formulario_servicios(){
       
      $id_necesidad = $this->input->post('id_necesidad');
       if(!empty($id_necesidad)) {
            $datos_necesidad = array(
               'id_necesidad'=>$id_necesidad,
               'num_necesidad' => $this->input->post('numero_requerimiento'),
               'descripcion_necesidad' => $this->input->post('descripcion_requerimiento'),
               'tipos_necesidad_id_tipo_necesidad' => $this->input->post('tipo_necesidad'),
               'status_necesidad' => 1
          	);
            $this->Servicios_model->update_necesidad($datos_necesidad);

      } else {
                      	
    	       $datos_necesidad = array(
               'num_necesidad' => $this->input->post('numero_requerimiento'),
               'descripcion_necesidad' => $this->input->post('descripcion_requerimiento'),
               'tipos_necesidad_id_tipo_necesidad' => $this->input->post('tipo_necesidad'),
               'status_necesidad' => 1
    	       );
    	
            $this->Servicios_model->insert_necesidad($datos_necesidad);
          
      }
       
      
   	   
    	$data['tipos_servicio'] = $this->Servicios_model->get_tipos_servicio();
    	$data['verticales'] = $this->Vertical_model->get_verticales_desc();
    	$data['esquemas'] = $this->Esquema_model->get_esquemas_desc();
    	$data['procesamientos'] = $this->Servicios_model->get_procesamientos();
    	$data['prioridades'] = $this->Servicios_model->get_prioridades();
    	$data['frecuencias'] = $this->Servicios_model->get_frecuencias();

    	$resultado = $this->load->view('servicios/create_update_2', $data, TRUE);
    
    	$response = array('mensaje' => $resultado);
    
    	$this->output
	    	->set_status_header(200)
	    	->set_content_type('application/json', 'utf-8')
	    	->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
	    	->_display();
    	exit;
    }
       

	/*vista cuando se presiona el boton de anterior en el formulario de servicios*/
    public function carga_vista_anterior_1() {
       
      $id_necesidad = $this->Servicios_model->get_ultima_necesidad() ;
      $datos['datos'] = $this->Servicios_model->get_necesidad($id_necesidad);
      $datos['necesidades'] = $this->Servicios_model->get_tipos_necesidades();

    	$resultado = $this->load->view('servicios/create_update_1', $datos, TRUE);
    
    	$response = array('mensaje' => $resultado);
    
    	$this->output
	    	->set_status_header(200)
	    	->set_content_type('application/json', 'utf-8')
	    	->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
	    	->_display();
    	exit;
       
    }   
    
    
    /*vista cuando se presiona el boton de siguiente en el formulario de servicios*/
    public function carga_formulario_premisas() {

    	/*carga de imagen*/
    	
    	$diagrama_uml = 'diagrama_uml';
    	$nombre_servicio = $this->input->post('nombre_servicio');
    	$ruta_diagrama = $this->_carga_diagrama_uml($diagrama_uml, $nombre_servicio);

    	/*---------------------------------------------------------------------------------*/
    	$id_necesidad = $this->Servicios_model->get_ultima_necesidad();//ultima necesidad que se registro
    	
    	$datos_servicio = array(
    			'nombre' => $this->input->post('nombre_servicio'),
    			'verticales_id_vertical' => $this->input->post('vertical'),
    			'esquemas_id_esquema' => $this->input->post('esquema'),
    			'procesamientos_id_procesamiento' => $this->input->post('procesamiento'),
    			'prioridades_id_prioridad' => $this->input->post('prioridad'),
    			'frecuencias_id_frecuencia' => $this->input->post('frecuencia'),
    			'tipos_servicios_id_tipo_servicio' => $this->input->post('tipo_servicio'),
    			'introduccion' => $this->input->post('introduccion'),
    			'descripcion_proceso' => $this->input->post('descripcion_proceso'),
    			'evento_disparador' => $this->input->post('evento_inicio_disparador'),
    			'adaptador' => $this->input->post('adaptaciones'),
    			'arquitectura_sistema_conexion' => $this->input->post('arquitectura'),
    			'url_imagen' => $ruta_diagrama,
    			'necesidades_id_necesidad' => $id_necesidad[0]->id,
    			'status_servicio' => 1
    	);
    	  	
    	$this->Servicios_model->insert_servicio($datos_servicio);

    	$data['premisas'] = $this->input->post('numero_premisas');
    	$data['tipo_servicio'] = $this->input->post('tipo_servicio');
    	$data['cantidad_sistemas_origen'] = $this->input->post('cantidad_sistemas_origen');
    	$data['cantidad_sistemas_destino'] = $this->input->post('cantidad_sistemas_destino');
    	     	
    	$resultado = $this->load->view('servicios/create_update_3', $data, TRUE);
    
    	$response = array('mensaje' => $resultado);
    
    	$this->output
	    	->set_status_header(200)
	    	->set_content_type('application/json', 'utf-8')
	    	->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
	    	->_display();
    	exit;  

    }
    
    /*vista cuando se presiona el boton de anterior en el formulario de servicios*/
    
    public function carga_vista_anterior_2() {
       
      $id_servicio = $this->Servicios_model->get_ultimo_servicio() ;
      $datos['datos'] = $this->Servicios_model->get_servicio($id_servicio);
          	   
    	$data['tipos_servicio'] = $this->Servicios_model->get_tipos_servicio();
    	$data['verticales'] = $this->Vertical_model->get_verticales_desc();
    	$data['esquemas'] = $this->Esquema_model->get_esquemas();
    	$data['procesamientos'] = $this->Servicios_model->get_procesamientos();
    	$data['prioridades'] = $this->Servicios_model->get_prioridades();
    	$data['frecuencias'] = $this->Servicios_model->get_frecuencias();
    
    	$resultado = $this->load->view('servicios/create_update_2', $data, TRUE);
    
    	$response = array('mensaje' => $resultado);
    
    	$this->output
    	->set_status_header(200)
    	->set_content_type('application/json', 'utf-8')
    	->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
    	->_display();
    	exit;
    }
          
   //carga la ultima vista del formulario si el servicio es web
	public function carga_formulario_web(){
      
      //informacion de las premisas
		$data_premisas = array();
		$cantidad_premisas = $this->input->post('numero_premisas');
		$premisa = $this->input->post('premisa[]');
		$id_servicio = $this->Servicios_model->get_ultimo_servicio();
		
		for ($i=0; $i < $cantidad_premisas; $i++) {
		
			$data_premisas[$i] = array (
					'descripcion_premisa' => $premisa[$i],
					'servicios_id_servicio' => $id_servicio[0]->id,
					'status_premisa' => 1
			);
         //guarda todas las premisas asociadas al servicio
			$this->Servicios_model->insert_premisa($data_premisas[$i]);
		
		}

         //trae todos los sistemas activos en la base de datos
        $data['sistemas'] = $this->Sistemas_aplicaciones_model->get_sistemas();
		
        $resultado = $this->load->view('servicios/create_update_web', $data, TRUE);

        $response = array('mensaje' => $resultado);
        
        $this->output
            ->set_status_header(200)
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
            ->_display();
        exit;      
	}

	public function insert_configuracion_web() {
		
		$data_config_web = array();
		$wsdl = $this->input->post('wsdl[]');
		$ambiente = $this->input->post('ambiente[]');
		$id_servicio = $this->Servicios_model->get_ultimo_servicio();
		
		for ($i=0; $i < count($wsdl); $i++) {
		
			$data_config_web[$i] = array (
					'url_wsdl' => $wsdl[$i],
					'servicios_id_servicio' => $id_servicio[0]->id,
					'ambientes_id_ambiente' => $ambiente[$i]
			);
		
			$datos['mensaje_config'] = $this->Servicios_model->insert_config_web($data_config_web[$i]);
		
		}
     
	    $sistema = $this->input->post('sistema[]');
	    $sentido = $this->input->post('sentido[]');
		
     	for ($i=0; $i < count($sistema); $i++) {
        
         $data_servicios_has_sistema[$i] = array(
               'servicios_id_servicio' => $id_servicio[0]->id,
               'sistemas_id_sistema' => $sistema[$i],
               'sentidos_id_sentido' => $sentido[$i],
               'conf_ftp_id_conf_ftp' => 0
         );

			$datos['mensaje_sistema'] = $this->Servicios_model->insert_servicio_has_sistema($data_servicios_has_sistema[$i]);
		
		}
		
		$resultado = $this->load->view('servicios/create_update_1', $datos, TRUE);
		
		$response = array('mensaje' => $resultado);
		
		$this->output
			->set_status_header(200)
			->set_content_type('application/json', 'utf-8')
			->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
			->_display();
		exit;
	}
	
	public function carga_formulario_ftp() {

		$data_premisas = array();
		$cantidad_premisas = $this->input->post('numero_premisas');
		$premisa = $this->input->post('premisa[]');
		$id_servicio = $this->Servicios_model->get_ultimo_servicio();
		
		for ($i=0; $i < $cantidad_premisas; $i++) {
		
			$data_premisas[$i] = array (
					'descripcion_premisa' => $premisa[$i],
					'servicios_id_servicio' => $id_servicio[0]->id,
					'status_premisa' => 1
			);
		
			$this->Servicios_model->insert_premisa($data_premisas[$i]);
		
		}
		 	
		/*datos que se cargan en la vista de configuracion ftp*/

    	$data['cantidad_sistemas_origen'] = $this->input->post('cantidad_sistemas_origen');
    	$data['cantidad_sistemas_destino'] = $this->input->post('cantidad_sistemas_destino');	
    	$data['modelo_datos'] = $this->Servicios_model->get_modelo_datos();
	    $data['sistemas'] = $this->Sistemas_aplicaciones_model->get_sistemas();
	    $data['reglas_transporte'] = $this->Servicios_model->get_reglas_transporte();
	    $data['frecuencias'] = $this->Servicios_model->get_frecuencias_ftp();
      
		$resultado = $this->load->view('servicios/create_update_ftp', $data, TRUE);
		
		$response = array('mensaje' => $resultado);
		
		$this->output
			->set_status_header(200)
			->set_content_type('application/json', 'utf-8')
			->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
			->_display();
		exit;
	
	}
	
	public function insert_configuracion_ftp () {
			
		$data_ftp = array();
		
		/*----------data configuracion ftp--------*/
		
		$sistema = $this->input->post('sistema[]');
        $sentido = $this->input->post('sentido[]');
		$nombre = $this->input->post('nombre[]');
		$directorio = $this->input->post('directorio[]');
		$modelo_dato = $this->input->post('modelo_dato[]');
		$volumen = $this->input->post('volumen[]');
		$regla_transformacion = $this->input->post('regla_transformacion[]');
		$regla_transporte = $this->input->post('regla_transporte[]');
		$condicion_control_m = $this->input->post('condicion_control_m[]');
		$frecuencia = $this->input->post('frecuencia[]');
		$split = $this->input->post('split[]');
      
		
		/*Carga de la data configuracion ftp*/
		
		for ($i=0; $i < count($sistema); $i++) {
			
			$data_ftp[$i] = array (
					'nombre_archivo' => $nombre[$i],
					'directorio' => $directorio[$i],
					'modelo_datos_id_modelo_dato' => $modelo_dato[$i],
					'volumen' => $volumen[$i],
					'regla_transformacion' => $regla_transformacion[$i],
					'reglas_transporte_id_regla_transporte' => $regla_transporte[$i],
					'condicion_control_m' => $condicion_control_m[$i],
					'frecuencias_ftp_id_frecuencia_ftp' => $frecuencia[$i],
					'split' => $split[$i]		
			);
			
			$datos['mensaje_config'] = $this->Servicios_model->insert_config_ftp($data_ftp[$i]);
			
			$id_servicio = $this->Servicios_model->get_ultimo_servicio();
			
			for ($j=0; $j < count($sistema); $j++) {
			
				$id_conf_ftp = $this->Servicios_model->get_ultima_config_ftp();
				$data_servicios_has_sistema[$j] = array(
						'servicios_id_servicio' => $id_servicio[0]->id,
						'sistemas_id_sistema' => $sistema[$j],
						'sentidos_id_sentido' => $sentido[$j],
						'conf_ftp_id_conf_ftp' => $id_conf_ftp[0]->id
				);
			
		}
 
			$datos['mensaje_sistema'] = $this->Servicios_model->insert_servicio_has_sistema($data_servicios_has_sistema[$i]);
		
		}

		$resultado = $this->load->view('servicios/create_update_1', $datos, TRUE);
		
		$response = array('mensaje' => $resultado);
		
		$this->output
			->set_status_header(200)
			->set_content_type('application/json', 'utf-8')
			->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
			->_display();
		exit;
		
	}
	
	public function carga_vista_anterior_3() {
	
		$resultado = $this->load->view('servicios/create_update_3', array(), TRUE);
	
		$response = array('mensaje' => $resultado);
	
		$this->output
		->set_status_header(200)
		->set_content_type('application/json', 'utf-8')
		->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
		->_display();
		exit;
	}
	
/*------------------------------------------------------------------------------------------------------------------------*/
  
    public function carga_ftp_consult(){
    	
    	$id_servicio = $this->input->post('identificador');
    	//'datos' es lo que la vista necesita para poder administrar la información dentro del arreglo.
    	$data['datos'] = $this->Servicios_model->get_servicio_ftp_edit($id_servicio);
    	    	
    	$this->load->model(array('Vertical_model','Proyectos_model','Esquema_model'));
    	$data['proyectos'] = $this->Proyectos_model->get_all_proyects();
    	$data['verticales'] = $this->Vertical_model->get_verticales_desc();
    	$data['esquemas'] = $this->Esquema_model->get_all_eschema();
    	
    	$data['frec_exc'] = json_decode(FRECUENCIA_FTP);
    	$data['sms_template'] = $this->Servicios_model->get_template_sms();
    	$data['mail_template'] = $this->Servicios_model->get_template_mail();

    	$resultado = $this->load->view('servicios/consult_ftp',$data,TRUE);
    	   	
    	$response = array('mensaje' => $resultado
    	);
		
    	$this->output
    	->set_status_header(200)
    	->set_content_type('application/json', 'utf-8')
    	->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
    	->_display();
    	exit;
    	
    }
    //conecta al model para traer la informacion a editar//
    public function carga_ftp_edit(){
    	
    	$id_servicio = $this->input->post('identificador');
    	//'datos' es lo que la vista necesita para poder administrar la información dentro del arreglo.
    	$data['datos'] = $this->Servicios_model->get_servicio_ftp_edit($id_servicio);
 	 
    	$this->load->model(array('Vertical_model','Proyectos_model','Esquema_model'));
    	
    	$data['proyectos'] = $this->Proyectos_model->get_all_proyects();
    	$data['verticales'] = $this->Vertical_model->get_verticales_desc();
    	$data['esquemas'] = $this->Esquema_model->get_all_eschema();
    	$vista_funcional = $this->parser->parse('servicios/cu_func',$data, TRUE);
    	  	
    	$last_id_servicio = (int)$this->Servicios_model->consulta_id_servicio();
    	$data['next_id_servicio'] = $last_id_servicio + 1;//se le suma 1 al ultimo id_servicio que se cargo
    		 
    	$data['frec_exc'] = json_decode(FRECUENCIA_FTP);
    	$data['sms_template'] = $this->Servicios_model->get_template_sms();
    	$data['mail_template'] = $this->Servicios_model->get_template_mail();
    	$data['sistemas'] = $this->Utilities_model->get_all_applications();
    	$data['origen'] = $this->Servicios_model->get_servicios_origen($id_servicio);
    	$data['destino'] = $this->Servicios_model->get_servicios_destino($id_servicio);
    	
    	$vista_config = $this->parser->parse('servicios/tbl_orig_dest_ftp',$data, array(), TRUE).$this->load->view('servicios/cu_config_ftp1', $data, TRUE);
    	
    	$resultado = $vista_funcional.$vista_config;
    
    	$response = array('mensaje' => $resultado,
    	);
		
    	$this->output
    	->set_status_header(200)
    	->set_content_type('application/json', 'utf-8')
    	->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
    	->_display();
    	exit;
    	
    }
    
    public function delete_servicio_ftp(){
    	
    	$id_servicio = $this->input->post('identificador');
    		
    	$datos['mensaje']= $this->Servicios_model->delete_servicio($id_servicio);
    	
    	$response = array('view' => $this->load->view('servicios/search_ftp',$datos,TRUE));
    	 
    	$this->output
    	->set_status_header(200)
    	->set_content_type('application/json', 'utf-8')
    	->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
    	->_display();
    	exit;
    	
    }
    
    public function carga_imagen_ftp(){
    	
    	$id_servicio = $this->input->post('identificador');
    	
    	$datos['datos']= $this->Servicios_model->get_imagen($id_servicio);

    	$response = array('mensaje' => $this->load->view('servicios/imagen_ftp',$datos,TRUE));
    	
    	$this->output
    	->set_status_header(200)
    	->set_content_type('application/json', 'utf-8')
    	->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
    	->_display();
    	exit;
    	
    }
    
    public function carga_imagen_web(){
    	 
    	$id_servicio = $this->input->post('identificador');
    	 
    	$datos['datos']= $this->Servicios_model->get_imagen($id_servicio);
   
    	$response = array('mensaje' => $this->load->view('servicios/imagen_web',$datos,TRUE));
    	 
    	$this->output
    	->set_status_header(200)
    	->set_content_type('application/json', 'utf-8')
    	->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
    	->_display();
    	exit;
    	 
    }
    
/*funcion que elimina servicios web*/
     public function delete_servicio_web(){
    
    	$id_servicio = $this->input->post('identificador');
    	
        $datos['mensaje']= $this->Servicios_model-> delete_servicio($id_servicio);
      
        $response = array('view' => $this->load->view('servicios/search_web',$datos,TRUE)); 
        	
    	$this->output
            ->set_status_header(200)
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
            ->_display();
    	exit;
		
    }
    
     public function carga_web_consult(){
    	
    	$id_servicio = $this->input->post('identificador');
    	//'datos' es lo que la vista necesita para poder administrar la información dentro del arreglo.
    	$data['datos'] = $this->Servicios_model->get_web_edit($id_servicio);
    	
    	$this->load->model(array('Vertical_model','Proyectos_model','Esquema_model'));
    	$data['proyectos'] = $this->Proyectos_model->get_all_proyects();
    	$data['verticales'] = $this->Vertical_model->get_verticales_desc();
    	$data['esquemas'] = $this->Esquema_model->get_all_eschema();
    	$vista_funcional = $this->parser->parse('servicios/cu_func',$data,TRUE);

    	$resultado = $this->load->view('servicios/consult_web',$data,TRUE);
    	   	
    	$response = array('mensaje' => $resultado,
    	);
		
    	$this->output
    	->set_status_header(200)
    	->set_content_type('application/json', 'utf-8')
    	->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
    	->_display();
    	exit;
    	
    }

    public function carga_web_edit(){
    	
    	$id_servicio = $this->input->post('identificador');
    	//'datos' es lo que la vista necesita para poder administrar la información dentro del arreglo.
    	$data['datos'] = $this->Servicios_model->get_web_edit($id_servicio);
	 	
    	$this->load->model(array('Vertical_model','Proyectos_model','Esquema_model'));
    	
    	$data['proyectos'] = $this->Proyectos_model->get_all_proyects();
    	$data['verticales'] = $this->Vertical_model->get_verticales_desc();
    	$data['esquemas'] = $this->Esquema_model->get_all_eschema();
    	$vista_funcional = $this->parser->parse('servicios/cu_func',$data,TRUE);
    	
    	$data['sistemas'] = $this->Utilities_model->get_all_applications();
    	$data['clientes'] = $this->Servicios_model->get_servicios_cliente($id_servicio);
    	$data['proveedores'] = $this->Servicios_model->get_servicios_proveedor($id_servicio);
     	
    	$last_id_servicio = (int)$this->Servicios_model->consulta_id_servicio();
    	 
    	$data['next_id_servicio'] = $last_id_servicio + 1;
    	
    	$vista_config = $this->load->view('servicios/tbl_client_prov_web', $data, TRUE).$this->load->view('servicios/cu_config_web1',$data, TRUE);
    	
    	$resultado = $vista_funcional.$vista_config;

    	$response = array('mensaje' => $resultado,
    	);
		
    	$this->output
    	->set_status_header(200)
    	->set_content_type('application/json', 'utf-8')
    	->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
    	->_display();
    	exit;  	
    	
    }
    
    public function load_default_content() {   
    	 
    	$resultado =  $this->load->view('servicios/default',array(),TRUE);
        
        $response = array('mensaje' => $resultado);
        
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
	
	private function _carga_diagrama_uml($diagrama_uml, $nombre_servicio) {
		
		$this->_diagrama_uml = $diagrama_uml;
		$this->_nombre_diagrama = $this->_diagrama_uml.'_'.$nombre_servicio;
		
		//se establece la configuracion para guardar la imagen
		
		$config['upload_path'] = FILE_UPLOAD;
		$config['allowed_types'] = 'jpg|jpeg|png|gif';
		$config['file_name'] = $this->_nombre_diagrama;
		$config['max_width'] = "2000";
		$config['max_height'] = "2000";
		
		$this->load->library('upload',$config);
		//$this->upload->initialize($config,false);
		
		if(!$this->upload->do_upload($this->_diagrama_uml)){
			$uploadData = $this->upload->display_errors();
			$dir_uml_image = '';
			 
		}else{
			$uploadData = $this->upload->data();
			//variable con la ruta exacta de la img, que se va a guardar en la bd
			$dir_uml_image = $uploadData['full_path'];
		
		}
		
		return $dir_uml_image;
		
	}

}//end class Servicio
   

   
 