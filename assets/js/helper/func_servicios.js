


$(document).ready(function(){
	
	var base = window.location.href.split('/');
	var base_url = base[0]+'//'+base[2]+'/'+base[3];  
		
		
	//verifica si el numero de requerimiento ya existe
	$('#numero_requerimiento').on('keyup',function() {

	    var numero_requerimiento = $("#numero_requerimiento").val();
   
	    if(numero_requerimiento !== ''){
	        $.ajax({
	                method: 'POST',
	                url: base_url+"/servicios/consultaNumeroNecesidad",
	                data: {'numero_requerimiento':numero_requerimiento},
	                dataType: 'json',
	                success: function(data) {
	                $('#msg_error_numero_requerimiento').html(data.mensaje);                   
	                $("#mensaje").fadeOut(5000);
	                $("#siguiente_1").prop("disabled",data.cod);
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
	$('#nombre_servicio').keyup(function() {

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
	                $("#siguiente_2").prop("disabled",data.cod);
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
	/*---------------------------------------------------------validaciones------------------------------------------------------------------------*/
   $('#numero_requerimiento').focusout(function() {

	    var numero_requerimiento = $("#numero_requerimiento").val(); 

	    if(numero_requerimiento == ''){
	        $("#siguiente_1").prop("disabled",true);
           $('#msg_error_numero_requerimiento').html('<span class="error">Este campo es obligatorio</span>');  
          
       }else {
           $("#siguiente_1").prop("disabled",false);
           $('#msg_error_numero_requerimiento').html(''); 
       }
    });  
   
   $('#descripcion_requerimiento').focusout(function() {

	    var descripcion_requerimiento = $("#descripcion_requerimiento").val(); 
	    if(descripcion_requerimiento == ''){
	        $("#siguiente_").prop("disabled",true);
           $('#msg_error_descripcion_requerimiento').html('<span class="error">Este campo es obligatorio</span>');  
          
       }else{
         $("#siguiente_2").prop("disabled",false);
           $('#msg_error_descripcion_requerimiento').html(''); 
       }
    });   
   $('#nombre_servicio').focusout(function() {

	    var nombre_servicio = $("#nombre_servicio").val(); 
	    if(nombre_servicio == ''){
	        $("#siguiente_2").prop("disabled",true);
           $('#msg_error_nombre_servicio').html('<span class="error">Este campo es obligatorio</span>');  
          
       }else{
           $("#siguiente_2").prop("disabled",false);
           $('#msg_error_nombre_servicio').html(''); 
       }
    });   
   $('#introduccion').focusout(function() {

	    var introduccion = $("#introduccion").val(); 
	    if(introduccion == ''){
	        $("#siguiente_2").prop("disabled",true);
           $('#msg_error_introduccion').html('<span class="error">Este campo es obligatorio</span>');  
          
       }else{
           $("#siguiente_2").prop("disabled",false);
           $('#msg_error_introduccion').html(''); 
       }
    });   
   $('#evento_inicio_disparador').focusout(function() {

	    var evento_inicio_disparador = $("#evento_inicio_disparador").val(); 
	    if(evento_inicio_disparador == ''){
	        $("#siguiente_2").prop("disabled",true);
           $('#msg_error_evento_inicio_disparador').html('<span class="error">Este campo es obligatorio</span>');  
          
       }else{
           $("#siguiente_2").prop("disabled",false);
           $('#msg_error_evento_inicio_disparador').html(''); 
       }
    });   
   $('#adaptaciones').focusout(function() {

	    var adaptaciones = $("#adaptaciones").val(); 
	    if(adaptaciones == ''){
	        $("#siguiente_2").prop("disabled",true);
           $('#msg_error_adaptaciones').html('<span class="error">Este campo es obligatorio</span>');  
          
       }else{
           $("#siguiente_2").prop("disabled",false);
           $('#msg_error_adaptaciones').html(''); 
       }
    });   
   $('#arquitectura').focusout(function() {

	    var arquitectura = $("#arquitectura").val(); 
	    if(arquitectura == ''){
	        $("#siguiente_2").prop("disabled",true);
           $('#msg_error_arquitectura').html('<span class="error">Este campo es obligatorio</span>');  
          
       }else{
           $("#siguiente_2").prop("disabled",false);
           $('#msg_error_arquitectura').html(''); 
       }
    });   
   $('#diagrama_uml').focusout(function() {

	    var diagrama_uml = $("#diagrama_uml").val(); 
	    if(diagrama_uml == ''){
	        $("#siguiente_2").prop("disabled",true);
           $('#msg_error_diagrama_uml').html('<span class="error">Este campo es obligatorio</span>');  
          
       }else{
           $("#siguiente_2").prop("disabled",false);
           $('#msg_error_diagrama_uml').html(''); 
       }
    });   
   $('#premisa').focusout(function() {

	    var premisa = $("#premisa").val(); 
	    if(premisa == ''){
	        $("#siguiente_3").prop("disabled",true);
           $('#msg_error_premisa').html('<span class="error">Este campo es obligatorio</span>');  
          
       }else{
           $("#siguiente_3").prop("disabled",false);
           $('#msg_error_premisa').html(''); 
       }
    });   
   $('#nombre').focusout(function() {   //nombre de archivo origen

	    var nombre = $("#nombre").val(); 
	    if(nombre == ''){
	        $("input[type=button]").prop("disabled",true);
           $('#msg_error_nombre').html('<span class="error">Este campo es obligatorio</span>');  
          
       }else{
           $("input[type=button]").prop("disabled",false);
           $('#msg_error_nombre').html(''); 
       }
    });   
    $('#nombre_destino').focusout(function() {   //nombre de archivo destino

	    var nombre_destino = $("#nombre_destino").val(); 
	    if(nombre_destino == ''){
	        $("input[type=button]").prop("disabled",true);
           $('#msg_error_nombre_destino').html('<span class="error">Este campo es obligatorio</span>');  
          
       }else{
           $("input[type=button]").prop("disabled",false);
           $('#msg_error_nombre_destino').html(''); 
       }
    }); 
   $('#directorio').focusout(function() {  //directorio en origen

	    var directorio = $("#directorio").val(); 
	    if(directorio == ''){
	        $("input[type=button]").prop("disabled",true);
           $('#msg_error_directorio').html('<span class="error">Este campo es obligatorio</span>');  
          
       }else{
           $("input[type=button]").prop("disabled",false);
           $('#msg_error_directorio').html(''); 
       }
    });   
 	$('#directorio_destino').focusout(function() {  //directorio en destino

	    var directorio_destino = $("#directorio_destino").val(); 
	    if(directorio_destino == ''){
	        $("input[type=button]").prop("disabled",true);
           $('#msg_error_directorio_destino').html('<span class="error">Este campo es obligatorio</span>');  
          
       }else{
           $("input[type=button]").prop("disabled",false);
           $('#msg_error_directorio_destino').html(''); 
       }
    });  

   $('#volumen').focusout(function() {   //volumen en origen

	    var volumen = $("#volumen").val(); 
	    if(volumen == ''){
	        $("input[type=button]").prop("disabled",true);
           $('#msg_error_volumen').html('<span class="error">Este campo es obligatorio</span>');  
          
       }else{
           $("input[type=button]").prop("disabled",false);
           $('#msg_error_volumen').html(''); 
       }
    });   
   $('#volumen_destino').focusout(function() {  //volumen en destino

	    var volumen_destino = $("#volumen_destino").val(); 
	    if(volumen_destino == ''){
	        $("input[type=button]").prop("disabled",true);
           $('#msg_error_volumen_destino').html('<span class="error">Este campo es obligatorio</span>');  
          
       }else{
           $("input[type=button]").prop("disabled",false);
           $('#msg_error_volumen_destino').html(''); 
       }
    }); 
 	$('#regla_transformacion').focusout(function() {  //regla de transformacion en origen

	    var regla_transformacion = $("#regla_transformacion").val(); 
	    if(regla_transformacion == ''){
	        $("input[type=button]").prop("disabled",true);
           $('#msg_error_regla_transformacion').html('<span class="error">Este campo es obligatorio</span>');  
          
       }else{
           $("input[type=button]").prop("disabled",false);
           $('#msg_error_regla_transformacion').html(''); 
       }
    });
	$('#regla_transformacion_destino').focusout(function() {  //regla de transformacion en destino

	    var regla_transformacion_destino = $("#regla_transformacion_destino").val(); 
	    if(regla_transformacion_destino == ''){
	        $("input[type=button]").prop("disabled",true);
           $('#msg_error_regla_transformacion_destino').html('<span class="error">Este campo es obligatorio</span>');  
          
       }else{
           $("input[type=button]").prop("disabled",false);
           $('#msg_error_regla_transformacion_destino').html(''); 
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
   $('#condicion_control_m').focusout(function() {  //condicion_control_m en origen

	    var condicion_control_m = $("#condicion_control_m").val(); 
	    if(condicion_control_m == ''){
	        $("input[type=button]").prop("disabled",true);
           $('#msg_error_condicion_control_m').html('<span class="error">Este campo es obligatorio</span>');  
          
       }else{
           $("input[type=button]").prop("disabled",false);
           $('#msg_error_condicion_control_m').html(''); 
       }
    });   
   $('#condicion_control_m_destino').focusout(function() { //condicion_control_m en destino


	    var condicion_control_m_destino = $("#condicion_control_m_destino").val(); 
	    if(condicion_control_m_destino == ''){
	        $("input[type=button]").prop("disabled",true);
           $('#msg_error_condicion_control_m_destino').html('<span class="error">Este campo es obligatorio</span>');  
          
       }else{
           $("input[type=button]").prop("disabled",false);
           $('#msg_error_condicion_control_m_destino').html(''); 
       }
    });  
   $('#wsdl_desarrollo').focusout(function() {

	    var wsdl_desarrollo = $("#wsdl_desarrollo").val(); 
	    if(wsdl_desarrollo == ''){
	        $("input[type=button]").prop("disabled",true);
           $('#msg_error_wsdl_desarrollo').html('<span class="error">Este campo es obligatorio</span>');  
          
       }else{
           $("input[type=button]").prop("disabled",false);
           $('#msg_error_wsdl_desarrollo').html(''); 
       }
    });   
   $('#wsdl_calidad').focusout(function() {

	    var wsdl_calidad = $("#wsdl_calidad").val(); 
	    if(wsdl_calidad == ''){
	        $("input[type=button]").prop("disabled",true);
           $('#msg_error_wsdl_calidad').html('<span class="error">Este campo es obligatorio</span>');  
          
       }else{
           $("input[type=button]").prop("disabled",false);
           $('#msg_error_wsdl_calidad').html(''); 
       }
    });  
   $('#wsdl_produccion').focusout(function() {

	    var wsdl_produccion = $("#wsdl_produccion").val(); 
	    if(wsdl_produccion == ''){
	        $("input[type=button]").prop("disabled",true);
           $('#msg_error_wsdl_produccion').html('<span class="error">Este campo es obligatorio</span>');  
          
       }else{
           $("input[type=button]").prop("disabled",false);
           $('#msg_error_wsdl_produccion').html(''); 
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


