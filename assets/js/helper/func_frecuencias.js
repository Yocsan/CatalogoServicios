

$(document).ready(function(){

	
	var base = window.location.href.split('/');
	var base_url = base[0]+'//'+base[2]+'/'+base[3]; 

  
    $('#nombre_frecuencia').on('keyup',function() {
	    var frecuencia = $('#nombre_frecuencia').val();                   
	
	     if(frecuencia !== ''){
	        $.ajax({
	                method: 'POST',
	                url: base_url+"/frecuencias/consultarFrecuencia",
	                data: {'frecuencia':frecuencia},
	                dataType: 'json',
	                success: function(data) {
	                $('#msg_error_nombre_frecuencia').html(data.mensaje);                   
	                $("#mensaje").fadeOut(3000);
	                $("input[type=submit]").prop("disabled",data.cod);
	            },
	            error: function(error){
	            	$('#contenido').html('<div class="alert alert-warning alert-dismissible" role="alert">'+
	                '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
	                '<strong>Error!!!</strong> Solicitud de AJAX no completada->'+error.status+'</div>'); 
	            }              
	        });
	     }        
    });  

    

    $("#frm_create_frecuencia").validate({
  
        rules: {          

        		nombre_frecuencia: { required: true},
        
        	           
        },
        submitHandler: function(form){
        	$.ajax({
                method: "POST",
                url: base_url+"/frecuencias/insert_frecuencia",
                data: $("#frm_create_frecuencia").serialize(), // Adjuntar los campos del formulario enviado.
                dataType: 'json',
                success: function(data)
                {
                    if (data.mensaje){
                       $('#msgs').html('<div class="alert alert-success fade in">\n\
                                         <a href="#" class="close" data-dismiss="alert">&times;</a>\n\
                                         <strong>Frecuencia creada exitosamente.</strong>\n\
                                     </div>'); 
                    }
                    else{
                       $('#msgs').html('<div class="alert alert-danger fade in">\n\
                                         <a href="#" class="close" data-dismiss="alert">&times;</a>\n\
                                         <strong>Error!</strong> Ha ocurrido un problema mientras se procesaban sus datos\n\
                                     </div>'); 
                       }

                },
                error: function(error){
                     $('#msgs').html('<div class="alert alert-danger alert-dismissible" role="alert">'+
                     '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                     '<strong>Error!</strong> Solicitud no completada</div>'); 
                 } 

              });
        	
              $('#nombre_frecuencia').val('');
            
              return false;         
        }
    });
    
});
    