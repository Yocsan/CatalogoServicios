<?php


/**
 * Description of Utilities_model
 * Se cargan las principales tablas del sistema y se almacenan en cache
 * (usuarios,tbl_menu,tbl_perfil,tbl_sistema,etc....)
 * @author Ing. Angélica Espinosa  <angelica1387@gmail.com>
 * @fecha_crecion 29/03/2016
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Utilities_model extends CI_Model{

    function __construct() {
        parent::__construct();
    }
    public function get_all_applications() 
    {
      //  $this->db->cache_on();
        $this->db->select('*')
                ->from('tb_sistema')
                ->where('status_sistema = 1');//solo aplicaciones activas 
        $result = $this->db->get();
        return $result->result();

    }
    //put your code here
}
