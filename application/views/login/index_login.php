<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$html = "";
$html = $html.'<div class="row" >	'.
				'<div class="col-md-3 col-md-offset-4" >'.						
						img(base_url("assets/img/formlogon_bienvenido2.gif"),FALSE,array('align'=>'left',
	 																					'heigth'=>'15',
 	 																				'width'=>'80')).
 	 			'</div>'.
 	 		'</div>'.
 	 		'<div class="row" >	'.
 	 			'<div class="col-md-4 col-md-offset-4" >';
	 	 			$template = array(
	 	 					'table_open'=>'<table valign="top" align="center" cellpadding="0"
		 										cellspacing="0" width="100%">',
	 	 					'heading_cell_start'    => '<th align="right" height="23">',
	 	 					'row_start'             => '<tr heigth="12" valign="top">',
	 	 			
	 	 				 	
	 	 			);
	 	 			$this->table->set_template($template);
	 	 			$this->table->set_heading(img(base_url("assets/img/formlogon_entrada.gif"),FALSE,array('align'=>'right',
	 	 					'heigth'=>'21',
	 	 					'width'=>'125')));
	 	 			$this->table->add_row("&nbsp;");
	 	 			$this->table->add_row('<p style ="padding-left:5px;" >Coloque su nombre de Usuario y Contrase&ntilde;a.</p>');
	 	 			$this->table->add_row('<p style ="padding-left:10px;">Usuario</p>');
	 	 			$this->table->add_row(form_input(array('name'=>'in_usuario',
	 	 					'id'=>'in_usuario',
	 	 					'placeholder'=>'Ej: yburgo_02')));
	 	 			$this->table->add_row(form_error("in_usuario", '<p style ="padding-left:10px;" class="error">','</p>'));
	 	 			$this->table->add_row('<p style ="padding-left:10px;">Contrase&ntilde;a</p>');
	 	 			$this->table->add_row(form_password(array('name'=>'in_pass',
	 	 					'id'=>'in_pass',
	 	 					'placeholder'=>'********')));
	 	 			//$this->table->add_row(form_error("in_pass", '<p style ="padding-left:10px;" class="error">','</p>'));
	 	 			$this->table->add_row(form_submit(array('name'=>'btn_submit',
	 	 					'class'=>'urBtnStd',
	 	 					'id'=>'btn_submit',	),
	 	 					"Aceptar"));
	 	 			$this->table->add_row("&nbsp;");
	 	 			
	 	 			$html_tabla_form = '<tr><td>'.
	 	 					form_open("login_normal/login",array('id'=>'form_login'),array('op' => '1', )).
	 	 					$this->table->generate().
	 	 					form_close().
	 	 					'</td><tr/>';
	 	 			
	 				$html=$html.$html_tabla_form.
				'</div>'.	
			'</div>'.
      '</div>'.       
    '</body>
</html>';	
              
 echo $html;

?>

							
  

