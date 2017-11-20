<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
?>

<!DOCTYPE html>

<script type="text/javascript" src="<?php echo base_url('assets/js/helper/func_documentos.js');?>"></script>

 <div class="row" >
    <p>
	     Modulo de Administraci&oacute;n de Documentos<br>
	</p> 
         
</div> 

<div id="msgs"></div><!--Div para mostrar mensajes en la vista-->
 
<div class="row">
     
     <legend>Seleccione el tipo de servicio del que quiere generar el documento</legend>
     		     	
     <form  id= "frm_tipo_servicio">
     
     	<div class="row">   
     	
     		<div class="form-group col-xs-4">                       
		        <span class="campo_obligatorio">*</span>  
		        <label for="tipo_servicio" class="format">Tipo de servicio</label>
	            <select class="form-control" name="tipo_servicio" id="tipo_servicio">
			        <?php  foreach ($tipos_servicio as $tipo_servicio) {?>
		            <option value="<?php echo $tipo_servicio->id_tipo_servicio;?>" <?php echo (isset($datos['tipos_servicios_id_tipo_servicio']) && $datos['tipos_servicios_id_tipo_servicio'] == $tipo_servicio->id_tipo_servicio ) ? "selected" : ""; ?> > <?php echo $tipo_servicio->nombre_tipo_servicio ;?> </option>
		            <?php } ?>
	            </select>
			</div>     
 
									
		</div><!-- end row -->
		
		<div class="row">
       		<div class="form-group col-xs-12">
       			<input type="button" class="btn btn-default" name="siguiente_tipo_servicio_consultar" id="siguiente_tipo_servicio_consultar" value="Siguiente"/>	
       		</div>
       	</div>
	
    </form>
</div>
