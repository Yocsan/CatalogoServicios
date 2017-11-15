<?php 
/*@author Jose Borges <josedavidborgesrangel@gmail.com>
 * @fecha_crecion 26/10/2016
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Transformaciones_model extends CI_Model{
    
    var $table = 'tb_dominios';
    var $column_order = array('id_dominio','descripcion_dominio','sistema_origen','sist_equi1','sist_equi2','sist_equi3','sist_equi4','sist_equi5','sist_equi6','sist_equi7','val_equi1','val_equi2','val_equi3','val_equi4','val_equi5','val_equi6','val_equi7','status_dominio',null); //set column field database for datatable orderable
    var $column_search = array('id_dominio','descripcion_dominio'); 
    var $order = array('id' => 'desc');

    function __construct() {
        parent::__construct();
        $this->load->database();    
    }
  
    public function avalaible($sistema_origen, $id_dominio){
        
      $avalaible = true;

       $this->db->select('*')
               ->from('detalles_dominio')
               ->where(array('Status_dominio'=>1,
                   'Sistema_origen'=>$sistema_origen,
               		'Id_dominio'=>$id_dominio
               ));
       $query = $this->db->get();
       $dominio = $query->result();
       $query->free_result();
       if (!empty($dominio)) {
           $avalaible = false;
       }
       return $avalaible;

    }
    
    public function  get_num_rows(){
        
       $this->db->select('count(*) as total')
                ->from('tb_dominios')
                ->where('status_dominio',1);
       
       $dominio = $this->db->get()->result_array();       
      
       return $dominio[0]['total'];   
    }
    
    public function paginacion($lim,$offset){
        $this->db->where('status_dominio',1);  
        $this->db->order_by('id_dominio','ASC');
        $consulta = $this->db->get('tb_dominios', $lim, $offset);
        if ($consulta->num_rows() > 0) 
        {
        	
        	return $consulta->result_array();
		
		}          
    }
    public function get_transformaciones_desc($campo=NULL){
        
        $this->db->select()
               ->from('tb_dominios')
               ->where(array('status_dominio'=>1));
         
        $dominio = $this->db->get()->result();
        return $dominio; 
    }
    
    
    public function get_transformaciones_edit($dato){
    	$this->db->select()
                ->from('detalles_dominio')
                ->join('dominios','dominios.Id_dominio = detalles_dominio.Id_dominio')
                ->where(array('Id_detalle_dominio'=>$dato));
        
    	$dominio = $this->db->get()->result_array();

    	return $dominio[0];
    }
    
    public function delete_transformacion($dato){
    	$status = array ('Status_dominio' => 0);
    	$result = $this->db->where('Id_detalle_dominio', $dato)
    					   ->update('detalles_dominio', $status);
    	return $result;
    	
    }

    public function insert_transformacion($data) {
    
    	return $this->db->insert('detalles_dominio',$data);
    
    }
    
    public function update_transformacion($data){
    	
    	$result = $this->db->where('Id_detalle_dominio', $data['Id_detalle_dominio'])
    			 		   ->update('detalles_dominio', $data);
        
        return $result;
    }

      
   
}