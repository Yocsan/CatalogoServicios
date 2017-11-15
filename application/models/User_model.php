<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_model extends CI_Model{
    /*
    private $user_name;
    private $user_id;
    private $user_apellidos;
    private $user_login;
    private $user_contact;
    private $user_cedula;
    private $user_rol;
    private $user_status;
    
    var $table = 'usuarios';
    var $column_order = array('nombre','user_id','apellidos','login','password','numero_contacto','cedula','tipo_rol','status_usuario',null); //set column field database for datatable orderable
    var $column_search = array('user_id','cedula'); //set column field database for datatable searchable just user_id , cedula are searchable
    var $order = array('id' => 'desc');

    public function __construct($username="") {
        parent::__construct($username);				
		$this->user_name = $username;		
		$this->_init();
        $this->load->database();    
    }
    
    private function _init(){
			
		if(!empty($this->user_name)){
	            $this->db->select()
	            ->from('usuarios')
	            ->where('Usuario',$this->user_name);
	            $query = $this->db->get();
	            $user = $query->result();
								
	            if(!empty($user)){
						
	                $this->user_id = $user[0]->user_id;
			$this->user_apellidos = $user[0]->apellidos;
			$this->user_login = $user[0]->login;
			$this->user_contact = $user[0]->numero_contacto;
			$this->user_cedula = $user[0]->cedula;
			$this->user_rol = $user[0]->tipo_rol;
			$this->user_status	=	$user[0]->status_usuario;
	            }
	            else{
			$this->user_id = 0;
			$this->user_apellidos = "";
			$this->user_login = "";
			$this->user_contact = "";
			$this->user_cedula = "";
			$this->user_rol = 0;
	                $this->user_status	= 0;
			} 
						
		}
    }
   */ 
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