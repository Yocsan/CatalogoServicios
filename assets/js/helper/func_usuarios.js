
        /* 
         * To change this license header, choose License Headers in Project Properties.
         * To change this template file, choose Tools | Templates
         * and open the template in the editor.
         */

/**
 * @autor TSU. Yocsan Burgos  <yocsan19@gmail.com>
 * @fecha_creacion 06/10/2016
 */

$(document).ready(function(){

	
	var base = window.location.href.split('/');
	var base_url = base[0]+'//'+base[2]+'/'+base[3];       
  
    $('#login').focusout(function() {
	    var login = $(this).val();                   
	
	     if(login !== ''){
	        $.ajax({
	                method: 'POST',
	                url: base_url+"/usuarios/consultarNombreUsuario",
	                data: {'usuario':login},
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
	        });
	     }        
    });  


    $('#login').on("paste",function(e){        
        e.preventDefault();
    });
    
    $("#frm_create_usuario").validate({
    	
        rules: {
        	                
        		nombre: { required: true},
                login:{required:true},
                password:{required:true},
                numero_contacto:{required:true},
                cedula:{required:true,digits:true},
                tipo_rol:{required:true,digits:true}
        	           
        },
        submitHandler: function(form){
        	$.ajax({
                method: "POST",
                url: base_url+"/usuarios/insert_usuario",
                data: $("#frm_create_usuario").serialize(), // Adjuntar los campos del formulario enviado.
                dataType: 'json',
                success: function(data)
                {
                    if (data.mensaje){
                       $('#msgs').html('<div class="alert alert-success fade in">\n\
                                         <a href="#" class="close" data-dismiss="alert">&times;</a>\n\
                                         <strong>Usuario creado exitosamente.</strong>\n\
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
        	
              $('#nombre').val('');
              $('#apellidos').val('');
              $('#login').val('');
              $('#password').val('');
              $('#p00').val('');
              $('#numero_contacto').val('');
              $('#cedula').val('');
              $('#tipo_rol').val('');
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
	          url: base_url+"/usuarios/carga_usuario_edit",
	          data: {'identificador':idEdit},
	          dataType: 'json',
	          success: function(data) {
	              $('#edit_usuario').html(data.mensaje);                   
	          },
	          error: function(error){
	        	  $('#contenido').html('<div class="alert alert-warning alert-dismissible" role="alert">'+
	              '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
	              '<strong>Error!!!</strong> Solicitud de AJAX no completada->'+error.status+'</div>'); 
	          } 
	      });
    });  
      
    $("#frm_edit_usuario").validate({
        rules: {
    		nombre: { required: true},
            login:{required:true},
            numero_contacto:{required:true},
            cedula:{required:true,digits:true},
            tipo_rol:{required:true,digits:true,},       
        },
        submitHandler: function(form){        	
        	$.ajax({
                method: "POST",
                url: base_url+"/usuarios/update_usuario",
                data: $("#frm_edit_usuario").serialize(), // Adjuntar los campos del formulario enviado.
                dataType: 'json',
                success: function(data) {
                	$('#principal').html(data.view); 
                
                },
                error: function(error){
                     $('#msgs').html('<div class="alert alert-danger alert-dismissible" role="alert">'+
                     '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                     '<strong>Error!</strong> Solicitud no completada</div>'); 
                 } 

              });
			  $('#nombre').val('');
			  $('#apellidos').val('');
			  $('#login').val('');
			  $('#password').val('');
			  $('#numero_contacto').val('');
			  $('#cedula').val('');
			  $('#tipo_rol').val('');
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
	 	  $('#user_id').val(idEdit); 
	     
    });  
    
    $("#modal_delete .modal-footer button").on('click', function(e){ 
     	// Get span that triggered the modal
    	 var target = e.target.id;
    	 var user_id = $('#user_id').val();     	
    	 
    	 	 if (target == "btn_yes_usuario") {
    	         // Extract value from id attribut    
    	 		  		  	
    		   $.ajax({
    		          type: "POST",
    		          url: base_url+"/usuarios/delete_usuario",
    		          data: {'identificador':user_id},
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
