<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

//set table id in table open tag
    $tmpl = array ( 'table_open'  => '<table id="big_table" border="1" cellpadding="2" cellspacing="1" class="mytable">' );
    $this->table->set_template($tmpl); 

    $this->table->set_heading('Nombre del servicio','Tipo','Requerimiento','Esquema','Vertical','Imprimir documentos');
    echo $this->table->generate();
?>

<script type="text/javascript" src="<?php echo base_url('assets/js/helper/func_documentos.js');?>"></script>

     
<!-- Modal generar documento ETF -->
    <div class="modal fade" id="modal_etf" >
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                   <h4 class="modal-title">Documento ETF</h4>
               	</div>
   
                   <div class="modal-body">
                      <p>¿Esta seguro que desea generar este documento ETF?</p> 
                      
                      
                   </div>
                   <div class="modal-footer">
                      <form action="documentos/generar_documento_etf" method="post">
                         <input type="hidden" name="id_documento" id="id_documento">   
                         <button data-dismiss="modal" type="button" class="btn btn-default" name="in_confirm_insert" id="btn_no_servicio" >No</button>
                        <input data-dismiss="modal" type="submit" class="btn btn-danger" name="in_confirm_insert" value="Si">
                     </form>
                   </div>  
              
            </div>
        </div>
    </div>

<script type="text/javascript">
    
  $(document).ready(function() {            
            
	var oTable = $('#big_table').dataTable( {
		"bProcessing": true,
		"bServerSide": true,
            "sAjaxSource": '<?php echo base_url(); ?>documentos/carga_tabla_ftp',
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
	});
   
} );

</script>
