<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * @autor TSU. Yocsan Burgos  <yocsan19@gmail.com>
 * @fecha_creacion 06/10/2016
 */

if (!defined('BASEPATH'))
	exit('No direct script access allowed')
	
?>
<!--Primer paso del Form para servicios -->

<script type="text/javascript" src="<?php echo base_url('assets/js/helper/func_sistemas.js');?>"></script>

<div class="row">

	<p>
		 Modulo de Administraci&oacute;n de los Sistemas</br>
	     Por favor complete todos los campos obligatorios<font color="#EC2E38">*</font>
    </p>

</div>


 <div id="msgs">

</div><!--Div para mostrar mensajes en la vista-->
 
<div class="row" >

	  <form id="<?php echo (isset($datos)) ? "frm_edit_sistemas" : "frm_create_sistemas"; ?>">
        <fieldset>
				<legend>Elija el tipo de sistema que desea agregar</legend>
				<input type="hidden" name="id_sistema" value = "<?php echo (isset($datos['id_sistema'])) ? $datos['id_sistema'] : ""; ?>" >
		        <div class="row"> 
		            <div class="form-group col-xs-6 ">                       
		                <span class="campo_obligatorio">*</span>  
		                <label for="nombre_sistema" class="format"> Nombre del Sistema</label>
		                <input type="text" required id="nombre_sistema" name="nombre_sistema"  maxlength="200"  class="form-control" value="<?php echo (isset($datos['nombre_sistema'])) ? $datos['nombre_sistema'] : ""; ?>" placeholder="Ej: KENAN"/>
		                <div id="msg_error_nombre_sistema"></div>  
		            </div>
		        </div>
		         
				<div class="row">
					<div class="form-group col-xs-6">                       
			            <label for="descripcion_sistema" class="format">Descripci&oacute;n del sistema</label>
			            <textarea class="form-control" name="descripcion_sistema" id="descripcion_sistema" rows="5"  maxlength="300" ><?php echo (isset($datos['descripcion'])) ? $datos['descripcion'] : ""; ?></textarea>
		            </div>
				</div>    
		        	        
		        <div class="row">
		        	<div class="col-xs-12">
		        		<input type="submit" class="btn btn-default" name="guardar" value="Guardar"/> 
		        	</div>
		        </div>      
    	</fieldset>  
	</form>
		
	
</div><!-- end div row-->
