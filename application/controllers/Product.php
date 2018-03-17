<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {
	
	protected $default_page = 'product';
	
	
	public function __construct()
	{
		parent::__construct();		
		
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

	
	public function index($id = null)
	{	
		

		$data['home'] = $this->Model_product->get_home("home");
		//$data['detail'] = $this->Model_product->get_detail($_GET['id']);
		$data['page_url'] = base_url($this->default_page);
		$data['page'] = array(
		    "H_TH"=>"หน้าแรก",
		    "H_EN"=>"product",
		    "TH"=>"ผลิตภัณฑ์",
		    "EN"=>"product",
		);
		$data["slide"] = $this->Model_slide->get_home();
		// $data["contact"] = $this->Model_contact->get_detail();	


		$this->load->view('product',$data);
		
	}
	
	public function detail($id = null)
	{	
		$data = $this->Model_product->get_detail($id);
		$data["slide"] = $this->Model_slide->get_home();
		$data["contact"] = $this->Model_contact->get_detail();	
		$data['page_url'] = base_url($this->default_page);
		$data['page'] = array(
		    "H_TH"=>"หน้าแรก",
		    "H_EN"=>"Home",
		    "TH"=>"ผลิตภัณฑ์",
		    "EN"=>"product",
		    "sub"=>"Product",
		);
		
		$this->load->view('product-detail',$data);
		
	}
	
	
	public function download($id = null)
	{
		
		$data = $this->Model_product->download($id);
		
	}//function
	
	
	
	
}
