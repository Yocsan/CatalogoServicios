<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>

 <div class="panel panel-default">    
        <div class="panel-body">
           <p class="left"> Descripcion de los modulos segun el perfil : {role_name} </p>
           <ul class="list-group">
               {items_menu_superior}
                       <li  class="list-group-item">{nombre}: {descripcion}</li>     		
               {/items_menu_superior}        	
           </ul>
        </div>
</div>