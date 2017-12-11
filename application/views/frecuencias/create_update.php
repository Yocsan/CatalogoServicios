<?php
// creacion de la vista del modulo
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
?>

<!DOCTYPE html>
 <script type="text/javascript" src="<?php echo base_url('assets/js/helper/func_frecuencias.js');?>"></script>
 

 <div class="row" >
     <p>
	     Administraci&oacute;n de Frecuencias</br>
	     Por favor complete todos los campos obligatorios <font color="#EC2E38">*</font>
     </p>
 </div> 
 <div id="msgs"></div><!--Div para mostrar mensajes en la vista-->
 
<div class="row">
     <form  id="<?php echo (isset($datos)) ? "frm_edit_frecuencia" : "frm_create_frecuencia"; ?>">
     
     	<div class="row">
     		<div class="form-group col-xs-5">
	            <span class="campo_obligatorio">*</span>              
	            <label  for="nombre_frecuencia" class="format">Nombre de la frecuencia</label>
	            <input type="text" class="form-control" id="nombre_frecuencia" name="nombre_frecuencia" minlength="2" maxlength="20" value="<?php echo (isset($datos['nombre_frecuencias'])) ? $datos['nombre_frecuencias'] : ''; ?>" placeholder="Ej: AT" onpaste="return false" <?php echo (isset($datos)) ? "readonly" : ""; ?>/> 
	            <div id="msg_error_nombre_frecuencia"></div>
        	</div>
		</div>
        
        
		
		<div class="row">
			<div class="col-xs-12">
				<input type="submit" class="btn btn-default" name="btn_enviar_frecuencia"  value="Guardar"/>
			</div>
		</div>
                   
	</form>
	
</div>
