<?php
/**
 * Description of Sistemas_model
 *
 * @author TSU. Angel Jaramillo <angeljaramillo34@gmail.com>
 * @fecha_crecion 05/10/2016
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sistemas_aplicaciones_model extends CI_Model{
	/*
    
    var $table = 'tb_sistema';
    var $column_order = array('id_sistemas','str_descripcion','dr_correo','id_ambiente','conexion_https','host_http','timeout_http','user_http','pass_http','function_http','conexion_jdbc','dbuser_jdbc','dbpass_jdbc','dbname_jdbc','dbport_jdbc','dbservername_jdbc','dbdatasourcename_jdbc','dbprotocol_jdbc','dbconnectiontype_jdbc','dbmaxpool_jdbc','dbdrivetype_jdbc','dbdescription_jdbc','dbminpool_jdbc','conexion_batch','idprotocolo_batch','host_batch','usuario_batch','pass_batch','typekey_batch','status_sistema',null); //set column field database for datatable orderable
    var $column_search = array('id_sistemas','str_descripcion'); //set column field database for datatable searchable just identificador_vertical , nombre_vertical are searchable
    var $order = array('id' => 'desc');
*/
    function __construct() {
        parent::__construct();
        $this->load->database();    
    }
   
    public function get_sistemas(){
       $this->db->where('status_sistema = 1');
       $sistemas = $this->db->get('sistemas')->result();
       return $sistemas;
    }

    public function insert_sistema($data){
    
    	return $this->db->insert('sistemas',$data);

    }

    //actualiza informacion en la tabla sistemas
    public function update_sistema($data){
    	
    	$result = $this->db->where('id_sistema', $data['id_sistema'])
    			 		    ->update('sistemas', $data);
      return $result;
    }
    
    public function avalaible($nombre_sistema){
        
       $avalaible = true;

       $this->db->select('*')
               ->from('sistemas')
               ->where(array('status_sistema'=>1,
                   'nombre_sistema'=>$nombre_sistema
               ));
               
       $query = $this->db->get();
       $sistema = $query->result();
       $query->free_result();
       if (!empty($sistema)) {
           $avalaible = false;
       }
       return $avalaible;
    }
    
    public function carga_sistema_edit($dato){
    	$this->db->select()
                ->from('sistemas')
                ->where(array('id_sistema'=>$dato));
    			        
    	$sistema = $this->db->get()->result_array();
 
    	return $sistema[0];
    }
    
    public function delete_sistema($dato){
    	$status = array ('status_sistema' => 0);
    	$result = $this->db->where('id_sistema', $dato)
    					   ->update('sistemas', $status);
    	return $result;
    	
    }
       
    
}