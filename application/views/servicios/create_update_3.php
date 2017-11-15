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
    exit('No direct script access allowed');
?>

<!DOCTYPE html>

<script type="text/javascript" src="<?php echo base_url('assets/js/helper/func_servicios.js');?>"></script>
 

<div class="row" >
    <p>
	     Modulo de Administraci&oacute;n de Servicios<br>
	     Por favor complete todos los campos obligatorios<font color="#EC2E38">*</font>
	</p> 
         
</div> 
 
<div class="row">
     
     <legend>Informaci&oacute;n general del servicio</legend>
     		     	
     <form  id="frm_create_servicio_3"><?php //echo (isset($datos)) ? "frm_update_servicio" : "frm_create_servicio"; ?>  
     
		<div class="row">
			<input autofocus type="hidden" name="tipo_servicio" id="tipo_servicio_premisa" value="<?php echo $tipo_servicio; ?>" />
			<input type="hidden" name="cantidad_sistemas_origen" value="<?php echo $cantidad_sistemas_origen; ?>" >
     		<input type="hidden" name="cantidad_sistemas_destino" value="<?php echo $cantidad_sistemas_destino; ?>" >
			<input type="hidden" name="numero_premisas" value="<?php echo $premisas; ?>" >
					
		<?php if(isset($premisas)) {
				for($i=1; $i <= $premisas; $i++) {
		?>
            <div class="form-group col-xs-6"> 
            	<span class="campo_obligatorio">*</span>                        
	            <label for="premisa" class="format">Premisa <?php echo $i; ?></label>
	            <textarea class="form-control" name="premisa[]" id="premisa" rows="5"  maxlength="600" ><?php echo (isset($datos['Premisas'])) ? $datos['Premisas'] : ""; ?></textarea>
               <div id="msg_error_premisa"></div>

            </div>

		<?php }} ?>
		
		</div><!-- end row -->
     
       	<div class="row">
            <!--
       		<div class="form-group col-xs-9">
       			<input type="button" class="btn btn-default" name="anterior_3" id="anterior_3" value="Anterior"/>	
       		</div>
            -->
       		<div class="form-group col-xs-3">
       			<input type="button" class="btn btn-default" name="siguiente_3" id="siguiente_3" value="Siguiente"/>	
       		</div>
       	</div>
     		
    </form>
</div>
