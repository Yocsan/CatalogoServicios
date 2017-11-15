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
 <script type="text/javascript" src="<?php echo base_url('assets/js/helper/func_usuarios.js');?>"></script>
 

 <div class="row">
     <p>
	     Modulo de Administraci&oacute;n de los Usuarios</br>
	     Por favor complete todos los campos obligatorios<font color="#EC2E38">*</font>
     </p> 
         
 </div> 
 <div id="msgs"></div><!--Div para mostrar mensajes en la vista-->
 
<div class="row">
     <form  id="<?php echo (isset($datos)) ? "frm_edit_usuario" : "frm_create_usuario"; ?>">
         <div class="row"> 
            <div class="form-group col-xs-5 ">                       
                <span class="campo_obligatorio">*</span>  
                <label for="nombre" class="format"> Nombres del Usuario</label>
                <input type="text" required id="nombre" name="nombre"  maxlength="200"  class="form-control" value="<?php echo (isset($datos['nombre'])) ? $datos['nombre'] : ""; ?>" placeholder="Ej: Ricardo"/> 
            </div>

            <div class="form-group col-xs-5 ">                        
	            <label for="apellidos" class="format">Apellidos del Usuario</label>
	            <input type="text" id="apellidos" name="apellidos"  maxlength="200"  class="form-control" value="<?php echo (isset($datos['apellido'])) ? $datos['apellido'] : ""; ?>" placeholder="Ej: Vegas" /> 
            </div>
        </div>
         
        <div class="row">             
            <div class="form-group col-xs-5 ">                       
                <span class="campo_obligatorio">*</span>  
                <label for="login" class="format"> Cuenta de Red</label>
                <input type="text" required id="<?php echo (isset($datos)) ? "deshabilitar_login" : "login"; ?>" name="login" maxlength="25" size="30" class="form-control" value="<?php echo (isset($datos['usuario'])) ? $datos['usuario'] : ""; ?>" placeholder="Ej: rvegas" onpaste="return false" <?php echo (isset($datos)) ? "readonly" : ""; ?>/> 
           		<div id="msg_error"></div>
			</div>
			<div class="form-group col-xs-5 ">                       
                <span class="campo_obligatorio">*</span>  
                <label for="password" class="format"> Contrase&ntilde;a</label>
                <input type="password" required name="password" maxlength="25" size="30" class="form-control" value="<?php echo (isset($datos['password'])) ? $datos['password'] : ""; ?>" placeholder="Ej: ********" /> 
			</div>
        </div>
        
        <div class="row">        
        	<div class="form-group col-xs-5">                       
	            <span class="campo_obligatorio">*</span>  
	            <label for="cedula" class="format">Cedula de Identidad</label>
	            <input type="text" required id="cedula" name="cedula"  maxlength="11" class="form-control" value="<?php echo (isset($datos['cedula'])) ? $datos['cedula'] : ""; ?>" placeholder="Ej: 24896880"/> 
         	</div>
         	
         	<div class="form-group col-xs-5">                       
	            <span class="campo_obligatorio">*</span>  
	            <label for="p00" class="format">P00</label>
	            <input type="text" required id="p00" name="p00"  maxlength="11" class="form-control" value="<?php echo (isset($datos['p00'])) ? $datos['p00'] : ""; ?>" placeholder="Ej: 146252"/> 
         	</div>
        </div>
					        	
        <div class="row"> 
         	<div class="form-group col-xs-5 ">
               	<span class="campo_obligatorio">*</span>   
               	<label  for="tipo_rol" class="format">Rol Asignado</label>
                <select class="form-control" name="tipo_rol" id="<?php echo (isset($datos)) ? "deshabilitar_descripcion" : "tipo_rol"; ?>">
               		<option id="tipo_rol" required name="tipo_rol" class="form-control" value="0" >--Seleccione--</option>  	
               	<?php foreach ($roles as $rol) { ?>
                   	<option id="tipo_rol" required name="tipo_rol" class="form-control" value="<?php echo $rol['id_rol']?>" <?php echo (isset($datos['roles_id_rol']) && $datos['roles_id_rol'] == $rol['id_rol']) ? "selected" : ""; ?>> <?php echo (isset($rol['nombre_rol'])) ? $rol['nombre_rol'] : ""; ?></option> 		
	            <?php } ?>   	
               	</select>	                 
          	</div> 
        </div>
         
        <div class="row"> 
        	<div class="form-group col-xs-5 ">                       
            	<span class="campo_obligatorio">*</span>  
            	<label for="numero_contacto" class="format">Telefono de contacto</label>
            	<input type="text" required id="numero_contacto" name="numero_contacto"  maxlength="20" class="form-control" value="<?php echo (isset($datos['telefono'])) ? $datos['telefono'] : ""; ?>"placeholder="Ej: 0212-5006670"/> 
            </div> 
		</div> 
        <div class="row">
        	<div class="col-xs-12">
        		<input type="submit" class="btn btn-default" name="<?php echo (isset($datos)) ? "btn_edit_usuario" : "btn_enviar_usuario"; ?>"  value="Guardar"/>
        	</div>
        </div>        
            
	</form>
</div>
