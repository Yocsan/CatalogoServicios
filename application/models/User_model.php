<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_model extends CI_Model{

    public function login($usuario, $password) {
    	
    	$this->db->select()
	    	 ->where(array('status_usuario'=>1,
    			'usuario'=>$usuario,
    			'password'=>$password
    	));
    	$query = $this->db->get('usuarios');	
        
        if ($query->num_rows() == 1) {
    		return $query->result();
    	} else {
    		return FALSE;            
    	}
 
    }
    //consulta
    public function usuario_login($usuario) {

    	$this->db->select()
	    	 ->where(array('status_usuario'=>1,
    			'usuario'=>$usuario
    	));
    	$query = $this->db->get('usuarios');
    	
        if ($query->num_rows() == 1) {		
            return TRUE;
          
    	} else{
    		return FALSE;
    	}
 
    }

    public function avalaible($identifier){
        
      $avalaible = true;

       $this->db->select('*')
               ->from('usuarios')
               ->where(array('status_usuario'=>1,
                   'usuario'=>$identifier));
       $query = $this->db->get();
       $usuario = $query->result();
       $query->free_result();
       if (!empty($usuario)) {
           $avalaible = false;
       }
       return $avalaible;

    }
    
    public function get_num_rows(){
        
       	$this->db->select('count(*) as total')
                ->from('usuarios')
                ->where('status_usuario',1);
       
      	$usuarios = $this->db->get()->result_array();       
       	return $usuarios[0]['total'];   
		  
    }
    
    public function paginacion($lim,$offset){
    	
        $this->db->where('status_usuario',1);  
        $this->db->order_by('user_id','ASC');
        $consulta = $this->db->get('usuarios', $lim, $offset);
        if ($consulta->num_rows() > 0) {
        	return $consulta->result_array();
		
		}          
    }
    //insertar
    public function insert_usuario($data){
    
    	return $this->db->insert('usuarios',$data);
    }
    
    public function get_usuarios_desc($campo=NULL){
        
        $this->db->select()
               ->from('usuarios')
               ->where(array('status_usuario'=>1));
               //->order_by($campo,'ASC');
        $usuario = $this->db->get()->result();
        return $usuario; 
    }
    
    public function get_usuarios_edit($dato){
    	
    	$this->db->select()
                ->from('usuarios')
                ->where(array('id_usuario'=>$dato));
        
    	$usuarios = $this->db->get()->result_array();
    	return $usuarios[0];
    }
    
    public function update_usuario($data){
    	
    	$result = $this->db->where('usuario', $data['usuario'])
    			 		   ->update('usuarios', $data);
        return $result;
    }
    
    public function delete_usuario($dato){
    	$status = array ('status_usuario' => 0);
    	$result = $this->db->where('id_usuario', $dato)
    	->update('usuarios', $status);
    
    	return $result;
    	 
    }

    
    public function get_id() {
			
		return $this->user_id ;
    }
		
    public function get_rol() {
			
		return $this->user_rol;
    }
   
    
                
}