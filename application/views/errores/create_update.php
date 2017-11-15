<?php
 
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * @autor Ing. AngÃ©lica Espinosa  <angelica1387@gmail.com>
 * @fecha_creacion 19/10/2015
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

    
?>

<!DOCTYPE html>
 <script type="text/javascript" src="<?php echo base_url('assets/js/helper/func_errores.js');?>"></script>
  
 <div class="row" >
     <p>
	     Modulo de Administraci&oacute;n de los Errores</br>
	     Por favor complete todos los campos obligatorios<font color="#EC2E38">*</font>
	 </p>
 </div> 
 
 <div id="msgs"></div><!--Div para mostrar mensajes en la vista-->
 
 
<div class="row">   
     <form class="col-md-5" id="<?php echo (isset($datos)) ? "frm_edit_errores" : "frm_create_errores"; ?>">
	    <div class="row"> 
	     	<div class="form-group col-xs-8">          
		        <span class="campo_obligatorio">*</span>   
		        <label  for="codigo_error" class="format">C&oacute;digo del error</label>
		        <input type="text" class="form-control" id="<?php echo (isset($datos)) ? "deshabilitar_codigo" : "codigo_error"; ?>" name="codigo_error" maxlength="20"  value="<?php echo (isset($datos['Codigo_error'])) ? $datos['Codigo_error'] : ""; ?>" onpaste="return false" <?php echo (isset($datos['Codigo_error'])) ? "readonly" : ""; ?> placeholder="Ej: 9000001"/>   
		        <div id="msg_error"></div>
			</div>	
	    </div>
	    
	    <div class="row">      
			 <div class="form-group col-xs-10">                       
			 	 <span class="campo_obligatorio">*</span>  
			 	 <label for="nombre_error" class="format"> Mensaje del error</label>
				 <textarea type="text" id="descripcion_error" required name="descripcion_error"  maxlength="400" class="form-control" > <?php echo (isset($datos['Mensaje_error'])) ? $datos['Mensaje_error'] : ""; ?> </textarea> 
			 </div>  
	    </div>
		
	    <div class="row">      
			 <div class="form-group col-xs-10">                       
			 	 <span class="campo_obligatorio">*</span>  
			 	 <label for="transporte" class="format"> Transporte</label>
				 <textarea type="text" id="transporte" name="transporte"  maxlength="400" class="form-control" > <?php echo (isset($datos['Transporte'])) ? $datos['Transporte'] : ""; ?> </textarea> 
			 </div>  
	    </div>
         
        <div class="row">
        	<div class="col-xs-12">
        		<input type="submit" class="btn btn-default" name="<?php echo (isset($datos)) ? "btn_edit_errores" : "btn_guardar_errores"; ?>"  value="Guardar"/>
        	</div>
			
        </div>  
            

	</form>
</div>
     
     

   
