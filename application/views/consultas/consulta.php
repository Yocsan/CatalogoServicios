<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * @autor TSU. Yocsan Burgos  <yocsan19@gmail.com>
 * @fecha_creacion 06/10/2016
 */


if (!defined('BASEPATH'))
    exit('No direct script access allowed');
?>

<!DOCTYPE html>


 <script type="text/javascript" src="<?php echo base_url('assets/js/helper/func_consultas.js');?>"></script>

 <h4 align="center">Introducci&oacute;n</h4>

 <textarea disabled rows="10" cols="150">
       <?php echo isset($datos['introduccion']) ? $datos['introduccion'] : "N/A"?>

 </textarea>

 <h4 align="center">Diagrama</h4>

  <img src="<?php echo isset($datos['url_imagen']) ? $datos['url_imagen'] : ""?>" alt="No se pudo cargar la imagen" align="center"/>


    <h4 align="center">Descripci&oacute;n de proceso</h4>

       <textarea disabled rows="12" cols="150">
             <?php echo isset($datos['descripcion_proceso']) ? $datos['descripcion_proceso'] : "N/A"?>

       </textarea>


   <h4 align="center">Evento disparador</h4>
 <textarea disabled rows="12" cols="150">
       <?php echo isset($datos['evento_disparador']) ? $datos['evento_disparador'] : "N/A"?>

 </textarea>

   <h4 align="center">Adaptador</h4>

 <textarea disabled rows="12" cols="150">
       <?php echo isset($datos['adaptador']) ? $datos['adaptador'] : "N/A"?>

 </textarea>


    <h4 align="center">Arquitectura de sistema de conexi&oacute;n</h4>
 <textarea disabled rows="12" cols="150">
       <?php echo isset($datos['arquitectura_sistema_conexion']) ? $datos['arquitectura_sistema_conexion'] : "N/A"?>

 </textarea>
