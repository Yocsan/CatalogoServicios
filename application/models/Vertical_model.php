<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Vertical_model extends CI_Model{
    
    var $table = 'tb_vertical';
    var $column_order = array('id_vertical','identificador_vertical','nombre_vertical','status_vertical',null); //set column field database for datatable orderable
    var $column_search = array('identificador_vertical','nombre_vertical'); //set column field database for datatable searchable just identificador_vertical , nombre_vertical are searchable
    var $order = array('id' => 'desc');

    function __construct() {
        parent::__construct();
        $this->load->database();    
    }
  
    public function avalaible($identifier){
        
      $avalaible = true;

       $this->db->select('*')
               ->from('verticales')
               ->where(array('status_vertical'=>1,
                   'identificador_vertical'=>$identifier));
       $query = $this->db->get();
       $vertical = $query->result();
       $query->free_result();
       if (!empty($vertical)) {
           $avalaible = false;
       }
       return $avalaible;

    }

    public function get_verticales_desc(){
        
        $this->db->select()
               ->from('verticales')
               ->where(array('status_vertical'=>1));
        $vertical = $this->db->get();
        return $vertical->result(); 
    }
    
    public function get_verticales_edit($dato){
    	$this->db->select()
                ->from('verticales')
                ->where(array('identificador_vertical'=>$dato));
    			
    	// ->order_by($campo,'ASC');
        
    	$verticales = $this->db->get()->result_array();
   	
    	//$verticales = $this->db->get()->result();
    	return $verticales[0];
    }
    
    public function delete_vertical($dato){
    	
    	$status = array ('status_vertical' => 0);
    	$result = $this->db->where('identificador_vertical', $dato)
    					   ->update('verticales', $status);
    	return $result;
    	
    }
    
    public function update_vertical($data){
    	
    	$result = $this->db->where(array('status_vertical' => 1,
    			 'identificador_vertical' => $data['identificador_vertical']))
    			 		   ->update('verticales', $data);
        
        return $result;
    }
    
    public function insert_vertical($data){
    
    	return $this->db->insert('verticales',$data);
    }
        
   
}
