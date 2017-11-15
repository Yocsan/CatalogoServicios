<?php

class Menu_rol_model extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('Menu_model');
	}
        
	public function get_menu_rol($id_rol){
		
            $this->db->select('menus_id_menu')
                    ->from('menus_has_roles')
                    ->where('roles_id_rol',$id_rol);
			
            $query = $this->db->get();	
            $menu = $query->result();
		
            $query->free_result();

            $reindex_menu = array();

            foreach ($menu as $value) {
            
            	array_push($reindex_menu, (int)$value->Id_menu);
            }		

            return $reindex_menu;
	}
}