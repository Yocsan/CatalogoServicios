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
 <script type="text/javascript" src="<?php echo base_url('assets/js/helper/func_transformaciones.js');?>"></script>
 

 <div class="row" >
    <p>
	     Modulo de Administraci&oacute;n de Transformaciones<br>
	     Por favor complete todos los campos obligatorios<font color="#EC2E38">*</font>
	</p> 
         
 </div> 

 <div id="msgs"></div><!--Div para mostrar mensajes en la vista-->
 
<div class="row">
     <form  id="<?php echo (isset($datos)) ? "frm_edit_transformaciones" : "frm_create_transformaciones"; ?>">
       
        <div class="row">   
            <div class="form-group col-xs-6">                       
                <span class="campo_obligatorio">*</span>  
                <label for="dominio" class="format">Nombre del dominio</label>
                <input type="hidden" name="id_detalle_dominio" value="<?php echo (isset($datos['Id_detalle_dominio'])) ? $datos['Id_detalle_dominio'] : ""; ?>">
                <select required name="dominio" id="dominio" class="form-control" > 
                	<option value="0">Seleccione</option>
                	<?php foreach ($dominios as $dominio) { ?>
                	<option value="<?php echo $dominio->Id_dominio; ?>" <?php echo (isset($datos['Id_dominio']) && $datos['Id_dominio'] == $dominio->Id_dominio ) ? "selected" : ""; ?> ><?php echo $dominio->Nombre_dominio; ?></option>
               		<?php } ?>
                </select>
			</div>
			
		</div>
		       
		<div class="row">
			
		    <div class="form-group col-xs-6">                       
                <span class="campo_obligatorio">*</span>  
                <label for="sistema_origen" class="format">Sistema Origen</label>
                <input type="text" id="sistema_origen" name="sistema_origen" required maxlength="200" class="form-control" value="<?php echo (isset($datos['Sistema_origen'])) ? $datos['Sistema_origen'] : ""; ?>" placeholder="Ej: KENAN"/> 
				<div id="msg_error"></div>
			</div>        
			
            <div class="form-group col-xs-6">                       
                <span class="campo_obligatorio">*</span>  
                <label for="valor_equivalencia" class="format">Valor equivalencia</label>
                <input type="text" id="valor_equivalencia" name="valor_equivalencia" required maxlength="200" class="form-control" value="<?php echo (isset($datos['Valor_equivalencia'])) ? $datos['Valor_equivalencia'] : ""; ?>" placeholder="Ej: 1"/> 
			</div>
		</div>
              
		<div class="row"> 
            <div class="form-group col-xs-6">                       
                <span class="campo_obligatorio">*</span>  
                <label for="sistema_destino1" class="format">Sistema de destino 1</label>
                <input type="text" id="sistema_destino1" name="sistema_destino1" required maxlength="50" class="form-control" value="<?php echo (isset($datos['Sistema_equivalente1'])) ? $datos['Sistema_equivalente1'] : ""; ?>" placeholder="Ej: RMCA"/> 
			</div>
            
            <div class="form-group col-xs-6">                       
	            <label for="valor_equivalente1" class="format">Valor equivalente 1</label>
	            <input type="text" id="valor_equivalente1" name="valor_equivalente1" required class="form-control" maxlength="200" value="<?php echo (isset($datos['Valor_equivalente1'])) ? $datos['Valor_equivalente1'] : ""; ?>" placeholder="Ej: 1"/> 
            </div>
            
        </div>
		              
		<div class="row"> 
            <div class="form-group col-xs-6">                       
                <span class="campo_obligatorio">*</span>  
                <label for="sistema_destino2" class="format">Sistema de destino 2</label>
                <input type="text" id="sistema_destino2" name="sistema_destino2" maxlength="50" class="form-control" value="<?php echo (isset($datos['Sistema_equivalente2'])) ? $datos['Sistema_equivalente2'] : ""; ?>" placeholder="Ej: CM"/> 
			</div>
            
            <div class="form-group col-xs-6">                       
	            <label for="valor_equivalente2" class="format">Valor equivalente 2</label>
	            <input type="text" id="valor_equivalente2" name="valor_equivalente2"class="form-control" maxlength="200" value="<?php echo (isset($datos['Valor_equivalente2'])) ? $datos['Valor_equivalente2'] : ""; ?>" placeholder="Ej: 1"/> 
            </div>
        </div>
        
        <div class="row"> 
            <div class="form-group col-xs-6">                       
                <span class="campo_obligatorio">*</span>  
                <label for="sistema_destino3" class="format">Sistema de destino 3</label>
                <input type="text" id="sistema_destino3" name="sistema_destino3" maxlength="50" class="form-control" value="<?php echo (isset($datos['Sistema_equivalente3'])) ? $datos['Sistema_equivalente3'] : ""; ?>" placeholder="Ej: ASAP"/> 
			</div>
            
            <div class="form-group col-xs-6">                       
	            <label for="valor_equivalente3" class="format">Valor equivalente 3</label>
	            <input type="text" id="valor_equivalente3" name="valor_equivalente3" class="form-control" maxlength="200" value="<?php echo (isset($datos['Valor_equivalente3'])) ? $datos['Valor_equivalente3'] : ""; ?>" placeholder="Ej: 1"/> 
            </div>
        </div>
                     
		<div class="row"> 
            <div class="form-group col-xs-6">                       
                <span class="campo_obligatorio">*</span>  
                <label for="sistema_destino4" class="format">Sistema de destino 4</label>
                <input type="text" id="sistema_destino4" name="sistema_destino4" maxlength="50" class="form-control" value="<?php echo (isset($datos['Sistema_equivalente4'])) ? $datos['Sistema_equivalente4'] : ""; ?>" placeholder="Ej: SISE"/> 
			</div>
            
            <div class="form-group col-xs-6">                       
	            <label for="valor_equivalente4" class="format">Valor equivalente 4</label>
	            <input type="text" id="valor_equivalente4" name="valor_equivalente4" class="form-control" maxlength="200" value="<?php echo (isset($datos['Valor_equivalente4'])) ? $datos['Valor_equivalente4'] : ""; ?>" placeholder="Ej: 0"/> 
            </div>
        </div>
                     
		<div class="row"> 
            <div class="form-group col-xs-6">                       
                <span class="campo_obligatorio">*</span>  
                <label for="sistema_destino5" class="format">Sistema de destino 5</label>
                <input type="text" id="sistema_destino5" name="sistema_destino5" maxlength="50" size="30" class="form-control" value="<?php echo (isset($datos['Sistema_equivalente5'])) ? $datos['Sistema_equivalente5'] : ""; ?>" placeholder="Ej: QMATIC"/> 
			</div>
            
            <div class="form-group col-xs-6">                       
	            <label for="valor_equivalente5" class="format">Valor equivalente 5</label>
	            <input type="text" id="valor_equivalente5" name="valor_equivalente5" class="form-control" maxlength="200" value="<?php echo (isset($datos['Valor_equivalente5'])) ? $datos['Valor_equivalente5'] : ""; ?>" placeholder="Ej: R"/> 
            </div>
        </div>
                     
		<div class="row"> 
            <div class="form-group col-xs-6">                       
                <span class="campo_obligatorio">*</span>  
                <label for="sistema_destino6" class="format">Sistema de destino 6</label>
                <input type="text" id="sistema_destino6" name="sistema_destino6" maxlength="50" class="form-control" value="<?php echo (isset($datos['Sistema_equivalente6'])) ? $datos['Sistema_equivalente6'] : ""; ?>" placeholder="Ej: CAVEGUIAS"/> 
			</div>
            
            <div class="form-group col-xs-6">                       
	            <label for="valor_equivalente6" class="format">Valor equivalente 6</label>
	            <input type="text" id="valor_equivalente6" name="valor_equivalente6" class="form-control" maxlength="200" value="<?php echo (isset($datos['Valor_equivalente6'])) ? $datos['Valor_equivalente6'] : ""; ?>" placeholder="Ej: R"/> 
            </div>
        </div>
                     
		<div class="row"> 
            <div class="form-group col-xs-6">                       
                <span class="campo_obligatorio">*</span>  
                <label for="sistema_destino7" class="format">Sistema de destino 7</label>
                <input type="text" id="sistema_destino7" name="sistema_destino7" maxlength="50" class="form-control" value="<?php echo (isset($datos['Sistema_equivalente7'])) ? $datos['Sistema_equivalente7'] : ""; ?>" placeholder="Ej: M6"/> 
			</div>
            
            <div class="form-group col-xs-6">                       
	            <label for="valor_equivalente" class="format">Valor equivalente 7</label>
	            <input type="text" id="valor_equivalente7" name="valor_equivalente7" class="form-control" maxlength="200" value="<?php echo (isset($datos['Valor_equivalente7'])) ? $datos['Valor_equivalente7'] : ""; ?>" placeholder="Ej: RES"/> 
            </div>
        </div>
                            
       	<div class="row">
       		<div class="form-group col-xs-12">
       			<input type="submit" class="btn btn-default" name="<?php echo (isset($datos)) ? "btn_edit_usuario" : "btn_enviar_usuario"; ?>"  value="Guardar"/>	
       		</div>
       	</div>
       	    
    </form>
</div>
