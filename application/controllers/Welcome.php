<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct() {
		parent::__construct();		
		$this->load->library('table');
                $this->load->helper('url');
                        
		
	}
	public function index()
	{
             //redirect(base_url('login/login_without_ldap'));
            $this->load->view('layout/header');
            //$this->load->view('login/index_login'); vista con codigo para iniciar con el ldap
            $this->load->view('login/login'); //vista con codigo para iniciar sin el ldap
            
	
	}
        
        public function load_default(){
            
            
        }
}
