
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
	
	//verifica si el numero de requerimiento ya existe
	$('#numero_requerimiento').focusout(function() {

	    var numero_requerimiento = $("#numero_requerimiento").val();
   
	    if(numero_requerimiento !== ''){
	        $.ajax({
	                method: 'POST',
	                url: base_url+"/servicios/consultaNumeroNecesidad",
	                data: {'numero_requerimiento':numero_requerimiento},
	                dataType: 'json',
	                success: function(data) {
	                $('#msg_error_numero_requerimiento').html(data.mensaje);                   
	                $("span").fadeOut(5000);
	                $("input[type=button]").prop("disabled",data.cod);
	            },
	            error: function(error){
	            	$('#contenido').html('<div class="alert alert-warning alert-dismissible" role="alert">'+
	                '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
	                '<strong>Error!!!</strong> Solicitud de AJAX no completada->'+error.status+'</div>'); 
	            }              
	        });
	     }//end if        
    }); 
	
	
	//verifica si el numero de requerimiento ya existe
	$('#nombre_servicio').focusout(function() {

	    var nombre_servicio = $("#nombre_servicio").val();
   
	    if(nombre_servicio !== ''){
	        $.ajax({
	                method: 'POST',
	                url: base_url+"/servicios/consultaNombre_servicio",
	                data: {'nombre_servicio':nombre_servicio},
	                dataType: 'json',
	                success: function(data) {
	                $('#msg_error_nombre_servicio').html(data.mensaje);                   
	                $("span").fadeOut(5000);
	                $("input[type=button]").prop("disabled",data.cod);
	            },
	            error: function(error){
	            	$('#contenido').html('<div class="alert alert-warning alert-dismissible" role="alert">'+
	                '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
	                '<strong>Error!!!</strong> Solicitud de AJAX no completada->'+error.status+'</div>'); 
	            }              
	        });
	     }//end if        
    });
	
	//desactiva los select de cantidad de sistemas, ya que si es web solo puede ser de uno a uno
	$('#tipo_servicio').focusout(function() {
	
		var tipo_servicio = $('#tipo_servicio').val();
		
		if(tipo_servicio == '2') {
			
			$("#cantidad_sistemas_origen").prop('disabled', true);
			$("#cantidad_sistemas_destino").attr('disabled', 'disabled');
			
		}else if(tipo_servicio == '1') {
			
			$("#cantidad_sistemas_origen").removeAttr("disabled");
			$("#cantidad_sistemas_destino").removeAttr("disabled");

		}
	});
	/*--------------------------validaciones---------------------------------------------*/
   $('#numero_requerimiento').focusout(function() {

	    var numero_requerimiento = $("#numero_requerimiento").val(); 
	    if(numero_requerimiento == ''){
	        $("input[type=button]").prop("disabled",true);
           $('#msg_error_numero_requerimiento').html('<span class="error">Este campo es obligatorio</span>');  
          
       }else{
           $("input[type=button]").prop("disabled",false);
           $('#msg_error_numero_requerimiento').html(''); 
       }
    });  
   
   $('#descripcion_requerimiento').focusout(function() {

	    var descripcion_requerimiento = $("#descripcion_requerimiento").val(); 
	    if(descripcion_requerimiento == ''){
	        $("input[type=button]").prop("disabled",true);
           $('#msg_error_descripcion_requerimiento').html('<span class="error">Este campo es obligatorio</span>');  
          
       }else{
           $("input[type=button]").prop("disabled",false);
           $('#msg_error_descripcion_requerimiento').html(''); 
       }
    });   
   $('#nombre_servicio').focusout(function() {

	    var nombre_servicio = $("#nombre_servicio").val(); 
	    if(nombre_servicio == ''){
	        $("input[type=button]").prop("disabled",true);
           $('#msg_error_nombre_servicio').html('<span class="error">Este campo es obligatorio</span>');  
          
       }else{
           $("input[type=button]").prop("disabled",false);
           $('#msg_error_nombre_servicio').html(''); 
       }
    });   
   $('#introduccion').focusout(function() {

	    var introduccion = $("#introduccion").val(); 
	    if(introduccion == ''){
	        $("input[type=button]").prop("disabled",true);
           $('#msg_error_introduccion').html('<span class="error">Este campo es obligatorio</span>');  
          
       }else{
           $("input[type=button]").prop("disabled",false);
           $('#msg_error_introduccion').html(''); 
       }
    });   
   $('#descripcion_proceso').focusout(function() {

	    var evento_inicio_disparador = $("#evento_inicio_disparador").val(); 
	    if(evento_inicio_disparador == ''){
	        $("input[type=button]").prop("disabled",true);
           $('#msg_error_evento_inicio_disparador').html('<span class="error">Este campo es obligatorio</span>');  
          
       }else{
           $("input[type=button]").prop("disabled",false);
           $('#msg_error_evento_inicio_disparador').html(''); 
       }
    });   
   $('#adaptaciones').focusout(function() {

	    var adaptaciones = $("#adaptaciones").val(); 
	    if(adaptaciones == ''){
	        $("input[type=button]").prop("disabled",true);
           $('#msg_error_adaptaciones').html('<span class="error">Este campo es obligatorio</span>');  
          
       }else{
           $("input[type=button]").prop("disabled",false);
           $('#msg_error_adaptaciones').html(''); 
       }
    });   
   $('#arquitectura').focusout(function() {

	    var arquitectura = $("#arquitectura").val(); 
	    if(arquitectura == ''){
	        $("input[type=button]").prop("disabled",true);
           $('#msg_error_arquitectura').html('<span class="error">Este campo es obligatorio</span>');  
          
       }else{
           $("input[type=button]").prop("disabled",false);
           $('#msg_error_arquitectura').html(''); 
       }
    });   
   $('#diagrama_uml').focusout(function() {

	    var diagrama_uml = $("#diagrama_uml").val(); 
	    if(diagrama_uml == ''){
	        $("input[type=button]").prop("disabled",true);
           $('#msg_error_diagrama_uml').html('<span class="error">Este campo es obligatorio</span>');  
          
       }else{
           $("input[type=button]").prop("disabled",false);
           $('#msg_error_diagrama_uml').html(''); 
       }
    });   
   $('#premisa').focusout(function() {

	    var premisa = $("#premisa").val(); 
	    if(premisa == ''){
	        $("input[type=button]").prop("disabled",true);
           $('#msg_error_premisa').html('<span class="error">Este campo es obligatorio</span>');  
          
       }else{
           $("input[type=button]").prop("disabled",false);
           $('#msg_error_premisa').html(''); 
       }
    });   
   $('#nombre').focusout(function() {

	    var nombre = $("#nombre").val(); 
	    if(nombre == ''){
	        $("input[type=button]").prop("disabled",true);
           $('#msg_error_nombre').html('<span class="error">Este campo es obligatorio</span>');  
          
       }else{
           $("input[type=button]").prop("disabled",false);
           $('#msg_error_nombre').html(''); 
       }
    });   
   $('#directorio').focusout(function() {

	    var directorio = $("#directorio").val(); 
	    if(directorio == ''){
	        $("input[type=button]").prop("disabled",true);
           $('#msg_error_directorio').html('<span class="error">Este campo es obligatorio</span>');  
          
       }else{
           $("input[type=button]").prop("disabled",false);
           $('#msg_error_directorio').html(''); 
       }
    });   
   $('#volumen').focusout(function() {

	    var volumen = $("#volumen").val(); 
	    if(volumen == ''){
	        $("input[type=button]").prop("disabled",true);
           $('#msg_error_volumen').html('<span class="error">Este campo es obligatorio</span>');  
          
       }else{
           $("input[type=button]").prop("disabled",false);
           $('#msg_error_volumen').html(''); 
       }
    });   
   $('#regla_transporte').focusout(function() {

	    var regla_transporte = $("#regla_transporte").val(); 
	    if(regla_transporte == ''){
	        $("input[type=button]").prop("disabled",true);
           $('#msg_error_regla_transporte').html('<span class="error">Este campo es obligatorio</span>');  
          
       }else{
           $("input[type=button]").prop("disabled",false);
           $('#msg_error_regla_transporte').html(''); 
       }
    });   
   $('#condicion_control_m').focusout(function() {

	    var condicion_control_m = $("#condicion_control_m").val(); 
	    if(condicion_control_m == ''){
	        $("input[type=button]").prop("disabled",true);
           $('#msg_error_condicion_control_m').html('<span class="error">Este campo es obligatorio</span>');  
          
       }else{
           $("input[type=button]").prop("disabled",false);
           $('#msg_error_condicion_control_m').html(''); 
       }
    });   
   $('#wsdl').focusout(function() {

	    var descripcion_proceso = $("#descripcion_proceso").val(); 
	    if(descripcion_proceso == ''){
	        $("input[type=button]").prop("disabled",true);
           $('#msg_error_wsdl').html('<span class="error">Este campo es obligatorio</span>');  
          
       }else{
           $("input[type=button]").prop("disabled",false);
           $('#msg_error_wsdl').html(''); 
       }
    });   

	
	/*-------------------------------------------------accion del primer boton siguiente---------------------------------------------------------------*/
       $("#siguiente_1").click(function(){

         $.ajax({
               method: "POST",
               url: base_url+"/servicios/carga_formulario_servicios",
               data: $("#frm_create_servicio_1").serialize(), // Adjuntar los campos del formulario enviado.
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
    
    /*----------------------------------accion de los botones de anterior y siguiente de la vista de servicio-----------------------------------------*/    
    $("#anterior_2").click(function(){
		
    	$.ajax({
            method: "POST",
            url: base_url+"/servicios/carga_vista_anterior_1",
            data: $("#frm_create_servicio").serialize(), // Adjuntar los campos del formulario enviado.
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
    
    $("#siguiente_2").click(function(){
 
		$.ajax({
		    method: "POST",
			url: base_url+"/servicios/carga_formulario_premisas",
			data:  new FormData($("#frm_create_servicio_2")[0]), //$("#frm_caso_uso").serialize(),  // Adjuntar los campos del formulario enviado.
			dataType: 'json',
			processData:false,
			contentType:false,
			success: function(data) {
				$('#principal').html(data.mensaje);
				
			},
			error: function(error) {
				$('#contenido').html('<div class="alert alert-warning alert-dismissible" role="alert">'+
				'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
				'<strong>Error!!!</strong> Solicitud de AJAX no completada->'+error.status+'</div>'); 
					}
				});
		return false; 

    	
    });
    
    /*----------------------------------accion de los botones de anterior y siguiente de la vista de premisas-----------------------------------------*/    

    
    $("#anterior_3").click(function(){
		
    	$.ajax({
            method: "POST",
            url: base_url+"/servicios/carga_vista_anterior_2",
            data: $("#frm_create_servicio_3").serialize(), // Adjuntar los campos del formulario enviado.
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
    
    
	var tipo_servicio_premisa= $("#tipo_servicio_premisa").val();
	
	if ( tipo_servicio_premisa == '1') { //FTP		
		$("#siguiente_3").click(function(){
			
		
		    	$.ajax({
		            method: "POST",
		            url: base_url+"/servicios/carga_formulario_ftp",
		            data: $("#frm_create_servicio_3").serialize(), // Adjuntar los campos del formulario enviado.
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
	    });//end function   	
	}//end if
		    	
	else if( tipo_servicio_premisa == '2') { //WEB
		
		$("#siguiente_3").click(function(){		
		    	$.ajax({
		            method: "POST",
		            url: base_url+"/servicios/carga_formulario_web",
		            data: $("#frm_create_servicio_3").serialize(), // Adjuntar los campos del formulario enviado.
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
			
	    });//end function

	}//end else if

    /*----------------------------------accion de los botones de anterior y siguiente de la vista de configuracion ftp o web-----------------------------------------*/    
    
    $("#anterior_4").click(function(){
		
    	$.ajax({
            method: "POST",
            url: base_url+"/servicios/carga_vista_anterior_3",
            data: $("#frm_create_servicio_3").serialize(), // Adjuntar los campos del formulario enviado.
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
    
	
    $("#guardar_ftp").click(function(){
		
    	$.ajax({
            method: "POST",
            url: base_url+"/servicios/insert_configuracion_ftp",
            data: $("#frm_servicios_ftp").serialize(), // Adjuntar los campos del formulario enviado.
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
    
    
    $("#guardar_web").click(function(){
		
    	$.ajax({
            method: "POST",
            url: base_url+"/servicios/insert_configuracion_web",
            data: $("#frm_servicios_web").serialize(), // Adjuntar los campos del formulario enviado.
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
  
    /*--------------------------------------------Funciones para editar--------------------------------------------------------------------*/
    	
    $("#siguiente_tipo_servicio_consultar").click(function(){
		
    	$.ajax({
            method: "POST",
            url: base_url+"/servicios/carga_tabla_servicios",
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
       
    //valida y envia la informacion a la función 'carga_formulario' en el controller
    $("#edit_siguiente").click(function() {
    	var tipo_sistema = $('#tipo_sistema').val();
        	$.ajax({
                method: "POST",
                url: base_url+"/sistemas_aplicaciones/carga_formulario_search",
                data: {'tipo_sistema': tipo_sistema}, // Adjuntar los campos del formulario enviado.
                dataType: 'json',
                success: function(data) {
        			$('#tabla_sistema').html(data.mensaje);
        			
        		},
        		error: function(error){
                	$('#contenido').html('<div class="alert alert-warning alert-dismissible" role="alert">'+
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                    '<stro  ng>Error!!!</strong> Solicitud de AJAX no completada->'+error.status+'</div>'); 
        		}
        	});
        	return false;          
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
      
    $("#frm_edit_sistemas_web").validate({
        rules: {
    		conexion_https: { required: true},
            host_http:{required:true},
            timeout_http:{required:true},
            user_http:{required:true},
            pass_http:{required:true},
            function_http:{required:true},
            conexion_jdbc:{required:true},
            user_jdbc:{required:true},
            pass_jdbc:{required:true},
            name_jdbc:{required:true},
            descripcion_jdbc:{required:true},
            datasourcename:{required:true},
            drivertype:{required:true},
            protocolo_jdbc:{required:true},
            dbport_jdbc:{required:true},
            connectiontype_jdbc:{required:true},
            servername_jdbc:{required:true},
            max_pool:{required:true},
            min_pool:{required:true},
            direccion_correo:{required:true}
            
        },
        submitHandler: function(form){        	
        	$.ajax({
                method: "POST",
                url: base_url+"/sistemas_aplicaciones/update_sistema_web",
                data: $("#frm_edit_sistemas_web").serialize(), // Adjuntar los campos del formulario enviado.
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
    
    $("#frm_edit_sistemas_batch").validate({
        rules: {
            
    		protocolo_batch: { required: true},
            host_batch:{required:true},
            usuario_batch:{required:true},
            pass_batch:{required:true},
            typekey_batch:{required:true},
            correo_electronico:{required:true}
            
        },
        submitHandler: function(form){        	
        	$.ajax({
                method: "POST",
                url: base_url+"/sistemas_aplicaciones/update_sistema_batch",
                data: $("#frm_edit_sistemas_batch").serialize(), // Adjuntar los campos del formulario enviado.
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
	 	  $('#id_servicio').val(idEdit); 
	     
    });  
    
    $("#modal_delete .modal-footer button").on('click', function(e){ 
     	// Get span that triggered the modal
    	 var target = e.target.id;
    	 var id_servicio = $('#id_servicio').val();     	
    	 
    	 	 if (target == "btn_yes_web") {
    	         // Extract value from id attribut    
    	 		  		  	
    		 $.ajax({
    		          type: "POST",
    		          url: base_url+"/servicios/delete_servicio_web",
    		          data: {'identificador':id_servicio},
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
    	 	 
    	 	 else if (target == "btn_yes_ftp") {
    	         // Extract value from id attribut    
    	 		  		  	
    		   $.ajax({
    		          type: "POST",
    		          url: base_url+"/servicios/delete_servicio_ftp",
    		          data: {'identificador':id_servicio},
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
/*--------------------------------------------------------Funciones para agregar y descartart errores-----------------------------------------------------*/

function desactivar(boton) {
	
	boton.setAttribute("disabled", "disabled");

}

function activar(columnas, codigoDescartar) {
	
	
	  var rowOrigen = document.getElementById('source');
	  columnas = rowOrigen.querySelectorAll('td');
	  
	  for(i=0; i <= columnas.length; i++) {
		  
		  if(codigoDescartar == columnas[i].innerText) {
			  posicion = i + 3;

			  var botonDeshabilitado = columnas[posicion].getElementsByTagName("button")[0];
			  //botonDeshabilitado = ;
			  botonDeshabilitado.disabled = false;

		  }	  
	  }
}

function add(button) {
	  var row = button.parentNode.parentNode;
	  var cells = row.querySelectorAll('td');
	  addToCartTable(cells);
	  
	  var boton = cells[3].getElementsByTagName("button")[0]; 
	  desactivar(boton);
	  
}    


function remove() {
		
	  var row = this.parentNode.parentNode;
	  var columnas = row.querySelectorAll('td');
	  var codigoDescartar = columnas[0].innerText;
	  document.querySelector('#target tbody').removeChild(row);
	  
	  activar(columnas, codigoDescartar);
	 
}

function addToCartTable(cells) {
	   var codigo = cells[0].innerText;
	   var mensaje = cells[1].innerText;
	   var transporte = cells[2].innerText;
	   
	   var newRow = document.createElement('tr');
	   
	   newRow.appendChild(createCell(codigo));
	   newRow.appendChild(createCell(mensaje));
	   newRow.appendChild(createCell(transporte));
	   
	   var cellRemoveBtn = createCell();
	   cellRemoveBtn.appendChild(createRemoveBtn())
	   newRow.appendChild(cellRemoveBtn);
	   
	   document.querySelector('#target tbody').appendChild(newRow);
}

function createInputQty() {
	  var inputQty = document.createElement('input');
	  inputQty.type = 'number';
	  inputQty.required = 'true';
	  inputQty.min = 1;
	  inputQty.className = 'form-control'
	  return inputQty;
}

function createRemoveBtn() {
	  var btnRemove = document.createElement('button');
	  btnRemove.className = 'btn btn-xs btn-danger';
	  btnRemove.onclick = remove;
	  btnRemove.innerText = 'Descartar';
	  return btnRemove;
}

function createCell(text) {
	  var td = document.createElement('td');
	  if(text) {
	    td.innerText = text;
	  }
	  return td;
}


