<div id="msgs">
 	<?php
        if(isset($mensaje)){
            
 	 if($mensaje == TRUE){?>
 	    <div class="alert alert-success fade in">
	        <a href="#" class="close" data-dismiss="alert">&times;</a>
	        <strong>Servicio</strong> Actualizada con exito.
   		 </div>
 	<?php }else if($mensaje == FALSE){?>
 	  <div class="alert alert-danger fade in">
	        <a href="#" class="close" data-dismiss="alert">&times;</a>
	        <strong>¡Error!</strong> No se ha completado la solicitud.
   	 </div>
        <?php }}?>
 </div><!--Div para mostrar mensajes en la vista-->
<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * @autor TSU. Yocsan Burgos  <yocsan19@gmail.com>
 * @fecha_creacion 16/10/2017
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

//set table id in table open tag
    $tmpl = array ('table_open'  => '<table id="big_table" border="1" cellpadding="2" cellspacing="1" class="mytable">');
    $this->table->set_template($tmpl); 

    $this->table->set_heading('Nombre del servicio','Tipo','Requerimiento','Esquema','Vertical','Acciones');
    echo $this->table->generate();
?>


<script type="text/javascript" src="<?php echo base_url('assets/js/helper/func_servicios.js');?>"></script>


<!-- Modal CONSULTA -->
    <div id="modal_consulta" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Consultar Servicios</h4>
                </div>
               <div class="modal-body" id="consulta_ftp">
               </div>                                        
      		</div>
       </div>
    </div> 

<!-- Modal EDIT -->
    <div id="modal_edit" class="modal fade">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Modificar Servicio</h4>
                </div>
                <div class="modal-body" id="edit_ftp">                   
               </div>
     	</div>
     </div> 
     </div>
     
     <!-- Modal IMAGEN -->
    <div id="modal_image" class="modal fade">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Diagrama UML</h4>
                </div>
                <div class="modal-body" id="imagen_ftp">                   
               </div>
     	</div>
     </div> 
     </div>
     
<!-- Modal DELETE -->
    <div class="modal fade" id="modal_delete" >
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                   <button type="button" class="btn active" data-dismiss="modal" aria-hidden="true">&times;</button>
                   <h4 class="modal-title">Eliminar Servicio FTP</h4>
               	</div>
                <div class="modal-body">
                   <p>Esta seguro que desea eliminar este Servicio FTP?</p> 
                   <input type="hidden" id="id_servicio">                
                </div>
                <div class="modal-footer">
                   <button data-dismiss="modal" type="button" class="btn btn-default" name="in_confirm_insert" id="btn_no_servicio" >No</button>
                   <button data-dismiss="modal" type="button" class="btn btn-danger" name="in_confirm_insert" id="btn_yes_ftp" >Si</button>
                </div>  
            </div>
        </div>
    </div>

<script type="text/javascript">
    
  $(document).ready(function() {            
            
	var oTable = $('#big_table').dataTable( {
		"bProcessing": true,
		"bServerSide": true,
		"sAjaxSource": '<?php echo base_url(); ?>servicios/carga_tabla_ftp',
                "bJQueryUI": true,
                "sPaginationType": "full_numbers",
                "iDisplayStart ":20,
                "oLanguage": {
               //     "sUrl":'<?php echo base_url(); ?>servicios/translate'
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
