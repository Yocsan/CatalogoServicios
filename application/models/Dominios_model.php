<?php 
/*
 * @autor TSU. Yocsan Burgos  <yocsan19@gmail.com>
 * @fecha_creacion 06/10/2016
 */


if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dominios_model extends CI_Model {
    
    var $table = 'tb_dominios';
    var $column_order = array('id_dominio','descripcion_dominio','sistema_origen','sist_equi1','sist_equi2','sist_equi3','sist_equi4','sist_equi5','sist_equi6','sist_equi7','val_equi1','val_equi2','val_equi3','val_equi4','val_equi5','val_equi6','val_equi7','status_dominio',null); //set column field database for datatable orderable
    var $column_search = array('id_dominio','descripcion_dominio'); 
    var $order = array('id' => 'desc');

    function __construct() {
        parent::__construct();
        $this->load->database();    
    }
  
	public function avalaible($nombre_dominio) {
       
		$avalaible = true;

       	$this->db->select('*')
               ->from('dominios')
               ->where(array('Status_dominio'=>1,
               		'Nombre_dominio'=>$nombre_dominio
               ));
               
       $query = $this->db->get();
       $sistema_origen = $query->result();
       $query->free_result();
       if (!empty($sistema_origen)) {
           $avalaible = false;
       }
       return $avalaible;

	}
    
    public function get_num_rows() {
        
       $this->db->select('count(*) as total')
                ->from('tb_dominios')
                ->where('status_dominio',1);
       
       $dominio = $this->db->get()->result_array();       
      
       return $dominio[0]['total'];   
    }
    
    public function paginacion($lim,$offset) {
        $this->db->where('status_dominio',1);  
        $this->db->order_by('id_dominio','ASC');
        $consulta = $this->db->get('tb_dominios', $lim, $offset);
        if ($consulta->num_rows() > 0) 
        {
        	
        	return $consulta->result_array();
		
		}          
    }
    

    public function get_all_dominios(){
    	$this->db->select('Id_dominio, Nombre_dominio');
        $this->db->where('Status_dominio=1');
        $query = $this->db->get('dominios');
        
        
        return $query->result();
    
    }
    
    public function get_dominios_transformaciones_desc($campo=NULL) {
        
        $this->db->select()
               ->from('tb_dominios')
               ->where(array('status_dominio'=>1));
              // ->order_by($campo,'ASC');
        $dominio = $this->db->get()->result();
        return $dominio; 
    }
    
    public function get_dominios_edit($dato) {
    	
    	$this->db->select()
                ->from('dominios')
                ->where(array('Id_dominio'=>$dato));
    			
    	// ->order_by($campo,'ASC');
        
    	$dominio = $this->db->get()->result_array();
    	return $dominio[0];
    }

    public function insert_dominio($data) {
    
    	return $this->db->insert('dominios',$data);
        
    }
    
    public function update_dominio($data) {
    	 
    	$result = $this->db->where('Id_dominio', $data['Id_dominio'])
    	->update('dominios', $data);
    
    	return $result;
    }

    public function delete_dominio($dato) {
    	$status = array ('Status_dominio' => 0);
    	$result = $this->db->where('Id_dominio', $dato)
    	->update('dominios', $status);
    	return $result;
    	 
    }
    
     public function get_actual_sistema_origen($id_dominio) {
        
        $this->db->select('sistema_origen')
               ->from('tb_dominios')
               ->where(array('id_dominio'=>"$id_dominio"));
              
        $actual_sistema_origen= $this->db->get()->result();  
        $next_sistema_origen = (int)$actual_sistema_origen[0]->sistema_origen + 1;
        
        
        $this->db->set('sistema_origen', $next_sistema_origen);
        $this->db->where('id_dominio', $id_dominio);
        $this->db->update('tb_dominios'); 
       
        return $actual_sistema_origen[0]->sistema_origen;
    }
     
    
   
}