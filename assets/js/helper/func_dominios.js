
        /* 
         * To change this license header, choose License Headers in Project Properties.
         * To change this template file, choose Tools | Templates
         * and open the template in the editor.
         */

/**
 * @autor TSU. Yocsan Burgos  <yocsan19@gmail.com>
 * @fecha_creacion 30/08/2017
 */

$(document).ready(function(){

	
	var base = window.location.href.split('/');
	var base_url = base[0]+'//'+base[2]+'/'+base[3];       
	
    $('#nombre_dominio').focusout(function() {
	    var nombre_dominio = $('#nombre_dominio').val();    
	
	    if(nombre_dominio !== ''){
	        $.ajax({
	                method: 'POST',
	                url: base_url+"/dominios/consultarDominio",
	                data: {'nombre_dominio':nombre_dominio},
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
	     }        
    });  

    
    $("#frm_create_dominio").validate({
    	
        rules: {
        	                
			nombre_dominio: { required: true}

        	           
        },
        submitHandler: function(form){
        	$.ajax({
                method: "POST",
                url: base_url+"/dominios/insert_dominio",
                data: $("#frm_create_dominio").serialize(), // Adjuntar los campos del formulario enviado.
                dataType: 'json',
                success: function(data)
                {               
                	
                    if (data.mensaje){
                       $('#msgs').html('<div class="alert alert-success fade in">\n\
                                         <a href="#" class="close" data-dismiss="alert">&times;</a>\n\
                                         <strong>Dominio creado exitosamente.</strong>\n\
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
        	
              $('#nombre_dominio').val('');
              $('#descripcion_dominio').val('');

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
	          url: base_url+"/dominios/carga_dominio_edit",
	          data: {'id_dominio':idEdit},
	          dataType: 'json',
	          success: function(data) {
	              $('#edit_dominio').html(data.mensaje);                   
	          },
	          error: function(error){
	        	  $('#contenido').html('<div class="alert alert-warning alert-dismissible" role="alert">'+
	              '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
	              '<strong>Error!!!</strong> Solicitud de AJAX no completada->'+error.status+'</div>'); 
	          } 
	      });
    });  
      
    $("#frm_edit_dominio").validate({
        rules: {
			nombre_dominio: { required: true},
	        descripcion_dominio:{required:true},

        },
        submitHandler: function(form){        	
        	$.ajax({
                method: "POST",
                url: base_url+"/dominios/update_dominio",
                data: $("#frm_edit_dominio").serialize(), // Adjuntar los campos del formulario enviado.
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

        	
            $('#nombre_dominio').val('');
            $('#descripcion_dominio').val('');

			
            return false;         
        }
    });
    
   $("#modal_delete").on('shown.bs.modal', function(event){
        
    	// Get span that triggered the modal
	      var span = $(event.relatedTarget);
	      
        // Extract value from id attribut    
	 	  var idInfo = span.attr('id');
	 	  
	 	  var partes = idInfo.split("_");
	 	  var idEdit = partes[1]; 
	 	  $('#id_dominio').val(idEdit); 
	     
    });  
    
    $("#modal_delete .modal-footer button").on('click', function(e){ 
     	// Get span that triggered the modal
    	 var target = e.target.id;
    	 var id_dominio = $('#id_dominio').val();     	
    	 
    	 	 if (target == "btn_yes_dominio") {
    	         // Extract value from id attribut    
    	 		  		  	
    		   $.ajax({
    		          type: "POST",
    		          url: base_url+"/dominios/delete_dominio",
    		          data: {'id_dominio':id_dominio},
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


