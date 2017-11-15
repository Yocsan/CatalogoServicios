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

<script type="text/javascript" src="<?php echo base_url('assets/js/helper/func_servicios.js');?>"></script>

 <div class="row" >
    <p>
	     Modulo de Administraci&oacute;n de Servicios<br>
	     Por favor complete todos los campos obligatorios<font color="#EC2E38">*</font>
	</p> 
         
</div> 

<div class="row">

     <form  id="frm_servicios_ftp"<?php //echo (isset($datos)) ? "frm_servicio_ftp" : "frm_servicios_ftp"; ?>>
          
     	<fieldset>
     	
     		<legend>Informaci&oacute;n del servicio FTP</legend>
	
     		<!--------------------------------------------------Origen------------------------------------------------------------------->
	
     		<?php for ($i=1; $i <= $cantidad_sistemas_origen; $i++ ) { ?>
     		
     		<legend>Configuracion de Origen <?php echo $i; ?>: </legend>
     		     		
     		<div class="row">
     											
				<div class="form-group col-xs-3">                       
                <span class="campo_obligatorio">*</span>  
                <label for="sistema" class="format">Sistema de origen</label>
                <select class="form-control" name="sistema[]" id="sistema">
                   <?php  foreach ($sistemas as $sistema) {?>
                   <option value="<?php echo $sistema->id_sistema;?>" <?php echo (isset($datos['id_vertical']) && $datos['id_vertical'] == $sistema->id_sistema ) ? "selected" : ""; ?>><?php echo $sistema->nombre_sistema;?> </option>
                   <?php  } ?>
               </select>
               <input type="hidden" name="sentido[]" value="1">
               
				</div>	
							
	        <div class="form-group col-xs-3">                       
	                <span class="campo_obligatorio">*</span>  
	                <label for="nombre" class="format">Nombre del archivo</label>
	                <input autofocus type="text" id="nombre" name="nombre[]"  maxlength="200" class="form-control" value="<?php echo (isset($datos['Sistema_origen'])) ? $datos['Sistema_origen'] : ""; ?>" placeholder="SPPSINTRA02"/> 
                             <div id="msg_error_nombre"></div>

				</div>        
				         
	         	<div class="form-group col-xs-3">                       
	                <span class="campo_obligatorio">*</span>  
	                <label for="directorio" class="format">Directorio</label>
	                <input type="text" id="directorio" name="directorio[]"  maxlength="200" class="form-control" value="<?php echo (isset($datos['Sistema_origen'])) ? $datos['Sistema_origen'] : ""; ?>" placeholder="Ej: 21"/> 
                                 <div id="msg_error_directorio"></div>

				</div>   
													   
	            <div class="form-group col-xs-3">                       
	                <span class="campo_obligatorio">*</span>  
	                <label for="modelo_dato" class="format">Modelo de datos</label>
	                <select class="form-control" name="modelo_dato[]" id="modelo_dato">
                      <?php  foreach ($modelo_datos as $modelo_dato) {?>
                      <option value="<?php echo $modelo_dato->id_modelo_dato;?>" <?php echo (isset($datos['id_modelo_dato']) && $datos['id_modelo_dato'] == $modelo_dato->id_modelo_dato ) ? "selected" : ""; ?>><?php echo $modelo_dato->nombre_modelo_dato;?> </option>
                      <?php  } ?>
                   </select>
				</div>
      				
			</div>
     		    	
     		<div class="row">  
							
			 	<div class="form-group col-xs-3">                       
	                <span class="campo_obligatorio">*</span>  
	                <label for="volumen" class="format">Volumen</label>
	                <input autofocus type="text" id="volumen" name="volumen[]"  maxlength="200" class="form-control" value="<?php echo (isset($datos['Sistema_origen'])) ? $datos['Sistema_origen'] : ""; ?>" placeholder="SPPSINTRA02"/> 
                              <div id="msg_error_volumen"></div>

				</div>
					         
            <div class="form-group col-xs-3">                       
                <span class="campo_obligatorio">*</span>  
                <label for="regla_transformacion" class="format">Regla de transformaci&oacute;n</label>
               <input autofocus type="text" id="regla_transformacion" name="regla_transformacion[]"  maxlength="200" class="form-control" value="<?php echo (isset($datos['Sistema_origen'])) ? $datos['Sistema_origen'] : ""; ?>" placeholder="SPPSINTRA02"/>
                              <div id="msg_error_regla_transformacion"></div>

           </div>
			

            <div class="form-group col-xs-3">                       
                <span class="campo_obligatorio">*</span>  
                <label for="regla_transporte" class="format">Regla de transporte</label>
                <select class="form-control" name="regla_transporte[]" id="regla_transporte">
                   <?php  foreach ($reglas_transporte as $regla_transporte) {?>
                   <option value="<?php echo $regla_transporte->id_regla_transporte;?>" <?php echo (isset($datos['id_vertical']) && $datos['id_vertical'] == $regla_transporte->id_regla_transporte ) ? "selected" : ""; ?>><?php echo $regla_transporte->nombre_regla_transporte;?> </option>
                   <?php  } ?>
                </select>
           </div>     

			</div><!-- end row -->
		       
			<div class="row">
				         
	         	<div class="form-group col-xs-3">                       
	                <span class="campo_obligatorio">*</span>  
	                <label for="condicion_control_m" class="format">Condici&oacute;n control m</label>
	                <input type="text" id="condicion_control_m" name="condicion_control_m[]"  maxlength="200" class="form-control" value="<?php echo (isset($datos['Sistema_origen'])) ? $datos['Sistema_origen'] : ""; ?>" placeholder="Ej: N/A"/> 
                                 <div id="msg_error_condicion_control_m"></div>

				</div>   

				        	   
	            <div class="form-group col-xs-3">                       
	                <span class="campo_obligatorio">*</span>  
	                <label for="frecuencia" class="format">Frecuencia</label>
                  <select class="form-control" name="frecuencia[]" id="frecuencia">
                         <?php  foreach ($frecuencias as $frecuencia) {?>
                         <option value="<?php echo $frecuencia->id_frecuencia_ftp;?>" <?php echo (isset($datos['id_vertical']) && $datos['id_vertical'] == $frecuencia->id_frecuencia_ftp ) ? "selected" : ""; ?>><?php echo $frecuencia->nombre_frecuencia_ftp;?> </option>
                         <?php  } ?>
                   </select>
				</div>  
												         
	        <div class="form-group col-xs-3">                       
	                <span class="campo_obligatorio">*</span>  
	                <label for="split" class="format">Split</label>
	                <select required name="split[]" id="split" class="form-control" > 
						   <option value="0">No</option>
	                	<option value="1">Si</option>
	                </select>
				</div> 
			 
			</div>

			<?php } ?>
			
			<!-- ----------------------------------Destino----------------------------------------------------------------- -->
			
			<?php for ($i=1; $i <= $cantidad_sistemas_destino; $i++ ) { ?>
			
			<br>
			<legend>Configuraci&oacute;n de Destino <?php echo $i; ?>:</legend>     	
     		     		
     		     		<div class="row">
     											
				<div class="form-group col-xs-3">                       
                <span class="campo_obligatorio">*</span>  
                <label for="sistema" class="format">Sistema de origen</label>
                <select class="form-control" name="sistema[]" id="sistema">
                   <?php  foreach ($sistemas as $sistema) {?>
                   <option value="<?php echo $sistema->id_sistema;?>" <?php echo (isset($datos['id_vertical']) && $datos['id_vertical'] == $sistema->id_sistema ) ? "selected" : ""; ?>><?php echo $sistema->nombre_sistema;?> </option>
                   <?php  } ?>
               </select>
               <input type="hidden" name="sentido[]" value="2">
               
				</div>	
							
	        <div class="form-group col-xs-3">                       
	                <span class="campo_obligatorio">*</span>  
	                <label for="nombre" class="format">Nombre del archivo</label>
	                <input type="text" id="nombre" name="nombre[]"  maxlength="200" class="form-control" value="<?php echo (isset($datos['Sistema_origen'])) ? $datos['Sistema_origen'] : ""; ?>" placeholder="SPPSINTRA02"/> 
                             <div id="msg_error_nombre"></div>

				</div>        
				         
	         	<div class="form-group col-xs-3">                       
	                <span class="campo_obligatorio">*</span>  
	                <label for="directorio" class="format">Directorio</label>
	                <input type="text" id="directorio" name="directorio[]"  maxlength="200" class="form-control" value="<?php echo (isset($datos['Sistema_origen'])) ? $datos['Sistema_origen'] : ""; ?>" placeholder="Ej: 21"/> 
                                 <div id="msg_error_directorio"></div>

				</div>   
													   
	            <div class="form-group col-xs-3">                       
	                <span class="campo_obligatorio">*</span>  
	                <label for="modelo_dato" class="format">Modelo de datos</label>
	                <select class="form-control" name="modelo_dato[]" id="modelo_dato">
                      <?php  foreach ($modelo_datos as $modelo_dato) {?>
                      <option value="<?php echo $modelo_dato->id_modelo_dato;?>" <?php echo (isset($datos['id_vertical']) && $datos['id_vertical'] == $modelo_dato->id_modelo_dato ) ? "selected" : ""; ?>><?php echo $modelo_dato->nombre_modelo_dato;?> </option>
                      <?php  } ?>
                   </select>
				</div>
      				
			</div>
     		    	
     		<div class="row">  
							
			 	<div class="form-group col-xs-3">                       
	                <span class="campo_obligatorio">*</span>  
	                <label for="volumen" class="format">Volumen</label>
	                <input  type="text" id="volumen" name="volumen[]"  maxlength="200" class="form-control" value="<?php echo (isset($datos['Sistema_origen'])) ? $datos['Sistema_origen'] : ""; ?>" placeholder="SPPSINTRA02"/>
                              <div id="msg_error_volumen"></div>

				</div>
					         
            <div class="form-group col-xs-3">                       
                <span class="campo_obligatorio">*</span>  
                <label for="regla_transformacion" class="format">Regla de transformaci&oacute;n</label>
            <input  type="text" id="regla_transformacion" name="regla_transformacion[]"  maxlength="200" class="form-control" value="<?php echo (isset($datos['Sistema_origen'])) ? $datos['Sistema_origen'] : ""; ?>" placeholder="SPPSINTRA02"/>
                              <div id="msg_error_regla_transformacion"></div>
   
           </div>
			

            <div class="form-group col-xs-3">                       
                <span class="campo_obligatorio">*</span>  
                <label for="regla_transporte" class="format">Regla de transporte</label>
                <select class="form-control" name="regla_transporte[]" id="regla_transporte">
                   <?php  foreach ($reglas_transporte as $regla_transporte) {?>
                   <option value="<?php echo $regla_transporte->id_regla_transporte;?>" <?php echo (isset($datos['id_vertical']) && $datos['id_vertical'] == $regla_transporte->id_regla_transporte ) ? "selected" : ""; ?>><?php echo $regla_transporte->nombre_regla_transporte;?> </option>
                   <?php  } ?>
                </select>
           </div>     

			</div><!-- end row -->
		       
			<div class="row">
				         
              <div class="form-group col-xs-3">                       
                      <span class="campo_obligatorio">*</span>  
                      <label for="condicion_control_m" class="format">Condici&oacute;n control m</label>
                      <input type="text" id="condicion_control_m" name="condicion_control_m[]"  maxlength="200" class="form-control" value="<?php echo (isset($datos['Sistema_origen'])) ? $datos['Sistema_origen'] : ""; ?>" placeholder="Ej: N/A"/> 
                                <div id="msg_error_condicion_control_m"></div>

               </div>   


              <div class="form-group col-xs-3">                       
                      <span class="campo_obligatorio">*</span>  
                      <label for="frecuencia" class="format">Frecuencia</label>
                      <select class="form-control" name="frecuencia[]" id="frecuencia">
                         <?php  foreach ($frecuencias as $frecuencia) {?>
                         <option value="<?php echo $frecuencia->id_frecuencia_ftp;?>" <?php echo (isset($datos['id_vertical']) && $datos['id_vertical'] == $frecuencia->id_frecuencia_ftp ) ? "selected" : ""; ?>><?php echo $frecuencia->nombre_frecuencia_ftp;?> </option>
                         <?php  } ?>
                     </select>
               </div>  

              <div class="form-group col-xs-3">                       
                      <span class="campo_obligatorio">*</span>  
                      <label for="split" class="format">Split</label>
                      <select required name="split[]" id="split" class="form-control" > 
                        <option value="0">No</option>
                        <option value="1">Si</option>
                      </select>
               </div> 
			 
			</div>
			
			<?php } ?>
					 				
     	</fieldset>
     						
  	          
       	<div class="row">
            <!--
       		<div class="form-group col-xs-9">
       			<input type="button" class="btn btn-default" name="anterior_4" id="anterior_4" value="Anterior"/>	
       		</div>
            -->
       		<div class="form-group col-xs-3">
       			<input type="button" class="btn btn-default" name="guardar_ftp" id="guardar_ftp" value="Guardar"/>	
       		</div>
       	</div>
  
    </form>
</div>
