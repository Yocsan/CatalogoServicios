<?php 

class Utilidades_model extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();		
		
	}
        
	public function get_utilidades($id_rol){
            

            $this->db->select('tb_menu.id_menu,tb_menu.nombre,tb_menu.vista')
                        ->from('tb_menu')
                        ->join('tb_menu_rol','tb_menu.id_menu=tb_menu_rol.id_menu')
                        ->where(array('tb_menu_rol.id_rol'=>$id_rol,
                                       'tb_menu.id_menu_superior'=>0,
                                       'tb_menu.status'=>1));

            $query = $this->db->get();	
            $menu = $query->result_array();
            $cont = sizeof($menu);

            for($i=0;$i < $cont; $i++){
                $menu[$i]['submenu'] = $this->get_sub_menu( $menu[$i]['id_menu'], $id_rol);
            }
	  	
           $query->free_result();

            return $menu;		
        }
	
	public function get_sub_utilidades($id_menu_superior,$id_rol){
		
            $this->db->select('tb_menu.id_menu,tb_menu.nombre,tb_menu.vista')
                    ->from('tb_menu')
                    ->join('tb_menu_rol','tb_menu.id_menu=tb_menu_rol.id_menu')
                    ->where(array('tb_menu_rol.id_rol'=>$id_rol,
                                   'tb_menu.id_menu_superior'=>$id_menu_superior,
                                   'tb_menu.status'=>1));

            $sub_menus = $this->db->get();

            $name_sub_menu = $sub_menus->result_array();

            $sub_menus->free_result();

            return $name_sub_menu;
	}
        
        public function get_vista($id_menu){
            
             $this->db->select('tb_menu.vista')
                    ->from('tb_menu')
                    ->where('id_menu',$id_menu);

            $result = $this->db->get();

            $vista = $result->result();

            $result->free_result();

            return $vista;
        }
}

