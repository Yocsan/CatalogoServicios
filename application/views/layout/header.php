<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

	<?php echo '<head>'.doctype("html5");
		$meta = array(
		array(
				'name'=>'viewport',
				'content'=>'content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"',
		),
        array(
                'name' => 'robots',
                'content' => 'no-cache'
        ),
        array(
                'name' => 'description',
                'content' => 'Cat&aacute;logo de Servicios'
        ),
        array(
                'name' => 'robots',
                'content' => 'no-cache'
        ),
        array(
                'name' => 'Content-type',
                'content' => 'text/html; charset=utf-8', 
                'type' => 'equiv'
        )
		
		);
        echo  meta($meta).'<title>Catalogo de Servicios</title>';	
        echo link_tag(base_url("assets/img/catalogo_ico.ico"),"shortcut icon","image/ico");
        echo link_tag(base_url("assets/css/bootstrap.css"),"stylesheet","text/css","","screen");
        echo link_tag(base_url("assets/css/catalogo.css"),"stylesheet","text/css","","screen");
//      echo link_tag(base_url("assets/css/screen.css"),"stylesheet","text/css","","screen");
        echo link_tag(base_url("assets/css/dataTable.css"),"stylesheet","text/css","","screen");
        echo link_tag(base_url("assets/css/jquery-ui.css"),"stylesheet","text/css","","screen");
     
//        echo link_tag(base_url("assets/css/data_tables_1.10.12/dataTables.jqueryui.min.css"),"stylesheet","text/css","","screen");
	?>
	<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-2.1.4.min.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.validate.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/helper/funciones.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.dataTables.min.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/data_tables_1.10.12/dataTables.jqueryui.min.js');?>"></script>

<?php 
    $image_properties = array(
                    'src'   => base_url('assets/img/cabezal_bolivariano_nuevo.png'),
                    //'src' => ('http://www.cantv.com.ve/Portales/Cantv/Data/cabezal_bolivariano_mppeuct_Zamora_2017.jpg'),
                    'alt'   => 'Catalogo',
                    'height'=> '50',
    				//'width' => '700',
                    'title' => 'banner_header',
                    'align' => 'left',
                    //'class'	=> 'container',
    );
    
    $image_properties2 = array(
    		'src'   => base_url('assets/img/cabezal_bolivariano_linea.jpg'),
    		'alt'   => 'Catalogo',
    		'height'=> '3',
    		//'width' => '700',
    		'title' => 'banner_header2',
    		'align' => 'left',
    		'class'	=> 'container',
    );
    
    
?>
    
    </head>
    
    <body >
        <div class="container">
            <div class="page-header" align="center" >
            
            
           <!--<div class="row" > 
               
                    <div class="col-md-8" style="padding-left:0px;" >
                    	<?php //echo img($image_properties); ?>                     	    	
                    </div>				
                    <div class="col-md-4" style="padding-left:0px;">
                    	
                    </div>
               </div>	
                    
               <div class="row">
                
                	<div class="col-md-12" style="padding-left:0px; margin-top:10px;">
                		<?php //echo img($image_properties2); ?>
                	</div>
                	
               </div>-->
                
                <div class="row">
                	<div class="col-md-12" style="padding-left:0px; margin-top:10px;">
                		<img src="http://www.cantv.com.ve/Portales/Cantv/Data/cabezal_bolivariano_mppeuct_Zamora_2017.jpg" width="1180">
                	</div>
                </div>
                
 
                
                <div class="row" style="margin-top:20px;"><!-- div#2 -->
                    <div class="col-md-6" align="left"  >
                            <?= img(base_url("assets/img/logoCantv_portal.jpg"),FALSE)?>
                    </div><!-- col-md-6 -->
                        <div align="right" class="col-md-6">
                                            <?= heading('<strong ><i >Cat&aacute;logo Integrado de Servicios</i></strong>',
                                                    3,'class="error" style="align:right;"')?>
                                            <?php if(isset($logged_in)&&($id_usuario != 0)): ?>
                                                    <div class="row">
                                                            <div class="col-md-12" >	
                                                            	<p style="margin-bottom: 0px;" class="prtlHdrWelcome">Bienvenido: <span style="text-transform: uppercase;"><?= $name?></span></p>
                                                            </div>
                                                    </div>
                                                    <div class="row" >								
                                                            <div class="col-md-12" >																		
                                                                    <?= img(base_url('assets/img/separator.gif'),FALSE)?>
                                                                <?= anchor('/login_normal/logout','Salir del Sistema','class="logout"'); ?>
                                                            </div>
                                                    </div>
                                            <?php endif;?>						
                        </div><!-- col-md-6 -->
                </div>	<!-- row -->	
        </div>	<!-- page_header -->		




