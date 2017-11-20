<?php


if (!defined('BASEPATH'))
    exit('No direct script access allowed');

//set table id in table open tag
    $tmpl = array ( 'table_open'  => '<table id="big_table" border="1" cellpadding="2" cellspacing="1" class="mytable">' );
    $this->table->set_template($tmpl); 

    $this->table->set_heading('Nombre del servicio','Tipo','Requerimiento','Esquema','Vertical','Acciones');
    echo $this->table->generate();
?>

 <script type="text/javascript" src="<?php echo base_url('assets/js/helper/func_consultas.js');?>"></script>

<!-- Modal CONSULTA -->
    <div id="modal_consulta" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Consulta Servicios</h4>
                </div>
               <div class="modal-body" id="consulta_servicio" >
               </div>                    
                <div class="modal-footer">    
                              
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    
                    
                </div>
            </div>
        </div>
    </div> 


<script type="text/javascript">
    
  $(document).ready(function() {            
            
	var oTable = $('#big_table').dataTable( {
		"bProcessing": true,
		"bServerSide": true,
            "sAjaxSource": '<?php echo base_url(); ?>consultas/carga_tabla_web',
                "bJQueryUI": true,
                "sPaginationType": "full_numbers",
                "iDisplayStart ":20,
                "oLanguage": {
                 //   "sUrl":'<?php echo base_url(); ?>servicios/translate'
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
