/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function(){
	
	var base = window.location.href.split('/');
	var base_url = base[0]+'//'+base[2]+'/'+base[3];
	
    $('#codigo_error').focusout(function() {
        var codigo_error = $(this).val();                   

         if(codigo_error !== ''){
            $.ajax({
                    method: 'POST',
                    url: base_url+"/errores/consultarCodigoError",
                    data: {'codigo':codigo_error},
                    dataType: 'json',
                    success: function(data) {
                    $('#msg_error').html(data.mensaje);                   
                    $("span").fadeOut(7000);
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

    $("#frm_create_errores").validate({
         
        rules: {
        	codigo_error: { required: true},
        	descripcion_error: { required: true},

        },
        submitHandler: function(form){
            $.ajax({
            	  method: "POST",
                  url: base_url+"/errores/insert_error",
                  data: $("#frm_create_errores").serialize(), // Adjuntar los campos del formulario enviado.
                  dataType: 'json',
                  success: function(data)
                  {
	                  if (data.mensaje){
                          $('#msgs').html('<div class="alert alert-success fade in">\n\
                                          <a href="#" class="close" data-dismiss="alert">&times;</a>\n\
                                          <strong>Error insertado exitosamente.</strong>\n\
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
            
            	$('#codigo_error').val('');   
               	$('#descripcion_error').val('');  
               	$('#transporte').val('');    
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
  		          url: base_url+"/errores/carga_errores_edit",
  		          data: {'codigo':idEdit},
  		          dataType: 'json',
  		          success: function(data) {
  		              $('#edit_error').html(data.mensaje);                   
  		          },
  		          error: function(error){
  		        	  $('#contenido').html('<div class="alert alert-warning alert-dismissible" role="alert">'+
  		              '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
  		              '<strong>Error!!!</strong> Solicitud de AJAX no completada->'+error.status+'</div>'); 
  		          } 
  		      });
  	    });  
  	      
  	    $("#frm_edit_errores").validate({
  	        rules: {
  	        	descripcion_errores: { required: true},        
  	        },
  	        submitHandler: function(form){        	
  	        	$.ajax({
  	                method: "POST",
  	                url: base_url+"/errores/update_error",
  	                data: $("#frm_edit_errores").serialize(), // Adjuntar los campos del formulario enviado.
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
  	              $('#descripcion_errores').val('');
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
  		 	  $('#id_errores').val(idEdit); 
  		     
  	    });  
  	    
  	    $("#modal_delete .modal-footer button").on('click', function(e){ 
  	     	// Get span that triggered the modal
  	    	 var target = e.target.id;
  	    	 var id_vertical = $('#id_errores').val();
  	    	 	 if (target == "btn_yes_error") {
  	    	         // Extract value from id attribut    
  	    	 		  		  	
  	    		   	  	$.ajax({
  	    		          type: "POST",
  	    		          url: base_url+"/errores/delete_error",
  	    		          data: {'codigo':id_vertical},
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