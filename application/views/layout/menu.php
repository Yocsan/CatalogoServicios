 <?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>		
	  <div class="row">	 		 
		  	<nav class="navbar">
		 	       <ul id="divMenuSuperior" class="nav nav-tabs"> <!-- Nav tabs -->
                                   
                                      
			 	       <li class="active" style="width:60px;"  role="presentation">
                                           <a  id="0" href="<?=  base_url('login_normal/load_default')?>" aria-controls="default" role="tab" data-toggle="tab">
                                                <span class="glyphicon glyphicon-home"></span> Inicio</a>
			 	       </li>
				       	{menu_superior}
				       <li  role="presentation" >
                                            <a name="id_menu_superior_{id_menu}" id="{id_menu}" href="<?=  base_url('{vista}')?>" role="tab" data-toggle="tab">
				      	 		{nombre}
                                            </a>
				       </li>	
                        {/menu_superior}
		     	</ul>		   	
		   </nav> 
	   </div>
 
  
   				
   		
     		  
  		 
   			 
   