 $(document).ready(function()
    {
         $("ul.nav.nav-stacked li").on("click", function(){
               $( "ul.nav.nav-stacked li" ).removeClass( "active" );
               $(this).addClass("active"); 
               
        });
    //submenu	

        //-----------------------------------------------
        $(".collapse").on('show.bs.collapse', function(){
            var id = $(this).parent().get(0).getAttribute("id");
            $('img[id=folder_'+id+']').removeClass( "plus" ).addClass("minus");  
           
        });
        //-----------------------------------------------
        $(".collapse").on('hidden.bs.collapse', function(){
            var id = $(this).parent().get(0).getAttribute("id");
            $('img[id=folder_'+id+']').removeClass( "minus" ).addClass("plus"); 
        });
        
        $('#call_default').on("click", function(){           
                            
                $.ajax({
                type: 'POST',
                url: $(this).attr("href"),
                data: {id_menu_superior:$('#id_menu_superior').val()},
                dataType: 'json',
                // Mostramos un mensaje con la respuesta de PHP
                success: function(data) {
                        $('#principal').html(data.mensaje);
                },
                error: function(error){
                    $('#contenido').html('<div class="alert alert-warning alert-dismissible" role="alert">'+
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                        '<strong>Error!!!</strong> Solicitud de AJAX no completada->'+error.status+'</div>'); 
                }              
                }) ;
                return false;
        });
        $("ul.nav.collapse a").on("click", function(){
            $.ajax({
                type: 'POST',
                url: $(this).attr("href"),
                data: {},
                dataType: 'json',
                // Mostramos un mensaje con la respuesta de PHP
                success: function(data) {
                        $('#principal').html(data.mensaje);
                },
                error: function(error){
                    $('#principal').html('<div class="alert alert-warning alert-dismissible" role="alert">'+
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                        '<strong>Error!!!</strong> Solicitud de AJAX no completada->'+error.status+'</div>'); 
                }              
            }) ;
                return false;
        });
        
    });

