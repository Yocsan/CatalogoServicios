

$(document).ready(function(){

	var base = window.location.href.split('/');
	var base_url = base[0]+'//'+base[2]+'/'+base[3];

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

$("#frm_estructura_datos").validate({

        rules: {

            longitud_origen:{required:true,digits:true,maxlength:3}

        },
        submitHandler: function(form){
          $.ajax({
                method: "POST",
                url: base_url+"/estructuras_datos/insert_estructuras_datos_f1",
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


   $('#estructura_origen').focusout(function() {

	    var estructura_origen = $("#estructura_origen").val();
	    if(estructura_origen == ''){
	        $("input[type=button]").prop("disabled",true);
           $('#msg_error_estructura_origen').html('<span class="error">Este campo es obligatorio</span>');

       }else{
           $("input[type=button]").prop("disabled",false);
           $('#msg_error_estructura_origen').html('');
       }
    });

   $('#estructura_destino').focusout(function() {

      var estructura_destino = $("#estructura_destino").val();
      if(estructura_destino == ''){
          $("input[type=button]").prop("disabled",true);
           $('#msg_error_estructura_destino').html('<span class="error">Este campo es obligatorio</span>');

       }else{
           $("input[type=button]").prop("disabled",false);
           $('#msg_error_estructura_destino').html('');
       }
    });

   $('#obligatoriedad_origen').focusout(function() {

	    var obligatoriedad_origen = $("#obligatoriedad_origen").val();
	    if(obligatoriedad_origen == ''){
	        $("input[type=button]").prop("disabled",true);
           $('#msg_error_obligatoriedad_origen').html('<span class="error">Este campo es obligatorio</span>');

       }else{
           $("input[type=button]").prop("disabled",false);
           $('#msg_error_obligatoriedad_origen').html('');
       }
    });

  $('#obligatoriedad_destino').focusout(function() {

      var obligatoriedad_destino = $("#obligatoriedad_destino").val();
      if(obligatoriedad_destino == ''){
          $("input[type=button]").prop("disabled",true);
           $('#msg_error_obligatoriedad_destino').html('<span class="error">Este campo es obligatorio</span>');

       }else{
           $("input[type=button]").prop("disabled",false);
           $('#msg_error_obligatoriedad_destino').html('');
       }
    });

   $('#campo_origen').focusout(function() {

	    var campo_origen = $("#campo_origen").val();
	    if(campo_origen == ''){
	        $("input[type=button]").prop("disabled",true);
           $('#msg_error_campo_origen').html('<span class="error">Este campo es obligatorio</span>');

       }else{
           $("input[type=button]").prop("disabled",false);
           $('#msg_error_campo_origen').html('');
       }
    });

   $('#campo_destino').focusout(function() {

      var campo_destino = $("#campo_destino").val();
      if(campo_destino == ''){
          $("input[type=button]").prop("disabled",true);
           $('#msg_error_campo_destino').html('<span class="error">Este campo es obligatorio</span>');

       }else{
           $("input[type=button]").prop("disabled",false);
           $('#msg_error_campo_destino').html('');
       }
    });


   $('#tipo_campo_origen').focusout(function() {

	    var tipo_campo_origen = $("#tipo_campo_origen").val();
	    if(tipo_campo_origen == ''){
	        $("input[type=button]").prop("disabled",true);
           $('#msg_error_tipo_campo_origen').html('<span class="error">Este campo es obligatorio</span>');

       }else{
           $("input[type=button]").prop("disabled",false);
           $('#msg_error_tipo_campo_origen').html('');
       }
    });

  $('#tipo_campo_destino').focusout(function() {

      var tipo_campo_destino = $("#tipo_campo_destino").val();
      if(tipo_campo_destino == ''){
          $("input[type=button]").prop("disabled",true);
           $('#msg_error_tipo_campo_destino').html('<span class="error">Este campo es obligatorio</span>');

       }else{
           $("input[type=button]").prop("disabled",false);
           $('#msg_error_tipo_campo_destino').html('');
       }
    });

   $('#posicion_origen').focusout(function() {

	    var posicion_origen = $("#posicion_origen").val();
	    if(posicion_origen == ''){
	        $("input[type=button]").prop("disabled",true);
           $('#msg_error_posicion_origen').html('<span class="error">Este campo es obligatorio</span>');

       }else{
           $("input[type=button]").prop("disabled",false);
           $('#msg_error_posicion_origen').html('');
       }
    });

  $('#posicion_destino').focusout(function() {

      var posicion_destino = $("#posicion_destino").val();
      if(posicion_destino == ''){
          $("input[type=button]").prop("disabled",true);
           $('#msg_error_posicion_destino').html('<span class="error">Este campo es obligatorio</span>');

       }else{
           $("input[type=button]").prop("disabled",false);
           $('#msg_error_posicion_destino').html('');
       }
    });


   $('#longitud_origen').focusout(function() {

	    var longitud_origen = $("#longitud_origen").val();
	    if(longitud_origen == ''){
	        $("input[type=button]").prop("disabled",true);
           $('#msg_error_longitud_origen').html('<span class="error">Este campo es obligatorio</span>');

       }else{
           $("input[type=button]").prop("disabled",false);
           $('#msg_error_longitud_origen').html('');
       }
    });

    $('#longitud_destino').focusout(function() {

      var longitud_destino = $("#longitud_destino").val();
      if(longitud_destino == ''){
          $("input[type=button]").prop("disabled",true);
           $('#msg_error_longitud_destino').html('<span class="error">Este campo es obligatorio</span>');

       }else{
           $("input[type=button]").prop("disabled",false);
           $('#msg_error_longitud_destino').html('');
       }
    });

    $('#valor_ejemplo_origen').focusout(function() {

	    var valor_ejemplo_origen = $("#valor_ejemplo_origen").val();
	    if(valor_ejemplo_origen == ''){
	        $("input[type=button]").prop("disabled",true);
           $('#msg_error_valor_ejemplo_origen').html('<span class="error">Este campo es obligatorio</span>');

       }else{
           $("input[type=button]").prop("disabled",false);
           $('#msg_error_valor_ejemplo_origen').html('');
       }
    });

    $('#valor_ejemplo_destino').focusout(function() {

      var valor_ejemplo_destino = $("#valor_ejemplo_destino").val();
      if(valor_ejemplo_destino == ''){
          $("input[type=button]").prop("disabled",true);
           $('#msg_error_valor_ejemplo_destino').html('<span class="error">Este campo es obligatorio</span>');

       }else{
           $("input[type=button]").prop("disabled",false);
           $('#msg_error_valor_ejemplo_destino').html('');
       }
    });

   $('#descripcion_origen').focusout(function() {

	    var descripcion_origen = $("#descripcion_origen").val();
	    if(descripcion_origen == ''){
	        $("input[type=button]").prop("disabled",true);
           $('#msg_error_descripcion_origen').html('<span class="error">Este campo es obligatorio</span>');

       }else{
           $("input[type=button]").prop("disabled",false);
           $('#msg_error_descripcion_origen').html('');
       }
    });

   $('#descripcion_destino').focusout(function() {

      var descripcion_destino = $("#descripcion_destino").val();
      if(descripcion_destino == ''){
          $("input[type=button]").prop("disabled",true);
           $('#msg_error_descripcion_destino').html('<span class="error">Este campo es obligatorio</span>');

       }else{
           $("input[type=button]").prop("disabled",false);
           $('#msg_error_descripcion_destino').html('');
       }
    });


    /*-----accion del boton guardar de la vista de estructura de datos------*/



    $("#guardar_f1").click(function(){

    	$.ajax({
            method: "POST",
            url: base_url+"/estructuras_datos/insert_estructuras_datos_f1",
            data: $("#frm_estructura_datos").serialize(), // Adjuntar los campos del formulario enviado.
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


    /*------------falta a partir de aqui---------Funciones para editar--------------*/

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
