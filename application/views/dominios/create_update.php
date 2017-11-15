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
 <script type="text/javascript" src="<?php echo base_url('assets/js/helper/func_dominios.js');?>"></script>
 

 <div class="row" >
 	<p>
 		Modulo de Administraci&oacute;n de los Dominios</br>
     	Por favor complete todos los campos obligatorios 
        <font color="#EC2E38">*</font>
 	</p>

 </div> 

 <div id="msgs"></div><!--Div para mostrar mensajes en la vista-->
 
<div class="row">
    <form  id="<?php echo (isset($datos)) ? "frm_edit_dominio" : "frm_create_dominio"; ?>">
		<div class="row"> 
            <div class="form-group col-xs-4">                       
                <span class="campo_obligatorio">*</span>  
                <label for="nombre_dominio" class="format">Nombres del dominio</label>
                <input type="text" id="nombre_dominio" required name="nombre_dominio"  maxlength="100" class="form-control" value="<?php echo (isset($datos['Nombre_dominio'])) ? $datos['Nombre_dominio'] : ""; ?>" placeholder="Ej: Actividad Economica"/>
                <input type="hidden" name="id_dominio" value="<?php echo (isset($datos['Id_dominio'])) ? $datos['Id_dominio'] : ""; ?>">     
                <div id="msg_error"></div> 
			</div>
		</div>
		
		<div class="row">
			<div class="form-group col-xs-6">                       
	            <label for="descripcion_dominio" class="format">Descripci&oacute;n del dominio</label>
	            <textarea class="form-control" name="descripcion_dominio" id="descripcion_dominio" rows="5"  maxlength="300" ><?php echo (isset($datos['Descripcion_dominio'])) ? $datos['Descripcion_dominio'] : ""; ?></textarea>
            </div>
		</div>    
       

       	<div class="row">
			<div class="col-xs-12">
       			<input type="submit" class="btn btn-default" name="<?php echo (isset($datos)) ? "btn_edit_usuario" : "btn_enviar_usuario"; ?>"  value="Guardar"/>
       		</div>       	
       	</div>
           
    </form>
</div>
