<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Portfolio extends CI_Controller {
	
	Protected $default_page = 'portfolio';

	public function __construct()
	{
		parent::__construct();		
		$this->load->model('Model_portfolio');	
		$this->load->model('Model_product');	
		$this->load->model('Model_slide');

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
		
		$data = $this->Model_portfolio->get_home();
		$data['page_url'] = base_url($this->default_page);
		$data['page'] = array(
		    "H_TH"=>"หน้าแรก",
		    "H_EN"=>"Home",
		    "TH"=>"ผลงานของเรา",
		    "EN"=>"Profile",
		);
		$data["slide"] = $this->Model_slide->get_home();
		$data["contact"] = $this->Model_contact->get_detail();	
		$this->load->view('projects',$data);
	}
	
	public function detail($id = null)
	{	
		
		$data = $this->Model_portfolio->get_detail($id);
		$data['page_url'] = base_url($this->default_page);
		$data['page'] = array(
		    "H_TH"=>"หน้าแรก",
		    "H_EN"=>"Home",
		    "TH"=>"ผลงานของเรา",
		    "EN"=>"Profile",
		    "sub"=>"Profile",

		);
		$this->load->view('project-detail',$data);
		
	}
	
	
	
	
	
	
	
}
