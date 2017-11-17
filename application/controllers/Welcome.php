<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	
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
