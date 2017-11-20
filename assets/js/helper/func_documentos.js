

$(document).ready(function(){
	
	var base = window.location.href.split('/');
	var base_url = base[0]+'//'+base[2]+'/'+base[3];  
   
      	
    $("#siguiente_tipo_servicio_consultar").click(function(){
		
    	$.ajax({
            method: "POST",
            url: base_url+"/documentos/carga_tabla_servicios",
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