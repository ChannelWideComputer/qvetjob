<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {

	protected $default_page = 'about';

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_about');
		$this->load->model('Model_slide');
		$this->load->model('Model_contact');
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
		$data = $this->Model_about->get_about("about");
		$data["contact"] = $this->Model_contact->get_detail();	
		$data["slide"] = $this->Model_slide->get_home();
		//$data["menu"] = $this->Model_product->get_home("home");
		$data['page_url'] = base_url($this->default_page); 
		$data['page'] = array(
			"H_TH"=>"หน้าแรก",
			"H_EN"=>"Home",
			"TH"=>"เกี่ยวกับเรา",
			"EN"=>"Company Profile",
		);

		$data["contact"] = $this->Model_contact->get_detail();	
		
		//echo "<pre>"; print_r($data); echo "</pre>";	
		
		$this->load->view('about',$data);
	}

	public function comprofile()
	{
		// $data = $this->Model_about->get_about("about");
		// $data["contact"] = $this->Model_contact->get_detail();	
		// $data["slide"] = $this->Model_slide->get_home();
		// //$data["menu"] = $this->Model_product->get_home("home");
		// $data['page_url'] = base_url($this->default_page); 
		// $data['page'] = array(
		// 	"H_TH"=>"หน้าแรก",
		// 	"H_EN"=>"Home",
		// 	"TH"=>"เกี่ยวกับเรา",
		// 	"EN"=>"Company Profile",
		// );

		// $data["contact"] = $this->Model_contact->get_detail();	
		
		// //echo "<pre>"; print_r($data); echo "</pre>";	
		
		$this->load->view('company-profile');
	}

}
