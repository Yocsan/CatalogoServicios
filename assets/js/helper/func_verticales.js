/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function(){

	
	var base = window.location.href.split('/');
	var base_url = base[0]+'//'+base[2]+'/'+base[3];        
    mayuscula("input#identificador_vertical"); //Transforma el campo del identificador vertical automaticamente a mayusculas al escribir en el.
  
    $('#identificador_vertical').focusout(function() {
    var identificador_vertical = $(this).val();                   

     if(identificador_vertical !== ''){
        $.ajax({
                method: 'POST',
                url: base_url+"/verticales/consultarIdVertical",
                data: {'identificador':identificador_vertical},
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
   
 
    $("#identificador_vertical").on("keypress", function(event){
        var soloLetras = /[A-Za-z]/g; 
        // Retrieving the key from the char code passed in event.which
        var key = String.fromCharCode(event.which);        
        // keyCode == 8  is backspace
        // keyCode == 37 is left arrow
        // keyCode == 39 is right arrow    
                if (event.keyCode === 8 || event.keyCode === 37 || event.keyCode === 39 || soloLetras.test(key)) {
                    return true;
                }  
            return false;
    });

    $('#identificador_vertical').on("paste",function(e){        
        e.preventDefault();
    });
    
    $("#frm_create_vertical").validate({
        rules: {
        	identificador_vertical: { required: true, minlength: 2, maxlength: 10},
        	nombre_vertical: { required: true, maxlength: 100},
            
        },
        submitHandler: function(form){
        	$.ajax({
                method: "POST",
                url: base_url+"/verticales/insert_vertical",
                data: $("#frm_create_vertical").serialize(), // Adjuntar los campos del formulario enviado.
                dataType: 'json',
                success: function(data)
                {
                    if (data.mensaje){
                       $('#msgs').html('<div class="alert alert-success fade in">\n\
                                         <a href="#" class="close" data-dismiss="alert">&times;</a>\n\
                                         <strong>Identificador insertado exitosamente.</strong>\n\
                                     </div>'); }
                    else{
                       $('#msgs').html('<div class="alert alert-danger fade in">\n\
                                         <a href="#" class="close" data-dismiss="alert">&times;</a>\n\
                                         <strong>Error!</strong> Ah ocurrido un problema mientras se procesaban sus datos\n\
                                     </div>'); }

                },
                error: function(error){
                     $('#msgs').html('<div class="alert alert-danger alert-dismissible" role="alert">'+
                     '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                     '<strong>Error!</strong> Solicitud no completada</div>'); 
                 } 

              });
              $('#identificador_vertical').val('');
              $('#nombre_vertical').val('');
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
	          url: base_url+"/verticales/carga_vertical_edit",
	          data: {'identificador':idEdit},
	          dataType: 'json',
	          success: function(data) {
	              $('#edit_vertical').html(data.mensaje);                   
	          },
	          error: function(error){
	        	  $('#contenido').html('<div class="alert alert-warning alert-dismissible" role="alert">'+
	              '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
	              '<strong>Error!!!</strong> Solicitud de AJAX no completada->'+error.status+'</div>'); 
	          } 
	      });
    });  
      
    $("#frm_edit_vertical").validate({
        rules: {
        	nombre_vertical: { required: true},           
        },
        submitHandler: function(form){        	
        	$.ajax({
                method: "POST",
                url: base_url+"/verticales/update_vertical",
                data: $("#frm_edit_vertical").serialize(), // Adjuntar los campos del formulario enviado.
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
              $('#identificador_vertical').val('');
              $('#nombre_vertical').val('');
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
	 	  $('#id_vertical').val(idEdit); 
	     
    });  
    
    $("#modal_delete .modal-footer button").on('click', function(e){ 
     	// Get span that triggered the modal
    	 var target = e.target.id;
    	 var id_vertical = $('#id_vertical').val();     	
    	 
    	 	 if (target == "btn_yes_vertical") {
    	         // Extract value from id attribut    
    	 		  		  	
    		   	  	$.ajax({
    		          type: "POST",
    		          url: base_url+"/verticales/delete_vertical",
    		          data: {'identificador':id_vertical},
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

