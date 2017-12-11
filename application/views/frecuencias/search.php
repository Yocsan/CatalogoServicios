
 <div id="msgs">
 <?php
	if(isset($mensaje)){
            
		if( $mensaje == TRUE){ ?>
	 	    <div class="alert alert-success fade in">
		        <a href="#" class="close" data-dismiss="alert">&times;</a>
		        <strong>Frecuencia</strong> Actualizada con exito.
	   		</div>
	    <?php } elseif($mensaje == FALSE) { ?>
	 	  <div class="alert alert-danger fade in">
		        <a href="#" class="close" data-dismiss="alert">&times;</a>
		        <strong>¡Error!</strong> No se ha completado la solicitud.
	   	  </div>
     <?php }}?>
     
<?php
	if(isset($mensaje_delete)){
            
		if( $mensaje_delete == TRUE){ ?>
	 	    <div class="alert alert-success fade in">
		        <a href="#" class="close" data-dismiss="alert">&times;</a>
		        <strong>Frecuencia</strong> Eliminada con exito.
	   		</div>
	    <?php } elseif($mensaje_delete == FALSE){ ?>
	 	  <div class="alert alert-danger fade in">
		        <a href="#" class="close" data-dismiss="alert">&times;</a>
		        <strong>¡Error!</strong> No se ha completado la solicitud.
	   	  </div>
<?php }} ?>
        
 </div><!--Div para mostrar mensajes en la vista-->
 
<?php


if (!defined('BASEPATH'))
    exit('No direct script access allowed');

//set table id in table open tag
//se definen las propiedades de la tabla
    $tmpl = array ( 'table_open'  => '<table id="big_table" border="1" cellpadding="2" cellspacing="1" class="mytable">' );
    $this->table->set_template($tmpl); 

    $this->table->set_heading('Nombre de la Frecuencia','Acciones');
    echo $this->table->generate();
?>
<script type="text/javascript" src="<?php echo base_url('assets/js/helper/func_frecuencias.js');?>"></script>

<!-- Modal EDIT -->
    <div id="modal_edit" class="modal fade">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Modificar Frecuencia</h4>
                </div>
               <div class="modal-body" id="edit_usuario">
               </div>                    
            </div>
        </div>
    </div> 
<!-- Modal DELETE -->
    <div class="modal fade" id="modal_delete" >
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                   <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                   <h4 class="modal-title">Eliminar Frecuencia</h4>
               	</div>
                <div class="modal-body">
                   <p>Esta seguro que desea eliminar esta frecuencia?</p> 
                   <input type="hidden" id="user_id">                
                </div>
                <div class="modal-footer">
                	<button data-dismiss="modal" type="button" class="btn btn-danger" name="in_confirm_insert" id="btn_yes_frecuencia" >Si</button>
                    <button data-dismiss="modal" type="button" class="btn btn-default" name="in_confirm_insert" id="btn_no_frecuencia" >No</button>
                </div>  
            </div>
        </div>
    </div>


<script type="text/javascript">
    
 $(document).ready(function() {            
            
	var oTable = $('#big_table').dataTable( {
		"bProcessing": true,
		"bServerSide": true,
		"sAjaxSource": '<?php echo base_url(); ?>frecuencias/datatable',
                "bJQueryUI": true,
                "sPaginationType": "full_numbers",
                "iDisplayStart ":20,
                "oLanguage": {
                //    "sUrl":'<?php echo base_url(); ?>frecuencias/translate'
		},
                "fnInitComplete": function() {
              //  oTable.fnAdjustColumnSizing();
                  },
                'fnServerData': function(sSource, aoData, fnCallback)
                    {
                        $.ajax
                        ({
                          'dataType': 'json',
                          'type'    : 'POST',
                          'url'     : sSource,
                          'data'    : aoData,
                          'success' : fnCallback
                    });
                    }
	} );
   
} );

</script>
