<?php
defined("BASEPATH") OR exit("No direct script access allowed");
?>
<script type="text/javascript" src="<?php echo base_url('assets/js/helper/func_administracion.js');?>"></script>
     <ul class="nav nav-stacked" id="accordion" role="tablist" aria-multiselectable="true">
                <input type="hidden" id="id_menu_superior" value="{id_menu_superior}"/>
                <input type="hidden" id="vista" value="{Vista}"/>
   		<li  class="active" id="0" role="tab" >
                    <a href="<?= base_url('{Vista}/load_default_content')?>" id="call_default">
      			   	<span><?= img(base_url("assets/img/ico12_treeleaf.gif"),FALSE)?> </span>
           			  Acerca del M&oacute;dulo  {menu_superior}
        			</a>  
                </li>
   		{submenu}
                <li class="panel" id="{Id_menu}" >  		  			   		 			
	      			<a role="button" data-toggle="collapse" data-parent="#accordion" 
	      			   	href="#submenu_{Id_menu}" aria-expanded="true" aria-controls="submenu_{Id_menu}" >
	      			   	<?= img(base_url("assets/img/1x1.gif"),FALSE,array("id"=>"folder_{Id_menu}","class"=>"plus"))?>
	      			   	<?= img(base_url("assets/img/ico12_treefolder.gif"),FALSE)?> 
		           			  {Nombre_menu}  
	          		</a>     						 		
	          		
	      			<ul id="submenu_{Id_menu}" class="nav collapse" role="tabpanel" aria-labelledby="{Id_menu}">
	      				
	      					      			 
		   				<li style="padding-left: 15px;">
		   				<!-- Aqui llamas la funcion de un controlador, dicha funcion se llama create. -->
		       			 	<a href="<?= base_url('{Vista}/create')?>"  name="sub_m_{Id_menu}_create" id="sub_m_{Id_menu}_create" >
			           			<span><?= img(base_url("assets/img/ico12_treeleaf.gif"),FALSE)?> </span> 
					           		Cambiar 
				           	</a>
		       			</li>
	
					</ul>

  				</li>
  		{/submenu}


  			
  		
  		
  		
  		
  		
    </ul>
    
   
  