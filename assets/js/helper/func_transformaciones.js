

$(document).ready(function(){
	
	var base = window.location.href.split('/');
	var base_url = base[0]+'//'+base[2]+'/'+base[3];
	
	for(f=1; f<8; f++){
		mayuscula("input#sistema_destino"+f);
	}
	
	mayuscula("input#sistema_origen");
	
    $('#sistema_origen').focusout(function() {
        var dominio = $('#dominio').val();
    	var sistema_origen = $('#sistema_origen').val();                   
        
        if((sistema_origen !== '') && (dominio !== '0')){
            $.ajax({
                    method: 'POST',
                    url: base_url+"/transformaciones/consultarSistema_origen",
                    data: {'sistema_origen':sistema_origen, 'dominio':dominio},
                    dataType: 'json',
                    success: function(data) {
                    $('#msg_error').html(data.mensaje);                   
                    $("span").fadeOut(9000);
                    $("input[type=submit]").prop("disabled",data.cod);
                },
                error: function(error){
                	$('#contenido').html('<div class="alert alert-warning alert-dismissible" role="alert">'+
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                    '<strong>Error!!!</strong> Solicitud de AJAX no completada->'+error.status+'</div>'); 
                }              
            });
         }//if        
    }); //focusout 
    
    $('#dominio').focusout(function() {
        var dominio = $('#dominio').val();
    	var sistema_origen = $('#sistema_origen').val();                   
        
        if((sistema_origen !== '') && (dominio !== '0')){
            $.ajax({
                    method: 'POST',
                    url: base_url+"/transformaciones/consultarSistema_origen",
                    data: {'sistema_origen':sistema_origen, 'dominio':dominio},
                    dataType: 'json',
                    success: function(data) {
                    $('#msg_error').html(data.mensaje);                   
                    $("span").fadeOut(9000);
                    $("input[type=submit]").prop("disabled",data.cod);
                },
                error: function(error){
                	$('#contenido').html('<div class="alert alert-warning alert-dismissible" role="alert">'+
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                    '<strong>Error!!!</strong> Solicitud de AJAX no completada->'+error.status+'</div>'); 
                }              
            });
         }//if        
    }); //focusout 
    
    
    $('#codigo_error').on("paste",function(e){        
        e.preventDefault();
    });

    $("#frm_create_transformaciones").validate({
         
        rules: {
        	dominio: { required: true},
        	sistema_origen: { required: true},
        	valor_equivalencia: { required: true},
        	sistema_destino1: { required: true},
        	valor_equivalente1: { required: true},

        },
        
        submitHandler: function(form){
            $.ajax({
            	  method: "POST",
                  url: base_url+"/transformaciones/insert_transformacion",
                  data: $("#frm_create_transformaciones").serialize(), // Adjuntar los campos del formulario enviado.
                  dataType: 'json',
                  success: function(data)
                  {
	                  if (data.mensaje){
                          $('#msgs').html('<div class="alert alert-success fade in">\n\
                                          <a href="#" class="close" data-dismiss="alert">&times;</a>\n\
                                          <strong>Transformacion insertado exitosamente.</strong>\n\
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
                      $('#msgs').html('<div class="alert alert-danger alert-dismissible" role="alert">'+
                      '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                      '<strong>Error!</strong> Solicitud no completada</div>'); 
                   } 
                });
            
            	$('#dominio').val('');   
               	$('#sistema_origen').val('');  
               	$('#valor_equivalencia').val('');   
               	$('#sistema_destino1').val('');  
               	$('#valor_equivalente1').val('');
              	$('#sistema_destino2').val('');  
               	$('#valor_equivalente2').val('');
              	$('#sistema_destino3').val('');  
               	$('#valor_equivalente3').val('');
              	$('#sistema_destino4').val('');  
               	$('#valor_equivalente4').val('');
              	$('#sistema_destino5').val('');  
               	$('#valor_equivalente5').val('');
              	$('#sistema_destino6').val('');  
               	$('#valor_equivalente6').val('');
              	$('#sistema_destino7').val('');  
               	$('#valor_equivalente7').val('');
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
  		          url: base_url+"/transformaciones/carga_transformaciones_edit",
  		          data: {'id_transformacion':idEdit},
  		          dataType: 'json',
  		          success: function(data) {
  		              $('#edit_transformacion').html(data.mensaje);                   
  		          },
  		          error: function(error){
  		        	  $('#contenido').html('<div class="alert alert-warning alert-dismissible" role="alert">'+
  		              '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
  		              '<strong>Error!!!</strong> Solicitud de AJAX no completada->'+error.status+'</div>'); 
  		          } 
  		      });
  	    });  
  	      
  	    $("#frm_edit_transformaciones").validate({

  	        rules: {
  	        	dominio: { required: true},
  	        	sistema_origen: { required: true},
  	        	valor_equivalencia: { required: true},
  	        	sistema_destino1: { required: true},
  	        	valor_equivalente1: { required: true},

  	        },
  	    	
  	        submitHandler: function(form){        	
  	        	$.ajax({
  	                method: "POST",
  	                url: base_url+"/transformaciones/update_transformacion",
  	                data: $("#frm_edit_transformaciones").serialize(), // Adjuntar los campos del formulario enviado.
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

  	            
            	$('#dominio').val('');   
               	$('#sistema_origen').val('');  
               	$('#valor_equivalencia').val('');   
               	$('#sistema_destino1').val('');  
               	$('#valor_equivalente1').val('');
              	$('#sistema_destino2').val('');  
               	$('#valor_equivalente2').val('');
              	$('#sistema_destino3').val('');  
               	$('#valor_equivalente3').val('');
              	$('#sistema_destino4').val('');  
               	$('#valor_equivalente4').val('');
              	$('#sistema_destino5').val('');  
               	$('#valor_equivalente5').val('');
              	$('#sistema_destino6').val('');  
               	$('#valor_equivalente6').val('');
              	$('#sistema_destino7').val('');  
               	$('#valor_equivalente7').val('');
               	return false; 
  	        }
  	    });
  	    
  	    //se asigna el valor al id del input en modal_body
  	   $("#modal_delete").on('shown.bs.modal', function(event){
  	        
  	    	// Get span that triggered the modal
  		      var span = $(event.relatedTarget);
  		      
  	        // Extract value from id attribut    
  		 	  var idInfo =span.attr('id');
  		 	  
  		 	  var partes = idInfo.split("_");
  		 	  var idEdit = partes[1]; 
  		 	  $('#id_transformacion').val(idEdit); 
  		     
  	    });  
  	    
  	    $("#modal_delete .modal-footer button").on('click', function(e){ 
  	     	// Get span that triggered the modal
  	    	 var target = e.target.id;
  	    	 var id_transformacion = $('#id_transformacion').val();
  	    	 	 if (target == "btn_yes_transformacion") {
  	    	         // Extract value from id attribut    
  	    	 		  		  	
  	    		   	  	$.ajax({
  	    		          type: "POST",
  	    		          url: base_url+"/transformaciones/delete_transformacion",
  	    		          data: {'id_transformacion':id_transformacion},
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

