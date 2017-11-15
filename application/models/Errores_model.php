<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/**
 * Description of Vertical_model
 * Manejo de las verticales del PIC
 * @author Ing. AngÃ©lica Espinosa  <angelica1387@gmail.com>
 * @fecha_crecion 21/10/2015
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Errores_model extends CI_Model{
    
   var $table = 'tb_errores';
   var $column_order = array('id_errores','codigo_error','descripcion_error','status_error',null); //set column field database for datatable orderable
   var $column_search = array('codigo_error','descripcion_error'); //set column field database for datatable searchable just identificador_vertical , nombre_vertical are searchable
   var $order = array('id' => 'desc');
    
    function __construct() {
        parent::__construct();	
        $this->load->database();
    }
    
    public function avalaible($identifier){
    
    	$avalaible = true;
    
    	$this->db->select('*')
    	->from('errores')
    	->where(array('Status_error'=>1,
    			'Codigo_error'=>$identifier));
    	$query = $this->db->get();
    	$error = $query->result();
    	$query->free_result();
    	if (!empty($error)) {
    		$avalaible = false;
    	}
    	return $avalaible;
	    
    }  
    
     public function  get_num_rows(){
        
       $this->db->select('count(*) as total')
                ->from('tb_errores')
                ->where('status_error',1);
       
       $errores = $this->db->get()->result_array();       
      
       return $errores[0]['total'];   
    }
    
    public function paginacion($lim,$offset){
    	$this->db->where('status_error',1);
    	$this->db->order_by('id_errores','ASC');
    	$consulta = $this->db->get('tb_errores', $lim, $offset);
    	if ($consulta->num_rows() > 0)
    	{
    		 
    		return $consulta->result_array();
    
    	}
    }
    public function get_errores_desc($campo=NULL){
        
        $this->db->select()
               ->from('errores')
               ->where(array('status_error'=>1));
              // ->order_by($campo,'ASC');
        $error = $this->db->get()->result();
        
       
        return $error;
    }
    
    public function get_errores_edit($dato){
    	$this->db->select()
    	->from('errores')
    	->where(array('Codigo_error'=>$dato));
    	 
    	// ->order_by($campo,'ASC');
    
    	$verticales = $this->db->get()->result_array();
    
    	//$verticales = $this->db->get()->result();
    	return $verticales[0];
    }
    
    public function delete_error($dato){
    	$status = array ('Status_error' => 0);
    	$result = $this->db->where('Codigo_error', $dato)
    			  ->update('errores', $status);
    	return $result;
    	 
    }
    
    public function update_error($data){
    	 
    	$result = $this->db->where('Codigo_error', $data['Codigo_error'])
    			 		   ->update('errores', $data);
    
    	return $result;
    }
    
     public function insert_error($data){
        
        return $this->db->insert('errores',$data);
        
    }

    public function consulta_error(){   
            $this->db->select("Codigo_error as id_error")
                        ->from("tb_errores")
                        ->where("id_errores = (Select MAX(`id_errores`) FROM `tb_errores`)");
              
            $id_error = $this->db->get();
            
            $last_id_error = $id_error->result();
            
            
          return  $last_id_error[0]->id_error;                
    }
                
}