


$(document).ready(function(){
	
	var base = window.location.href.split('/');
	var base_url = base[0]+'//'+base[2]+'/'+base[3];      
	
	mayuscula('input#nombre_sistema');
    
    
    $('#nombre_sistema').focusout(function() {

	    var nombre_sistema = $("#nombre_sistema").val();
   
	    if(nombre_sistema !== ''){
	        $.ajax({
	                method: 'POST',
	                url: base_url+"/sistemas_aplicaciones/consultarSistema",
	                data: {'nombre_sistema':nombre_sistema},
	                dataType: 'json',
	                success: function(data) {
	                $('#msg_error_nombre_sistema').html(data.mensaje);                   
	                $("#mensaje").fadeOut(5000);
	                $("button[type=submit]").prop("disabled",data.cod);
	            },
	            error: function(error){
	            	$('#contenido').html('<div class="alert alert-warning alert-dismissible" role="alert">'+
	                '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
	                '<strong>Error!!!</strong> Solicitud de AJAX no completada->'+error.status+'</div>'); 
	            }              
	        });
	     }        
    }); 

    
    //valida y envia la informacion a la función 'carga_formulario' en el controller
    $("#frm_create_sistemas").validate({
    	
        rules: {
        	                
        		nombre_sistema: { required: true},
        	           
        },
        submitHandler: function(form){
        	$.ajax({
                method: "POST",
                url: base_url+"/sistemas_aplicaciones/insert_sistema",
                data: $("#frm_create_sistemas").serialize(), // Adjuntar los campos del formulario enviado.
                dataType: 'json',
                success: function(data) {
                    if (data.mensaje){
                        $('#msgs').html('<div class="alert alert-success fade in">\n\
                                          <a href="#" class="close" data-dismiss="alert">&times;</a>\n\
                                          <strong>Sistema creado exitosamente.</strong>\n\
                                      </div>'); 
                     }
                     else{
                        $('#msgs').html('<div class="alert alert-danger fade in">\n\
                                          <a href="#" class="close" data-dismiss="alert">&times;</a>\n\
                                          <strong>Error!</strong> Ah ocurrido un problema mientras se procesaban sus datos\n\
                                      </div>'); 
                        }
        			
        		},
        		error: function(error){
                	$('#contenido').html('<div class="alert alert-warning alert-dismissible" role="alert">'+
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                    '<stro  ng>Error!!!</strong> Solicitud de AJAX no completada->'+error.status+'</div>'); 
        		}
        	});
        	
            $('#nombre_sistema').val('');
            $('#descripcion_sistema').val('');
        	return false;        
        }
    });

     
    $("#modal_edit").on('shown.bs.modal', function(event){
        
    	// Get span that triggered the modal
	      var span = $(event.relatedTarget);
	      
        // Extract value from id attribut    
	 	  var idInfo = span.attr('id');
	 	  var partes = idInfo.split("_");
	 	  var idEdit = partes[1];    	 
	      $.ajax({
	          type: "POST",
	          url: base_url+"/sistemas_aplicaciones/carga_sistema_edit",
	          data: {'identificador':idEdit},
	          dataType: 'json',
	          success: function(data) {
	              $('#edit_sistema').html(data.mensaje);                   
	          },
	          error: function(error){
	        	  $('#contenido').html('<div class="alert alert-warning alert-dismissible" role="alert">'+
	              '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
	              '<strong>Error!!!</strong> Solicitud de AJAX no completada->'+error.status+'</div>'); 
	          } 
	      });
    });  
    
    $("#frm_edit_sistemas").validate({
        rules: {
            
    		nombre_sistema: { required: true},
            
        },
        submitHandler: function(form){        	
        	$.ajax({
                method: "POST",
                url: base_url+"/sistemas_aplicaciones/update_sistema",
                data: $("#frm_edit_sistemas").serialize(), // Adjuntar los campos del formulario enviado.
                dataType: 'json',
                success: function(data)
                {$('#principal').html(data.view); 
                
                },
                error: function(error){
                     $('#msgs').html('<div class="alert alert-danger alert-dismissible" role="alert">'+
                     '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                     '<strong>Error!</strong> Solicitud no completada</div>'); 
                 } 

              });
			  return false;         
        }
    });
    
    
    
   $("#modal_delete").on('shown.bs.modal', function(event){
        
    	// Get span that triggered the modal
	      var span = $(event.relatedTarget);
	      
        // Extract value from id attribut    
	 	  var idInfo =span.attr('id');
	 	  
	 	  var partes = idInfo.split("_");
	 	  var idEdit = partes[1]; 
	 	  $('#id_sistema').val(idEdit); 
	     
    });  
    
    $("#modal_delete .modal-footer button").on('click', function(e){ 
     	// Get span that triggered the modal
    	 var target = e.target.id;
    	 var id_sistema = $('#id_sistema').val();     	
    	 
    	 	 if (target == "btn_yes_sistema") {
    	         // Extract value from id attribut    
    	 		  		  	
    		   $.ajax({
    		          type: "POST",
    		          url: base_url+"/sistemas_aplicaciones/delete_sistema",
    		          data: {'identificador':id_sistema},
    		          dataType: 'json',
    		          success: function(data) {
    		        	 $('#principal').html(data.view);        
    		        	 
    		          },
    		          error: function(error){
    		        	  $('#contenido').html('<div class="alert alert-warning alert-dismissible" role="alert">'+
    		              '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
    		              '<strong>Error!!!</strong> Solicitud de AJAX no completada->'+error.status+'</div>'); 
    		          }
    		   });
    		 }/*end if*/
    	 	 
    	 	 
 	      });/*end modal_delete*/
    
});     


function mayuscula(campo){
    $(campo).keyup(function() {
         $(this).val($(this).val().toUpperCase());
    });
}





