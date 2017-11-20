<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
?>

<!DOCTYPE html>
 <script type="text/javascript" src="<?php echo base_url('assets/js/helper/func_verticales.js');?>"></script>
 

 <div class="row" >
     <p>
	     Modulo de Administraci&oacute;n de las Verticales</br>
	     Por favor complete todos los campos obligatorios <font color="#EC2E38">*</font>
     </p>
 </div> 
 <div id="msgs"></div><!--Div para mostrar mensajes en la vista-->
 
<div class="row">
     <form  id="<?php echo (isset($datos)) ? "frm_edit_vertical" : "frm_create_vertical"; ?>">
     
     	<div class="row">
     		<div class="form-group col-xs-5">
	            <span class="campo_obligatorio">*</span>              
	            <label  for="identificador_vertical" class="format">Identificador de la Vertical</label>
	            <input type="text" class="form-control" id="identificador_vertical" name="identificador_vertical" minlength="2" maxlength="10" value="<?php echo (isset($datos['identificador_vertical'])) ? $datos['identificador_vertical'] : ''; ?>" placeholder="Ej: AT" onpaste="return false" <?php echo (isset($datos)) ? "readonly" : ""; ?>/> 
	            <div id="msg_error_identificador_vertical"></div>
        	</div>
		</div>
        
        <div class="row">
        	<div class="form-group col-xs-5">                       
	            <span class="campo_obligatorio">*</span>  
	            <label for="nombre_vertical" class="format">Descripci&oacute;n de la Vertical</label>
	            <input type="text" id="nombre_vertical" required name="nombre_vertical"  maxlength="100" class="form-control" value="<?php echo (isset($datos['nombre_vertical'])) ? $datos['nombre_vertical'] : ""; ?>"placeholder="Ej: Atencion total"/> 
	             <div id="msg_error_descripcion_esquema"></div>
            </div> 
        </div>    
		
		<div class="row">
			<div class="col-xs-12">
				<input type="submit" class="btn btn-default" name="<?php echo (isset($datos)) ? "btn_edit_vertical" : "btn_enviar_vertical"; ?>"  value="Guardar"/>
			</div>
		</div>
                   
	</form>
	
</div>
