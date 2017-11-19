
$(document).ready(function(){

	
	var base = window.location.href.split('/');
	var base_url = base[0]+'//'+base[2]+'/'+base[3];        
    mayuscula("input#nombre_esquema"); //Transforma el campo del nombre de esquema automaticamente a mayusculas al escribir en el.
  
    $('#nombre_esquema').focusout(function() {
    var nombre_esquema = $(this).val();                   

     if(nombre_esquema !== ''){
        $.ajax({
                method: 'POST',
                url: base_url+"/esquemas/consultarIdEsquema",
                data: {'identificador':nombre_esquema},
                dataType: 'json',
                success: function(data) {
                $('#msg_error').html(data.mensaje);                   
                $("#mensaje").fadeOut(3000);
                $("input[type=submit]").prop("disabled",data.cod);
            },
            error: function(error){
            $('#contenido').html('<div class="alert alert-warning alert-dismissible" role="alert">'+
                '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                '<strong>Error!!!</strong> Solicitud de AJAX no completada->'+error.status+'</div>'); 
            }              
        }) ;
        }        
	});  
   
 
    
    $('#nombre_esquema').on("paste",function(e){        
        e.preventDefault();
    });
    
    $("#frm_create_esquema").validate({
        rules: {
        	nombre_esquema: { required: true, minlength: 2, maxlength: 10},
        	descripcion_esquema: { required: true, maxlength: 100},
            
        },
        submitHandler: function(form){
        	$.ajax({
                method: "POST",
                url: base_url+"/esquemas/insert_esquema",
                data: $("#frm_create_esquema").serialize(), // Adjuntar los campos del formulario enviado.
                dataType: 'json',
                success: function(data)
                {
                    if (data.mensaje){
                       $('#msgs').html('<div class="alert alert-success fade in">\n\
                                         <a href="#" class="close" data-dismiss="alert">&times;</a>\n\
                                         <strong>Esquema insertado exitosamente</strong>\n\
                                     </div>'); }
                    else{
                       $('#msgs').html('<div class="alert alert-danger fade in">\n\
                                         <a href="#" class="close" data-dismiss="alert">&times;</a>\n\
                                         <strong>Error!</strong> Ha ocurrido un problema mientras se procesaban sus datos\n\
                                     </div>'); }

                },
                error: function(error){
                     $('#msgs').html('<div class="alert alert-danger alert-dismissible" role="alert">'+
                     '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                     '<strong>Error!</strong> Solicitud no completada</div>'); 
                 } 

              });
              $('#nombre_esquema').val('');
              $('#descripcion_esquema').val('');
             return false;         
        }
    });
     
    $("#modal_edit").on('shown.bs.modal', function(event){
        
    	// Get span that triggered the modal
	      var span = $(event.relatedTarget);
	      
        // Extract value from id attribut    
	 	  var idInfo =span.attr('id');
	 	  
	 	  var partes = idInfo.split("_");
	 	  var idEdit = partes[1];    	 
	      $.ajax({
	          type: "POST",
	          url: base_url+"/esquemas/carga_esquema_edit",
	          data: {'identificador':idEdit},
	          dataType: 'json',
	          success: function(data) {
	              $('#edit_esquema').html(data.mensaje);                   
	          },
	          error: function(error){
	        	  $('#contenido').html('<div class="alert alert-warning alert-dismissible" role="alert">'+
	              '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
	              '<strong>Error!!!</strong> Solicitud de AJAX no completada->'+error.status+'</div>'); 
	          } 
	      });
    });  
      
    $("#frm_edit_esquema").validate({
        rules: {
        	descripcion_esquema: { required: true},           
        },
        submitHandler: function(form){        	
        	$.ajax({
                method: "POST",
                url: base_url+"/esquemas/update_esquema",
                data: $("#frm_edit_esquema").serialize(), // Adjuntar los campos del formulario enviado.
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
              $('#nombre_esquema').val('');
              $('#descripcion_esquema').val('');
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
	 	  $('#id_esquema').val(idEdit); 
	     
    });  
    
    $("#modal_delete .modal-footer button").on('click', function(e){ 
     	// Get span that triggered the modal
    	 var target = e.target.id;
    	 var id_esquema = $('#id_esquema').val();     	
    	 
    	 	 if (target == "btn_yes_esquema") {
    	         // Extract value from id attribut    
    	 		  		  	
    		   	  	$.ajax({
    		          type: "POST",
    		          url: base_url+"/esquemas/delete_esquema",
    		          data: {'identificador':id_esquema},
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
    		  }
 	      });

});    


function mayuscula(campo){
            $(campo).keyup(function() {
                 $(this).val($(this).val().toUpperCase());
            });
}
