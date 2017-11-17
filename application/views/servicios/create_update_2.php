<?php

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
     		     	
     <form  id="frm_create_servicio_2" enctype="multipart/form-data"><?php //echo (isset($datos)) ? "frm_update_servicio" : "frm_create_servicio"; ?>  
     
     	<div class="row">   		
	     			
	        <div class="form-group col-xs-6">                       
	            <span class="campo_obligatorio">*</span>  
	            <label for="nombre_servicio" class="format">Nombre del servicio</label>
	            <input autofocus type="text" id="nombre_servicio" name="nombre_servicio"  maxlength="200" class="form-control" value="<?php echo (isset($datos['nombre'])) ? $datos['nombre'] : ""; ?>" <?php echo (isset($datos['nombre'])) ? $datos['nombre'] : "readonly"; ?>placeholder="DM629ConsultaClientePorSerialMovilnet"/> 
				<div id="msg_error_nombre_servicio"></div>
			</div>         
			
			<div class="form-group col-xs-3">                       
                <span class="campo_obligatorio">*</span>  
                <label for="vertical" class="format">Vertical</label>
				<select class="form-control" name="vertical" id="vertical">
                   <?php  foreach ($verticales as $vertical) {?>
                   <option value="<?php echo $vertical->id_vertical;?>" <?php echo (isset($datos['verticales_id_vertical']) && $datos['verticales_id_vertical'] == $vertical->id_vertical ) ? "selected" : ""; ?>><?php echo $vertical->nombre_vertical;?> </option>
                   <?php  } ?>
              	</select>
			</div>
			
			<div class="form-group col-xs-3">                       
                <span class="campo_obligatorio">*</span>  
                <label for="esquema" class="format">Esquema</label>
				<select class="form-control" name="esquema" id="esquema">
                    <?php  foreach ($esquemas as $esquema) {?>
                   <option value="<?php echo $esquema->id_esquema;?>" <?php echo (isset($datos['esquemas_id_esquema']) && $datos['esquemas_id_esquema'] == $esquema->id_esquema ) ? "selected" : ""; ?>><?php echo $esquema->nombre_esquema;?> </option>
                    <?php  } ?>
              	</select>
			</div>
 				
		</div><!-- end row -->
 
		<div class="row">

            <div class="form-group col-xs-3">                       
                <span class="campo_obligatorio">*</span>  
                <label for="procesamiento" class="format">Procesamiento</label>
				<select class="form-control" name="procesamiento" id="procesamiento">
                    <?php  foreach ($procesamientos as $procesamiento) {?>
                   <option value="<?php echo $procesamiento->id_procesamiento;?>" <?php echo (isset($datos['procesamientos_id_procesamiento']) && $datos['procesamientos_id_procesamiento'] == $procesamiento->id_procesamiento ) ? "selected" : ""; ?>><?php echo $procesamiento->nombre_procesamiento;?> </option>
                    <?php  } ?>
              	</select>
			</div>
	            
	        <div class="form-group col-xs-3">                       
		        <span class="campo_obligatorio">*</span>  
		        <label for="prioridad" class="format">Prioridad</label>
	            <select class="form-control" name="prioridad" id="prioridad">
			        <?php  foreach ($prioridades as $prioridad) {?>
		            <option value="<?php echo $prioridad->id_prioridad;?>" <?php echo (isset($datos['prioridades_id_prioridad']) && $datos['id_esqprioridades_id_prioridaduema'] == $prioridad->id_prioridad ) ? "selected" : ""; ?>><?php echo $prioridad->nombre_prioridad;?> </option>
		            <?php } ?>
	            </select>
			</div> 
			
			<div class="form-group col-xs-3">                       
		        <span class="campo_obligatorio">*</span>  
		        <label for="frecuencia" class="format">Frecuencia</label>
	            <select class="form-control" name="frecuencia" id="frecuencia">
			        <?php  foreach ($frecuencias as $frecuencia) {?>
		            <option value="<?php echo $frecuencia->id_frecuencia;?>" <?php echo (isset($datos['frecuencias_id_frecuencia']) && $datos['frecuencias_id_frecuencia'] == $frecuencia->id_frecuencia ) ? "selected" : ""; ?>><?php echo $frecuencia->nombre_frecuencia;?> </option>
		            <?php } ?>
	            </select>
			</div>
			
						
			<div class="form-group col-xs-3">                       
		        <span class="campo_obligatorio">*</span>  
		        <label for="tipo_servicio" class="format">Tipo de servicio</label>
	            <select class="form-control" name="tipo_servicio" id="tipo_servicio">
			        <?php  foreach ($tipos_servicio as $tipo_servicio) {?>
		            <option value="<?php echo $tipo_servicio->id_tipo_servicio;?>" <?php echo (isset($datos['tipos_servicios_id_tipo_servicio']) && $datos['tipos_servicios_id_tipo_servicio'] == $tipo_servicio->id_tipo_servicio ) ? "selected" : ""; ?> > <?php echo $tipo_servicio->nombre_tipo_servicio ;?> </option>
		            <?php } ?>
	            </select>
			</div>  

		</div>
		
		<!-- ------------------------------------------------------------------------------------------------------------------------------------------------ -->

		
		<div class="row">
            <div class="form-group col-xs-6"> 
            	<span class="campo_obligatorio">*</span>                        
	            <label for="introduccion" class="format">Introducci&oacute;n</label>
	            <textarea class="form-control" name="introduccion" id="premisas" rows="5"  maxlength="600" ><?php echo (isset($datos['introduccion'])) ? $datos['introduccion'] : ""; ?></textarea>
               <div id="msg_error_introduccion"></div>
            </div>
									
            <div class="form-group col-xs-6">
            	<span class="campo_obligatorio">*</span>                         
	            <label for="descripcion_proceso" class="format">Descripcion del proceso</label>
	            <textarea class="form-control" name="descripcion_proceso" id="descripcion_proceso" rows="5"  maxlength="600" ><?php echo (isset($datos['descripcion_proceso'])) ? $datos['descripcion_proceso'] : ""; ?></textarea>
               <div id="msg_error_descripcion_proceso"></div>
            </div>

		</div><!-- end row -->
				
		<div class="row">
		
            <div class="form-group col-xs-6"> 
            	<span class="campo_obligatorio">*</span>                        
	            <label for="evento_inicio_disparador" class="format">Eventos de inicio/disparador</label>
	            <textarea class="form-control" name="evento_inicio_disparador" id="evento_inicio_disparador" rows="5"  maxlength="600" ><?php echo (isset($datos['evento_disparador'])) ? $datos['evento_disparador'] : ""; ?></textarea>
               <div id="msg_error_evento_inicio_disparador"></div>
            </div>
									
            <div class="form-group col-xs-6">
            	<span class="campo_obligatorio">*</span>                         
	            <label for="adaptaciones" class="format">Adaptaciones</label>
	            <textarea class="form-control" name="adaptaciones" id="adaptaciones" rows="5"  maxlength="600" ><?php echo (isset($datos['adaptador'])) ? $datos['adaptador'] : ""; ?></textarea>            
               <div id="msg_error_adaptaciones"></div>

            </div>

		</div><!-- end row -->
		
				
		<div class="row">
		
            <div class="form-group col-xs-6"> 
            	<span class="campo_obligatorio">*</span>                        
	            <label for="arquitectura" class="format">Arquitectura</label>
	            <textarea class="form-control" name="arquitectura" id="arquitectura" rows="5"  maxlength="600" ><?php echo (isset($datos['arquitectura_sistema_conexion'])) ? $datos['arquitectura_sistema_conexion'] : ""; ?></textarea>             
               <div id="msg_error_arquitectura"></div>
            </div>
            
                    	
        	<div class="form-group col-xs-6">                       
	            <label for="diagrama_uml" class="format">Diagrama UML</label>
	            <input type="file" id="diagrama_uml" name="diagrama_uml" value="<?php echo (isset($datos['url_imagen'])) ? $datos['url_imagen'] : ""; ?>" /> 
                           
               <div id="msg_error_diagrama_uml"></div>
         </div>
									
		</div><!-- end row -->
      
		<!--numero de premisas -->
		<div class="row">		
            <div class="form-group col-xs-3">                       
                <span class="campo_obligatorio">*</span>  
                <label for="pasos_caso_uso" class="format">Numero de premisas</label>
                <select required name="numero_premisas" id="numero_premisas" class="form-control" > 
                	<option value="1">1</option>
                	<option value="2">2</option>
                	<option value="3">3</option>
                	<option value="4">4</option>
                	<option value="5">5</option>
                	<option value="6">6</option>
                </select> 
			</div>
			
			
			
			<div class="form-group col-xs-3">                       
                <span class="campo_obligatorio">*</span>  
                <label for="cantidad_sistemas_origen" class="format">Cantidad de sistemas de origen</label>
                <select required name="cantidad_sistemas_origen" id="cantidad_sistemas_origen" class="form-control" > 
                	<option value="1">1</option>
                	<option value="2">2</option>
                	<option value="3">3</option>
                	<option value="4">4</option>
                	<option value="5">5</option>
                	<option value="6">6</option>
                </select> 
			</div>
								
			<div class="form-group col-xs-3">                       
                <span class="campo_obligatorio">*</span>  
                <label for="cantidad_sistemas_destino" class="format">Cantidad de sistemas de destino</label>
                <select required name="cantidad_sistemas_destino" id="cantidad_sistemas_destino" class="form-control" > 
                	<option value="1">1</option>
                	<option value="2">2</option>
                	<option value="3">3</option>
                	<option value="4">4</option>
                	<option value="5">5</option>
                	<option value="6">6</option>
                </select> 
			</div>

		
		</div><!-- end row -->	
  	          
       	<div class="row">
            <!--
       		<div class="form-group col-xs-9">
       			<input type="button" class="btn btn-default" name="anterior_2" id="anterior_2" value="Anterior"/>	
       		</div>
            -->
       		<div class="form-group col-xs-3">
       			<input type="button" class="btn btn-default" name="siguiente_2" id="siguiente_2" value="Siguiente"/>	
       		</div>
       	</div>
     		
    </form>
</div>
