<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {
	
	protected $default_page = 'contact';

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
		$data["contact"] = $this->Model_contact->get_home('home');	
		//$data["menu"] = $this->Model_product->get_home("home");
		$data["slide"] = $this->Model_slide->get_home();

		$data['page_url'] = base_url('contact'); 
		$data['page'] = array(
			"H_TH"=>"หน้าแรก",
			"H_EN"=>"Home",
			"TH"=>"ติดต่อเรา",
			"EN"=>"contact",
		);

		$this->load->view('contact',$data);
	}
	
	public function sentmail()
	{	
		

		$lang = $this->session->lang;

		$query = $this->Model_contact->sentmail();

		if($query == TRUE){

			$data_page = array(
				'page' => "contact",
				'label' => constant('Contact-'.$_SESSION["lang"]),
				'labeltext' => constant('Weget-'.$_SESSION["lang"]),
			);

			$this->load->view('cwcontrol/modal/front_success',$data_page);

		}elseif($query == "code"){

			$data_page = array(
				'page' => "contact",
				'label' => constant('Contact-'.$_SESSION["lang"]),
				'labeltext' => constant('Security-'.$_SESSION["lang"]),
			);


		}else{

			$data_page = array(
				'page' => "contact",
				'label' => constant('Contact-'.$_SESSION["lang"]),
				'labeltext' => constant('Error-'.$_SESSION["lang"]),
			);
			$this->load->view('cwcontrol/modal/front_error',$data_page);

		}

	}

}
