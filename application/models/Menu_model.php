<?php 

class Menu_model extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();		
		
	}
    
	//trae los menus que se encuentran registrados en la tabla menu_has_roles
	//la tabla menu_has_roles es donde se encuentran los menus asociados a cada rol de usuario (Administrador, Arquitecto, Visitante)
	public function get_menu($id_rol){
    	   
            $this->db->select('menus.id_menu,menus.nombre,menus.vista, menus.descripcion')
                        ->from('menus')
                        ->join('menus_has_roles','menus.id_menu = menus_has_roles.menus_id_menu')
                        ->where(array('menus_has_roles.roles_id_rol'=>$id_rol,
                                       'menus.id_menu_superior'=>0,
                                       'menus.status'=>1));

            $query = $this->db->get();	
            $menu = $query->result_array();
            $cont = sizeof($menu);
            

            for($i=0; $i < $cont; $i++){
           		$menu[$i]['submenu'] = $this->get_sub_menu( $menu[$i]['id_menu'], $id_rol);
            }
	  		

           	$query->free_result();

           	return $menu;		
    }
	
	public function get_sub_menu($id_menu_superior,$id_rol){
		
            $this->db->select('menus.id_menu,menus.nombre,menus.vista')
                    ->from('menus')
                    ->join('menus_has_roles','menus.id_menu = menus_has_roles.menus_id_menu')
                    ->where(array('menus_has_roles.roles_id_rol'=>$id_rol,
                                   'menus.id_menu_superior'=>$id_menu_superior,
                                   'menus.status'=>1));

            $sub_menus = $this->db->get();

            $name_sub_menu = $sub_menus->result_array();

            $sub_menus->free_result();

            return $name_sub_menu;
	}
			    
    public function get_vista($id_menu){
            
	    $this->db->select('menus.vista')
		    ->from('menus')
		    ->where('id_menu',$id_menu);
	
	    $result = $this->db->get();
	
	    $vista = $result->result();
	
	    $result->free_result();
	
	    return $vista;
	}
}

