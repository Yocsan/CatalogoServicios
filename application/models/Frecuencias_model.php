 <?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Frecuencias_model extends CI_Model{


    
    public function avalaible($identifier){
    
    	$avalaible = true;
    
    	$this->db->select('*')
    	->from('frecuencias')
    	->where(array('status_frecuencia'=>1,
    			'nombre_frecuencia'=>$identifier));
    	$query = $this->db->get();
    	$frecuencia = $query->result();
    	$query->free_result();
    	if (!empty($frecuencia)) {
    		$avalaible = false;
    	}
    	return $avalaible;
    
    }
    
    //insertar
    public function insert_frecuencia($data){
    
    	return $this->db->insert('frecuencias',$data);
    }

    
   
}