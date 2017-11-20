<?php


if (!defined('BASEPATH'))
    exit('No direct script access allowed');
?>

<!DOCTYPE html>

 <script type="text/javascript" src="<?php echo base_url('assets/js/helper/func_servicios.js');?>"></script>
 
<div id="msgs"></div>

 <div class="row" >
    <p>
	     Modulo de Administraci&oacute;n de Servicios<br>
	     Por favor complete todos los campos obligatorios<font color="#EC2E38">*</font>
	</p> 
         
 </div> 

<div >
 
 	<?php
    if(isset($mensaje_config) && isset($mensaje_sistema)){
            
 		if($mensaje_config == TRUE && $mensaje_sistema == TRUE){?>
	 	    <div class="alert alert-success fade in">
		        <a href="#" class="close" data-dismiss="alert">&times;</a>
		        <strong>Servicio</strong> Creado con exito.
	       	</div>
 	<?php } else if($mensaje_sistema  == FALSE && $mensaje_config == FALSE){?>
 	 <div class="alert alert-danger fade in">
	        <a href="#" class="close" data-dismiss="alert">&times;</a>
	        <strong>¡Error!</strong> No se ha completado la solicitud.
   	 </div>
     <?php }}?>
     
</div><!--Div para mostrar mensajes en la vista-->
 
  
<div class="row">
     
     <legend>Informaci&oacute;n general del servicio</legend>
     		     	
     <form  id="frm_create_servicio_1"><?php //echo (isset($datos)) ? "frm_update_servicio" : "frm_create_servicio"; ?>  
        
     
     	<div class="row">	    		
            <input type="hidden" name="id_necesidad" value="<?php echo (isset($datos['id_necesidad'])) ? $datos['id_necesidad'] : "";?>">
	        <div class="form-group col-xs-6">                       
	            <span class="campo_obligatorio">*</span>  
	            <label for="numero_requerimiento" class="format">Numero de requerimiento</label>
	            <input autofocus required type="text" id="numero_requerimiento" name="numero_requerimiento"  maxlength="200" class="form-control" value="<?php echo (isset($datos['num_necesidad'])) ? $datos['num_necesidad'] : ""; ?>" <?php echo (isset($datos['num_necesidad'])) ? "readonly": ""; ?> placeholder="DM629"/> 
				  <div id="msg_error_numero_requerimiento"></div>
			</div>      
			
			<div class="form-group col-xs-3">                       
                <span class="campo_obligatorio">*</span>  
                <label for="tipo_necesidad" class="format">Tipo de necesidad</label>
				  <select class="form-control" name="tipo_necesidad" id="tipo_necesidad">
                   <?php  foreach ($necesidades as $necesidad) {?>
                   <option value="<?php echo $necesidad->id_tipo_necesidad;?>" <?php echo (isset($datos['tipos_necesidad_id_tipo_necesidad']) && $datos['tipos_necesidad_id_tipo_necesidad'] == $necesidad->id_tipo_necesidad ) ? "selected" : ""; ?>><?php echo $necesidad->nombre_necesidad;?> </option>
                   <?php  } ?>
              	</select>
			</div>
 				
		</div><!-- end row -->
 
		<div class="row">

            <div class="form-group col-xs-6"> 
            	<span class="campo_obligatorio">*</span>                        
	            <label for="descripcion_requerimiento" class="format">Descripci&oacute;n del requerimiento</label>
	            <textarea class="form-control" required name="descripcion_requerimiento" id="descripcion_requerimiento" rows="5"  maxlength="600" ><?php echo (isset($datos['descripcion_necesidad'])) ? $datos['descripcion_necesidad'] : ""; ?></textarea>
               <div id="msg_error_descripcion_requerimiento"></div>
            </div>

		</div>
		
       	<div class="row">
       		<div class="form-group col-xs-12">
       			<input type="button" class="btn btn-default" name="siguiente_1" id="siguiente_1" value="Siguiente"/>	
       		</div>
       	</div>
     		
    </form>
</div>
