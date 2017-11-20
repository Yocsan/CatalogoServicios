<?php


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
     <form  id="<?php echo (isset($datos)) ? "frm_servicios_web" : "frm_servicios_web"; ?>">
     
     	<fieldset>
     	
     		<legend>Informaci&oacute;n del servicio WEB</legend>
     		
     		<div class="row">
										
				<div class="form-group col-xs-3">                       
                <span class="campo_obligatorio">*</span>  
                <label for="sistema" class="format">Sistema de origen</label>
                <select autofocus class="form-control" name="sistema[]" id="sistema">
                   <?php  foreach ($sistemas as $sistema) {?>
                   <option value="<?php echo $sistema->id_sistema;?>" <?php echo (isset($datos['id_sistema']) && $datos['id_sistema'] == $sistema->id_sistema ) ? "selected" : ""; ?>><?php echo $sistema->nombre_sistema;?> </option>
                   <?php  } ?>
               </select>
               <input type="hidden" name="sentido[]" value="1">
               
				</div>	
				
														
				<div class="form-group col-xs-3">                       
               <span class="campo_obligatorio">*</span>  
               <label for="sistema" class="format">Sistema de destino</label>
               <select class="form-control" name="sistema[]" id="sistema">
                   <?php  foreach ($sistemas as $sistema) {?>
                   <option value="<?php echo $sistema->id_sistema;?>" <?php echo (isset($datos['id_vertical']) && $datos['id_vertical'] == $sistema->id_sistema ) ? "selected" : ""; ?>><?php echo $sistema->nombre_sistema;?> </option>
                   <?php  } ?>
               </select>
               <input type="hidden" name="sentido[]" value="2">
				</div>
	
     		</div>
     	
     		<div class="row">  
     		
     			<p><b>Par&aacute;metros de configuraci&oacute;n de servicio conexi&oacute;n</b></p>
					         
            <div class="form-group col-xs-7">                       
                <span class="campo_obligatorio">*</span>  
                <label for="wsdl_desarrollo" class="format">WSDL de ambiente de desarrollo</label>
                <input autofocus type="text" id="wsdl_desarrollo" name="wsdl[]"  maxlength="200" class="form-control" value="<?php echo (isset($datos['Sistema_origen'])) ? $datos['Sistema_origen'] : ""; ?>" placeholder="http://wsbusquedaclienteposventacdmades.movilnet.com.ve:7777/wsbasebusquedaclienteposventacdma/busquedaClientePosVentaCDMA "/>
                <input type="hidden" name="ambiente[]" value="3"> 
                                               <div id="msg_error_wsdl_desarrollo"></div>

				</div> 
			 
			</div><!-- end row -->
			
			<div class="row">  
     							         
            <div class="form-group col-xs-7">                       
                <span class="campo_obligatorio">*</span>  
                <label for="wsdl_calidad" class="format">WSDL de ambiente de calidad</label>
                <input type="text" id="wsdl_calidad" name="wsdl[]"  maxlength="200" class="form-control" value="<?php echo (isset($datos['Sistema_origen'])) ? $datos['Sistema_origen'] : ""; ?>" placeholder="http://wsbusquedaclienteposventagsmdes.movilnet.com.ve:7777/wsbasebusquedaclienteposventagsm/"/> 
                <input type="hidden" name="ambiente[]" value="2"> 
                                               <div id="msg_error_wsdl_calidad"></div>


				</div> 
			 
			</div><!-- end row -->
			
			<div class="row">  
					         
            <div class="form-group col-xs-7">                       
                <span class="campo_obligatorio">*</span>  
                <label for="wsdl_produccion" class="format">WSDL de ambiente de producci&oacute;n</label>
                <input type="text" id="wsdl_produccion" name="wsdl[]"  maxlength="200" class="form-control" value="<?php echo (isset($datos['Sistema_origen'])) ? $datos['Sistema_origen'] : ""; ?>" placeholder="http://192.168.210.105:7777/wsbasebusquedaclienteposventapospago/busquedaClientePosVentaPospago"/> 
               <input type="hidden" name="ambiente[]" value="1"> 
                                               <div id="msg_error_wsdl_produccion"></div>


				</div> 
			 
			</div><!-- end row -->
			
			<!-- ----------------------------------------------------------------------------------------------------------------------- -->

	       	<div class="row">
               <!--
	       		<div class="form-group col-xs-9">
	       			<input type="button" class="btn btn-default" name="anterior_4" id="anterior_4" value="Anterior"/>	
	       		</div>
	       		-->
	       		<div class="form-group col-xs-3">
	       			<input type="button" class="btn btn-default" name="guardar_web" id="guardar_web" value="Guardar"/>	
	       		</div>
	       	</div>
						 			
     	</fieldset>

    </form>
</div>
