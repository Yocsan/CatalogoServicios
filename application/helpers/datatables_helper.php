<?php

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

//botones para generar ETF y F1
function get_buttons_print($id)
{
    $ci = & get_instance();
    $html='';
    $html .=  '<button id="etf_'.$id. '" class="btn btn-danger"  data-toggle="modal" data-target="#modal_etf">ETF</button>    ';
    $html .=  '<button id="f1_'.$id. '" class="btn btn-danger"  data-toggle="modal" data-target="#modal_f1" >F1</button>';
  
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




