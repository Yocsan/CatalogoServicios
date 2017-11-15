<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of Servicios
 *  Funciones para la creación, actualización de los servicios del Catalogo
 *
 * @author TSU Yocsan Burgos  <yocsan19@gmail.com>
 * @fecha_crecion 22/09/2017
 */


class Utilidades extends CI_Controller {
    function __construct() {
        parent::__construct();
        
         $this->load->library('Utilities');
         $this->load->helper("datatables_helper");
         
    }
      
    public function index() {        
       
        $this->utilities->principal();        
    }
    
    
    
}