<?php


if (!defined('BASEPATH'))
    exit('No direct script access allowed');
?>

 <script type="text/javascript" src="<?php echo base_url('assets/js/helper/func_estructura_datos.js');?>"></script>
 
<div class="row" >
    <p>
	   Modulo de Administraci&oacute;n de Servicios<br>
	   Por favor complete todos los campos obligatorios<font color="#EC2E38">*</font>
	   </p> 
</div> 
 

<div class="row">
      <form  id="<?php echo (isset($datos)) ? "frm_estructura_datos" : "frm_estructura_datos"; ?>">
     
     	<fieldset>
     	
     		<legend>Informaci&oacute;n de la estructura de datos</legend>
     		
<!--------------------------------------------------Origen---------------------------------------------->

      <br>
      <legend>Configuraci&oacute;n de Origen</legend>  

    <div class="row">
        <div class="form-group col-xs-4">                       
                <span class="campo_obligatorio">*</span>  
                <label for="sistema_origen" class="format">Sistema de Origen</label>
                <select autofocus class="form-control" name="sistema[]" id="sistema">
                   <?php  foreach ($sistemas as $sistema) {?>
                   <option value="<?php echo $sistema->id_sistema;?>" <?php echo (isset($datos['id_sistema']) && $datos['id_sistema'] == $sistema->id_sistema ) ? "selected" : ""; ?>><?php echo $sistema->nombre_sistema;?> </option>
                   <?php  } ?>
               </select>
               <input type="hidden" name="sentido[]" value="1"> 
        </div>  
        
							
        <div class="form-group col-xs-4">                       
                <span class="campo_obligatorio">*</span>  
                <label for="estructura_origen" class="format">Estructura</label>
                <input autofocus type="text" name="estructura[]" id="estructura_origen" maxlength="100" placeholder="N/A">
                                            <div id="msg_error_estructura_origen"></div>   
        </div>  

        <div class="form-group col-xs-4">                       
               <span class="campo_obligatorio">*</span>  
               <label for="obligatoriedad_origen" class="format">Obligatoriedad</label>
               <input autofocus type="text" id="obligatoriedad_origen" name="obligatoriedad[]"  maxlength="10" placeholder="N/A"/>
                                               <div id="msg_error_obligatoriedad_origen"></div>   
        </div>

  </div> <!-- end row -->

     	
  <div class="row">  
					         

       <div class="form-group col-xs-4">                       
               <span class="campo_obligatorio">*</span>  
               <label for="campo_origen" class="format">Campo</label>
               <input autofocus type="text" id="campo_origen" name="campo[]"  maxlength="10" placeholder="N/A"/>
                                               <div id="msg_error_campo_origen"></div>   
        </div>

        <div class="form-group col-xs-4">                       
               <span class="campo_obligatorio">*</span>  
               <label for="tipo_campo_origen" class="format">Tipo Campo</label>
               <input autofocus type="text" id="tipo_campo_origen" name="tipo_campo[]"  maxlength="19" placeholder="String"/>
                                               <div id="msg_error_tipo_campo_origen"></div>   
        </div>


        <div class="form-group col-xs-4">                       
                <span class="campo_obligatorio">*</span>  
                <label for="posicion_origen" class="format">Posici&oacute;n</label>
                <input autofocus type="text" name="posicion[]" id="posicion_origen" maxlength="6" placeholder="156">
                                            <div id="msg_error_posicion_origen"></div>   
        </div>  
</div> <!-- end row-->

<div class="row">  
                            
        <div class="form-group col-xs-4">                       
               <span class="campo_obligatorio">*</span>  
               <label for="longitud_origen" class="format">Longitud</label>
               <input autofocus type="number" id="longitud_origen" name="longitud[]"  maxlength="4" placeholder="24"/>
                                               <div id="msg_error_longitud_origen"></div>   
        </div>


        <div class="form-group col-xs-4">                       
             <span class="campo_obligatorio">*</span>  
             <label for="valor_ejemplo_origen" class="format">Valor Ejemplo</label>
             <input autofocus type="text" id="valor_ejemplo_origen" name="valor_ejemplo[]"  maxlength="100" placeholder="N/A"/>
                                               <div id="msg_error_valor_ejemplo_origen"></div>
        </div> 
			 
                           
        <div class="form-group col-xs-4">                       
              <span class="campo_obligatorio">*</span>  
              <label for="descripcion_origen" class="format">Descripci&oacute;n</label>
              <input autofocus type="text" id="descripcion_origen" name="descripcion[]"  maxlength="200" placeholder="Separador"/> 
                                               <div id="msg_error_descripcion_origen"></div>
        </div> 

    </div><!-- end row -->
			

			
<!--------------------------------------------------Destino---------------------------------------------->

      <br>
      <legend>Configuraci&oacute;n de Destino</legend> 

<div class="row">

        <div class="form-group col-xs-4">                       
                <span class="campo_obligatorio">*</span>  
                <label for="sistema_destino" class="format">Sistema de Destino</label>
                <select autofocus class="form-control" name="sistema[]" id="sistema">
                   <?php  foreach ($sistemas as $sistema) {?>
                   <option value="<?php echo $sistema->id_sistema;?>" <?php echo (isset($datos['id_sistema']) && $datos['id_sistema'] == $sistema->id_sistema ) ? "selected" : ""; ?>><?php echo $sistema->nombre_sistema;?> </option>
                   <?php  } ?>
               </select>
               <input type="hidden" name="sentido[]" value="2">   
        </div>  
        
              
        <div class="form-group col-xs-4">                       
                <span class="campo_obligatorio">*</span>  
                <label for="estructura_destino" class="format">Estructura</label>
                <input autofocus type="text" name="estructura[]" id="estructura_destino" maxlength="100" placeholder="N/A">
                                            <div id="msg_error_estructura_destino"></div>   
        </div>  

        <div class="form-group col-xs-4">                       
               <span class="campo_obligatorio">*</span>  
               <label for="obligatoriedad_destino" class="format">Obligatoriedad</label>
               <input autofocus type="text" id="obligatoriedad_destino" name="obligatoriedad[]"  maxlength="10" placeholder="N/A"/>
                                               <div id="msg_error_obligatoriedad_destino"></div>   
        </div>

</div><!-- end row -->

<div class="row">

        <div class="form-group col-xs-4">                       
               <span class="campo_obligatorio">*</span>  
               <label for="campo_destino" class="format">Campo</label>
               <input autofocus type="text" id="campo_destino" name="campo[]"  maxlength="10" placeholder="N/A"/>
                                               <div id="msg_error_campo_destino"></div>   
        </div>
                   
        <div class="form-group col-xs-4">                       
               <span class="campo_obligatorio">*</span>  
               <label for="tipo_campo_destino" class="format">Tipo Campo</label>
               <input autofocus type="text" id="tipo_campo_destino" name="tipo_campo[]"  maxlength="19" placeholder="String"/>
                                               <div id="msg_error_tipo_campo_destino"></div>   
        </div>

        <div class="form-group col-xs-4">                       
                <span class="campo_obligatorio">*</span>  
                <label for="posicion_destino" class="format">Posici&oacute;n</label>
                <input autofocus type="text" name="posicion[]" id="posicion_destino" maxlength="6" placeholder="156">
                                            <div id="msg_error_posicion_destino"></div>   
        </div>  
        
</div><!-- end row -->

<div class="row">
                            
        <div class="form-group col-xs-4">                       
               <span class="campo_obligatorio">*</span>  
               <label for="longitud_destino" class="format">Longitud</label>
               <input autofocus type="text" id="longitud_destino" name="longitud[]"  maxlength="4" placeholder="24"/>
                                               <div id="msg_error_longitud_destino"></div>   
        </div>


        <div class="form-group col-xs-4">                       
             <span class="campo_obligatorio">*</span>  
             <label for="valor_ejemplo_destino" class="format">Valor Ejemplo</label>
             <input autofocus type="text" id="valor_ejemplo_destino" name="valor_ejemplo[]"  maxlength="100" placeholder="N/A"/>
                                               <div id="msg_error_valor_ejemplo_destino"></div>
        </div> 
       
  </div><!-- end row -->    
<div class="row">  
                           
            <div class="form-group col-xs-4">                       
                <span class="campo_obligatorio">*</span>  
                <label for="descripcion_destino" class="format">Descripci&oacute;n</label>
                <input autofocus type="text" id="descripcion_destino" name="descripcion[]"  maxlength="200" placeholder="Separador"/> 
                                               <div id="msg_error_descripcion_destino"></div>


        </div> 
       
</div><!-- end row -->
			

	   <div class="row">
      
	       	<div class="form-group col-xs-3">
	       			<input type="button" class="btn btn-default" name="guardar_f1" id="guardar_f1" value="Guardar"/>	
	       	</div>

	   </div>
						 			
     	</fieldset>

    </form>
</div>