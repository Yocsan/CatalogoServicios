<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
?>


 <div class="row" >
    <p>
	     Modulo de Administraci&oacute;n de Servicios<br>
	     Por favor complete todos los campos obligatorios<font color="#EC2E38">*</font>
	</p> 
         
 </div> 

 <div id="mensaje"></div><!--Div para mostrar mensajes en la vista-->
 
<div class="row">
     
     <legend>Informaci&oacute;n general del ETF</legend>
     		     	
     <form  id="frm_create_etf" action="<?php echo base_url('documento_etf/generar_documento')?>" metodo="POST">  
   	          
       	<div class="row">
       		<div class="form-group col-xs-12">
       			<input type="submit" class="btn btn-default" name="generar_etf" id="generar_etf" value="Generar documentosss word"/>	
       		</div>
       	</div>
       	
       	
       	
     		
    </form>
</div>
