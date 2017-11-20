<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Esquema_model extends CI_Model{
    
    var $table = 'tb_esquema';
    var $column_order = array('id_esquema','nombre_esquema','descripcion_esquema','status_esquema',null); //set column field database for datatable orderable
    var $column_search = array('nombre_esquema','descripcion_esquema'); //set column field database for datatable searchable just nombre_esquema , descripcion_esquema are searchable
    var $order = array('id' => 'desc');

    function __construct() {
        parent::__construct();
        $this->load->database();    
    }
  
    public function avalaible($identifier){
        
      $avalaible = true;

       $this->db->select('*')
               ->from('esquemas')
               ->where(array('status_esquema'=>1,
                   'nombre_esquema'=>$identifier));
       $query = $this->db->get();
       $esquema = $query->result();
       $query->free_result();
       if (!empty($esquema)) {
           $avalaible = false;
       }
       return $avalaible;

    }

    public function get_esquemas_desc(){
        
        $this->db->select()
               ->from('esquemas')
               ->where(array('status_esquema'=>1));
        $esquema = $this->db->get();
        return $esquema->result(); 
    }
    
    public function get_esquemas_edit($dato){
    	$this->db->select()
                ->from('esquemas')
                ->where(array('nombre_esquema'=>$dato));
    			
    	// ->order_by($campo,'ASC');
        
    	$esquemas = $this->db->get()->result_array();
   	
    	//$esquemas= $this->db->get()->result();
    	return $esquemas[0];
    }
    
    public function delete_esquema($dato){
    	
    	$status = array ('status_esquema' => 0);
    	$result = $this->db->where('nombre_esquema', $dato)
    					   ->update('esquemas', $status);
    	return $result;
    	
    }
    
    public function update_esquema($data){
    	
    	$result = $this->db->where(array('status_esquema' => 1,
    			 'nombre_esquema' => $data['nombre_esquema']))
    			 		   ->update('esquemas', $data);
        
        return $result;
    }
    
    public function insert_esquema($data){
    
    	return $this->db->insert('esquemas',$data);
    }
        
   
}