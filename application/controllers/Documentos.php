<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Documentos extends CI_Controller{
   function __construct() {
        parent::__construct();

        $this->load->model('Menu_model');
        $this->load->model(array('Servicios_model','Vertical_model','Esquema_model','Sistemas_aplicaciones_model'));$this->load->helper("datatables_helper");
        $this->load->library('PDF_HTML');


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

   //se carga vista de servicios ftp o servicios web
   public function carga_tabla_servicios(){

    	$id_tipo_servicio = filter_input(INPUT_POST, 'tipo_servicio');

    	switch ($id_tipo_servicio) {

    		case "1":

    			$vista_config = $this->load->view('documentos/documentos_ftp',array(),TRUE);

    			break;

    		case "2":

    			$vista_config = $this->load->view('documentos/documentos_web',array(),TRUE);

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
	    	-> add_column('Acciones', get_buttons_print('$1','servicios'),'id_servicio')
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
	    	-> add_column('Acciones', get_buttons_print('$1','servicios'),'id_servicio')
	    	-> from ('servicios')
	    	-> join ('necesidades','necesidades.id_necesidad = servicios.necesidades_id_necesidad')
         -> join ('tipos_necesidad','necesidades.tipos_necesidad_id_tipo_necesidad = tipos_necesidad.id_tipo_necesidad')
         -> join ('esquemas','esquemas.id_esquema = servicios.esquemas_id_esquema')
         -> join ('verticales','verticales.id_vertical = servicios.verticales_id_vertical')
	    	->where(array('status_servicio'=>'1','tipos_servicios_id_tipo_servicio'=>'2'));

    	echo $this->datatables->generate();
    }

   public function generar_documento_etf($id_documento) {

      $servicio = $this->Servicios_model->get_documento_servicio($id_documento);
      $servicio_has_sistema = $this->Servicios_model->get_documento_servicio_has_sistema($id_documento);
      $premisas = $this->Servicios_model->get_premisas_documento($id_documento);
      $necesidades = $this->Servicios_model->get_necesidades_documento($id_documento);

/*
      var_dump($servicio_has_sistema);
      exit();
*/

		$pdf=new PDF_HTML();
		$pdf->AddPage();

		        //-------------------------------------------------------------------------------------------------------------------------

		$pdf->SetMargins(10, 10);

		$pdf->SetFont('Arial');
		$pdf->Image(base_url('assets/img/logo_etf.png'),60,50,-180);

		$miCabecera = array('Proceso:','Nombre del Documento:','Proyecto','Preparado por:', 'fecha diseño Técnico','Servicio:');
		$data = array($servicio['nombre_vertical'], $servicio['identificador_vertical'].$servicio['nombre'], $necesidades['num_necesidad'] ,$this->session->userdata('name'),date('t/n/Y'), $servicio['nombre']);



		$pdf->Ln(90);
		$pdf->Cell(0,20,utf8_decode('Documento de Especificaciones PIC para el Caso de uso '),1,1,'C');
		$pdf->AliasNbPages();
		$pdf->AddPage();
		$pdf->SetAutoPageBreak(true, 20);
		$pdf->Cell(60,10,utf8_decode('IDENTIFICACIÓN DEL PROYECTO'),0,1,'C');
		$pdf->Ln(5);

		// Carga de datos
		$pdf->SetFont('Arial','',14);

		$pdf->cabeceraVertical($miCabecera,10,50,50);
		$pdf->datosVerticales($data,60,50,130);
		$pdf->Ln(10);
		$pdf->setx(5);

		$pdf->Cell(60,10,utf8_decode('DETALLES DEL DOCUMENTO'),0,1,'C');

		/*----------------------------------------------------------------------NO TOCAR------------------------------------------------------------
		$miCabecera = array('Versión', 'Fecha','Elaborado Por','Revisado Por','Descripción');
		$data = array('1', '2 '..,'3 '.$this->session->userdata('name').,'4','5');
      ----------------------------------------------------------------------------------------------------------------------------------------------*/

    $miCabecera = array('Versión', 'Fecha','Elaborado Por','Descripción');
		$data = array('1', date('t/n/Y'),$this->session->userdata('name'),$necesidades['descripcion_necesidad']);

		$posy=$pdf->gety();
   
      $pdf->SetWidths(array(30,50,30,40));
      $str=count($miCabecera);
      for($i=0;$i<$str;$i++){
         $pdf->Row(array($miCabecera[$i],$data[$i]));
      }

    /*
    $str=$pdf->contar($miCabecera);
    $pdf->cabeceraHorizontal($miCabecera,10,7+$posy,$str);
		$pdf->datosHorizontal($data,10,14+$posy,$str, $miCabecera);
    */
		$pdf->AddPage();
		$pdf->SetAutoPageBreak(true, 30);
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(50,10,utf8_decode('TABLA DE CONTENIDOS'),0,1,'L');

		$pdf->AddPage();
		$pdf->Cell(50,10,utf8_decode('1.- Introducción'),0,1,'L');

		$pdf->SetFont('Arial','',10);

		$pdf->MultiCell(0,5, utf8_decode($servicio['introduccion']),0,'J',false);
		$pdf->Ln(10);
		$pdf->SetX(30);
		$pdf->SetFont('Arial','B',10);
      $pdf->Cell(0,10,utf8_decode('1.1- Premisas'),0,1,'L');

    foreach($premisas as $premisa){
      $pdf->SetFont('Arial','',10);
      $pdf->SetX(30);
      $pdf->MultiCell(0,5, utf8_decode($premisa->descripcion_premisa),0,'J',false);
    }

		$pdf->Ln(10);
		$pdf->SetFont('Arial','B',10);
		$pdf->SetX(30);

		$pdf->Cell(0,10,utf8_decode('Característica básica de los servicios:'),0,1,'L');
		$pdf->Ln(5);
		$pdf->SetX(30);

		$pdf->Cell(0,10,utf8_decode('Nombre del servicio: '.$servicio['nombre']),0,1,'L');
      //	$pdf->MultiCell(0,5, utf8_decode($servicio['nombre']),0,'J',false);
	  $pdf->Ln(10);
	  
		$miCabecera = array('Prioridad:', 'Sentido','Procesamiento','Frecuencia','Volumen','Tamaño','Retorno');
		$str=$pdf->contar($miCabecera);

		$data = array('1'.$servicio['nombre_procesamiento'], '2','3'.$servicio['nombre_procesamiento'],'4'.$servicio['nombre_frecuencia'],'5','6','7');

		//$posy=$pdf->gety();
		$pdf->SetX(30);
      $pdf->SetWidths(array(30,30,30,40));
	  $str=count($miCabecera);
	 
      for($i=0;$i<$str;$i++){
		$pdf->SetX(30);
         $pdf->Row(array($miCabecera[$i],$data[$i]));
      }
		$pdf->Ln(20);
		$pdf->SetFont('Arial','B',12);
		$pdf->SetX(20);

		$pdf->Cell(0,10,utf8_decode('2.-	Especificaciones Funcionales de Interfases'),0,1,'L');
		$pdf->Ln(5);
		$pdf->SetFont('Arial','B',10);
		$pdf->SetX(30);

		$pdf->Cell(0,10,utf8_decode('2.1.-	Descripción del Proceso'),0,1,'L');
		$pdf->SetFont('Arial','',10);
		$pdf->SetX(30);

		$pdf->MultiCell(0,5, utf8_decode($servicio['descripcion_proceso']),0,'J',false);

		$pdf->Ln(10);
		$pdf->SetFont('Arial','B',10);
		$pdf->SetX(30);
		$pdf->Cell(0,10,utf8_decode('2.2.-	Casos de Uso Identificados'),0,1,'L');
		$pdf->SetFont('Arial','',10);
		$pdf->SetX(30);
		$pdf->MultiCell(0,5, utf8_decode(''),0,'J',false);
		$pdf->Ln(10);


		$miCabecera = array('Nombre', 'Paso','Cliente','Proveedor','Síncrono/ Asíncrono','Online/ Batch','Volumen','Tiempo de Respuesta');
      $paso=1;
		$data = array('1'.$servicio['nombre'], $paso, '2','4','5','6','7','8');
      /*
 	  $posy=$pdf->gety();
		$pdf->cabeceraVertical($miCabecera,30,10+$posy,50);
		$pdf->datosVerticales($data,80,10+$posy,120);
      */
	  $pdf->SetX(30);	  
	  $pdf->SetWidths(array(30,30,30,40));
	  $str=count($miCabecera);
	  $pdf->SetX(30);	  
	  
      for($i=0;$i<$str;$i++){
		$pdf->SetX(30);		
		 $pdf->Row(array($miCabecera[$i],$data[$i]));
		 $paso++;		 
      }
	   $pdf->AliasNbPages();
		$pdf->Ln(20);
		$pdf->SetFont('Arial','B',12);
		$pdf->SetX(20);
		$pdf->SetFont('Arial','B',10);
		$pdf->SetX(45);

		$pdf->Cell(0,10,utf8_decode('2.2.1.-	Caso de Uso: Nombre de caso de uso'),0,1,'L');
		$pdf->SetX(50);
    /*
		$pdf->Cell(0,10,utf8_decode('2.2.1.1.-	Descripción Funcional'),0,1,'L');
		$pdf->SetFont('Arial','',10);

		$pdf->SetX(50);
		$pdf->MultiCell(0,5, utf8_decode($servicio['descripcion_proceso']),0,'J',false);
    */
		$pdf->Ln(10);
		$pdf->SetFont('Arial','B',10);
		$pdf->SetX(50);
		$pdf->Cell(0,10,utf8_decode('2.2.1.2	Eventos de Inicio/Disparadores'),0,1,'L');
		$pdf->SetFont('Arial','',10);
		$pdf->SetX(50);
		$pdf->MultiCell(0,5, utf8_decode($servicio['evento_disparador']),0,'J',false);
		$pdf->Ln(10);
		$pdf->SetFont('Arial','B',10);
		$pdf->SetX(50);

      /*--------------------------------------------------------NO TOCAR--------------------------------------------------------------------------
		$pdf->Cell(0,10,utf8_decode('2.2.1.3	Excepciones'),0,1,'L');
		$pdf->SetFont('Arial','',10);
		$pdf->SetX(50);
		$pdf->MultiCell(0,5, utf8_decode($datos[0]->),0,'J',false);
      ---------------------------------------------------------------------------------------------------------------------------------------*/

		$pdf->Ln(10);
		$pdf->SetFont('Arial','B',10);
		$pdf->SetX(50);
/*
		$pdf->Cell(0,10,utf8_decode('2.2.1.4	Servicio [respuestaDeFactibilidadyOS]'),0,1,'L');
		$pdf->SetFont('Arial','',10);
		$pdf->SetX(50);
		$pdf->MultiCell(0,5, utf8_decode('ver que va aqui'),0,'J',false);
*/
		$pdf->SetFont('Arial','B',10);
		$pdf->Ln(10);

		$pdf->SetX(20);
		$pdf->Cell(0,10,utf8_decode('3.-	Especificaciones Técnicas Generales de Interfases'),0,1,'L');
		$pdf->SetX(30);

		$pdf->Cell(0,10,utf8_decode('3.1.-	Arquitectura del sistema con el que se conectará:'),0,1,'L');
		$pdf->SetFont('Arial','',10);
		$pdf->SetX(30);
		$pdf->MultiCell(0,5, utf8_decode($servicio['arquitectura_sistema_conexion']),0,'J',false);
		$pdf->Ln(10);
		$pdf->SetFont('Arial','B',10);
		$pdf->SetX(30);
/*
		$pdf->Cell(0,10,utf8_decode('3.2.- Conectividad'),0,1,'L');
		$pdf->SetFont('Arial','',10);
		$pdf->SetX(30);
		$pdf->MultiCell(0,5, utf8_decode('ver que va aqui'),0,'J',false);
*/
		$pdf->Ln(10);
		$pdf->SetFont('Arial','B',10);
		$pdf->SetX(30);
    /*
		$pdf->Cell(0,10,utf8_decode('3.3.- Protocolo'),0,1,'L');
		$pdf->SetFont('Arial','',10);
		$pdf->SetX(30);

		$pdf->MultiCell(0,5, utf8_decode('ver que va aqui'),0,'J',false);
*/

		$pdf->Ln(10);
		$pdf->SetFont('Arial','B',10);
		$pdf->SetX(30);
		$pdf->Cell(0,10,utf8_decode('3.4.-	Parámetros de configuración:'),0,1,'L');
		$pdf->SetFont('Arial','',10);
		//$pdf->SetX(30);
		//$pdf->MultiCell(0,5, utf8_decode('colocar despues'),0,'J',false);
      
      $miCabecera = array('Nombre', 'Directorio','Modelo de datos','regla de transformación','Volumen','Frecuencia','Regla de transporte','Split');

		$data = array($servicio_has_sistema['nombre_archivo'],$servicio_has_sistema['directorio'], $servicio_has_sistema['nombre_modelo_dato'],$servicio_has_sistema['regla_transformacion'],$servicio_has_sistema['volumen'],$servicio_has_sistema['nombre_frecuencia_ftp'],$servicio_has_sistema['nombre_regla_transporte'],$servicio_has_sistema['split']);
      /*
 	  $posy=$pdf->gety();
		$pdf->cabeceraVertical($miCabecera,30,10+$posy,50);
		$pdf->datosVerticales($data,80,10+$posy,120);
	  */
	  $pdf->SetX(30);	
	  
      $pdf->SetWidths(array(30,30,30,40));
      $str=count($miCabecera);
      for($i=0;$i<$str;$i++){

		$pdf->SetX(30);	
		$pdf->Row(array($miCabecera[$i],$data[$i]));
         $paso++;
      }
      
      

		$pdf->Ln(10);
		$pdf->SetFont('Arial','B',10);
		$pdf->SetX(30);

      /*
		$pdf->Cell(0,10,utf8_decode('3.5.-	Manejo de Errores.:'),0,1,'L');
		$pdf->SetFont('Arial','',10);
		$pdf->SetX(30);
		$pdf->MultiCell(0,5, utf8_decode('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras quis odio a orci eleifend auctor. In tincidunt quam lorem, eleifend varius enim semper ut. Nam at metus accumsan ex maximus scelerisque. Ut suscipit velit non ligula consequat elementum. In eget condimentum libero, vitae mattis sapien. Donec malesuada elit sit amet nulla pretium luctus. Duis facilisis pretium enim, ac tristique turpis congue a. Etiam blandit finibus enim, eu ornare est mollis non. Pellentesque accumsan tellus volutpat, gravida elit sed, fermentum lacus. Proin pellentesque nec tortor a dapibus. Cras interdum sem luctus ex pretium venenatis. Donec euismod aliquam mi. Aenean gravida ac diam facilisis lacinia. Proin egestas, tortor nec posuere dignissim, nisl metus blandit dui, eget pulvinar nisi mauris quis lacus. Donec finibus libero in tellus gravida mattis. Etiam non tellus nunc.'),0,'J',false);
      */





		return $pdf->Output();

   }

}
