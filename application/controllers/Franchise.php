<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Franchise extends CI_Controller {
	
    protected $default_page = 'franchise';
    
	public function __construct()
	{
		parent::__construct();
		
		$this->load->library('user_agent');
		$this->load->library('email');
		$this->load->model('Model_slide');
		$this->load->model('Model_product');

		if ($this->session->userdata('lang') == NULL) {
			$lang = "EN";
			$this->session->set_userdata('lang', $lang);                
			
		}else{          
			$lang = $this->session->userdata('lang');  
		}
		
		$this->lang->load($lang, $lang);
	}
	
	
	public function index()
	{
		$data = $this->Model_contact->get_home();	
		//$data["menu"] = $this->Model_product->get_home("home");
		$data["slide"] = $this->Model_slide->get_home();

		$data['page_url'] = base_url('franchise'); 
		$data['page'] = array(
			"H_TH"=>"หน้าแรก",
			"H_EN"=>"Home",
			"TH"=>"เฟรนชาย",
			"EN"=>"franchise",
		);
			// echo "<pre>";
			// print_r($data);
			// echo "</pre>";
		$this->load->view('franchise',$data);
	}

	
}
