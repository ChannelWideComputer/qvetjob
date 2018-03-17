<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Header extends CI_Controller {

	protected $default_page = 'header';

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
		

		//$data['detail'] = $this->Model_product->get_detail($_GET['id']);
		$data['page_url'] = base_url($this->default_page);
		$data['page'] = array(
		    "H_TH"=>"หน้าแรก",
		    "H_EN"=>"product",
		    "TH"=>"ผลิตภัณฑ์",
		    "EN"=>"product",
		);
		
		$this->load->view('header',$data);
		
	}
	

}
