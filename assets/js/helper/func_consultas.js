        /* 
         * To change this license header, choose License Headers in Project Properties.
         * To change this template file, choose Tools | Templates
         * and open the template in the editor.
         */

/**
 * @autor TSU. Yocsan Burgos  <yocsan19@gmail.com>
 * @fecha_creacion 14/09/2017
 */

$(document).ready(function(){
	
	var base = window.location.href.split('/');
	var base_url = base[0]+'//'+base[2]+'/'+base[3];  
   
      	
    $("#siguiente_tipo_servicio_consultar").click(function(){
		
    	$.ajax({
            method: "POST",
            url: base_url+"/consultas/carga_tabla_servicios",
            data: $("#frm_tipo_servicio").serialize(), // Adjuntar los campos del formulario enviado.
            dataType: 'json',
            success: function(data) {
    			$('#principal').html(data.mensaje);
    			
    		},
    		error: function(error) {
            	$('#contenido').html('<div class="alert alert-warning alert-dismissible" role="alert">'+
                '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                '<stro  ng>Error!!!</strong> Solicitud de AJAX no completada->'+error.status+'</div>'); 
    		}
    	});
    	return false;        
    });
   
   
});