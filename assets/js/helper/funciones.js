/**
 * @author: Angelica Espinosa
 * 02/09/2015
 */


$(document).ready(function()    {
       
    //-------------------------------------------------
    $("ul.nav-tabs li").on({
        mouseenter: function () {
        	if(!($( this ).is( ".active" )))
        	{	
        		$("ul.nav-tabs").css({"border-bottom":"10px solid #EC2E38"});;
        	
        		//alert($(this).get(0).getAttribute("class"));//"border-bottom"," 5px solid #EC2E38" 
        	}
        },
        mouseleave: function () {
        	$("ul.nav-tabs").css({"border-bottom": "10px solid #69C"}); 
        	//alert("--*****---")
            //stuff to do on mouse leave
        }
    });
    
    //links menu superior
    $( "ul.nav.nav-tabs li" ).on("click",function() {
        $( "ul.nav.nav-tabs li" ).removeClass( "active" );
               $(this).addClass("active");  
               load_menu($(this));
     });
    jQuery.extend(jQuery.validator.messages, {
        required: "Este campo es obligatorio",
        remote: "Veuillez remplir ce champ pour continuer.",
        email: "Ingrese un email válido",
        url: "Ingrese una URL válida",
        date: "Veuillez entrer une date valide.",
        digits: "Solo números"});
        });
		
   function load_menu(obj){
        $.ajax({
        type: 'POST',
        url: obj.children("a").attr("href"),
        data: {id_menu_superior:obj.children("a").attr("id"),
               menu_superior:obj.children("a").text()},
        dataType: 'json',
        // Mostramos un mensaje con la respuesta de PHP
        success: function(data) {
            	$('#contenido').html(data.mensaje);
        },
        error: function(error){
            $('#contenido').html('<div class="alert alert-warning alert-dismissible" role="alert">'+
                '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                '<strong>Error!!!</strong> Solicitud de AJAX no completada->'+error.status+'</div>'); 
        }
        }) ;  
        return false;
   }
   function ejemplo(obj){
               $( "ul.nav.nav-tabs li" ).removeClass( "active" );
               $(obj).addClass("active");  
   }
   
