
 <div id="msgs">
 	<?php
        if(isset($mensaje)){
            
 	 if($mensaje == TRUE){?>
 	    <div class="alert alert-success fade in">
	        <a href="#" class="close" data-dismiss="alert">&times;</a>
	        <strong>Esquema</strong> Actualizado con exito.
   		 </div>
 	<?php }else if($mensaje == FALSE){?>
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
		        <strong>Esquema</strong> Eliminado con exito.
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
    $tmpl = array ( 'table_open'  => '<table id="big_table" border="1" cellpadding="2" cellspacing="1" class="mytable">' );
    $this->table->set_template($tmpl); 

    $this->table->set_heading('Nombre', 'Descripci&oacute;n', 'Acciones');
    echo $this->table->generate();
?>
<script type="text/javascript" src="<?php echo base_url('assets/js/helper/func_esquemas.js');?>"></script>

<!-- Modal EDIT -->
    <div id="modal_edit" class="modal fade">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Modificar Esquema</h4>
                </div>
               <div class="modal-body" id="edit_esquema">
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
                   <h4 class="modal-title">Eliminar Esquema</h4>
               	</div>
                <div class="modal-body">
                   <p>¿Esta seguro que desea eliminar este esquema?</p> 
                   <input type="hidden" id="id_esquema">                
                </div>
                <div class="modal-footer">
                   <button data-dismiss="modal" type="button" class="btn btn-danger" name="in_confirm_insert" id="btn_yes_esquema" >Si</button>
                   <button data-dismiss="modal" type="button" class="btn btn-default" name="in_confirm_insert" id="btn_no_esquema" >No</button>
                </div>  
            </div>
        </div>
    </div>


<script type="text/javascript">
    
  $(document).ready(function() {            
            
	var oTable = $('#big_table').dataTable( {
		"bProcessing": true,
		"bServerSide": true,
		"sAjaxSource": '<?php echo base_url(); ?>esquemas/datatable',
                "bJQueryUI": true,
                "sPaginationType": "full_numbers",
                "iDisplayStart ":20,
                "oLanguage": {
                  //  "sUrl":'<?php echo base_url(); ?>esquemas/translate'
		},
                "fnInitComplete": function() {
                //oTable.fnAdjustColumnSizing();
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