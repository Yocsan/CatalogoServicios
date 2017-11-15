<?php
defined("BASEPATH") OR exit("No direct script access allowed");
?>
<script type="text/javascript" src="<?php echo base_url('assets/js/helper/func_administracion.js');?>"></script>
     <ul class="nav nav-stacked" id="accordion" role="tablist" aria-multiselectable="true">
                <input type="hidden" id="id_menu_superior" value="{id_menu_superior}"/>
                <input type="hidden" id="vista" value="{vista}"/>
   		<li  class="active" id="0" role="tab" >
                    <a href="<?= base_url('{vista}/load_default_content')?>" id="call_default">
      			   	<span><?= img(base_url("assets/img/ico12_treeleaf.gif"),FALSE)?> </span>
           			  Acerca del M&oacute;dulo  {menu_superior}
        			</a>  
                </li>
   		{submenu}
                <li class="panel" id="{id_menu}" >  		  			   		 			
	      			<a role="button" data-toggle="collapse" data-parent="#accordion" 
	      			   	href="#submenu_{id_menu}" aria-expanded="true" aria-controls="submenu_{id_menu}" >
	      			   	<?= img(base_url("assets/img/1x1.gif"),FALSE,array("id"=>"folder_{id_menu}","class"=>"plus"))?>
	      			   	<?= img(base_url("assets/img/ico12_treefolder.gif"),FALSE)?> 
		           			  {nombre}  
	          		</a>     						 		
	          		
	      			<ul id="submenu_{id_menu}" class="nav collapse" role="tabpanel" aria-labelledby="{id_menu}">
	      				
	      					      			 
		   				<li style="padding-left: 15px;">
		   				<!-- Aqui llamas la funcion de un controlador, dicha funcion se llama create. -->
		       			 	<a href="<?= base_url('{vista}/create')?>"  name="sub_m_{id_menu}_create" id="sub_m_{id_menu}_create" >
			           			<span><?= img(base_url("assets/img/ico12_treeleaf.gif"),FALSE)?> </span> 
					           		Agregar 
				           	</a>
		       			</li>
	       			 	<li style="padding-left: 15px;">
		       			 	<a href="<?= base_url('{vista}/search')?>"  name="sub_m_{id_menu}_search" id="sub_m_{id_menu}_search">
			           			<span><?= img(base_url("assets/img/ico12_treeleaf.gif"),FALSE)?> </span> 
				           			Consultar 
		           			</a>
	       			 	</li>
	
					</ul>

  				</li>
  		{/submenu}


  			
  		
  		
  		
  		
  		
    </ul>
    
   
  