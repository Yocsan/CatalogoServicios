<?php 

class Menu extends CI_Controller {
	
	private $menu;
	function __construct() {
		parent::__construct();

		$this->load->model(array('Menu_rol_model','Menu_model',));
		$this->menu = $this->session->userdata('user_profile');
		 
	}
 	public function load_menu_superior(){
 	
    	$datos_menu_superior = array();
    	foreach ($this->menu as $m){
    		if ($m->id_menu_superior === 0){
    			 array_push($datos_menu_superior, $m);
    		}
    	}
    	return $datos_menu_superior;
    }
    
    public function load_menu_inferior($id_menu){
    	
    	$sub_menu = array();
    	foreach ($this->menu as $m){
    		if ($m->id_menu_superior === $id_menu){
    			array_push($sub_menu, $m);
    		}
    	}
    	return $sub_menu;
    	
    }
}

?>