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
    $tmpl = array ( 'table_open'  => '<table id="big_table" border="1" cellpadding="2" cellspacing="1" class="mytable">' );
    $this->table->set_template($tmpl); 

    $this->table->set_heading('Nombre del servicio','Tipo','Requerimiento','Esquema','Vertical','Imprimir documentos');
    echo $this->table->generate();
?>



<script type="text/javascript">
    
  $(document).ready(function() {            
            
	var oTable = $('#big_table').dataTable( {
		"bProcessing": true,
		"bServerSide": true,
            "sAjaxSource": '<?php echo base_url(); ?>documentos/carga_tabla_web',
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
