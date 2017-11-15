<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Esquema_model extends CI_Model{

    function __construct() {
        parent::__construct();
    }

    public function get_esquemas() {
        $this->db->where('status_esquema=1');
        $query = $this->db->get('esquemas');
        return $query->result();    
    }
}
