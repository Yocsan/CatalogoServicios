<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
?>

<!DOCTYPE html>
 <script type="text/javascript" src="<?php echo base_url('assets/js/helper/func_esquemas.js');?>"></script>
 

 <div class="row" >
     <p>
	     Modulo de Administraci&oacute;n de los Esquemas</br>
	     Por favor complete todos los campos obligatorios <font color="#EC2E38">*</font>
     </p>
 </div> 
 <div id="msgs"></div><!--Div para mostrar mensajes en la vista-->
 
<div class="row">
     <form  id="<?php echo (isset($datos)) ? "frm_edit_esquema" : "frm_create_esquema"; ?>">
     
     	<div class="row">
     		<div class="form-group col-xs-5">
	            <span class="campo_obligatorio">*</span>              
	            <label  for="nombre_esquema" class="format">Nombre del esquema</label>
	            <input type="text" class="form-control" id="nombre_esquema" name="nombre_esquema" minlength="2" maxlength="10" value="<?php echo (isset($datos['nombre_esquema'])) ? $datos['nombre_esquema'] : ''; ?>" placeholder="Ej: AT" onpaste="return false" <?php echo (isset($datos)) ? "readonly" : ""; ?>/> 
	            <div id="msg_error_nombre_esquema"></div>
        	</div>
		</div>
        
        <div class="row">
        	<div class="form-group col-xs-5">                       
	            <span class="campo_obligatorio">*</span>  
	            <label for="descripcion_esquema" class="format">Descripci&oacute;n del esquema</label>
	            <input type="text" id="descripcion_esquema" required name="descripcion_esquema"  maxlength="100" class="form-control" value="<?php echo (isset($datos['descripcion_esquema'])) ? $datos['descripcion_esquema'] : ""; ?>"placeholder="Ej: Atencion total"/> 
	             <div id="msg_error_descripcion_esquema"></div>
            </div> 
        </div>    
		
		<div class="row">
			<div class="col-xs-12">
				<input type="submit" class="btn btn-default" name="<?php echo (isset($datos)) ? "btn_edit_esquema" : "btn_enviar_esquema"; ?>"  value="Guardar"/>
			</div>
		</div>
                   
	</form>
	
</div>
