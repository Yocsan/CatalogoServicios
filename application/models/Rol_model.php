<?php 

	class Rol_model extends CI_Model {
		
		private $rol_id;
		private $rol_description;
		
		public function __construct()
		{
			parent::__construct();
		}
		
		public function get_roles() {
		
			$db_roles= $this->db->get('roles');	
			return $db_roles->result_array();
		
		}
		
        public function get_rol($id) {
        	
            $this->db->select()
                     ->from('roles')
                     ->where('id_rol',$id);
            $query = $this->db->get();
            $rol = $query->result();
            $query->free_result();
            return $rol;
                    
        }
	}
	
  