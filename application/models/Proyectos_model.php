<?php
/**
 * Description of Proyectos_model
 * tb_proyectos
 *
 * @author Ing. Angélica Espinosa  <angelica1387@gmail.com>
 * @fecha_crecion 04/05/2016
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Proyectos_model extends CI_Model{

    function __construct() {
        parent::__construct();
    }
    
    public function get_proyectos() 
    {
        //$this->db->where('Status_proyecto = 1');
        $query = $this->db->get('proyectos');
        return $query->result();
        
    }
    public function is_interoperability($id) {
        
        $this->db->select('str_proyecto')
               ->from('tb_proyecto')
               ->where(array('id_proyecto'=>"$id"));
        
        $query = $this->db->get();
        
        $str_proyecto = $query->result();
        //var_dump($str_proyecto[0]);
        if( $str_proyecto[0]->str_proyecto === 'INTEROPERABILIDAD' )
            return true;
        else 
            return false;     
    }
}
