<?php


/**
 * @autor Ing. Angélica Espinosa  <angelica1387@gmail.com>
 * @fecha_creacion 23/05/2016
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
//id->id del registro que se carga de la BD
//ruta->nombre del controlador
function get_buttons($id)
{
    $ci = & get_instance();
    $html='';
    $html .=  '<span id="edit_'.$id. '" class="ui-icon ui-icon-pencil"  data-toggle="modal" data-target="#modal_edit"></span>';
    $html .=  '<span id="delete_'.$id. '" class="ui-icon ui-icon-trash" data-toggle="modal" data-target="#modal_delete" ></span>';
  
    return $html;
}
//genera dos impresoras
function get_buttons_print($id)
{
    $ci = & get_instance();
    $html='';
    $html .=  '<span id="edit_'.$id. '" class="ui-icon ui-icon-print"  data-toggle="modal" data-target="#modal_edit"></span>';
    $html .=  '<span id="delete_'.$id. '" class="ui-icon ui-icon-print" data-toggle="modal" data-target="#modal_delete" ></span>';
  
    return $html;
}

function get_buttons_4($id)
{
    $ci = & get_instance();
    $html='';
    
    $html .=  '<span id="agregar_'.$id. '" class="ui-icon  ui-icon-plus"  data-toggle="modal" data-target="#modal_agregar"></span>';
    $html .=  '<span id="consulta_'.$id. '" class="ui-icon  ui-icon-search"  data-toggle="modal" data-target="#modal_consulta"></span>';
    $html .=  '<span id="edit_'.$id. '" class="ui-icon ui-icon-pencil"  data-toggle="modal" data-target="#modal_edit"></span>';
    $html .=  '<span id="delete_'.$id. '" class="ui-icon ui-icon-trash" data-toggle="modal" data-target="#modal_delete" ></span>';
  
    return $html;
}


function get_buttons_3($id)
{
    $ci = & get_instance();
    $html='';
    $html .=  '<span id="consulta_'.$id. '" class="ui-icon  ui-icon-search"  data-toggle="modal" data-target="#modal_consulta"></span>';
    $html .=  '<span id="edit_'.$id. '" class="ui-icon ui-icon-pencil"  data-toggle="modal" data-target="#modal_edit"></span>';
    $html .=  '<span id="delete_'.$id. '" class="ui-icon ui-icon-trash" data-toggle="modal" data-target="#modal_delete" ></span>';
  
    return $html;
}

function get_buttons_img($id)
{
	$ci = & get_instance();
	$html='';
	//$html .=  '<span id="consulta_'.$id. '" class="ui-icon  ui-icon-search"  data-toggle="modal" data-target="#modal_consulta"></span>';
	//$html .=  '<span id="edit_'.$id. '" class="ui-icon ui-icon-pencil"  data-toggle="modal" data-target="#modal_edit"></span>';
	$html .=  '<span id="delete_'.$id. '" class="ui-icon ui-icon-trash" data-toggle="modal" data-target="#modal_delete" ></span>';
	//$html .=  '<span id="image_'.$id. '" class="ui-icon ui-icon-image" data-toggle="modal" data-target="#modal_image" ></span>';

	return $html;
}




