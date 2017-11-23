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
      $conf_web = $this->Servicios_model->get_documento_conf_web($id_documento);

		$pdf=new PDF_HTML();
		$pdf->AddPage();

		        //-------------------------------------------------------------------------------------------------------------------------

		$pdf->SetMargins(10, 10);

		$pdf->SetFont('Arial');
		$pdf->Image(base_url('assets/img/logo_etf.png'),60,50,-180);

		$miCabecera = array('Proceso:','Nombre del Documento:','Proyecto','Preparado por:', 'fecha diseño Técnico','Servicio:');
		$data = array($servicio['nombre_vertical'], $servicio['identificador_vertical'].$servicio['nombre'], $necesidades['num_necesidad'] ,$this->session->userdata('name'),date('t/n/Y'), $servicio['nombre']);



		$pdf->Ln(90);
		$pdf->Cell(0,20,utf8_decode('Documento de Especificaciones Tecnicas PIC para el servicio '.$servicio['nombre']),1,1,'C');
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
		$pdf->Ln(10);

    $miCabecera = array('Versión', 'Fecha','Elaborado Por','Descripción');
		$data = array('1', date('t/n/Y'),$this->session->userdata('name'),$necesidades['descripcion_necesidad']);

		$posy=$pdf->gety();
   
      $pdf->SetWidths(array(30,50,30,40));
      $str=count($miCabecera);
      for($i=0;$i<$str;$i++){
         $pdf->Row(array($miCabecera[$i],$data[$i]));
      }

		$pdf->AddPage();
      $pdf->SetFont('Arial','B',12);
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
	  
		$miCabecera = array('Prioridad:', 'Sentido','Procesamiento','Frecuencia');
		$str=$pdf->contar($miCabecera);
      
      $sentido='';
      for($i=0; $i<count($servicio_has_sistema); $i++){
         $sentido=$sentido.' '.$servicio_has_sistema[$i]['nombre_sistema'].' '.$servicio_has_sistema[$i]['nombre_sentido'];
      }

		$data = array($servicio['nombre_procesamiento'], $sentido,$servicio['nombre_procesamiento'],$servicio['nombre_frecuencia']);
		
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
      
      $pdf->AddPage();
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

      $posy=$pdf->gety();
		$miCabecera = array('Nombre', 'Paso','Cliente','Proveedor','Síncrono/ Asíncrono','FTP/ WEB','Volumen');

      $data=array();
      for($i=0;$i<count($servicio_has_sistema);$i++){
         
         if($servicio_has_sistema[$i]['sentidos_id_sentido']=='1'){
            $data = array($servicio['nombre'], $i+1 ,$servicio_has_sistema[$i+1]['nombre_sistema'], $servicio_has_sistema[$i]['nombre_sistema'],$servicio['nombre_procesamiento'],$servicio['nombre_tipo_servicio'],$servicio_has_sistema[$i]['volumen']);     
            
         }

      }

 	  $posy=$pdf->gety();
		$pdf->cabeceraVertical($miCabecera,30,10+$posy,50);
		$pdf->datosVerticales($data,80,10+$posy,120);
   
	  $pdf->SetX(30);	

	   $pdf->AliasNbPages();
		$pdf->Ln(20);
		$pdf->SetFont('Arial','B',12);
		$pdf->SetX(20);
		$pdf->SetFont('Arial','B',10);
		$pdf->SetX(45);

		$pdf->Cell(0,10,utf8_decode('2.2.1.-	Caso de Uso: '.$servicio['nombre']),0,1,'L');
		$pdf->SetX(50);

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

		$pdf->Ln(10);
		$pdf->SetFont('Arial','B',10);
		$pdf->SetX(50);

		$pdf->SetFont('Arial','B',10);
		$pdf->Ln(10);

		$pdf->SetX(20);
      $pdf->AddPage();
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
      $pdf->SetX(30);	

      if($servicio['nombre_tipo_servicio'] == 'FTP'){
            //----------------------------------------------tabla ftp--------------------------------------------------
         $pdf->Ln(10);  
         $pdf->SetFont('Arial','B',10);
         $pdf->SetX(30);
         $pdf->Cell(0,10,utf8_decode('3.4.-	Parámetros de configuración FTP:'),0,1,'L');
         $pdf->SetFont('Arial','',10);
         //$pdf->SetX(30);
         //$pdf->MultiCell(0,5, utf8_decode('colocar despues'),0,'J',false);

         $miCabecera = array('Nombre', 'Directorio','Modelo de datos','regla de transformación','Volumen','Frecuencia','Regla de transporte','Split');
         $data=array();
         for($i=0;$i<count($servicio_has_sistema);$i++){
  
               $data [0]= $servicio_has_sistema[$i]['nombre_archivo'];
               $data [1]= $servicio_has_sistema[$i]['directorio'];
               $data [2]=  $servicio_has_sistema[$i]['nombre_modelo_dato'];
               $data [3]=   $servicio_has_sistema[$i]['regla_transformacion'];
               $data [4]= $data [$i]=    $servicio_has_sistema[$i]['volumen'];
               $data [5]=    $servicio_has_sistema[$i]['nombre_frecuencia_ftp'];
               $data [6]=    $servicio_has_sistema[$i]['nombre_regla_transporte'];
               $data[7]=$servicio_has_sistema[$i]['split'];

            $pdf->Ln(15);  
 
            $pdf->SetX(30);	
            $pdf->Cell(0,10,utf8_decode('Configuracion de '.$servicio_has_sistema[$i]['nombre_sentido'].' del archivo '.$servicio_has_sistema[$i]['nombre_archivo']),0,1,'L');


            for($j=0;$j<count($data);$j++){
            $pdf->SetX(30);	
            $pdf->Row(array($miCabecera[$j],$data[$j])); 
            }
         }
         


      }elseif($servicio['nombre_tipo_servicio'] == 'WEB'){
           //-------------------------------------------tabla web---------------------------------------------
         $pdf->Ln(10);
         $pdf->SetFont('Arial','B',10);
         $pdf->SetX(30);
         $pdf->Cell(0,10,utf8_decode('3.4.-	Parámetros de configuración WEB:'),0,1,'L');
         $pdf->SetFont('Arial','',10);

         $miCabecera = array('WSDL desarrollo', 'WSDL calidad','WSDL producción');

         $data=array($conf_web[0]['url_wsdl'], $conf_web[1]['url_wsdl'], $conf_web[2]['url_wsdl']);
        $posy=$pdf->gety();
         $pdf->cabeceraVertical($miCabecera,30,10+$posy,50);
         $pdf->datosVerticales($data,80,10+$posy,120);
         
      }
      //-----------------------------------------------------------------------------------------
      	  
	  $pdf->SetX(30);	

		$pdf->Ln(10);
		$pdf->SetFont('Arial','B',10);
		$pdf->SetX(30);

		return $pdf->Output('ETF_'.$servicio['identificador_vertical'].$servicio['nombre'].'_'. date('t/n/Y').'.pdf','i');

   }

}
